<?php

namespace App\Http\Controllers\ModelsControllers;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Http\Requests\StoreSettingsRequest;
use App\Http\Requests\UpdateSettingsRequest;

class SettingsController extends Controller
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
     * @param  \App\Http\Requests\StoreSettingsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettingsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSettingsRequest  $request
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingsRequest $request, Settings $settings)
    {

        $settings->update([
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'email_manager' => $request->email_manager,
            'mobile' => $request->mobile,
            'telephone' => $request->telephone,
            'vat' => $request->vat,
            'ios_link' => $request->ios_link,
            'android_link' => $request->android_link,
            'website_link' => $request->website_link,
            'ar_decription' => $request->ar_decription,
            'en_decription' => $request->en_decription,
            'ar_address' => $request->ar_address,
            'en_address' => $request->en_address,
        ]);

        return $settings;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
