@props([ 'active' => $active, 'activeClasses' => 'bg-primary/10 text-primary hover:bg-primary/10 focus:bg-primary/20 dark:hover:bg-primary/10 dark:focus:bg-primary/20'])

<div class="flex flex-col-reverse lg:flex-row">

    <x-card class="grow lg:mr-3">
        <x-slot name="body" {{ $attributes }}>
            {{ $slot }}
        </x-slot>
    </x-card>

    <div class="w-full relative mb-6 lg:w-64 lg:min-w-[16rem] lg:mb-0" x-data="{ expanded: false }">
        <div class="w-full space-y-6 overflow-hidden lg:py-5 lg:max-h-max" :class="expanded ? 'max-h-max' : 'max-h-[11rem]'">

            <div>
                <h3 class="font-semibold text-sm pl-4 mb-2">
                    {{ 'Account' }}
                </h3>

                <a class="flex items-center gap-x-3 relative py-2 px-4 mb-1 w-full cursor-pointer rounded-sm transition text-sm hover:bg-gray-100 focus:bg-gray-200 dark:hover:bg-white/5 dark:focus:bg-white/10
                          {{ strtolower($active) == 'account_data' ? $activeClasses : '' }}" href="{{ route('settings.account_data') }}">

                    <x-icon class="w-5 h-5 text-xl" name="person-outline" library="ion-icon"></x-icon>
                    Account data
                </a>
                <!---->
                <!---->
                <a class="flex items-center gap-x-3 relative py-2 px-4 mb-1 w-full cursor-pointer rounded-sm transition text-sm hover:bg-gray-100 focus:bg-gray-200 dark:hover:bg-white/5 dark:focus:bg-white/10
                          {{ strtolower($active) == 'preferences' ? $activeClasses : '' }}" href="{{ route('settings.preferences') }}">

                    <x-icon class="w-5 h-5 text-xl" name="brush-outline" library="ion-icon"></x-icon>
                    Preferences
                </a>
            </div>

            <div>
                <h3 class="font-semibold text-sm pl-4 mb-2">
                    {{ 'Company' }}
                </h3>

                <a class="flex items-center gap-x-3 relative py-2 px-4 mb-1 w-full cursor-pointer rounded-sm transition text-sm hover:bg-gray-100 focus:bg-gray-200 dark:hover:bg-white/5 dark:focus:bg-white/10
                          {{ strtolower($active) == 'company_data' ? $activeClasses : '' }}" href="{{ route('settings.company_data') }}">

                    <x-icon class="w-5 h-5 text-xl" name="business-outline" library="ion-icon"></x-icon>
                    Company data
                </a>
                <a class="flex items-center gap-x-3 relative py-2 px-4 mb-1 w-full cursor-pointer rounded-sm transition text-sm hover:bg-gray-100 focus:bg-gray-200 dark:hover:bg-white/5 dark:focus:bg-white/10
                          {{ strtolower($active) == 'terms' ? $activeClasses : '' }}" href="{{ route('settings.company_terms') }}">

                    <x-icon class="w-5 h-5 text-xl" name="document-text-outline" library="ion-icon"></x-icon>
                    Terms & Conditions
                </a>
            </div>
        </div>

        <div class="absolute inset-x-0 bottom-0 pointer-events-none flex justify-center pt-10 pb-3 bg-gradient-to-t from-body lg:!hidden" x-show="!expanded">
            <button class="button button-primary button-sm pointer-events-auto" @click="expanded = true">
                View all <i class="fa-solid fa-chevron-down"></i>
            </button>
        </div>
    </div>
</div>

