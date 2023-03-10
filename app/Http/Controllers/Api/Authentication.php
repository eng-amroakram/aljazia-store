<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use App\Traits\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class Authentication extends Controller
{
    use Sms;
    public function getUser($user_id)
    {
        $user = User::find($user_id);

        if ($user) {
            return response()->json(['body' => [
                'identifier' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'mobile' => $user->phone_number,
                'is_active' => $user->status,
            ], 'status' => true, 'message' => __('Operation accomplished successfully')]);
        }

        if (!$user) {
            return response()->json(['body' => null, 'status' => false, 'message' => __('User not found')]);
        }
    }

    public function register(Request $request)
    {

        $request->validate([
            'user_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:255|unique:users,phone_number',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'fcm_token' => 'required|string|max:255',
            'device_id' => 'required|string|max:255',
            'device_type' => 'required|string|max:255',
        ]);

        $code = rand(100000, 999999);

        $user = User::create([
            'admin_id' => 1,
            'name' => $request->user_name,
            'phone_number' => $request->mobile,
            'email' => $request->email,
            'active_code' => $code,
            'status' => 'active',
            'role' => 'user',
            'is_verified' => 0,
            'password' => Hash::make($request->password),
            'fcm_token' => $request->fcm_token,
            'device_id' => $request->device_id,
            'device_type' => $request->device_type,
        ]);

        $wallet =  Wallet::create([
            'admin_id' => 1,
            'user_id' => $user->id,
            'balance' => 0,
            'total_deposit' => 0,
            'total_withdraw' => 0,
            'points' => 0,
        ]);


        $this->sendSMSMessage("your code is $code", $user->phone_number);
    }

    public function login(Request $request)
    {
        #using phone number and password
        if (array_key_exists('mobile', $request->all())) {
            $credentials = request(['mobile', 'password', 'device_id', 'device_type']);

            $user = User::where('phone_number', $credentials['mobile'])->first();
            if ($user->is_verified == 1) {
                if (!$user || !Hash::check($credentials['password'], $user->password)) {
                    return response()->json([
                        'body' => null,
                        'status' => false,
                        'message' => __('The password you entered is incorrect!!')
                    ], 401);
                }

                $token = $user->createToken($credentials['device_type']);

                return response()->json([
                    'body' => [
                        'data' => [
                            'access_token' => $token->plainTextToken,
                            'token_type' => 'Bearer',
                            'expires_at' => now()->addDays(1),
                            'user' => [
                                'identifier' =>  $user->id,
                                'name' => $user->name,
                                'email' => $user->email,
                                'mobile' => $user->phone_number,
                                'is_active' => $user->status,
                            ],
                            'status' => true,
                            'message' => __('You are logged in successfully')
                        ]
                    ],
                ]);
            } else {
                return response()->json([
                    'body' => null,
                    'status' => false,
                    'message' => __('Your account is not verified yet!!')
                ], 401);
            }
        }

        #using email and password
        if (array_key_exists('email', $request->all())) {

            $credentials = request(['email', 'password', 'device_id', 'device_type']);

            $user = User::where('email', $credentials['email'])->first();

            if ($user->is_verified == 1) {

                if (!$user || !Hash::check($credentials['password'], $user->password)) {
                    return response()->json([
                        'body' => null,
                        'status' => false,
                        'message' => __('The password you entered is incorrect!!')
                    ], 401);
                }

                $token = $user->createToken($credentials['device_type']);

                return response()->json([
                    'body' => [
                        'data' => [
                            'access_token' => $token->plainTextToken,
                            'token_type' => 'Bearer',
                            'expires_at' => now()->addDays(1),
                            'user' => [
                                'identifier' =>  $user->id,
                                'name' => $user->name,
                                'email' => $user->email,
                                'mobile' => $user->phone_number,
                                'is_active' => $user->status,
                            ],
                            'status' => true,
                            'message' => __('You are logged in successfully')
                        ],
                    ]
                ]);
            } else {
                return response()->json([
                    'body' => null,
                    'status' => false,
                    'message' => __('Your account is not verified yet!!')
                ], 401);
            }
        }
    }

    public function activate()
    {
        if (request()->active_code && request()->mobile) {
            $user = User::where('phone_number', request()->phone_number)->first();
            if ($user) {
                if ($user->active_code == request()->active_code) {
                    $user->is_verified = 1;
                    $user->active_code = null;
                    $user->save();

                    $token = $user->createToken('MyApp')->accessToken;

                    if ($user && $token) {
                        return response()->json([
                            'body' => [
                                'user' => $user,
                                'token' => $token,
                                'status' => true,
                                'message' => __('Operation accomplished successfully')
                            ],
                        ]);
                    } else {
                        return response()->json([
                            'body' => null,
                            'status' => false,
                            'message' => __('Operation failed')
                        ]);
                    }
                } else {
                    return response()->json(['body' => null, 'status' => false, 'message' => __('Your activation code is incorrect')]);
                }
            } else {
                return response()->json(['body' => null, 'status' => false, 'message' => __('Your phone number is incorrect')]);
            }
        } else {
            return response()->json(['body' => null, 'status' => false, 'message' => __('Please enter your activation code')]);
        }
    }

    public function logout(User $user)
    {
        $user->tokens()->delete();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function forgetPassword(Request $request)
    {
        $credentials = $request->validate([
            'mobile' => 'required|string|max:255',
        ]);
        $user = User::where('phone_number', $credentials['mobile'])->first();

        if ($user) {
            $code = rand(100000, 999999);
            $user->active_code = $code;
            $user->save();

            $this->sendSMSMessage("your code is $code", $user->phone_number);

            return response()->json([
                'body' => [
                    'data' => [
                        'status' => true,
                        'message' => __('Operation accomplished successfully')
                    ],
                ],
            ]);
        } else {
            return response()->json([
                'body' => null,
                'status' => false,
                'message' => __('Your phone number is incorrect')
            ]);
        }
    }

    public function changePassword()
    {
        $user = User::where('phone_number', request()->mobile)->first();

        if ($user) {
            if ($user->active_code == request()->active_code) {
                if (request()->password ==  request()->password_confirmation) {
                    $user->password = Hash::make(request()->password);
                    $user->active_code = null;
                    $user->save();

                    return response()->json([
                        'body' => [
                            'data' => [
                                'status' => true,
                                'message' => __('Operation accomplished successfully')
                            ],
                        ],
                    ]);
                } else {
                    return response()->json([
                        'body' => null,
                        'status' => false,
                        'message' => __('Your passwords do not match')
                    ]);
                }
            } else {
                return response()->json([
                    'body' => null,
                    'status' => false,
                    'message' => __('Your activation code is incorrect')
                ]);
            }
        } else {
            return response()->json([
                'body' => null,
                'status' => false,
                'message' => __('Your phone number is incorrect')
            ]);
        }
    }

    public function reset()
    {
        $credentials = request(['email', 'password', 'password_confirmation', 'token']);

        $response = Password::reset($credentials, function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });

        if ($response == Password::PASSWORD_RESET) {
            return response()->json(['message' => 'Password reset successfully']);
        } else {
            return response()->json(['message' => 'Failed to reset password'], 401);
        }
    }

    public function changePasswordByAuth()
    {
    }

    public function updateUser()
    {
        $user = User::where('id', auth()->guard('sanctum')->id())->first();

        if ($user) {
            $user->name = request()->user_name;
            $user->email = request()->email;
            $user->save();

            return response()->json([
                'body' => [
                    'data' => [
                        'status' => true,
                        'message' => __('Operation accomplished successfully')
                    ],
                ],
            ]);
        } else {
            return response()->json([
                'body' => null,
                'status' => false,
                'message' => __('Your email is incorrect')
            ]);
        }
    }


    public function resend()
    {
        $user = User::where('phone_number', request()->mobile)->first();
        if ($user) {
            $code = rand(100000, 999999);
            $user->active_code = $code;
            $user->save();

            $this->sendSMSMessage("your code is $code", $user->phone_number);

            return response()->json([
                'body' => [
                    'data' => [
                        'status' => true,
                        'message' => __('Operation accomplished successfully')
                    ],
                ],
            ]);
        } else {
            return response()->json([
                'body' => null,
                'status' => false,
                'message' => __('Your phone number is incorrect')
            ]);
        }
    }

    public function changeLanguage()
    {
    }

}
