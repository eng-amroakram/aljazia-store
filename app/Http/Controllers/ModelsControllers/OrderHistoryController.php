<?php

namespace App\Http\Controllers\ModelsControllers;

use App\Http\Controllers\Controller;
use App\Models\OrderHistory;
use App\Http\Requests\StoreOrderHistoryRequest;
use App\Http\Requests\UpdateOrderHistoryRequest;

class OrderHistoryController extends Controller
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
     * @param  \App\Http\Requests\StoreOrderHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderHistory  $orderHistory
     * @return \Illuminate\Http\Response
     */
    public function show(OrderHistory $orderHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderHistory  $orderHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderHistory $orderHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderHistoryRequest  $request
     * @param  \App\Models\OrderHistory  $orderHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderHistoryRequest $request, OrderHistory $orderHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderHistory  $orderHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderHistory $orderHistory)
    {
        //
    }
}
