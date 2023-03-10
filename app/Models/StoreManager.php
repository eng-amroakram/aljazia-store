<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class StoreManager extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'storeManager';

    // protected static function booted()
    // {
    //     static::addGlobalScope('storeManager', function ($query) {
    //         $query->where('admin_id', auth()->id());
    //     });
    // }

    protected $fillable = [
        'id',
        'admin_id',
        'store_id',
        'status',
        'name',
        'email',
        'role',
        'phone_number',
        'password',

        'avatar',
        'active_code',
        'is_verified',
        'verified_at',
        'created_at',
        'updated_at',
        // 'deleted_at',


    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    #Has Many
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    #Has Many to Many
    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store_store_manager', 'store_manager_id', 'store_id', 'id', 'id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'store_manager_id', 'id');
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'store_manager_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'store_manager_id', 'id');
    }

    public function deliveryTimes()
    {
        return $this->hasMany(DeliveryTime::class, 'store_manager_id', 'id');
    }



    public function roles()
    {
        return $this->belongsToMany(Role::class, 'store_managers_roles', 'store_manager_id', 'role_id', 'id', 'id');
    }

    public function getRolesNames()
    {
        return $this->roles->pluck('name')->toArray();
    }


    public function getTrashedStoreManager($id)
    {
        return $this->onlyTrashed()->where('id', $id)->first();
    }


    public function scopeFilters(Builder $builder, array $filters = [])
    {
        $filters = array_merge([
            'search' => '',
            'filters' => [],
            'status' => [],
            'roles' => [],
            'stores' => []
        ], $filters);



        if (auth()->guard('admin')->check()) {

            $admin = auth()->guard('admin')->user();

            if ($admin->role == 'superadmin') {

                $builder->when($filters['search'] !== null, function ($query) use ($filters) {
                    $query->where('email', 'like', '%' . $filters['search'] . '%')
                        ->orWhere('name', 'like', '%' . $filters['search'] . '%')
                        ->orWhere('phone_number', 'like', '%' . $filters['search'] . '%');
                });



                foreach ($filters['roles'] as $value) {

                    $builder->when($value == 'manager', function ($query) use ($filters) {
                        $query->where('role', 'manager');
                    });

                    $builder->when($value == 'supermanager', function ($query) use ($filters) {
                        $query->where('role', 'supermanager');
                    });
                }

                if (count($filters['status']) == 1) {
                    $builder->when($filters['status'][0] == 'active', function ($query) {
                        $query->where('status', 'active');
                    });

                    $builder->when($filters['status'][0] == 'inactive', function ($query) {
                        $query->where('status', 'inactive');
                    });
                }

                if (count($filters['status']) == 2) {
                    $builder->when($filters['status'][0] == 'active' && $filters['status'][1] == 'inactive', function ($query) {
                        $query->where('status', 'active')->orWhere('status', 'inactive');
                    });
                }

                $builder->when($filters['stores'] != [], function ($query) use ($filters, $admin) {

                    if ($filters['stores']  !== []) {
                        $x = 0;
                        foreach ($filters['stores'] as $store_id) {
                            if ($x == 0) {
                                $query->where('store_id', $store_id);
                            } else {
                                $query->orWhere('store_id', $store_id);
                            }
                            $x = $x + 1;
                        }
                    }
                });

                // $builder->when($filters['stores'] != [], function ($query) use ($filters) {
                //     foreach ($filters['stores'] as $value) {
                //         ($value == "null") ? $query->whereNull('store_id') : $query->where('store_id', $value);
                //     }
                // });

                return $builder;
            }

            if ($admin->role == 'admin') {

                $builder->when($filters['search'] == null, function ($query) use ($admin) {
                    $query->where('admin_id', $admin->id);
                });


                $builder->when($filters['search'] !== null, function ($query) use ($filters, $admin) {
                    $query
                        ->where('admin_id', $admin->id)
                        ->where('email', 'like', '%' . $filters['search'] . '%')

                        ->orWhere('admin_id', $admin->id)
                        ->where('name', 'like', '%' . $filters['search'] . '%')

                        ->orWhere('admin_id', $admin->id)
                        ->where('phone_number', 'like', '%' . $filters['search'] . '%');
                });


                foreach ($filters['roles'] as $value) {

                    $builder->when($value == 'manager', function ($query) use ($admin) {
                        $query->where('admin_id', $admin->id)->where('role', 'manager');
                    });

                    $builder->when($value == 'supermanager', function ($query) use ($admin) {
                        $query->where('admin_id', $admin->id)->where('role', 'supermanager');
                    });
                }


                if (count($filters['status']) == 1) {
                    $builder->when($filters['status'][0] == 'active', function ($query) {
                        $query->where('status', 'active');
                    });

                    $builder->when($filters['status'][0] == 'inactive', function ($query) {
                        $query->where('status', 'inactive');
                    });
                }

                if (count($filters['status']) == 2) {
                    $builder->when($filters['status'][0] == 'active' && $filters['status'][1] == 'inactive', function ($query) {
                        $query->where('status', 'active')->orWhere('status', 'inactive');
                    });
                }

                $builder->when($filters['stores'] != [], function ($query) use ($filters, $admin) {

                    if ($filters['stores']  !== []) {
                        $x = 0;
                        foreach ($filters['stores'] as $store_id) {
                            if ($x == 0) {
                                $query->where('store_id', $store_id);
                            } else {
                                $query->orWhere('store_id', $store_id);
                            }
                            $x = $x + 1;
                        }
                    }
                });

                // $builder->when($filters['stores'] != [], function ($query) use ($filters, $admin) {
                //     $x = 0;
                //     foreach ($filters['stores'] as $value) {
                //         if($x  == 0)
                //         {
                //             dd($filters);
                //             ($value == "null") ? $query->where('admin_id', $admin->id)->whereNull('store_id') : $query->where('store_id', $value);
                //         }else
                //         {
                //             ($value == "null") ? $query->orWhere('admin_id', $admin->id)->whereNull('store_id') : $query->where('store_id', $value);
                //         }

                //         $x = $x + 1;
                //     }
                // });

                return $builder;
            }
        }
    }
}
