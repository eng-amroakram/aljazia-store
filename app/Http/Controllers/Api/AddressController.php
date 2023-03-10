<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Area;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    public function index()
    {
        $user = auth()->guard('sanctum')->user();

        if($user)
        {
            $addresses = $user->addresses;
            return response()->json(['data' => [ 'addresses' => $addresses], 'status' => true, 'message' => 'success']);
        }
        else
        {
            return response()->json(['data' => [], 'status' => false, 'message' => 'error']);
        }
    }

    public function store(Request $request)
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            $address = Address::create([
                'user_id' => $user->id,
                'area_id' => 1,
                'title' => $request->title,
                'description' => $request->description,
                'lat' => $request->latitude,
                'lng' => $request->longitude,
                'is_default' => ($request->is_default) ? 1 : 0,
            ]);
            return response()->json(['data' => [ 'address' => $address], 'status' => true, 'message' => 'success']);

        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => 'error']);
        }
    }

    public function show($address)
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {

            $address = Address::find($address);

            if ($address) {
                return response()->json(['data' => [ 'address' => $address], 'status' => true, 'message' => 'success']);
            } else {
                return response()->json(['data' => [], 'status' => false, 'message' => 'error']);
            }
        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => 'error']);
        }
    }

    public function update(Request $request)
    {
        $user = auth()->guard('sanctum')->user();

        if ($user) {
            $address = Address::find($request->address_id);

            if ($address) {
                $address->update([
                    'user_id' => $user->id,
                    'area_id' => 1,
                    'title' => $request->title,
                    'description' => $request->description,
                    'lat' => $request->latitude,
                    'lng' => $request->longitude,
                    'is_default' => ($request->is_default) ? 1 : 0,
                ]);

                return response()->json(['data' => [ 'address' => $address], 'status' => true, 'message' => 'success']);
            }

            else {
                return response()->json(['data' => [], 'status' => false, 'message' => 'error']);
            }
        } else {

            return response()->json(['data' => [], 'status' => false, 'message' => 'error']);
        }
    }

    public function destroy($address)
    {
        $user = auth()->guard('sanctum')->user();
        $address = Address::find($address);
        if ($user) {
            if ($address) {
                $address->delete();
                return response()->json(['data' => [], 'status' => true, 'message' => 'success']);
            } else {
                return response()->json(['data' => [], 'status' => false, 'message' => 'error']);
            }
        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => 'error']);
        }
    }

    public function mapBounds()
    {
        // $addresses = Address::all();
        // $bounds = [];
        // foreach ($addresses as $address) {
        //     $bounds[] = [
        //         'lat' => $address->lat,
        //         'lng' => $address->lng,
        //     ];
        // }
        // return response()->json($bounds);

        $area = new Area();
        $bounds = $area->pluck('bounds');
        return response()->json(['data' => ['bounds' => $bounds], 'status' => true, 'message' => 'success']);

    }
}
