<?php

namespace OwenVoke\PiholeTile;

use Carbon\CarbonInterval;
use Livewire\Component;

class PiholeSummaryTileComponent extends Component
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

        return view('dashboard-pihole-tile::summary-tile', [
            'summary' => $piholeStore->summary(),
            'refreshIntervalInSeconds' => config('dashboard.tiles.pihole.refresh_interval_in_seconds', 60),
        ]);
    }
}
