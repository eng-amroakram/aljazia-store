<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'admin_id',
        'name',
        'username',
        'email',
        'phone_number',
        'role',
        'status',
        'password',
        'avatar',
        'active_code',
        'is_verified',
        'verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
        'fcm_token',
        'device_id',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function scopeFilters(Builder $builder, array $filters = [])
    {

        $filters = array_merge([
            'search' => '',
            'filters' => [],
            'status' => [],
        ], $filters);

        if (auth()->guard('admin')->check()) {

            $admin = auth()->guard('admin')->user();

            if ($admin->role == 'superadmin') {


                $builder->when($filters['search'] !== null, function ($query) use ($filters) {
                    $query->where('name', 'like', '%' . $filters['search'] . '%')
                        ->orWhere('email', 'like', '%' . $filters['search'] . '%')
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

                $builder->when($filters['search'] == null, function ($query) use ($admin) {
                    $query->where('admin_id', $admin->id);
                });

                $builder->when($filters['search'] !== null, function ($query) use ($filters, $admin) {

                    $query
                        ->where('admin_id', $admin->id)
                        ->where('name', 'like', '%' . $filters['search'] . '%')

                        ->orWhere('admin_id', $admin->id)
                        ->where('email', 'like', '%' . $filters['search'] . '%')

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

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function getTrashedUser($id)
    {
        return $this->onlyTrashed()->where('id', $id)->first();
    }

    public function cart()
    {
        return $this->hasOne(Cart::class, 'user_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function favoritesProducts()
    {
        return $this->belongsToMany(Product::class, 'user_product', 'user_id', 'product_id', 'id', 'id');
    }

    #Area Relationship
    public function area()
    {
        return $this->belongsTo(Area::class, 'user_id', 'id');
    }

    #Addresses Relationship
    public function addresses()
    {
        return $this->hasMany(Address::class, 'user_id', 'id');
    }

    public function contactUs()
    {
        return $this->hasMany(ContactUs::class, 'user_id', 'id');
    }

    public function customersService()
    {
        return $this->hasMany(CustomersService::class, 'user_id', 'id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id', 'id');
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'user_id', 'id');
    }

}
