<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use Concerns\HasUuid;

    protected $fillable = [
        'name','email',
    ];

    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }

    public function getCoinsCountAttribute()
    {
        $count = 0;

        foreach ($this->wallets as $wallet) {
            $count += $wallet->coins->sum('amount');
        }

        return $count;
    }
}
