<?php

namespace App\Http\Controllers\ModelsControllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    use PasswordValidationRules;

    public function store(StoreUserRequest $request)
    {

        $input = $request->all();
        $input['role'] = 'user';

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class),],
            'phone_number' => ['required', 'string', 'max:15'],
            'status' => ['required', 'in:active,inactive'],
            'role' => ['required', 'in:user,delivery'],
            // 'username' => ['required', 'string', 'max:255', Rule::unique(User::class)],
            'password' => $this->passwordRules(),
        ])->validate();

        $user =  User::create([
            'admin_id' => auth()->guard('admin')->id(),
            'name' => $input['name'],
            'email' => $input['email'],
            'phone_number' => $input['phone_number'],
            'status' => $input['status'],
            'role' => $input['role'],
            // 'username' => $input['username'],
            'password' => Hash::make($input['password']),
        ]);

        $wallet =  Wallet::create([
            'admin_id' => 1,
            'user_id' => $user->id,
            'balance' => 0,
            'total_deposit' => 0,
            'total_withdraw' => 0,
            'points' => 0,
        ]);

        return $user;

    }


    public function update(UpdateUserRequest $request, User $user)
    {
        $input = $request->all();

        if (strlen($request->password) < 25) {
            $user->update([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone_number' => $input['phone_number'],
                'status' => $input['status'],
                'role' => $input['role'],
                // 'username' => $input['username'],
                'password' => Hash::make($input['password']),
            ]);

            return $user;
        } else if (strlen($request->password) > 25) {
            $user->update([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone_number' => $input['phone_number'],
                'status' => $input['status'],
                'role' => $input['role'],
                // 'username' => $input['username'],
            ]);
        }
    }


    public function destroy(User $user)
    {
        $user->delete();
    }

    public function restore($id)
    {
        $model =  new User();
        $user = $model->getTrashedUser($id);
        $user->restore();
        return $user;
    }

    public function forceDelete($id)
    {
        $user =  new User();
        $user->getTrashedUser($id)->forceDelete();
    }
}
