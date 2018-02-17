<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use Concerns\HasUuid;

    protected $casts = [
        'data' => "json",
    ];

    public function wallet()
    {
        return $this->belongsTo(User::class);
    }
}
