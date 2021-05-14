<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('timestamp', function ($timestamp) {
            $formatted_timestamp = locale()->get_timestamp_format($timestamp);
            /*
            return "<?php echo 'Hello ' ?>";
            */
            return $formatted_timestamp;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
