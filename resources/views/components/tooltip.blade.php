@props(['position' => $position ?? null])

@php
    switch ($position) {
        case 'top':

            break;

        case 'right':

            break;

        case 'left':

            break;

        case 'right':
                $tooltipClasses = 'top-1/2 -translate-y-1/2 left-[110%]';
            break;
    }

@endphp

<div {{ $attributes->merge(['class' => 'inline relative']) }} x-data="{ tooltip: false }" role="tooltip">
    <div @mouseover="tooltip = true" @mouseleave="tooltip = false">
        {{ $slot }}
    </div>

    <!-- Content tooltip -->
    <div class="" x-show="tooltip">
        {{ $content }}
    </div>
</div>
