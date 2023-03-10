<?php

namespace App\Http\Controllers\ModelsControllers;

use App\Http\Controllers\Controller;

use App\Models\Store;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\StoringRequests;
use App\Http\Requests\UpdateStoreRequest;
use App\Models\Product;
use App\Traits\Uploading;
use Illuminate\Support\Facades\Crypt;

class StoreController extends Controller
{
    use Uploading;

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    public function store(StoreStoreRequest $request)
    {
        // dd($request->all());

        $store_model = new Store();

        $store = $store_model->getStore($request->en_name, $request->ar_name);

        $image_path = $this->resizeImagePost($request, '/admin/stores/logos/');

        if(!$store)
        {
            $admin = auth()->guard('admin')->user();

            $super_store_manager = $admin->superStoreManagers->where('id', $request->super_store_manager_id)->first();

            $new_store =  Store::create([
                'admin_id' => auth()->id(),
                'status' => $request->status,
                'en_name' => $request->en_name,
                'ar_name' => $request->ar_name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'min_order' => $request->min_order,
                'tax_number' => $request->tax_number,
                'password' => Crypt::encryptString($request->password),
                'image' => $image_path,
            ]);

            if(!$super_store_manager)
            {
                $super_store_manager->update(['store_id' => $new_store->id]);
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
        $store->setStoreManager($store->id ,$request->store_manager_id);

        $image_path = $this->resizeImagePost($request,'/admin/stores/logos/');

        $store->update([
            'status' => $request->status,
            'en_name' => $request->en_name,
            'ar_name' => $request->ar_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'min_order' => $request->min_order,
            'tax_number' => $request->tax_number,
            'password' => Crypt::encryptString($request->password),
            'image' => $image_path,
        ]);
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
