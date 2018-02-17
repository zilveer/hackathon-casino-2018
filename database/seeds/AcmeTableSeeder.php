<?php

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

        $tokens = factory(Token::class, 10)->make();
        $tokens->each(function ($token) use ($wallet) {
            $token->wallet()->associate($wallet)->save();
        });
    }
}
