<?php

namespace OwenVoke\PiholeTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use OwenVoke\PiholeTile\Commands\FetchPiholeSummaryCommand;

class PiholeTileServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Livewire::component('pihole-summary-tile', PiholeSummaryTileComponent::class);

        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchPiholeSummaryCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/dashboard-pihole-tile'),
        ], 'dashboard-pihole-tile-views');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'dashboard-pihole-tile');
    }
}
