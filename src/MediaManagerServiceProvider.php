<?php

namespace Phuclh\MediaManager;

use Livewire\Livewire;
use Phuclh\MediaManager\Unsplash\Unsplash;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MediaManagerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('media-manager')
            ->hasConfigFile()
            ->hasViews();
    }

    public function bootingPackage()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'media-manager');

        Livewire::component('media-manager', MediaManager::class);
        Livewire::component('media-manager.unsplash', Unsplash::class);
    }
}
