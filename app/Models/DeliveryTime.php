<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'admin_id',
        'delivery_id',
        'store_id',
        'store_manager_id',
        'days',
        'start_time',
        'end_time',
        'price',
        'capacity',
        'consume',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'days' => 'array',
        'status' => 'array',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    #BelongsToMany
    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store_delivery_times', 'delivery_time_id', 'store_id', 'id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function storeManager()
    {
        return $this->belongsTo(StoreManager::class, 'store_manager_id', 'id');
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class, 'delivery_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'delivery_time_id', 'id');
    }
}
