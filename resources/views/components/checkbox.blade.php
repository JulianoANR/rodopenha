@props(['formatted' => str_replace(']', '', str_replace('[', '.', $name))])

<input {{ $attributes->merge(['class' => 'checkbox']) }} type="checkbox" @checked(old($formatted))>
