<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Community;
use App\Models\joins;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    // public function boot(): void
    // {
    //     Schema::defaultstringLength(191);
    // }
    public function boot()
    {
        Blade::if('user', function () {
            return Auth::check();
        });
        // View::share('joints', joins::all());

        Blade::directive('user', function () {
            return '<?php $user = Auth::user(); ?>';
        });
        // Menggunakan View Composer untuk menyediakan data komunitas ke semua view
        Schema::defaultstringLength(191);

        View::composer('*', function ($view) {
            $communities = Community::all();
            $view->with('komunitas', $communities);
        });
    }
}
