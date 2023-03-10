<?php

namespace App\Http\Controllers\ModelsControllers;

use App\Http\Controllers\Controller;
use App\Models\PointsProgram;
use App\Http\Requests\StorePointsProgramRequest;
use App\Http\Requests\UpdatePointsProgramRequest;

class PointsProgramController extends Controller
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
     * @param  \App\Http\Requests\StorePointsProgramRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePointsProgramRequest $request)
    {
        $point_program = PointsProgram::create([
            'purchase_value' => $request->purchase_value,
            'points_earned' => $request->points_earned,
            'minimum_number_of_points_to_transfer' => $request->minimum_number_of_points_to_transfer,
            'transfer_fee' => $request->transfer_fee,
        ]);

        return $point_program;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PointsProgram  $pointsProgram
     * @return \Illuminate\Http\Response
     */
    public function show(PointsProgram $pointsProgram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PointsProgram  $pointsProgram
     * @return \Illuminate\Http\Response
     */
    public function edit(PointsProgram $pointsProgram)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePointsProgramRequest  $request
     * @param  \App\Models\PointsProgram  $pointsProgram
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePointsProgramRequest $request, PointsProgram $pointsProgram)
    {
        $pointsProgram->update([
            'purchase_value' => $request->purchase_value,
            'points_earned' => $request->points_earned,
            'minimum_number_of_points_to_transfer' => $request->minimum_number_of_points_to_transfer,
            'transfer_fee' => $request->transfer_fee,
        ]);

        return $pointsProgram;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PointsProgram  $pointsProgram
     * @return \Illuminate\Http\Response
     */
    public function destroy(PointsProgram $pointsProgram)
    {
        //
    }
}
