<?php

namespace App\Http\Controllers\ModelsControllers;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Http\Requests\StoreAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    public function store(StoreAreaRequest $request)
    {
        $area = Area::create([
            'admin_id' => auth()->user()->id,
            // 'delivery_id' => $request->delivery_id,
            // 'user_id' => $request->user_id,
            // 'store_id' => $request->store_id,
            'ar_name' => $request->ar_name,
            'en_name' => $request->en_name,
            // 'city' => $request->city,
            // 'state' => $request->state,
            // 'country' => $request->country,
            // 'pincode' => $request->pincode,
            'delivery_price' => $request->delivery_price,
            // 'latitude' => $request->latitude,
            // 'longitude' => $request->longitude,
            'status' => $request->status,
        ]);

        // return response()->json([s
        //     'message' => 'Area created successfully',
        //     'area' => $area,
        // ]);

        return $area;
    }

    public function map(Request $request)
    {
        $area = Area::find($request->area_id);

        $points = json_decode($request->points);

        $area->bounds = $points;

        $area->save();

        return $area;

        // foreach ($points as $point) {
        //     $area->lat = $point->lat;
        //     $area->lng = $point->lng;
        // }
        // dd($points);
    }

    public function update(UpdateAreaRequest $request, Area $area)
    {
        $area->update([
            'ar_name' => $request->ar_name,
            'en_name' => $request->en_name,
            'delivery_price' => $request->delivery_price,
            'status' => $request->status,
        ]);

        return $area;
    }

    public function destroy(Area $area)
    {
        $area->delete();
    }

    public function restore($id)
    {
        $model =  new Area();
        $area = $model->getTrashedArea($id);
        $area->restore();
        return $area;
    }

    public function forceDelete($id)
    {
        $area =  new Area();
        $area->getTrashedArea($id)->forceDelete();
    }

}
