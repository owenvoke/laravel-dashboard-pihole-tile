<?php

namespace OwenVoke\PiholeTile\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;

class Pihole
{
    private string $apiUrl;

    public function __construct()
    {
        $this->apiUrl = config('dashboard.tiles.pihole.url').'/api.php';
    }

    public static function make(): self
    {
        return new static();
    }

    public function getSummary(): array
    {
        return Http::get($this->apiUrl, [
            'summary' => null,
        ])->json();
    }

    public function getTopItems(): array
    {
        $this->requiresAuthentication();

        return Http::get($this->apiUrl, [
            'auth' => config('dashboard.tiles.pihole.key'),
            'topItems' => config('dashboard.tiles.pihole.top_items.max', 5),
        ])->json();
    }

    private function requiresAuthentication(): void
    {
        if (! config('dashboard.tiles.pihole.key')) {
            throw new RuntimeException('Pi-hole authentication key has not been provided');
        }
    }
}
