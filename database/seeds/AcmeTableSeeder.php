<?php

use App\Models\Coin;
use App\Models\Currency;
use App\Models\Token;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Seeder;

class AcmeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user   = factory(User::class)->create();

        $wallet = factory(Wallet::class)->make();
        $wallet->user()->associate($user)->save();

        $currency = factory(Currency::class)->create();

        $coins = factory(Coin::class, 10)->make()->each(function ($coin) use ($currency, $wallet) {
            $coin->currency()->associate($currency);
            $coin->wallet()->associate($wallet);
            $coin->save();
        });
    }
}
