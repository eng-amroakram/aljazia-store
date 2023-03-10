<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SliderOffer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'admin_id',
        'name',
        'image',
        'status',
        'created_at',
        'updated_at'
    ];

    public function getTrashedSliderOffers($id)
    {
        return $this->onlyTrashed()->where('id', $id)->first();
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
}
