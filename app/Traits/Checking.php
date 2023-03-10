<?php

namespace App\Traits;

use App\Models\Store;
use Illuminate\Support\Facades\Storage;

trait Checking
{

    public function imageExsit($request, $image_path, $path = null)
    {

        if($request->image)
        {
            if ($request->hasFile('image')) {

                $file = $request->file('image');

                if ($file->isValid()) {
                    $image_name  = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $file->getClientOriginalExtension();
                    $image_path = $path . $image_name;
                }
            }
        }


        $result = Storage::disk('public')->exists($image_path);

        if ($result) {
            return $image_path;
        } else {
            return false;
        }
    }

    public function superStoreManagerChecking($request)
    {
        if ($request->store_id != "none") {

            $admin = auth()->guard('admin')->user();

            $store = $admin->stores()->where('id', $request->store_id)->first();

            if ($store) {
                return $store->superStoreManager->name ? $store->superStoreManager : false;
            }

            return "store not found";
        }

        return false;
    }

    public function checkStoreManagerPhoneNumber($request)
    {
        $admin = auth()->guard('admin')->user();

        $store_manager = $admin->storeManagers()->where('phone_number', $request->phone_number)->first();

        if ($store_manager) {
            return $store_manager;
        }

        return false;
    }
}
