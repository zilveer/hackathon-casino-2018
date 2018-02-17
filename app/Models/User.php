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

    public function getTokensCountAttribute()
    {
        $count = 0;

        foreach ($this->wallets as $wallet) {
            $count += count($wallet->tokens);
        }

        return $count;
    }
}
