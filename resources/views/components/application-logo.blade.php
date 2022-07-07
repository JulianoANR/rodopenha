@props(['type' => $type ?? null])

@switch(strtolower($type))
    @case('white')
        <img {{ $attributes }} src="{{ asset('images/logo-rodopenha-branco.png') }}" alt="{{ 'Rodopenha Logo' }}">
    @break

    @case('min')
        <img {{ $attributes }} src="{{ asset('images/logo-rodopenha.png') }}" alt="{{ 'Rodopenha Logo' }}">
    @break


    @default
        <img {{ $attributes }} src="{{ asset('images/rodopenha-name.png') }}" alt="{{ 'Rodopenha Logo' }}">

@endswitch

