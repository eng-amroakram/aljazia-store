<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointsProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_value',
        'points_earned',
        'minimum_number_of_points_to_transfer',
        'transfer_fee',
    ];


}
