<?php

namespace App\Http\Controllers\ModelsControllers;

use App\Http\Controllers\Controller;
use App\Models\StaticPage;
use App\Http\Requests\StoreStaticPageRequest;
use App\Http\Requests\UpdateStaticPageRequest;

class StaticPageController extends Controller
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
     * @param  \App\Http\Requests\StoreStaticPageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStaticPageRequest $request)
    {
        StaticPage::create([
            'admin_id' => 1,
            'ar_name' => $request->ar_name,
            'en_name' => $request->en_name,
            'ar_description' => $request->ar_description,
            'en_description' => $request->en_description,
            'link' => $request->link,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StaticPage  $staticPage
     * @return \Illuminate\Http\Response
     */
    public function show(StaticPage $staticPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StaticPage  $staticPage
     * @return \Illuminate\Http\Response
     */
    public function edit(StaticPage $staticPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStaticPageRequest  $request
     * @param  \App\Models\StaticPage  $staticPage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStaticPageRequest $request, StaticPage $staticPage)
    {
        $staticPage->update([
            'ar_name' => $request->ar_name,
            'en_name' => $request->en_name,
            'ar_description' => $request->ar_description,
            'en_description' => $request->en_description,
            'link' => $request->link,
        ]);

        return $staticPage;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StaticPage  $staticPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(StaticPage $staticPage)
    {
        //
    }
}
