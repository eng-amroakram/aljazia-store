<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'id',
        'admin_id',
        'store_manager_id',
        'store_id',
        'category_type',
        'ar_name',
        'en_name',
        'status',
        'ranking',
        'image',
        'created_at',
        'updated_at'
    ];


    public function getTrashedCategory($id)
    {
        return $this->onlyTrashed()->where('id', $id)->first();
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function storeManager()
    {
        return $this->belongsTo(StoreManager::class, 'store_manager_id', 'id');
    }

    public function getCategory($ar_name)
    {
        return $this->where('ar_name', $ar_name)->first();
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
