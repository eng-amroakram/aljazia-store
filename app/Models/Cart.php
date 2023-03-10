<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'admin_id',
        'store_id',
        'user_id',
        'products',
        'total_products',
        'total_price',
    ];

    protected $casts = [
        'products' => 'array',
    ];

    public function getTrashedCart($id)
    {
        return $this->onlyTrashed()->where('id', $id)->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class ,'user_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }
}
