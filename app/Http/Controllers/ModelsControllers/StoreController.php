<?php

namespace App\Http\Controllers\ModelsControllers;

use App\Http\Controllers\Controller;

use App\Models\Store;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Traits\Checking;
use App\Traits\Uploading;
use Illuminate\Support\Facades\Config;

class StoreController extends Controller
{
    use Uploading;
    use Checking;

    public function index()
    {
        $stores = Store::all();
        return response()->json(['body' => $stores, 'status' => true, 'message' => __('Operation accomplished successfully')]);
    }


    public function create()
    {
        //
    }

    public function store(StoreStoreRequest $request)
    {

        $array_days = $request->days ?? [];
        array_unshift($array_days, "");
        unset($array_days[0]);

        $store_model = new Store();

        $store = $store_model->getStore($request->en_name, $request->ar_name);

        $image_path = $this->resizeImagePost($request, '/admin/stores/logos/');

        if (!$store) {
            $admin = auth()->guard('admin')->user();

            $super_store_manager = $admin->storeManagers->where('id', $request->super_store_manager_id)->first();

            $new_store =  Store::create([
                'admin_id' => auth()->id(),
                'status' => $request->status,
                'en_name' => $request->en_name,
                'ar_name' => $request->ar_name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'min_order' => $request->min_order,
                'tax_number' => $request->tax_number,
                'days_of_work' => $array_days,
                // 'password' => Crypt::encryptString($request->password),
                'image' => $image_path,
            ]);

            if ($super_store_manager) {
                $super_store_manager->update(['store_id' => $new_store->id]);
            }

            if ($request->delivery_times != []) {
                $new_store->deliveryTimes()->sync($request->delivery_times);
            }

            return $new_store;
        }

        return false;
    }

    public function show(Store $store)
    {
        //
    }


    public function edit(Store $store)
    {
        //
    }


    public function update(UpdateStoreRequest $request, Store $store)
    {

        $array_days = $request->days ?? [];
        array_unshift($array_days, "");
        unset($array_days[0]);

        $store->setStoreManager($store, $request->store_manager_id);

        ($request->image_path) ? $image_path = $this->imageExsit($request, $request->image_path, '/admin/stores/logos/') : $image_path = null;

        (!$image_path) ? $image_path = $this->resizeImagePost($request, '/admin/stores/logos/') : null;

        $store->update([
            'status' => $request->status,
            'en_name' => $request->en_name,
            'ar_name' => $request->ar_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'min_order' => $request->min_order,
            'tax_number' => $request->tax_number,
            'days_of_work' => $array_days,
            // 'password' => Crypt::encryptString($request->password),
            'image' => $image_path,
        ]);

        if ($request->delivery_times != []) {
            $store->deliveryTimes()->sync($request->delivery_times);
        }
    }

    public function destroy($store)
    {
        $store->delete();
    }

    public function restore($id)
    {
        $model =  new Store();
        $store = $model->getTrashedStore($id);
        $store->restore();
        return $store;
    }

    public function forceDelete($id)
    {
        $store =  new Store();
        $store->getTrashedStore($id)->forceDelete();
    }
}
