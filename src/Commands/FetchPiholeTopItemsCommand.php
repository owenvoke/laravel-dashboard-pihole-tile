<?php

namespace OwenVoke\PiholeTile\Commands;

use Illuminate\Console\Command;
use OwenVoke\PiholeTile\PiholeStore;
use OwenVoke\PiholeTile\Services\Pihole;

class FetchPiholeTopItemsCommand extends Command
{
    /** {@inheritdoc} */
    protected $signature = 'dashboard:fetch-pihole-top-items';

    /** {@inheritdoc} */
    protected $description = 'Fetch Pi-hole top items';

    public function handle(): void
    {
        $this->info('Fetching Pi-hole top items');

        $topItems = Pihole::make()->getTopItems();

        PiholeStore::make()->setTopQueries($topItems['top_queries']);
        PiholeStore::make()->setTopAds($topItems['top_ads']);

        $this->info('All done!');
    }
}
