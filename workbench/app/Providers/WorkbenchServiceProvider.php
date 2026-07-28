<?php

namespace Workbench\App\Providers;

use Filament\Support\Assets\Theme;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class WorkbenchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Rebuild with `npm run build:theme`. Without it the package's CSS overrides
        // (hidden heading, compact style) are not part of the build.
        FilamentAsset::register([
            Theme::make('workbench', dirname(__DIR__, 2) . '/dist/theme.css'),
        ], 'workbench');

        Route::view('/', 'welcome');
    }
}
