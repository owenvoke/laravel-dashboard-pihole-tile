<?php

namespace OwenVoke\PiholeTile;

use Spatie\Dashboard\Models\Tile;

class PiholeStore
{
    private Tile $tile;

    public static function make(): self
    {
        return new static();
    }

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName('pihole');
    }

    public function setSummary(array $summary): self
    {
        $this->tile->putData('summary', $summary);

        return $this;
    }

    public function summary(): array
    {
        return $this->tile->getData('summary') ?? [
            'domains_being_blocked' => 0,
            'dns_queries_today' => 0,
            'ads_blocked_today' => 0,
            'ads_percentage_today' => 0,
        ];
    }

    public function setTopQueries(array $topQueries): self
    {
        $this->tile->putData('topQueries', $topQueries);

        return $this;
    }

    public function topQueries(): array
    {
        return $this->tile->getData('topQueries') ?? [];
    }

    public function setTopAds(array $topAds): self
    {
        $this->tile->putData('topAds', $topAds);

        return $this;
    }

    public function topAds(): array
    {
        return $this->tile->getData('topAds') ?? [];
    }
}
