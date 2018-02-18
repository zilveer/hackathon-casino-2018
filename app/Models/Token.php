<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use Concerns\HasUuid;

    public static $brands = [
        'Casino', 'Franprix', 'Starbucks', 'Planet Sushi',
    ];

    protected $fillable = [
        'data', 'brand',
    ];

    protected $casts = [
        'data' => "array"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
