@props(['type' => $type ?? null])

@switch(strtolower($type))

    @case('hamburger')
        <svg {{ $attributes->merge(['class' => 'stroke-current']) }} fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    @break

    @case('close')
        <svg {{ $attributes->merge(['class' => 'stroke-current']) }} viewBox="0 0 24 24" fill="none">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    @break

    @case('bell')
        <svg {{ $attributes->merge(['class' => 'stroke-current fill-current ionicon']) }} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M440.08 341.31c-1.66-2-3.29-4-4.89-5.93-22-26.61-35.31-42.67-35.31-118 0-39-9.33-71-27.72-95-13.56-17.73-31.89-31.18-56.05-41.12a3 3 0 01-.82-.67C306.6 51.49 282.82 32 256 32s-50.59 19.49-59.28 48.56a3.13 3.13 0 01-.81.65c-56.38 23.21-83.78 67.74-83.78 136.14 0 75.36-13.29 91.42-35.31 118-1.6 1.93-3.23 3.89-4.89 5.93a35.16 35.16 0 00-4.65 37.62c6.17 13 19.32 21.07 34.33 21.07H410.5c14.94 0 28-8.06 34.19-21a35.17 35.17 0 00-4.61-37.66zM256 480a80.06 80.06 0 0070.44-42.13 4 4 0 00-3.54-5.87H189.12a4 4 0 00-3.55 5.87A80.06 80.06 0 00256 480z"/>
        </svg>
    @break

    @case('mail-open')
        <svg {{ $attributes->merge(['class' => 'stroke-current fill-current ionicon']) }} xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512">
            <path d="M448.67 154.45L274.1 68.2a41.1 41.1 0 00-36.2 0L63.33 154.45A55.6 55.6 0 0032 204.53v184.61c0 30.88 25.42 56 56.67 56h334.66c31.25 0 56.67-25.12 56.67-56V204.53a55.6 55.6 0 00-31.33-50.08zM252.38 96.82a8.22 8.22 0 017.24 0L429 180.48l-172 85a8.22 8.22 0 01-7.24 0L80.35 181.81z"/>
        </svg>
    @break

    @case('mail')
        <svg {{ $attributes->merge(['class' => 'stroke-current fill-current ionicon']) }} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M424 80H88a56.06 56.06 0 00-56 56v240a56.06 56.06 0 0056 56h336a56.06 56.06 0 0056-56V136a56.06 56.06 0 00-56-56zm-14.18 92.63l-144 112a16 16 0 01-19.64 0l-144-112a16 16 0 1119.64-25.26L256 251.73l134.18-104.36a16 16 0 0119.64 25.26z"/>
        </svg>
    @break

    @case('pie-chart')
        <svg {{ $attributes->merge(['class' => 'stroke-current fill-current']) }} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M66.1 357a16 16 0 01-14.61-9.46A224 224 0 01256 32a16 16 0 0116 16v208a16 16 0 01-9.47 14.61l-189.9 84.95A15.93 15.93 0 0166.1 357z"/>
            <path d="M313.59 68.18A8 8 0 00304 76v180a48.07 48.07 0 01-28.4 43.82L103.13 377a8 8 0 00-3.35 11.81 208.42 208.42 0 0048.46 50.41A206.32 206.32 0 00272 480c114.69 0 208-93.31 208-208 0-100.45-71.58-184.5-166.41-203.82z"/>
        </svg>
    @break

    @case('grid')
        <svg {{ $attributes->merge(['class' => 'stroke-current fill-current']) }} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M204 240H68a36 36 0 01-36-36V68a36 36 0 0136-36h136a36 36 0 0136 36v136a36 36 0 01-36 36zM444 240H308a36 36 0 01-36-36V68a36 36 0 0136-36h136a36 36 0 0136 36v136a36 36 0 01-36 36zM204 480H68a36 36 0 01-36-36V308a36 36 0 0136-36h136a36 36 0 0136 36v136a36 36 0 01-36 36zM444 480H308a36 36 0 01-36-36V308a36 36 0 0136-36h136a36 36 0 0136 36v136a36 36 0 01-36 36z"/>
        </svg>
    @break

    @case('close-circle')
        <svg {{ $attributes->merge(['class' => 'stroke-current fill-current ionicon']) }} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48zm75.31 260.69a16 16 0 11-22.62 22.62L256 278.63l-52.69 52.68a16 16 0 01-22.62-22.62L233.37 256l-52.68-52.69a16 16 0 0122.62-22.62L256 233.37l52.69-52.68a16 16 0 0122.62 22.62L278.63 256z"/>
        </svg>
    @break

    @case('chevron-down')
        <svg {{ $attributes->merge(['class' => 'stroke-current fill-current ionicon']) }} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 184l144 144 144-144"/></svg>
    @break

    @case('chevron-forward')
        <svg {{ $attributes->merge(['class' => 'stroke-current fill-current ionicon']) }} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144
        144"/></svg>
    @break

    @case('search')
        <svg {{ $attributes->merge(['class' => 'stroke-current fill-current ionicon']) }} xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
            <path d="M456.69 421.39L362.6 327.3a173.81 173.81 0 0034.84-104.58C397.44 126.38 319.06 48 222.72 48S48 126.38 48 222.72s78.38 174.72 174.72 174.72A173.81 173.81 0 00327.3 362.6l94.09 94.09a25 25 0 0035.3-35.3zM97.92 222.72a124.8 124.8 0 11124.8 124.8 124.95 124.95 0 01-124.8-124.8z"/>
        </svg>
    @break

    @case('house')
        <svg {{ $attributes->merge(['class' => 'fill-current ionicon']) }} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M261.56 101.28a8 8 0 00-11.06 0L66.4 277.15a8 8 0 00-2.47 5.79L63.9 448a32 32 0 0032 32H192a16 16 0 0016-16V328a8 8 0 018-8h80a8 8 0 018 8v136a16 16 0 0016 16h96.06a32 32 0 0032-32V282.94a8 8 0 00-2.47-5.79z"/><path d="M490.91 244.15l-74.8-71.56V64a16 16 0 00-16-16h-48a16 16 0 00-16 16v32l-57.92-55.38C272.77 35.14 264.71 32 256 32c-8.68 0-16.72 3.14-22.14 8.63l-212.7 203.5c-6.22 6-7 15.87-1.34 22.37A16 16 0 0043 267.56L250.5 69.28a8 8 0 0111.06 0l207.52 198.28a16 16 0 0022.59-.44c6.14-6.36 5.63-16.86-.76-22.97z"/>
        </svg>
    @break

    @case('user-circle-outline')
        <svg {{ $attributes->merge(['class' => 'stroke-current fill-current ionicon']) }} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M258.9 48C141.92 46.42 46.42 141.92 48 258.9c1.56 112.19 92.91 203.54 205.1 205.1 117 1.6 212.48-93.9 210.88-210.88C462.44 140.91 371.09 49.56 258.9 48zm126.42 327.25a4 4 0 01-6.14-.32 124.27 124.27 0 00-32.35-29.59C321.37 329 289.11 320 256 320s-65.37 9-90.83 25.34a124.24 124.24 0 00-32.35 29.58 4 4 0 01-6.14.32A175.32 175.32 0 0180 259c-1.63-97.31 78.22-178.76 175.57-179S432 158.81 432 256a175.32 175.32 0 01-46.68 119.25z"/>
            <path d="M256 144c-19.72 0-37.55 7.39-50.22 20.82s-19 32-17.57 51.93C191.11 256 221.52 288 256 288s64.83-32 67.79-71.24c1.48-19.74-4.8-38.14-17.68-51.82C293.39 151.44 275.59 144 256 144z"/>
        </svg>
    @break

    @case('expand')
        <svg {{ $attributes->merge(['class' => 'stroke-current fill-current']) }} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M432 320v112H320M421.8 421.77L304 304M80 192V80h112M90.2 90.23L208 208M320 80h112v112M421.77 90.2L304 208M192 432H80V320M90.23 421.8L208 304"/>
        </svg>
    @break

@endswitch
