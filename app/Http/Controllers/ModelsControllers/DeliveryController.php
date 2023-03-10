<?php

namespace App\Http\Controllers\ModelsControllers;

use App\Http\Controllers\Controller;

use App\Models\Delivery;
use App\Http\Requests\StoreDeliveryRequest;
use App\Http\Requests\UpdateDeliveryRequest;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class DeliveryController extends Controller
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
     * @param  \App\Http\Requests\StoreDeliveryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeliveryRequest $request, $user)
    {
        $delivery =  Delivery::create([
            'id' => $user->id,
            'user_id' => $user->id,
            'admin_id' => $user->admin_id,
            'name' => $user->name,
            'phone_number' => $user->phone_number,
            'status' => $user->status,
            'password' => $user->password,
            'email' => $user->email,
        ]);

        $user->role = 'delivery';
        $user->save();

        if ($request->stores != []) {
            $delivery->stores()->sync($request->stores);
        }

        return $delivery;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeliveryRequest  $request
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeliveryRequest $request, Delivery $delivery)
    {

        if (strlen($request->password) < 25) {

            $delivery->update([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'status' => $request->status,
                'password' => Hash::make($request->password),
                'email' => $request->email,

            ]);

            $user = User::find($delivery->id);

            $user->update([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'status' => $request->status,
                'password' => Hash::make($request->password),
                'email' => $request->email,
            ]);
        } else if (strlen($request->password) > 25) {
            $delivery->update([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'status' => $request->status,
                'email' => $request->email,
            ]);


            $user = User::find($delivery->id);

            $user->update([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'status' => $request->status,
                'email' => $request->email,
            ]);
        }

        if ($request->stores != []) {
            $delivery->stores()->sync($request->stores);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
    }

    public function forceDelete($id)
    {
        $delivery =  new Delivery();
        $delivery->getTrashedDelivery($id)->forceDelete();
    }

    public function restore($id)
    {
        $model =  new Delivery();
        $delivery = $model->getTrashedDelivery($id);
        $delivery->restore();
        return $delivery;
    }
}
