<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'admin_id',
        'ar_name',
        'en_name',
        'ar_description',
        'en_description',
        'link',
        'created_at',
        'updated_at'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
}
