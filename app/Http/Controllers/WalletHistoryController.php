<?php

namespace App\Http\Controllers;

use App\Models\WalletHistory;
use App\Http\Requests\StoreWalletHistoryRequest;
use App\Http\Requests\UpdateWalletHistoryRequest;

class WalletHistoryController extends Controller
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
     * @param  \App\Http\Requests\StoreWalletHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWalletHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WalletHistory  $walletHistory
     * @return \Illuminate\Http\Response
     */
    public function show(WalletHistory $walletHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WalletHistory  $walletHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(WalletHistory $walletHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWalletHistoryRequest  $request
     * @param  \App\Models\WalletHistory  $walletHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWalletHistoryRequest $request, WalletHistory $walletHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WalletHistory  $walletHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(WalletHistory $walletHistory)
    {
        //
    }
}
