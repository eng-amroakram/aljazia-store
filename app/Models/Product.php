<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'admin_id',
        'store_manager_id',
        'store_id',
        'category_id',
        'sub_category_id',
        'ar_description',
        'en_description',
        'ar_name',
        'en_name',
        'status',
        'price',
        'ranking',
        'offer_price',
        'is_offer',
        'order_max',
        'created_at',
        'updated_at'
    ];


    public function getTrashedProduct($id)
    {
        return $this->onlyTrashed()->where('id', $id)->first();
    }

    public function scopeGetAdminStoresProducts(Builder $builder, Collection $stores)
    {
        $builder->whereHas('store', function ($query) use ($stores) {
            $query->whereIn('id', $stores->pluck('id'));
        });

        return $builder;
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {
        $filters = array_merge([
            'search' => '',
            'filters' => [],
            // 'storestatus' => [],
            'productstatus' => [],
            'attrstatus' => [],
            // 'stores' => [],

        ], $filters);

        if (auth()->guard('admin')->check()) {

            $admin = auth()->guard('admin')->user();

            if ($admin->role == 'superadmin') {


                $builder->when($filters['search'] == null && $filters['productstatus'] == [] && $filters['attrstatus'] == [], function ($query) use ($filters) {
                    $query->where('en_name', 'like', '%' . $filters['search'] . '%')
                        ->orWhere('ar_name', 'like', '%' . $filters['search'] . '%')
                        ->orwhereHas('Category', function ($query) use ($filters) {
                            $query->where('ar_name', 'like', '%' . $filters['search'] . '%')
                                ->orWhere('en_name', 'like', '%' . $filters['search'] . '%');
                        })
                        ->orWhereHas('subCategory', function ($query) use ($filters) {
                            $query->where('ar_name', 'like', '%' . $filters['search'] . '%')
                                ->orWhere('en_name', 'like', '%' . $filters['search'] . '%');
                        })
                        ->orWhereHas('store', function ($query) use ($filters) {
                            $query
                                ->where('ar_name', 'like', '%' . $filters['search'] . '%')
                                ->orwhere('en_name', 'like', '%' . $filters['search'] . '%');
                        });
                });


                $builder->when($filters['search'] !== null, function ($query) use ($filters) {
                    $query
                        ->where('ar_name', 'like', '%' . $filters['search'] . '%')
                        ->orWhere('en_name', 'like', '%' . $filters['search'] . '%')
                        ->orwhereHas('Category', function ($query) use ($filters) {
                            $query->where('ar_name', 'like', '%' . $filters['search'] . '%')
                                ->orWhere('en_name', 'like', '%' . $filters['search'] . '%');
                        })
                        ->orWhereHas('subCategory', function ($query) use ($filters) {
                            $query->where('ar_name', 'like', '%' . $filters['search'] . '%')
                                ->orWhere('en_name', 'like', '%' . $filters['search'] . '%');
                        })
                        ->orWhereHas('store', function ($query) use ($filters) {
                            $query
                                ->where('ar_name', 'like', '%' . $filters['search'] . '%')
                                ->orwhere('en_name', 'like', '%' . $filters['search'] . '%');
                        });
                });

                # Product Status
                $builder->when($filters['productstatus'] !== [] || $filters['attrstatus'] !== [], function ($query) use ($filters) {

                    $query
                        ->whereIn('status', $filters['productstatus'])
                        ->orWhereHas('specification', function ($query) use ($filters) {
                            $query->whereIn('status', $filters['attrstatus']);
                        });
                });

                return $builder;
            }

            if ($admin->role == 'admin') {

                $builder->when($filters['search'] == null, function ($query) use ($filters, $admin) {
                    $query->where('admin_id', $admin->id);
                });

                $builder->when($filters['search'] !== null, function ($query) use ($filters, $admin) {

                    // dd($admin);
                    $query
                        ->where('admin_id', $admin->id)
                        ->where('ar_name', 'like', '%' . $filters['search'] . '%')

                        ->orWhere('admin_id', $admin->id)
                        ->where('en_name', 'like', '%' . $filters['search'] . '%')


                        ->orWhere('admin_id', $admin->id)
                        ->whereHas('Category', function ($query) use ($filters) {

                            $query
                                ->where('ar_name', 'like', '%' . $filters['search'] . '%')
                                ->orWhere('en_name', 'like', '%' . $filters['search'] . '%');
                        })

                        ->orWhere('admin_id', $admin->id)
                        ->whereHas('subCategory', function ($query) use ($filters) {
                            $query
                                ->where('ar_name', 'like', '%' . $filters['search'] . '%')
                                ->orWhere('en_name', 'like', '%' . $filters['search'] . '%');
                        })

                        ->orWhere('admin_id', $admin->id)
                        ->whereHas('store', function ($query) use ($filters, $admin) {
                            $query
                                ->where('ar_name', 'like', '%' . $filters['search'] . '%')
                                ->where('en_name', 'like', '%' . $filters['search'] . '%');
                        });
                });

                # Product Status
                $builder->when($filters['productstatus'] !== [] || $filters['attrstatus'] !== [], function ($query) use ($filters, $admin) {

                    $query
                        ->where('admin_id', $admin->id)
                        ->whereIn('status', $filters['productstatus'])

                        ->orWhere('admin_id', $admin->id)
                        ->whereHas('specification', function ($query) use ($filters) {
                            $query->whereIn('status', $filters['attrstatus']);
                        });
                });
            }
        }

        #Store Manager

        if (auth()->guard('manager')->check()) {


            $manager = auth()->guard('manager')->user();

            $builder->when($filters['search'] == null && $filters['productstatus'] == [] && $filters['attrstatus'] == [], function ($query) use ($filters, $manager) {
                $query->where('store_manager_id', $manager->id);
            });

            $builder->when($filters['search'] !== null, function ($query) use ($filters, $manager) {
                $query
                    ->where('store_manager_id', $manager->id)
                    ->where('ar_name', 'like', '%' . $filters['search'] . '%')

                    ->orWhere('store_manager_id', $manager->id)
                    ->where('en_name', 'like', '%' . $filters['search'] . '%')

                    ->orWhere('store_manager_id', $manager->id)
                    ->whereHas('Category', function ($query) use ($filters) {
                        $query->where('ar_name', 'like', '%' . $filters['search'] . '%')
                            ->orWhere('en_name', 'like', '%' . $filters['search'] . '%');
                    })

                    ->orWhere('store_manager_id', $manager->id)
                    ->whereHas('subCategory', function ($query) use ($filters) {
                        $query->where('ar_name', 'like', '%' . $filters['search'] . '%')
                            ->orWhere('en_name', 'like', '%' . $filters['search'] . '%');
                    });
            });

            # Product Status
            $builder->when($filters['productstatus'] !== [] || $filters['attrstatus'] !== [], function ($query) use ($filters, $manager) {
                $query
                    ->where('store_manager_id', $manager->id)
                    ->whereIn('status', $filters['productstatus'])

                    ->orWhere('store_manager_id', $manager->id)
                    ->whereHas('specification', function ($query) use ($filters) {
                        $query->whereIn('status', $filters['attrstatus']);
                    });
            });
        }
    }

    protected $casts = [
        'attributes' => 'array'
    ];



    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function storeManager()
    {
        return $this->belongsTo(StoreManager::class, 'store_manager_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->withDefault();
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_product', 'product_id', 'color_id', 'id', 'id');
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_size', 'product_id', 'size_id', 'id', 'id');
    }

    public function specification()
    {
        return $this->hasMany(Attribute::class, 'product_id', 'id');
    }

    public function getProduct($ar_name, $en_name)
    {
        return $this->where('ar_name', $ar_name)->orWhere('en_name', $en_name)->first();
    }

    public function getColor($color_id)
    {
        return $this->colors->where('id', $color_id)->first()->color;
    }

    public function getSize($size_id)
    {
        return $this->sizes->where('id', $size_id)->first()->ar_name;
    }

    public function getAttr($product_id)
    {
        return $this->specification->where('product_id', $product_id)->first();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_product', 'product_id', 'user_id', 'id', 'id');
    }
}
