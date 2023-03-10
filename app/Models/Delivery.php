<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;


class Delivery extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'delivery';

    // protected static function booted()
    // {
    //     static::addGlobalScope('delivery', function ($query) {
    //         $query->where('admin_id', auth()->id());
    //     });
    // }

    protected $fillable = [
        'id',
        'user_id',
        'admin_id',
        'name',
        // 'username',
        'email',
        'phone_number',
        'status',
        'password',
        'active_code',
        'is_verified',
        'verified_at',
        'created_at',
        'updated_at',

    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getTrashedDelivery($id)
    {
        return $this->onlyTrashed()->where('id', $id)->first();
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'delivery_store', 'delivery_id', 'store_id', 'id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'delivery_id', 'id');
    }

    #Aera Relationship
    public function area()
    {
        return $this->belongsTo(Area::class, 'delivery_id', 'id');
    }
    #BelongsToMany
    public function deliveryTimes()
    {
        return $this->belongsToMany(DeliveryTime::class, 'delivery_delivery_times', 'delivery_id', 'delivery_time_id', 'id', 'id');
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {

        $filters = array_merge([
            'search' => '',
            'filters' => [],
            'stores' => [],
            'status' => [],
        ], $filters);

        if (auth()->guard('admin')->check()) {

            $admin = auth()->guard('admin')->user();

            if ($admin->role == 'superadmin') {


                $builder->whereHas('stores', function ($query) use ($filters) {

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

                $builder->when($filters['search'] !== null, function ($query) use ($filters) {
                    $query->where('name', 'like', '%' . $filters['search'] . '%')
                        ->orWhere('username', 'like', '%' . $filters['search'] . '%')
                        ->orWhere('phone_number', 'like', '%' . $filters['search'] . '%');
                });

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

                return $builder;
            }

            if ($admin->role == 'admin') {

                $builder->whereHas('stores', function ($query) use ($filters, $admin) {

                    if ($filters['stores']  !== []) {
                        $x = 0;
                        foreach ($filters['stores'] as $store_id) {
                            if ($x == 0) {
                                $query->where('admin_id', $admin->id)->where('store_id', $store_id);
                            } else {
                                $query->where('admin_id', $admin->id)->orWhere('store_id', $store_id);
                            }
                            $x = $x + 1;
                        }
                    }
                });



                $builder->when($filters['search'] == null, function ($query) use ($admin) {
                    $query->where('admin_id', $admin->id);
                });

                $builder->when($filters['search'] !== null, function ($query) use ($filters, $admin) {

                    $query
                        ->where('admin_id', $admin->id)
                        ->where('phone_number', 'like', '%' . $filters['search'] . '%')

                        ->orWhere('admin_id', $admin->id)
                        ->where('name', 'like', '%' . $filters['search'] . '%');

                    // ->orWhere('admin_id', $admin->id)
                    // ->where('username', 'like', '%' . $filters['search'] . '%')

                    // ->orWhere('admin_id', $admin->id)
                    // ->where('phone_number', 'like', '%' . $filters['search'] . '%');
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

        if (auth()->guard('manager')->check()) {

            $manager = auth()->guard('manager')->user();

            if ($manager->role == 'supermanager' || $manager->role == 'manager') {

                $builder->whereHas('stores', function ($query) use ($filters) {

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

                $builder->when($filters['search'] !== null, function ($query) use ($filters) {
                    $query->where('name', 'like', '%' . $filters['search'] . '%')
                        ->orWhere('username', 'like', '%' . $filters['search'] . '%')
                        ->orWhere('phone_number', 'like', '%' . $filters['search'] . '%');
                });


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


                return $builder;
            }
        }
    }
}
