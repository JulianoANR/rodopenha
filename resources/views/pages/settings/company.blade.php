<x-app title="Settings" :active="['item' => 'settings']">

    <!-- Header page -->
    <div class="my-6 px-4 md:px-6">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <div class="w-full md:w-max">
                <h1 class="mb-1 truncate uppercase text-2xl font-bold text-gray-400 dark:text-white">
                    Settings company
                </h1>

                <x-breadcrumb :path="['Settings' => route('settings.account_data'), 'Company' => route('settings.company_data')]" />
            </div>
        </div>
    </div>

    <section class="px-4 md:px-6">
        <x-layouts.settings active="company_data">
            <h2 class="text-xl font-semibold mb-4">
                {{ __('Company data') }}
            </h2>

            <form action="#" method="POST">
                <div class="mb-8 flex items-end gap-x-4">
                    <div class="w-48 h-48 relative">
                        <img class="w-full h-full object-cover rounded-full" src="https://media.ship.cars/media/f1-butom_8dO31W8_LSX3kdk.jpg" alt="">
                    </div>
                </div>

                <div>
                    <!-- AVATAR HERE -->

                    <div class="">

                    </div>
                </div>

                <div class="capitalize">
                    <h1 class="uppercase text-sm font-semibold pl-1 mb-2">
                        <i class="fa-solid fa-building"></i> {{ __('comapany infomation') }}
                    </h1>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-1/2">
                            <label class="text-sm font-semibold pl-1" for="name">{{ __("owner's name") }}</label>
                            <input class="input" value="{{ 'LEONARDO FROEDER' }}" id="name" name="name" type="text">
                        </div>

                        <div class="w-full px-2 mb-4 md:w-1/2">
                            <label class="text-sm font-semibold pl-1" for="address">{{ __('address') }}</label>

                            <div class="relative">
                                <input class="input pl-11" value="15 Glenside Drive Blackstone, MA, 01504" type="text" id="address" name="address">
                                <div class="absolute inset-y-0 left-0 px-4 flex items-center pointer-events-none"><i class="fa-solid fa-map-location-dot"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="capitalize">
                    <h1 class="uppercase text-sm font-semibold pl-1 mb-2 mt-4">
                        <i class="fa-solid fa-phone"></i> {{ __('contact infomation') }}
                    </h1>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-1/3">
                            <label class="text-sm font-semibold pl-1" for="primary_phone">{{ __('primary phone') }}</label>
                            <input class="input" value="{{ '(561) 866-1518' }}" id="primary_phone" name="primary_phone" type="text" x-data  x-mask="(999) 999-9999" placeholder="(___) ___-____">
                        </div>

                        <div class="w-full px-2 mb-4 md:w-1/3">
                            <label class="text-sm font-semibold pl-1" for="secondary_phone">{{ __('secondary phone') }}</label>
                            <input class="input" value="{{ '(561) 866-1518' }}" id="secondary_phone" name="secondary_phone" type="text" x-data x-mask="(999) 999-9999" placeholder="(___) ___-____">
                        </div>

                        <div class="w-full px-2 mb-4 md:w-1/3">
                            <label class="text-sm font-semibold pl-1" for="fax_phone">{{ __('fax number') }}</label>
                            <input class="input" value="{{ '(561) 866-1518' }}" id="fax_phone" name="fax_phone" type="text" x-data x-mask="(999) 999-9999" placeholder="(___) ___-____">
                        </div>

                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1" for="email">{{ __('email') }}</label>

                            <div class="relative">
                                <input class="input pl-11" value="15 Glenside Drive Blackstone, MA, 01504" type="text" id="email" name="email">
                                <div class="absolute inset-y-0 left-0 px-4 flex items-center pointer-events-none"><i class="fa-solid fa-envelope-circle-check"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button class="button button-secondary dark:button-primary uppercase" type="submit">
                        {{ __('save') }}
                    </button>
                </div>
            </form>

        </x-layouts.settings>
    </section>

</x-app>
