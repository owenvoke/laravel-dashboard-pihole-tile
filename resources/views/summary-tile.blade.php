<x-dashboard-tile
    :position="$position"
    :refresh-interval="$refreshIntervalInSeconds"
>
    <div class="grid grid-rows-auto-1 gap-2 h-full">
        <div
            class="flex items-center justify-center"
        >
            <h1 class="text-3xl leading-none -mt-1">Pi-hole Summary</h1>
        </div>

        <div class="grid gap-padding" style="height: calc(100% - 13px);">
            <div class="flex flex-col items-center justify-center">
                <div class="flex items-center w-full flex-col flex-1 justify-center">
                    <span class="text-4xl">{{ $summary['domains_being_blocked'] }} <span class="text-dimmed"> domains being blocked</span></span>
                </div>
                <div class="flex items-center w-full flex-col flex-1 justify-center">
                    <span class="text-4xl">{{ $summary['dns_queries_today'] }} <span class="text-dimmed"> DNS queries today</span></span>
                </div>
                <div class="flex items-center w-full flex-col flex-1 justify-center">
                    <span class="text-4xl">{{ $summary['ads_blocked_today'] }} <span class="text-dimmed"> ads blocked today</span></span>
                </div>
                <div class="flex items-center w-full flex-col flex-1 justify-center">
                    <span class="text-4xl">{{ $summary['ads_percentage_today'] }} <span class="text-dimmed"> % ads</span></span>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-tile>
