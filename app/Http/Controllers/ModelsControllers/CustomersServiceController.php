<?php

namespace App\Http\Controllers\ModelsControllers;

use App\Http\Controllers\Controller;
use App\Models\CustomersService;
use App\Http\Requests\StoreCustomersServiceRequest;
use App\Http\Requests\UpdateCustomersServiceRequest;

class CustomersServiceController extends Controller
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
     * @param  \App\Http\Requests\StoreCustomersServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomersServiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomersService  $customersService
     * @return \Illuminate\Http\Response
     */
    public function show(CustomersService $customersService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomersService  $customersService
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomersService $customersService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomersServiceRequest  $request
     * @param  \App\Models\CustomersService  $customersService
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomersServiceRequest $request, CustomersService $customersService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomersService  $customersService
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomersService $customersService)
    {
        //
    }
}
