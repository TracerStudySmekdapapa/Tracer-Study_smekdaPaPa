<div x-data="{
    tooltipVisible: false,
    tooltipText: 'Dashboard',
    tooltipArrow: true,
    tooltipPosition: 'right',
}" x-init="$refs.content.addEventListener('mouseenter', () => { tooltipVisible = true; });
$refs.content.addEventListener('mouseleave', () => { tooltipVisible = false; });" class="relative">
    <div x-ref="tooltip" x-show="tooltipVisible"
        :class="{
            'top-0 left-1/2 -translate-x-1/2 -mt-0.5 -translate-y-full': tooltipPosition ==
                'top',
            'top-1/2 -translate-y-1/2 -ml-0.5 left-0 -translate-x-full': tooltipPosition ==
                'left',
            'bottom-0 left-1/2 -translate-x-1/2 -mb-0.5 translate-y-full': tooltipPosition ==
                'bottom',
            'top-1/2 -translate-y-1/2 -mr-0.5 right-0 translate-x-full': tooltipPosition ==
                'right'
        }"
        class="absolute w-auto text-sm" x-cloak>
        <div x-show="tooltipVisible" x-transition class="relative px-2 py-1 text-white bg-black rounded bg-opacity-90">
            <p x-text="tooltipText" class="flex-shrink-0 block text-[9px] whitespace-nowrap">
            </p>
            <div x-ref="tooltipArrow" x-show="tooltipArrow"
                :class="{
                    'bottom-0 -translate-x-1/2 left-1/2 w-2.5 translate-y-full': tooltipPosition ==
                        'top',
                    'right-0 -translate-y-1/2 top-1/2 h-2.5 -mt-px translate-x-full': tooltipPosition ==
                        'left',
                    'top-0 -translate-x-1/2 left-1/2 w-2.5 -translate-y-full': tooltipPosition ==
                        'bottom',
                    'left-0 -translate-y-1/2 top-1/2 h-2.5 -mt-px -translate-x-full': tooltipPosition ==
                        'right'
                }"
                class="absolute inline-flex items-center justify-center overflow-hidden">
                <div :class="{
                    'origin-top-left -rotate-45': tooltipPosition ==
                        'top',
                    'origin-top-left rotate-45': tooltipPosition ==
                        'left',
                    'origin-bottom-left rotate-45': tooltipPosition ==
                        'bottom',
                    'origin-top-right -rotate-45': tooltipPosition == 'right'
                }"
                    class="w-1.5 h-1.5 transform bg-black bg-opacity-90"></div>
            </div>
        </div>
    </div>
    <a x-ref="content" class="block w-full opacity-95" href="{{ route('adminDashboard') }}"><img class="mx-auto"
            src="{{ asset('assets/jam_home.svg') }}" alt="jamHome" /></a>
</div>
