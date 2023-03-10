<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function addOrderRate()
    {
        $user = auth()->guard('sanctum')->user();

        if($user)
        {
            Rate::create([
                'admin_id'  => 1,
                'user_id' => $user->id,
                'order_id' => request('order_id'),
                'rate' => request('rate'),
                'text' => request('text'),
            ]);

            return response()->json(['message' => 'Rate added']);

        }else
        {
            return response()->json(['message' => 'User not found']);
        }
    }
}
