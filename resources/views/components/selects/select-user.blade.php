<div
    x-data="SelectUser({ api: '{{ $api }}', old: '{{ $value }}' })"
    @click.outside="open = false"
    class="relative"
>

    <!-- Button -->
    <button class="input pl-3 pr-10 py-2 @error($formatted) is-border-danger @enderror" type="button" @click="toggle()">
        <span class="flex items-center justify-start min-h-[1.5rem]">

            <template x-if="photo === null">
                <div class="w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center dark:bg-white/5">
                    <i class="text-[10px] text-gray-700 dark:text-gray-300 fas fa-user"></i>
                </div>
            </template>

            <template x-if="photo !== null">
                <img :src="photo" :alt="`photo-${value}`" class="flex-shrink-0 h-6 w-6 rounded-full">
            </template>

            <span class="text-base block truncate ml-3" x-text="label"></span>
            <input class="hidden" name="{{ $name }}" type="text" x-model="value">
        </span>

        <span class="absolute inset-y-0 right-0 px-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </span>
    </button>

    <!-- Wrapper items -->
    <div
        x-show="open" x-cloak
        x-transition:enter="transition ease-in-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-5"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in-out duration-300"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-5"
        class="absolute z-10 w-full mt-2 rounded shadow-md bg-white border border-gray-300 dark:bg-header dark:border-zinc-700 dark:shadow-lg"
    >

        <div class="relative mx-2 my-2">
            <input class="input rounded-md focus:ring-1 pr-11" x-model="search" type="text" placeholder="Search">

            <button
                x-show="!loading"
                @click="search = ''"
                type="button"
                class="absolute inset-y-0 right-0 px-4 flex items-center pointer-pointer text-gray-400 hover:text-gray-500"
            >
                <i class="fa-solid fa-circle-xmark"></i>
            </button>

            <span x-show="loading" class="animate-spin absolute inset-y-0 right-0 px-4 flex items-center pointer-pointer text-gray-400">
                <i class="fa-solid fa-spinner"></i>
            </span>
        </div>

        <div class="max-h-56 overflow-y-auto pb-2">
            <template x-for="user in filteredItems" :key="user.id">

                <div
                    @click="selectItem(user.id, user.name)" tabindex="1"
                    :class="{ 'bg-gray-50 dark:bg-white/5': value === user.id }"
                    class="relative cursor-pointer select-none py-2 pl-3 pr-10 hover:bg-gray-100 dark:hover:bg-white/5"
                >
                    <div class="flex items-center space-x-3">
                        <x-avatar-user
                            :user="Auth::user()"
                            class="!h-6 !w-6"
                        ></x-avatar-user>

                        <span
                            x-text="user.name"
                            class="text-base block truncate text-gray-700 dark:text-gray-300"
                        ></span>

                        <!-- Checked -->
                        <div
                            x-show="value === user.id" x-transition.opacity
                            class="text-primary absolute inset-y-0 right-0 px-3 flex items-center pointer-events-none">

                            <x-icon
                                class="w-5 h-5 text-xl"
                                name="checkmark-done-outline"
                                library="ion-icon"
                            ></x-icon>
                        </div>
                    </div>
                </div>
            </template>

            <div class="py-2 px-3 flex items-center text-gray-400" x-show="showing === 0">
                <i class="mr-2 fa-solid fa-ban"></i> No items available
            </div>
        </div>
    </div>
</div>

@error($formatted)
    <span class="inline-block uppercase text-danger text-[12px] pl-2 mt-1" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
