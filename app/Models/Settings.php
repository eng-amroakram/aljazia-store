<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'admin_id',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'email_manager',
        'mobile',
        'telephone',
        'vat',
        'vat_no',
        'ios_link',
        'android_link',
        'website_link',
        'ar_decription',
        'en_decription',
        'ar_address',
        'en_address',
        'created_at',
        'updated_at'
    ];
}
