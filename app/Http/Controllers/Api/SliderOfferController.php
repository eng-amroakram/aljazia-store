<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SliderOffer;
use Illuminate\Http\Request;

class SliderOfferController extends Controller
{
    public function index()
    {
        $slider_offers = SliderOffer::all();
        return response()->json(['slider_offers' => $slider_offers]);
    }

}
