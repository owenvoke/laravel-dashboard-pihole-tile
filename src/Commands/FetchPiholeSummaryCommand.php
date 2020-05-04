<?php

namespace OwenVoke\PiholeTile\Commands;

use Illuminate\Console\Command;
use OwenVoke\PiholeTile\PiholeStore;
use OwenVoke\PiholeTile\Services\Pihole;

class FetchPiholeSummaryCommand extends Command
{
    /** {@inheritdoc} */
    protected $signature = 'dashboard:fetch-pihole-summary';

    /** {@inheritdoc} */
    protected $description = 'Fetch Pi-hole summary';

    public function handle(): void
    {
        $this->info('Fetching Pi-hole summary');

        $summary = Pihole::make()->getSummary();

        PiholeStore::make()->setSummary($summary);

        $this->info('All done!');
    }
}
