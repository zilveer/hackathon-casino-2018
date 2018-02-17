<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use Concerns\HasUuid;

    protected $fillable = [
        'change_rate',
    ];

    protected $casts = [
        'change_rate' => "float",
    ];

    public function fromCurrency()
    {
        return $this->belongsTo(Currency::classs);
    }

    public function toCurrency()
    {
        return $this->belongsTo(Currency::classs);
    }

    public function enforce(Coin $coin)
    {
        //
    }

    public function setChangeRateAttribute($value)
    {
        if ($value <= 0) {
            throw new UnexpectedValueException("Invalid value");
        }

        $this->attributes['change_rate'] = $value;
    }
}
