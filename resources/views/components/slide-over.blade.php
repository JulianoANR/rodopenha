
@push('outside')
    <div
        class="relative z-20"
        x-data="slideOver({{ $initialState }}, '{{ $id }}')" x-cloak
        :class="{ 'pointer-events-none': !open }"

        aria-labelledby="slide-over-title"
        role="dialog"
        aria-modal="true"
    >

        <div
            class="fixed inset-0 bg-zinc-900/60 transition-opacity"
            x-show="open"
            x-transition:enter="ease-in-out duration-500"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in-out duration-500"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="open = !open"
        ></div>

        <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full">

            <div
                class="pointer-events-auto relative flex flex-col bg-white dark:bg-aside"
                x-show="open"
                x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
                @slide-over.window="toggleOutside($event.detail)"
            >

                <!-- Header -->
                <div class="p-6 bg-gray-100 dark:bg-theme">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-300">
                            {{ $title }}
                        </h2>

                        <button class="text-gray-900 dark:text-gray-300" @click="open = false">
                            <x-icon name="arrow-forward" library="ion-icon"></x-icon>
                        </button>
                    </div>

                    @if($label !== "null")
                        <div class="w-full mt-2">
                            Get started by filling in the information below to create your new project.
                        </div>
                    @endif
                </div>

                <!-- Content -->
                <div {{ $attributes->merge(['class' => 'w-full grow w-screen md:max-w-md overflow-y-auto p-4 md:px-6']) }}>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
@endpush
