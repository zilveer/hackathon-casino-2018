<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use Concerns\HasUuid;

    protected $fillable = [
        'name','email',
    ];

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }
}
