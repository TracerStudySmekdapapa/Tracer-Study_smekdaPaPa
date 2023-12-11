<div x-data="{
    tooltipVisible: false,
    tooltipText: 'user',
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
    <a x-ref="content" class="block w-full" href="{{ route('users') }}"><svg xmlns="http://www.w3.org/2000/svg"
            width="28" height="28" viewBox="0 0 12 12">
            <path fill="currentColor"
                d="M6 1a2 2 0 1 0 0 4a2 2 0 0 0 0-4ZM5 3a1 1 0 1 1 2 0a1 1 0 0 1-2 0Zm3.5 3h-5A1.5 1.5 0 0 0 2 7.5c0 1.116.459 2.01 1.212 2.615C3.953 10.71 4.947 11 6 11c1.053 0 2.047-.29 2.788-.885C9.54 9.51 10 8.616 10 7.5A1.5 1.5 0 0 0 8.5 6Zm-5 1h5a.5.5 0 0 1 .5.5c0 .817-.325 1.423-.838 1.835C7.636 9.757 6.88 10 6 10c-.88 0-1.636-.243-2.162-.665C3.325 8.923 3 8.317 3 7.5a.5.5 0 0 1 .5-.5Z" />
        </svg></a>
</div>
