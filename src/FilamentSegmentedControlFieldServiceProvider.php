<?php

namespace Schuttelaar\Filament;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Illuminate\Support\Facades\Vite;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Assets\Css;

class FilamentSegmentedControlFieldServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-segmented-control-field')
            ->hasAssets()
            ->hasViews();
    }

    public function packageBooted(): void
    {

        // to include the asset you need to run php artisan filament:assets
        FilamentAsset::register([
                Css::make('filament-segmented-control-field',
       __DIR__ . '/../resources/dist/css/filament-segmented-control-field.css'),
        ], 'schuttelaar/filament-segmented-control-field');
    }
}
