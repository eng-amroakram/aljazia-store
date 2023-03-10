<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'admin_id',
        'delivery_id',
        'user_id',
        'store_id',
        'ar_name',
        'en_name',
        'bounds',
        'delivery_price',
        'status',

        // 'city',
        // 'state',
        // 'country',
        // 'pincode',
        // 'latitude',
        // 'longitude',
    ];

    protected $casts = [
        'admin_id' => 'integer',
        'delivery_id' => 'integer',
        'user_id' => 'integer',
        'store_id' => 'integer',
        'delivery_price' => 'float',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function getTrashedArea($id)
    {
        return $this->onlyTrashed()->where('id', $id)->first();
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class, 'delivery_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'area_id', 'id');
    }


}
