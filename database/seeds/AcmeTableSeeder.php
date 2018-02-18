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
        $user = factory(User::class, 10)->create()->each(function ($user) {
            factory(Token::class, rand(10, 50))->make()->each(function ($token) use ($user) {
                $user->tokens()->save($token);
            });
        });
    }
}
