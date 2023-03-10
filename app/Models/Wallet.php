<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'user_id',
        'balance',
        'total_deposit',
        'total_withdraw',
        'points',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function walletHistory()
    {
        return $this->hasMany(WalletHistory::class, 'wallet_id', 'id');
    }

}
