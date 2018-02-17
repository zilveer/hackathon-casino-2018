<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Contract;

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
        try {
            $rate = Contract::query()
                ->whereHas('fromCurrency', function ($query) {
                    $query->where('id', $this->currency->id);
                })
                ->whereHas('toCurrency', function ($query) use ($currency) {
                    $query->where('id', $currency->id);
                })
                ->firstOrFail()
                ->change_rate;
        } catch (ModelNotFoundException $e) {
            $rate = 1;
        }

        return $this->amount * $rate;
    }
}
