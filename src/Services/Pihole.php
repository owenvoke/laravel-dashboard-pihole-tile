<?php

namespace OwenVoke\PiholeTile\Services;

use Illuminate\Support\Facades\Http;

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
}
