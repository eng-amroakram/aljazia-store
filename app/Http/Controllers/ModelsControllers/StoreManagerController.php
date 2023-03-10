<?php

namespace App\Http\Controllers\ModelsControllers;

use App\Http\Controllers\Controller;

use App\Models\StoreManager;
use App\Http\Requests\StoreStoreManagerRequest;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreManagerRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class StoreManagerController extends Controller
{
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(StoreStoreManagerRequest $request)
    {
        return StoreManager::create([
            'admin_id' => auth()->id(),
            'store_id' => ($request->store_id != "none") ? $request->store_id : null,
            'status' => $request->status,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ]);
    }


    public function show(StoreManager $storeManager)
    {
        //
    }

    public function edit(StoreManager $storeManager)
    {
        //
    }

    public function update(UpdateStoreManagerRequest $request, StoreManager $storeManager)
    {
        if (strlen($request->password) < 25) {
            $storeManager->update([
                'store_id' => ($request->store_id != "none") ? $request->store_id : null,
                'status' => $request->status,
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
            ]);
        } elseif (strlen($request->password) > 25) {
            $storeManager->update([
                'store_id' => ($request->store_id != "none") ? $request->store_id : null,
                'status' => $request->status,
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'phone_number' => $request->phone_number,
            ]);
        }


        return $storeManager;
    }

    public function destroy(StoreManager $storeManager)
    {
        $storeManager->delete();
    }

    public function restore($id)
    {
        $model =  new StoreManager();
        $store_manager = $model->getTrashedStoreManager($id);
        $store_manager->restore();
        return $store_manager;
    }

    public function forceDelete($id)
    {
        $store_manager =  new StoreManager();
        $store_manager->getTrashedStoreManager($id)->forceDelete();
    }

    public function updateRoles(Request $request, StoreManager $store_manager)
    {
        $arrays = $request->all();

        unset($arrays['_token'], $arrays['_method']);

        $roles_request = array_merge(($arrays['MembershipManagements']) ?? [], ($arrays['StoreManagement']) ?? [], ($arrays['OrderManagement']) ?? [], ($arrays['SystemManagement']) ?? []);

        $roles = Role::all();

        foreach ($roles as $role) {
            if (in_array($role->name, $roles_request) && !$store_manager->roles->contains($role->id)) {
                $store_manager->roles()->attach($role);
            }
            if (!in_array($role->name, $roles_request) && $store_manager->roles->contains($role->id)) {
                $store_manager->roles()->detach($role);
            }
        }
    }
}
