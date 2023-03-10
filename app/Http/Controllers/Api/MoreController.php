<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\CustomersService;
use App\Models\Notification;
use App\Models\Settings;
use App\Models\StaticPage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MoreController extends Controller
{
    public function contactUs()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            ContactUs::create([
                'admin_id' => 1,
                'user_id' => $user->id,
                'name' => $user->name,
                'mobile' => $user->phone_number,
                'email' => $user->email,
                'date' => Carbon::now()->format('Y-m-d-H-i'),
                'type' => request('type'),
                'message' => request('message')
            ]);

            return response()->json(['message' => 'Contact us']);
        } else {
            return response()->json(['message' => 'User not found']);
        }
    }

    public function customerService()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            CustomersService::create([
                'admin_id' => 1,
                'user_id' => $user->id,
                'name' => $user->name,
                'mobile' => $user->phone_number,
                'email' => $user->email,
                'date' => Carbon::now()->format('Y-m-d-H-i'),
                'type' => request('type'),
                'message' => request('message'),
            ]);

            return response()->json(['message' => 'Customer service']);
        } else {
            return response()->json(['message' => 'User not found']);
        }
    }

    public function getAllNotifications()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            $notification = Notification::all();
            return response()->json(['message' => 'All notifications', 'notification' => $notification]);
        } else {
            return response()->json(['message' => 'User not found']);
        }
    }

    public function readNotification()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            $notification = Notification::find(request()->query('notification_id'));
            return response()->json(['message' => 'Notification read', 'notification' => $notification]);
        } else {
            return response()->json(['message' => 'User not found']);
        }

        return response()->json(['message' => 'Read notification']);
    }

    public function deleteAllNotifications()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            #pluck id
            $notification_ids = Notification::pluck('id');
            #delete all notifications
            Notification::destroy($notification_ids);
            return response()->json(['message' => 'All notifications deleted']);
        } else {
            return response()->json(['message' => 'User not found']);
        }
    }

    public function getPageById()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            $page = StaticPage::find(request()->query('page_id'));
            if ($page) {
                return response()->json(['message' => 'Page found', 'page' => $page]);
            } else {
                return response()->json(['message' => 'Page not found']);
            }
        } else {
            return response()->json(['message' => 'User not found']);
        }


        return response()->json(['message' => 'Get page by id']);
    }

    public function getSetting()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            $settings = Settings::find(1);

            if ($settings) {
                return response()->json(['message' => 'Settings found', 'settings' => $settings]);
            } else {
                return response()->json(['message' => 'Settings not found']);
            }
        } else {
            return response()->json(['message' => 'User not found']);
        }
    }

    public function myWallet()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            $user->wallet;

            if ($user->wallet) {
                return response()->json([
                    'wallet' =>
                    [
                        'point' =>  $user->wallet->points,
                        'wallet' => $user->wallet->balance,
                        'point_program' => [
                            'identifier' => $user->id,
                            'number_of_points' =>  $user->wallet->points,
                            'price' => 100.0,
                            'name' => $user->name
                        ]
                    ],
                    'message' => 'Wallet found'
                ]);
            } else {
                return response()->json(['message' => 'Wallet not found']);
            }
        } else {
            return response()->json(['message' => 'User not found']);
        }
    }

    public function convertPointToMoney()
    {
        $user = auth()->guard('sanctum')->user();
        if ($user) {
            $wallet = $user->wallet;

            if ($wallet) {
                $x = 0;
                if ($wallet->points >= 100) {

                    $counter  = $wallet->points;

                    for ($i = 0; $i < $counter; $i++) {
                        $x += 1;
                        if ($x == 100) {
                            $wallet->balance += 18;
                            $wallet->points -= 100;
                            $wallet->save();
                            $x = 0;
                        }
                    }
                } else {
                    return response()->json(['message' => 'Not enough points']);
                }
            } else {
                return response()->json(['message' => 'Wallet not found']);
            }
        } else {
            return response()->json(['message' => 'User not found']);
        }
        return response()->json(['message' => 'Convert point to money']);
    }

    public function constants()
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            return response()->json(['data' => [
                'sample_rate_android' => env('SAMPLE_RATE_ANDROID', 0.005),
                'sample_rate_ios' => env('SAMPLE_RATE_IOS', 0.005),
                'user' => $user
            ], 'message' => 'Constants',]);
        } else {
            return response()->json(['message' => 'User not found']);
        }
    }
}
