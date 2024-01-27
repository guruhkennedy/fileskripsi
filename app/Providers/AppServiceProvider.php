<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use DateTime;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (\Str::contains(\Config::get('app.url'), 'https://')) {
            \URL::forceRootUrl(config('app.url'));
            \URL::forceScheme('https');
        }

        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
        });

        Blade::directive('dateonly', function ($expression) {
            $a = "<?php echo ($expression)->format('d F Y'); ?>";
            return $a;
            // return Carbon::parse($expression)->translatedFormat('l, d F Y');
        });

        Blade::directive('dateformat', function ($expression) {
            $date = new DateTime($expression);
            $result = $date->format('Y-m-d H:i:s');
            return Carbon::createFromFormat('Y-m-d H:i:s', $result)->locale('id')->isoFormat('dddd, D MMM Y');
        });
    }
}
