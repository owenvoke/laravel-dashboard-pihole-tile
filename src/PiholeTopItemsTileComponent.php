<?php

namespace OwenVoke\PiholeTile;

use Livewire\Component;

class PiholeTopItemsTileComponent extends Component
{
    /** @var string */
    public $position;

    public function mount(string $position): void
    {
        $this->position = $position;
    }

    public function render()
    {
        $piholeStore = PiholeStore::make();

        return view('dashboard-pihole-tile::top-items-tile', [
            'topQueries' => $piholeStore->topQueries(),
            'topAds' => $piholeStore->topAds(),
            'refreshIntervalInSeconds' => config('dashboard.tiles.pihole.refresh_interval_in_seconds', 60),
        ]);
    }
}
