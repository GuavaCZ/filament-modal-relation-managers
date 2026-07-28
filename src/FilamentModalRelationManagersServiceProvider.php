<?php

namespace Guava\FilamentModalRelationManagers;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentModalRelationManagersServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-modal-relation-managers';

    public static string $viewNamespace = 'guava-modal-relation-managers';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasViews(static::$viewNamespace)
        ;
    }
}
