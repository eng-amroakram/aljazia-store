<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class Store extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'admin_id',
        'status',
        'en_name',
        'ar_name',
        'phone_number',
        'email',
        'min_order',
        'tax_number',
        'vat_number',
        // 'password',
        'days_of_work',
        'image',

        'active_code',
        'is_verified',
        'verified_at',
        'created_at',
        'updated_at',



    ];


    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'days_of_work' => 'array',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function storeManagers()
    {
        return $this->hasMany(StoreManager::class, 'store_id', 'id');
    }

    public function storeManyManagers()
    {
        return $this->belongsToMany(StoreManager::class, 'store_store_manager', 'store_id', 'store_manager_id', 'id', 'id');
    }

    public function deliveries()
    {
        return $this->belongsToMany(Delivery::class, 'delivery_store', 'store_id', 'delivery_id', 'id', 'id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'store_id', 'id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'store_id', 'id');
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'store_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'store_id', 'id');
    }

    #Area Relationship
    public function areas()
    {
        return $this->hasMany(Area::class, 'store_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'store_id', 'id');
    }

    public function deliveryTimes()
    {
        return $this->belongsToMany(DeliveryTime::class, 'store_delivery_times', 'store_id', 'delivery_time_id', 'id', 'id');
    }

    public function getStoreManager()
    {
        $superStoreManager = $this->storeManagers->where('store_id', $this->id)->where('role', 'supermanager')->first();
        return $superStoreManager ? $superStoreManager->name : 'لا يوجد';
    }

    public function getStore($en_name, $ar_name)
    {
        return $this->where('en_name', $en_name)->orWhere('ar_name', $ar_name)->first();
    }

    public function getTrashedStore($id)
    {
        return $this->onlyTrashed()->where('id', $id)->first();
    }

    public function scopeGetStoreProducts(Builder $builder, $id)
    {
        return $builder->where('id', $id)->first()->products;
    }

    public function scopeGetStoreStoreManagers(Builder $builder, $id)
    {
        return $builder->where('id', $id)->first()->storeManagers;
    }

    public function scopeGetStoreDeliveries(Builder $builder, $id)
    {
        return $builder->where('id', $id)->first()->deliveries;
    }

    public function getSuperStoreManagers($id)
    {
        return $this->where('id', $id)->first()->superStoreManager;
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {

        if (auth()->guard('admin')->check()) {

            $admin = auth()->guard('admin')->user();

            if ($admin->role == 'superadmin') {

                $filters = array_merge([
                    'search' => '',
                    'filters' => [],
                    'status' => [],
                ], $filters);

                $builder->when($filters['search'] !== null, function ($query) use ($filters) {
                    $query->where('email', 'like', '%' . $filters['search'] . '%')
                        ->orWhere('en_name', 'like', '%' . $filters['search'] . '%')
                        ->orWhere('ar_name', 'like', '%' . $filters['search'] . '%')
                        ->orWhere('phone_number', 'like', '%' . $filters['search'] . '%');
                });


                if (count($filters['status']) == 1) {
                    $builder->when($filters['status'][0] == 'active', function ($query) use ($filters, $admin) {
                        $query->where('status', 'active');
                    });

                    $builder->when($filters['status'][0] == 'inactive', function ($query) use ($filters, $admin) {
                        $query->where('status', 'inactive');
                    });
                }

                if (count($filters['status']) == 2) {
                    $builder->when($filters['status'][0] == 'active' && $filters['status'][1] == 'inactive', function ($query) use ($filters, $admin) {
                        $query->where('status', 'active')->orWhere('status', 'inactive');
                    });
                }

                return $builder;
            }

            if ($admin->role == 'admin') {

                $filters = array_merge([
                    'search' => '',
                    'filters' => [],
                    'status' => [],
                ], $filters);

                $builder->when($filters['search'] == null, function ($query) use ($admin) {
                    $query->where('admin_id', $admin->id);
                });

                $builder->when($filters['search'] !== null, function ($query) use ($filters, $admin) {
                    $query

                        ->where('admin_id', $admin->id)
                        ->where('email', 'like', '%' . $filters['search'] . '%')

                        ->orWhere('admin_id', $admin->id)
                        ->where('en_name', 'like', '%' . $filters['search'] . '%')

                        ->orWhere('admin_id', $admin->id)
                        ->where('ar_name', 'like', '%' . $filters['search'] . '%')

                        ->orWhere('admin_id', $admin->id)
                        ->where('phone_number', 'like', '%' . $filters['search'] . '%');
                });

                if (count($filters['status']) == 1) {
                    $builder->when($filters['status'][0] == 'active', function ($query) use ($filters, $admin) {
                        $query->where('admin_id', $admin->id)->where('status', 'active');
                    });

                    $builder->when($filters['status'][0] == 'inactive', function ($query) use ($filters, $admin) {
                        $query->where('admin_id', $admin->id)->where('status', 'inactive');
                    });
                }

                if (count($filters['status']) == 2) {
                    $builder->when($filters['status'][0] == 'active' && $filters['status'][1] == 'inactive', function ($query) use ($filters, $admin) {
                        $query->where('admin_id', $admin->id)->where('status', 'active')->orWhere('status', 'inactive');
                    });
                }
            }
        }
    }


    public function setStoreManager($store, $store_manager_id)
    {
        $admin = auth()->guard('admin')->user();

        $old_super_store_manager = $admin->storeManagers->where('store_id', $store->id)->where('role', 'supermanager')->first();
        $new_super_store_manager = $admin->storeManagers->where('id', $store_manager_id)->first();

        if ($old_super_store_manager) {
            $old_super_store_manager->update([
                'store_id' => null,
            ]);
        }
        if ($new_super_store_manager) {
            if ($store->admin) {
                $new_super_store_manager->update(['admin_id' => $store->admin->id]);
            }

            $new_super_store_manager->update([
                'store_id' => $store->id,
            ]);
        }
    }
}
