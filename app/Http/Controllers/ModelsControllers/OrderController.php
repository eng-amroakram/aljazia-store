<?php

namespace App\Http\Controllers\ModelsControllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{

    public function index()
    {
        //
    }

    public function changeStatus(Order $order, $status, $who_is)
    {
        $order->status = $status;
        $order->cancellation_party = $who_is;
        $order->save();
        return response()->json(['message' => 'Status is changed']);
    }

    public function store(StoreOrderRequest $request)
    {
        //
    }

    public function show(Order $order)
    {
        //
    }

    public function edit(Order $order)
    {
        //
    }


    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}
