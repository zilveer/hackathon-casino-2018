<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use Concerns\HasUuid;

    protected $fillable = [
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coins()
    {
        return $this->hasMany(Coin::class);
    }
}
