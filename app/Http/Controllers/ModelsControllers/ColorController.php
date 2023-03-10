<?php

namespace App\Http\Controllers\ModelsControllers;

use App\Http\Controllers\Controller;

use App\Models\Color;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;

class ColorController extends Controller
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
     * @param  \App\Http\Requests\StoreColorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreColorRequest $request)
    {
        $color = Color::create([
            'admin_id' => auth()->guard('admin')->id(),
            'name' => $request->name,
            'color' => $request->color,
            // 'status' => $request->status
        ]);

        return $color;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateColorRequest  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateColorRequest $request, Color $color)
    {
        $color->update([
            'name' => $request->name,
            'color' => $request->color,
        ]);
        return $color;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        $color->delete();
    }

    public function restore($id)
    {
        $model =  new Color();
        $color = $model->getTrashedColor($id);
        $color->restore();
        return $color;
    }

    public function forceDelete($id)
    {
        $color =  new Color();
        $color->getTrashedColor($id)->forceDelete();
    }
}
