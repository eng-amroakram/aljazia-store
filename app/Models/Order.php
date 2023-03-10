<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'delivery_id',
        'user_id',
        'store_id',
        'delivery_time_id',
        'address_id',
        'status', # => new, pending, in_progress, rejected, delivered, complete
        'products', # => [{id, quantity}, {id, quantity}, {id, quantity}]
        'total_price', # => total price of products
        'total_products', # => total products
        'payment_method', # => cash, mada.
        'not_found_option', # => 1, 2, 3
        'cancellation_party', # => user, admin, store_manager, delivery
    ];

    protected $casts = [
        'products' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class, 'delivery_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function deliveryTime()
    {
        return $this->belongsTo(DeliveryTime::class, 'delivery_time_id', 'id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

    public function rates()
    {
        return $this->hasMany(Rate::class, 'order_id', 'id');
    }

    // public function scopeFilters(Builder $builder, array $filters = [])
    // {

    //     if (auth()->guard('admin')->check()) {

    //         $admin = auth()->guard('admin')->user();

    //         if ($admin->role == 'superadmin') {

    //             $filters = array_merge([
    //                 'search' => '',
    //                 'filters' => [],
    //                 'status' => [],
    //             ], $filters);

    //             $builder->when($filters['search'] !== null, function ($query) use ($filters) {
    //                 $query->where('email', 'like', '%' . $filters['search'] . '%')
    //                     ->orWhere('en_name', 'like', '%' . $filters['search'] . '%')
    //                     ->orWhere('ar_name', 'like', '%' . $filters['search'] . '%')
    //                     ->orWhere('phone_number', 'like', '%' . $filters['search'] . '%');
    //             });


    //             if (count($filters['status']) == 1) {
    //                 $builder->when($filters['status'][0] == 'active', function ($query) use ($filters, $admin) {
    //                     $query->where('status', 'active');
    //                 });

    //                 $builder->when($filters['status'][0] == 'inactive', function ($query) use ($filters, $admin) {
    //                     $query->where('status', 'inactive');
    //                 });
    //             }

    //             if (count($filters['status']) == 2) {
    //                 $builder->when($filters['status'][0] == 'active' && $filters['status'][1] == 'inactive', function ($query) use ($filters, $admin) {
    //                     $query->where('status', 'active')->orWhere('status', 'inactive');
    //                 });
    //             }

    //             return $builder;
    //         }

    //         if ($admin->role == 'admin') {

    //             $filters = array_merge([
    //                 'search' => '',
    //                 'filters' => [],
    //                 'status' => [],
    //             ], $filters);

    //             $builder->when($filters['search'] == null, function ($query) use ($admin) {
    //                 $query->where('admin_id', $admin->id);
    //             });

    //             $builder->when($filters['search'] !== null, function ($query) use ($filters, $admin) {
    //                 $query

    //                     ->where('admin_id', $admin->id)
    //                     ->where('email', 'like', '%' . $filters['search'] . '%')

    //                     ->orWhere('admin_id', $admin->id)
    //                     ->where('en_name', 'like', '%' . $filters['search'] . '%')

    //                     ->orWhere('admin_id', $admin->id)
    //                     ->where('ar_name', 'like', '%' . $filters['search'] . '%')

    //                     ->orWhere('admin_id', $admin->id)
    //                     ->where('phone_number', 'like', '%' . $filters['search'] . '%');
    //             });

    //             if (count($filters['status']) == 1) {
    //                 $builder->when($filters['status'][0] == 'active', function ($query) use ($filters, $admin) {
    //                     $query->where('admin_id', $admin->id)->where('status', 'active');
    //                 });

    //                 $builder->when($filters['status'][0] == 'inactive', function ($query) use ($filters, $admin) {
    //                     $query->where('admin_id', $admin->id)->where('status', 'inactive');
    //                 });
    //             }

    //             if (count($filters['status']) == 2) {
    //                 $builder->when($filters['status'][0] == 'active' && $filters['status'][1] == 'inactive', function ($query) use ($filters, $admin) {
    //                     $query->where('admin_id', $admin->id)->where('status', 'active')->orWhere('status', 'inactive');
    //                 });
    //             }
    //         }
    //     }
    // }
}
