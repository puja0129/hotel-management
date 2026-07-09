<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema; // 1. Add this line
use Illuminate\Support\Facades\View;
use App\Models\Carousel;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

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
   public function boot(): void // 2. Update this method
    {
        Schema::defaultStringLength(191);

        View::composer('partials.hero_carousel', function ($view) {
            try {
                if (Schema::hasTable('carousels')) {
                    $carousels = Carousel::where('is_active', true)->orderBy('sort_order')->get();
                    $view->with('carousels', $carousels);
                }
            } catch (\Throwable $e) {
                // Avoid breaking views during first-time setup before migrations.
            }
        });

        View::composer('partials.footer', function ($view) {
            try {
                if (Schema::hasTable('settings')) {
                    $settingsMap = Setting::query()
                        ->orderBy('group')
                        ->orderBy('key')
                        ->get()
                        ->pluck('value', 'key')
                        ->toArray();

                    $view->with('settingsMap', $settingsMap);
                }
            } catch (\Throwable $e) {
                // Avoid breaking views during first-time setup before migrations.
            }
        });
    }
}
