<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function admins()
    {
        return $this->belongsToMany(Admin::class,'admin_roles', 'role_id', 'admin_id', 'id', 'id');
    }

    public function storeManagers()
    {
        return $this->belongsToMany(StoreManager::class,'store_managers_roles', 'role_id', 'store_manager_id', 'id', 'id');
    }

    public function superStoreManagers()
    {
        return $this->belongsToMany(SuperStoreManager::class,'super_store_managers_roles', 'role_id', 'su_store_manager_id', 'id', 'id');
    }

}
