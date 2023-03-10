<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable =[
        'admin_id',
        'name',
        'color',
        // 'status',
    ];

    public function getTrashedColor($id)
    {
        return $this->onlyTrashed()->where('id', $id)->first();
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'color_product', 'color_id', 'product_id', 'id', 'id');
    }
}
