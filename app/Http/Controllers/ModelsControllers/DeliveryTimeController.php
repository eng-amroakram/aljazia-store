<?php

namespace App\Http\Controllers\ModelsControllers;

use App\Http\Controllers\Controller;
use App\Models\DeliveryTime;
use App\Http\Requests\StoreDeliveryTimeRequest;
use App\Http\Requests\UpdateDeliveryTimeRequest;
use Carbon\Carbon;

class DeliveryTimeController extends Controller

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDeliveryTimeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeliveryTimeRequest $request)
    {
        $array_days = $request->days ?? [];
        array_unshift($array_days, "");
        unset($array_days[0]);

        $delivery_time = DeliveryTime::create([
            'admin_id' => auth()->guard('admin')->id(),
            // 'delivery_id' => $request->delivery_id,
            // 'store_id' => $request->store_id,
            // 'store_manager_id' => $request->store_manager_id,
            'days' => $array_days,
            'start_time' => date("h:i A", strtotime($request->start_time)),
            'end_time' => date("h:i A", strtotime($request->end_time)),
            'price' => $request->price,
            'capacity' => $request->capacity,
            // 'consume' => $request->consume,
            'status' => $array_days,
        ]);

        return $delivery_time;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeliveryTime  $deliveryTime
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryTime $deliveryTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeliveryTime  $deliveryTime
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryTime $deliveryTime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeliveryTimeRequest  $request
     * @param  \App\Models\DeliveryTime  $deliveryTime
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeliveryTimeRequest $request, DeliveryTime $deliveryTime)
    {
        $array_days = $request->days ?? [];
        array_unshift($array_days, "");
        unset($array_days[0]);

        $deliveryTime->update([
            'admin_id' => auth()->guard('admin')->id(),
            // 'delivery_id' => $request->delivery_id,
            // 'store_id' => $request->store_id,
            // 'store_manager_id' => $request->store_manager_id,
            'days' => $array_days,
            'start_time' => date("h:i A", strtotime($request->start_time)),
            'end_time' =>  date("h:i A", strtotime($request->end_time)),
            'price' => $request->price,
            'capacity' => $request->capacity,
            // 'consume' => $request->consume,
            'status' => $array_days,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryTime  $deliveryTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryTime $deliveryTime)
    {
        //
    }
}
