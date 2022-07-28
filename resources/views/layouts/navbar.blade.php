
<nav
    x-show="navigation" x-cloak
    x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
    x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
    class="fixed z-30 top-0 h-full xl:z-10 xl:!flex xl:z-10 xl:pt-16"
>

    <div class="flex flex-col w-80 h-full bg-theme shadow lg:w-72 xl:bg-aside">
        <div class="w-full h-16 flex items-center justify-between p-4 px-5 xl:hidden">
            <a href="{{  route('index') }}"><x-application-logo type="white" class="h-10" /></a>

            <button class="p-2 text-white rounded-full transition hover:bg-white/10 focus:outline-none focus:ring focus:ring-white/20 focus:bg-white/10" @click="navigation = !navigation">
                <x-icon name="close" library="ion-icon"></x-icon>
            </button>
        </div>

        <div class="h-[calc(100%-4rem)] overflow-y-auto xl:h-full">
            <div class="h-full flex flex-col px-3 py-4 space-y-4 text-white capitalize xl:text-gray-700 xl:pt-6 dark:text-gray-400">

                <div class="space-y-2">
                    <h2 class="font-bold text-xs text-gray-200 ml-2 xl:text-gray-400 dark:text-gray-400 uppercase">
                        {{ __('home') }}
                    </h2>

                    <!-- Start Dashboard -->
                    <a class="flex items-center gap-x-3 relative py-2 px-3 w-full text-current cursor-pointer rounded-sm transition hover:bg-white/10 hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200
                              dark:hover:bg-white/10 dark:focus:bg-white/20 {{ $active['item'] == 'dashboard' ? $activeClasses : '' }}" href="{{ route('dashboard') }}">

                        <x-icon name="pie-chart{{ $active['item'] != 'dashboard' ? '-outline' : '' }}" library="ion-icon"></x-icon>
                        {{ __('dashboard') }}
                    </a>
                    <!-- End Dashboard -->

                    <!-- Start Services -->
                    <div>
                        <button class="flex items-center gap-x-3 relative py-2 px-3 w-full text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200 capitalize
                                       dark:hover:bg-white/10 dark:focus:bg-white/20 {{ $active['item'] == 'service' ? $activeClasses : '' }}" data-trigger="collapse">

                            <x-icon name="mail{{ $active['item'] != 'service' ? '-outline' : '' }}" library="ion-icon"></x-icon>

                            <span class="grow flex justify-between items-center">
                                {{ __('service orders') }}
                                <x-icon class="h-5 w-5 text-xl" name="chevron-down" library="ion-icon"></x-icon>
                            </span>
                        </button>

                        <div class="{{ $active['item'] != 'service' ? 'is-collapsed' : '' }} collapsible mt-2 capitalize space-y-1">
                            <a class="py-2 px-12 block relative text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200 dark:hover:bg-white/5 dark:focus:bg-white/10
                                      before-marker before:absolute before:left-5 before:top-1/2 before:-translate-y-1/2" href="{{ route('service-orders.index')}}">

                                {{ __('all orders') }}
                            </a>

                            <a class="py-2 px-12 block relative text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200 dark:hover:bg-white/5 dark:focus:bg-white/10
                                      before-marker before:absolute before:left-5 before:top-1/2 before:-translate-y-1/2"  href="{{ route('service-orders.create') }}">

                                {{ __('create order') }}
                            </a>
                        </div>
                    </div>
                    <!-- End Services -->

                    <!-- Start Trucks -->
                    <div>
                        <button class="flex items-center gap-x-3 relative py-2 px-3 w-full text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200 capitalize
                                       dark:hover:bg-white/10 dark:focus:bg-white/20 {{ $active['item'] == 'vehicles' ? $activeClasses : '' }}" data-trigger="collapse">

                            <x-icon name="car{{ $active['item'] != 'vehicles' ? '-outline' : '' }}" library="ion-icon"></x-icon>

                            <span class="grow flex justify-between items-center">
                                {{ __('trucks') }}
                                <x-icon class="h-5 w-5 text-xl" name="chevron-down" library="ion-icon"></x-icon>
                            </span>
                        </button>

                        <div class="{{ $active['item'] != 'vehicles' ? 'is-collapsed' : '' }} collapsible mt-2 capitalize space-y-1">
                            <a class="py-2 px-12 block relative text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200 dark:hover:bg-white/5 dark:focus:bg-white/10
                                      before-marker before:absolute before:left-5 before:top-1/2 before:-translate-y-1/2" href="{{ route('trucks.index') }}">

                                {{ __('all trucks') }}
                            </a>

                            <a class="py-2 px-12 block relative text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200 dark:hover:bg-white/5 dark:focus:bg-white/10
                                      before-marker before:absolute before:left-5 before:top-1/2 before:-translate-y-1/2" href="{{ route('trucks.create') }}">

                                {{ __('create truck') }}
                            </a>
                        </div>
                    </div>
                    <!-- End Trucks -->

                    <!-- Start Trips -->
                    <div>
                        <button class="flex items-center gap-x-3 relative py-2 px-3 w-full text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200 capitalize
                                       dark:hover:bg-white/10 dark:focus:bg-white/20 {{ $active['item'] == 'trips' ? $activeClasses : '' }}" data-trigger="collapse">

                            <x-icon name="git-pull-request{{ $active['item'] != 'trips' ? '-outline' : '' }}" library="ion-icon"></x-icon>

                            <span class="grow flex justify-between items-center">
                                {{ __('trips') }}
                                <x-icon class="h-5 w-5 text-xl" name="chevron-down" library="ion-icon"></x-icon>
                            </span>
                        </button>

                        <div class="{{ $active['item'] != 'trips' ? 'is-collapsed' : '' }} collapsible mt-2 capitalize space-y-1">
                            <a class="py-2 px-12 block relative text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200 dark:hover:bg-white/5 dark:focus:bg-white/10
                                      before-marker before:absolute before:left-5 before:top-1/2 before:-translate-y-1/2" href="{{ route('trips.index') }}">

                                {{ __('all trips') }}
                            </a>

                            <a class="py-2 px-12 block relative text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200 dark:hover:bg-white/5 dark:focus:bg-white/10
                                      before-marker before:absolute before:left-5 before:top-1/2 before:-translate-y-1/2" href="#">

                                {{ __('create trip') }}
                            </a>
                        </div>
                    </div>
                    <!-- End Trips -->

                    <!-- Start Users -->
                    <a class="flex items-center gap-x-3 relative py-2 px-3 w-full text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200
                              dark:hover:bg-white/10 dark:focus:bg-white/20 {{ $active['item'] == 'users' ? $activeClasses : '' }}" href="{{ route('users.index') }}">

                        <x-icon name="person{{ $active['item'] != 'users' ? '-outline' : '' }}" library="ion-icon"></x-icon>
                        {{ __('users') }}
                    </a>
                    <!-- End Users -->

                    <!-- Start Settings -->
                    <div>
                        <button class="flex items-center gap-x-3 relative py-2 px-3 w-full capitalize text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200
                                       dark:hover:bg-white/10 dark:focus:bg-white/20 {{ $active['item'] == 'settings' ? $activeClasses : '' }}" data-trigger="collapse">

                            <x-icon name="settings{{ $active['item'] != 'settings' ? '-outline' : '-sharp' }}" library="ion-icon"></x-icon>

                            <span class="grow flex justify-between items-center">
                                {{ __('settings') }}
                                <x-icon class="h-5 w-5 text-xl" name="chevron-down" library="ion-icon"></x-icon>
                            </span>
                        </button>

                        <div class="{{ $active['item'] != 'settings' ? 'is-collapsed' : '' }} collapsible mt-2 capitalize space-y-1">
                            <a class="py-2 px-12 block relative text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200 dark:hover:bg-white/5 dark:focus:bg-white/10
                                      before-marker before:absolute before:left-5 before:top-1/2 before:-translate-y-1/2" href="{{ route('settings.account_data') }}">

                                {{ __('account data') }}
                            </a>

                            <a class="py-2 px-12 block relative text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200 dark:hover:bg-white/5 dark:focus:bg-white/10
                                      before-marker before:absolute before:left-5 before:top-1/2 before:-translate-y-1/2" href="{{ route('settings.preferences') }}">

                                {{ __('preferences') }}
                            </a>

                            <a class="py-2 px-12 block relative text-sm text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200 dark:hover:bg-white/5 dark:focus:bg-white/10
                                      before-marker before:absolute before:left-5 before:top-1/2 before:-translate-y-1/2" href="{{ route('settings.company_data') }}">

                                {{ __('company data') }}
                            </a>

                            <a class="py-2 px-12 block relative text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200 dark:hover:bg-white/5 dark:focus:bg-white/10
                                      before-marker before:absolute before:left-5 before:top-1/2 before:-translate-y-1/2" href="{{ route('settings.company_terms') }}">

                                {{ __('terms & conditions') }}
                            </a>
                        </div>
                    </div>
                    <!-- End Settings -->
                </div>

                <div class="space-y-2">
                    <h2 class="font-semibold text-gray-200 ml-2 xl:text-gray-500 dark:text-gray-200">
                        {{ 'finances' }}
                    </h2>

                    <!-- Start Finances Painel -->
                    <a class="flex items-center gap-x-3 relative py-2 px-3 w-full text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200
                              dark:hover:bg-white/10 dark:focus:bg-white/20" href="{{ route('finance.dashboard') }}">

                        <x-icon name="cash-outline" library="ion-icon"></x-icon>
                        {{ __('financial panel') }}
                    </a>
                    <!-- End Finances Painel -->

                    <!-- Start Incomes -->
                    <a class="flex items-center gap-x-3 relative py-2 px-3 w-full text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200
                              dark:hover:bg-white/10 dark:focus:bg-white/20" href="{{ route('finance.dashboard') }}">

                        <x-icon name="arrow-down-circle-outline" library="ion-icon"></x-icon>
                        {{ __('incomes') }}
                    </a>
                    <!-- End Incomes -->

                    <!-- Start Expenses -->
                    <a class="flex items-center gap-x-3 relative py-2 px-3 w-full text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200
                              dark:hover:bg-white/10 dark:focus:bg-white/20" href="{{ route('finance.dashboard') }}">

                        <x-icon name="arrow-up-circle-outline" library="ion-icon"></x-icon>
                        {{ __('expenses') }}
                    </a>
                    <!-- End Expenses -->

                    <!-- Start inventory -->
                    <a class="flex items-center gap-x-3 relative py-2 px-3 w-full text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200
                              dark:hover:bg-white/10 dark:focus:bg-white/20" href="#">

                        <x-icon name="bag-outline" library="ion-icon"></x-icon>
                        {{ __('inventory') }}
                    </a>
                    <!-- End inventory -->
                </div>
            </div>
        </div>
    </div>
</nav>

<div
    class="fixed  z-20 inset-0 bg-zinc-900/60 transition-opacity xl:!hidden"
    x-show="navigation" x-cloak
    x-transition:enter="ease-in-out duration-500"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="ease-in-out duration-500"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    @click="navigation = false"
><!-- Overlay Navigation --></div>
