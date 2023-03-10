<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'image',
        'price',
        'company_name',
        'status',
        'created_at',
        'updated_at'
    ];
}
