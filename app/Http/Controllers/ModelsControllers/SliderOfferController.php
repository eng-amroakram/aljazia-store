<?php

namespace App\Http\Controllers\ModelsControllers;

use App\Http\Controllers\Controller;
use App\Models\SliderOffer;
use App\Http\Requests\StoreSliderOffersRequest;
use App\Http\Requests\UpdateSliderOffersRequest;
use App\Traits\Checking;
use App\Traits\Uploading;

class SliderOfferController extends Controller
{
    use Uploading;
    use Checking;

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
     * @param  \App\Http\Requests\StoreSliderOffersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderOffersRequest $request)
    {

        $image_path = $this->imageExsit($request, '/admin/sliderOffers/images/');

        if (!$image_path) {
            $image_path = $this->resizeImagePost($request, '/admin/sliderOffers/images/');
        }

        $slider_offer = SliderOffer::create([
            'admin_id' => auth()->guard('admin')->id(),
            'name' => $request->name,
            'image' => $image_path,
            'status' => $request->status,
        ]);

        return $slider_offer;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SliderOffers  $sliderOffers
     * @return \Illuminate\Http\Response
     */
    public function show(SliderOffer $sliderOffers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SliderOffers  $sliderOffers
     * @return \Illuminate\Http\Response
     */
    public function edit(SliderOffer $sliderOffers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSliderOffersRequest  $request
     * @param  \App\Models\SliderOffers  $sliderOffers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderOffersRequest $request, SliderOffer $sliderOffers)
    {

        ($request->image_path) ? $image_path = $this->imageExsit($request, $request->image_path, '/admin/sliderOffers/images/' ) : $image_path = null;

        (!$image_path) ? $image_path = $this->resizeImagePost($request, '/admin/sliderOffers/images/') : null;

        $sliderOffers->update([
            'name' => $request->name,
            'image' => $image_path,
            'status' => $request->status,
        ]);

        return $sliderOffers;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SliderOffers  $sliderOffers
     * @return \Illuminate\Http\Response
     */

    public function destroy(SliderOffer $sliderOffers)
    {
        $sliderOffers->delete();
    }

    public function restore($id)
    {
        $model =  new SliderOffer();
        $sliderOffers = $model->getTrashedSliderOffers($id);
        $sliderOffers->restore();
        return $sliderOffers;
    }

    public function forceDelete($id)
    {
        $sliderOffers =  new SliderOffer();
        $sliderOffers->getTrashedSliderOffers($id)->forceDelete();
    }
}
