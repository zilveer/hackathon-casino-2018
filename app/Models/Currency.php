<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use Concerns\HasUuid;

    protected $fillable = [
        'name', 'code',
    ];

    public function coins()
    {
        return $this->hasMany(Coint::class);
    }
}
