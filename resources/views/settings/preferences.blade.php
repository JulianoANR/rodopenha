<x-app title="Settings">

    <!-- Header page -->
    <div class="my-6 px-5 md:px-7">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <div class="w-full md:w-max">
                <h1 class="w-full truncate text-2xl mb-1 font-bold text-gray-400 md:text-3xl dark:text-white">
                    Settings account
                </h1>

                <x-breadcrumb :path="['Settings' => route('settings.account_data'), 'Preferences' => route('settings.preferences')]" />
            </div>
        </div>
    </div>

    <section class="px-4 md:px-6">
        <x-settings active="preferences">
            <h2 class="text-xl font-semibold mb-4">
                {{ 'Preferences system' }}
            </h2>

            {{ 'Select from the available themes the one that best suits you:' }}
        </x-settings>
    </section>

</x-app>
