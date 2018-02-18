<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Blade::directive('money', function ($expression) {
            return "<?php printf('%.2f', $expression); ?>";
        });

        Blade::directive('coin', function ($expression) {
            return sprintf(
                '<img src="%s" width="<?php echo %s ?>" height="<?php echo %s ?>">',
                asset('img/coin.svg', env('REDIRECT_HTTPS')),
                $expression,
                $expression
            );
        });
    }
}
