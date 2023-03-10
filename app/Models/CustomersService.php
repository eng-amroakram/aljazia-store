<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomersService extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'user_id',
        'name',
        'mobile',
        'email',
        'date',
        'type',
        'message',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
