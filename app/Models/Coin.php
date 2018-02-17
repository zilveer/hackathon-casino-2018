<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    use Concerns\HasUuid;

    protected $fillable = [
        'amount',
    ];

    protected $casts = [
        'amount' => "double",
    ];

    public function __toString()
    {
        return sprintf('%.6f %s', $this->amount, $this->currency->code ?? '');
    }

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function convert(Currency $currency)
    {
        // find the contract
        // convert the currency
        // write the transaction
    }
}
