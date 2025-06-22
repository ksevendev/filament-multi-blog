<?php
namespace Kseven\FilamentMultiBlog\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Kseven\FilamentMultiBlog\Resources;

class MultiBlogServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/multiblog.php', 'multiblog');
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../config/multiblog.php' => config_path('multiblog.php'),
        ], 'config');

        Filament::registerResources([
            Resources\PostResource::class,
        ]);
    }
}
