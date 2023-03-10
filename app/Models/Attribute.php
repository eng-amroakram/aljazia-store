<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'product_id',
        'store_id',
        'admin_id',
        'color_id',
        'size_id',
        'category_id',
        'sub_category_id',
        'ar_name',
        'en_name',
        'price',
        'discount',
        'status',
        'image',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'ar_name',
        'en_name',
        'deleted_at',
        'category_id',
        'sub_category_id',
        'store_id',
        'product_id',

        'admin_id',
    ];

    public function getTrashedAttribute($id)
    {
        return $this->onlyTrashed()->where('id', $id)->first();
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
