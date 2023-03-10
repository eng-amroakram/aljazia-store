<?php

namespace App\Http\Controllers\ModelsControllers;

use App\Http\Controllers\Controller;

use App\Models\Size;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;

class SizeController extends Controller
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
     * @param  \App\Http\Requests\StoreSizeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSizeRequest $request)
    {
        $size = Size::create([
            'admin_id' => auth()->guard('admin')->id(),
            'ar_name' => $request->ar_name,
            'en_name' => $request->en_name,
            // 'status' => $request->status,
        ]);

        return $size;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSizeRequest  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSizeRequest $request, Size $size)
    {
        $size->update([
            'ar_name' => $request->ar_name,
            'en_name' => $request->en_name,
        ]);

        return $size;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        $size->delete();
    }


    public function restore($id)
    {
        $model =  new Size();
        $size = $model->getTrashedSize($id);
        $size->restore();
        return $size;
    }

    public function forceDelete($id)
    {
        $size =  new Size();
        $size->getTrashedSize($id)->forceDelete();
    }
}
