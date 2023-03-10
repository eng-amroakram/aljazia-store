<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'area_id',
        'title',
        'description',
        'lat',
        'lng',
        'is_default',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'address_id', 'id');
    }
}
