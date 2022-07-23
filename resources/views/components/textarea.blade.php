@props(['formatted' => str_replace(']', '', str_replace('[', '.', $name))])

<textarea {{ $attributes->merge(['class' => "input" . ($errors->has($formatted) ? ' is-border-danger' : '')]) }}>{{ old($formatted) }}</textarea>

@error($formatted)
    <span class="inline-block uppercase text-danger text-[12px] pl-2" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
