@props(['path' => $path, 'initial' => $initial ?? 'Home'])


<nav {{ $attributes->merge(['class' => 'inline-flex items-center space-x-1 md:space-x-3']) }} aria-label="Breadcrumb">

    <a class="inline-flex items-center text-sm font-bold text-primary" href="{{ route('index') }}">
        <x-icon type="house" class="mr-2 w-h h-4" />
        {{ $initial }}
    </a>

    @foreach($path as $url)
        <span class="inline-flex items-center">
            <x-icon type="chevron-forward" class="mr-2 w-h h-4 text-gray-400" />

            <a class="text-sm font-bold text-gray-400 hover:text-gray-500 dark:text-gray-200 dark:hover:text-gray-200" href="{{ $url }}">
                {{ array_keys($path)[$loop->index] }}
            </a>
        </span>
    @endforeach
</nav>
