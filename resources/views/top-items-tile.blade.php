<x-dashboard-tile
    :position="$position"
    :refresh-interval="$refreshIntervalInSeconds"
>
    <div class="grid grid-rows-auto-1 gap-2 h-full">
        <div
            class="flex items-center justify-center"
        >
            <h1 class="text-3xl leading-none -mt-1">Pi-hole Top Items</h1>
        </div>

        <div class="grid gap-padding" style="height: calc(100% - 13px);">
            <div class="flex flex-row items-start justify-around">
                <div>
                    <span class="text-2xl">Top queries</span>
                    <ul>
                        @foreach ($topQueries as $query => $queryCount)
                            <li><span class="text-dimmed">{{ $queryCount }}</span> {{ $query }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="">
                    <span class="text-2xl">Top ads</span>
                    <ul>
                        @foreach ($topAds as $ad => $adCount)
                            <li><span class="text-dimmed">{{ $adCount }}</span> {{ $ad }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-tile>
