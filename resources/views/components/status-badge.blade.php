@props(['type' => $type])

@switch($type)
    @case(\App\Enums\StatusEnum::NEW)
        <span {{ $attributes->merge(['class' => "badge badge-primary"]) }}>
            {{ __('new') }}
        </span>
    @break

    @case(\App\Enums\StatusEnum::ASSIGNED)
        <span {{ $attributes->merge(['class' => "badge badge-info"]) }}>
            {{ __('assigned') }}
        </span>
    @break

    @case(\App\Enums\StatusEnum::ACCEPTED)
        <span {{ $attributes->merge(['class' => "badge badge-secondary"]) }}>
            {{ __('accepted') }}
        </span>
    @break

    @case(\App\Enums\StatusEnum::PICKUP_UP)
        <span {{ $attributes->merge(['class' => "badge badge-warning"]) }}>
            {{ __('picked up') }}
        </span>
    @break

    @case(\App\Enums\StatusEnum::DELIVERED)
        <span {{ $attributes->merge(['class' => "badge badge-success"]) }}>
            {{ __('delivered') }}
        </span>
    @break

@endswitch
