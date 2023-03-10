<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'admin';

    public function scopeFilters(Builder $builder, array $filters = [])
    {
        $filters = array_merge([
            'search' => '',
            'filters' => [],
            'status' => [],
            'roles' => [],
        ], $filters);


        $builder->when($filters['search'] !== null, function ($query) use ($filters) {
            $query->where('email', 'like', '%' . $filters['search'] . '%')
                ->orWhere('name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('username', 'like', '%' . $filters['search'] . '%')
                ->orWhere('phone_number', 'like', '%' . $filters['search'] . '%');
        });


        foreach ($filters['status'] as $value) {

            $builder->when($value == 'active', function ($query) use ($filters) {
                $query->where('status', 'active');
            });

            $builder->when($value == 'inactive', function ($query) use ($filters) {
                $query->where('status', 'inactive');
            });
        }

        foreach ($filters['roles'] as $value) {

            $builder->when($value == 'admin', function ($query) use ($filters) {
                $query->where('role', 'admin');
            });

            $builder->when($value == 'superadmin', function ($query) use ($filters) {
                $query->where('role', 'superadmin');
            });
        }

        // $builder->when($filters['stores'] != [] , function ($query) use ($filters) {
        //     foreach ($filters['stores'] as $value)
        //     {
        //         ($value == "null") ? $query->whereNull('store_id') : $query->where('store_id', $value);
        //     }
        // });

        return $builder;
    }

    protected $fillable = [
        'id',
        'name',
        // 'username',
        'email',
        'phone_number',
        'role',
        'status',
        'avatar',
        'active_code',
        'is_verified',
        'verified_at',
        'password',
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



    public function getTrashedAdmin($id)
    {
        return $this->onlyTrashed()->where('id', $id)->first();
    }


    #Stores Relationships
    public function stores()
    {
        return $this->hasMany(Store::class, 'admin_id', 'id');
    }

    #Stores Relationships
    public function products()
    {
        return $this->hasMany(Product::class, 'admin_id', 'id');
    }

    #Store Managers Relationships
    public function sliderOffers()
    {
        return $this->hasMany(SliderOffer::class, 'admin_id', 'id');
    }

    #Store Managers Relationships
    public function storeManagers()
    {
        return $this->hasMany(StoreManager::class, 'admin_id', 'id');
    }

    #Users Realtionships
    public function users()
    {
        return $this->hasMany(User::class, 'admin_id', 'id');
    }

    #Delivery Relationships
    public function deliverise()
    {
        return $this->hasMany(Delivery::class, 'admin_id', 'id');
    }

    #Orders Relationships
    public function orders()
    {
        return $this->hasMany(Order::class, 'admin_id', 'id');
    }

    #Order Items History Relationships
    public function ordersHistory()
    {
        return $this->hasMany(OrderHistory::class, 'admin_id', 'id');
    }

    #Sizes Relationships
    public function sizes()
    {
        return $this->hasMany(Size::class, 'admin_id', 'id');
    }

    #Colors Relationships
    public function colors()
    {
        return $this->hasMany(Color::class, 'admin_id', 'id');
    }

    #Categories Relationships
    public function categories()
    {
        return $this->hasMany(Category::class, 'admin_id', 'id');
    }

    #Sub Categories Relationships
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'admin_id', 'id');
    }

    #Roles Relationships
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'admin_roles', 'admin_id', 'role_id', 'id', 'id');
    }

    #Area Relationships
    public function areas()
    {
        return $this->hasMany(Area::class, 'admin_id', 'id');
    }

    public function contactUs()
    {
        return $this->hasMany(ContactUs::class, 'admin_id', 'id');
    }

    public function customersService()
    {
        return $this->hasMany(CustomersService::class, 'admin_id', 'id');
    }

    public function staticPages()
    {
        return $this->hasMany(StaticPage::class, 'admin_id', 'id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'admin_id', 'id');
    }

    public function deliveryTimes()
    {
        return $this->hasMany(DeliveryTime::class, 'admin_id', 'id');
    }

    public function getRolesNames()
    {
        return $this->roles->pluck('name')->toArray();
    }
}
