<?php

namespace App\Http\Controllers\ModelsControllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        if (strlen($request->password) < 25) {
            $admin->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'role' => $request->role,
                'status' => $request->status,
                'password' => Hash::make($request->password)
            ]);
        }
        elseif(strlen($request->password) > 25){
            $admin->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'role' => $request->role,
                'status' => $request->status,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($admin)
    {
        $admin->delete();
    }

    public function forceDelete($id)
    {
        $admin =  new Admin();
        $admin->getTrashedAdmin($id)->forceDelete();
    }

    public function restore($id)
    {
        $model =  new Admin();
        $admin = $model->getTrashedAdmin($id);
        $admin->restore();
        return $admin;
    }

    public function updateRoles(Request $request, Admin $admin)
    {
        $arrays = $request->all();

        unset($arrays['_token'], $arrays['_method']);

        $roles_request = array_merge(($arrays['MembershipManagements']) ?? [], ($arrays['StoreManagement']) ?? [], ($arrays['OrderManagement']) ?? [], ($arrays['SystemManagement']) ?? []);

        $roles = Role::all();

        foreach ($roles as $role) {
            if (in_array($role->name, $roles_request) && !$admin->roles->contains($role->id)) {
                $admin->roles()->attach($role);
            }
            if (!in_array($role->name, $roles_request) && $admin->roles->contains($role->id)) {
                $admin->roles()->detach($role);
            }
        }
    }
}
