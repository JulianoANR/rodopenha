<input {{ $attributes->merge(['class' => 'input']) }} value="{{ old($name) }}">

@error($name)
    <span class="text-danger text-[13px] ml-2" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror


{{-- @props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}> --}}
