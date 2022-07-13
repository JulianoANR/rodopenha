<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('header')

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icon.png') }}">

    <title>{{ $title }} | RODOPENHA</title>

    {{-- FlowBite --}}
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />

    {{-- Fonts --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    {{-- Datatable Style --}}
    <link href="{{ asset('assets/datatables-1.12.1/datatables.min.css') }}" rel="stylesheet">

    {{-- Fontawesome 6.1.1 --}}
    <link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet">

    {{-- Pace Loading --}}
    <script src="{{ asset('assets/pace/pace.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/pace/minimal.css') }}">

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')

    {{-- Ion-icon --}}
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    {{-- Init preferences --}}
    <x-layouts.init-preferences />

</head>
<body {{ $attributes }}>

    <div id="app" x-data="{ open: false }">

        <!-- Wrapper App -->
        <div class="flex flex-col w-full h-screen !overflow-y-auto overflow-x-hidden relative" id="wrapper_global">

            <!-- Header -->
            <header class="sticky top-0 z-20 h-16 w-full flex items-center bg-theme shadow-[0_2px_4px_rgba(0,0,0,0.5)] dark:shadow-none">

                <div class="h-16 flex items-center pl-4 md:pl-6 xl:w-72">
                    <div class="flex items-center gap-1">

                        <button class="-translate-x-2 p-2 text-white rounded-full cursor-pointer hover:transition hover:ease-out hover:bg-white/10 focus:outline-none focus:ring focus:ring-white/20 focus:bg-white/10 xl:hidden" @click="open = !open">
                            <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                        </button>

                        <div>
                            <!-- Brand -->
                            <a href="{{ route('index') }}">
                                <x-application-logo type="white" class="h-8 md:h-10" />
                            </a>
                        </div>
                    </div>
                </div>

                <div class="grow h-16 flex justify-end items-center pr-4 md:pr-6 lg:px-6 lg:justify-between">

                    <div class="flex items-center gap-2">
                        <!-- Start Search DESKTOP -->
                        <form class="hidden lg:block relative" method="GET" action="#">

                            <div>
                                <input class="bg-white/5 w-80 py-2.5 px-12 text-sm text-gray-100 rounded border-0 focus:ring-0 placeholder-gray-200 xl:w-[26rem]" placeholder="{{  __('Search') }}"  type="text">

                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-white pointer-events-none">
                                    <x-icon class="w-5 h-5 text-xl" name="search-outline" library="ion-icon"></x-icon>
                                </div>

                                <button class="absolute right-2 top-1/2 -translate-y-1/2 text-white transition p-1.5 rounded-full hover:bg-white/10" type="button">
                                    <x-icon class="w-5 h-5 text-xl" name="options" library="ion-icon"></x-icon>
                                </button>
                            </div>

                            <div class="hidden animate-fade-up"></div>
                        </form>
                        <!-- End Search DESKTOP -->
                    </div>

                    <div class="flex items-center gap-2">
                        <!-- Start FullScreen -->
                        <button class="hidden lg:block p-2 text-white rounded-full relative transition ease-out hover:bg-white/10 focus:outline-none focus:ring focus:ring-white/20 focus:bg-white/10"
                                x-data="toggleFullScreen" @click="toggle()">

                            <span :class="active ? 'hidden' : 'block'">
                                <x-icon name="expand" library="ion-icon"></x-icon>
                            </span>

                            <span :class="active ? 'block' : 'hidden'">
                                <x-icon name="contract" library="ion-icon"></x-icon>
                            </span>
                        </button>
                        <!-- End FullScreen -->

                        <!-- Start Search MOBILE -->
                        <div class="sm:relative lg:hidden">
                            <button class="flex gap-2 p-2 text-white rounded-full relative transition ease-out hover:bg-white/10 focus:outline-none focus:ring focus:ring-white/20 focus:bg-white/10"
                                    data-trigger="dropdown" data-dropdown-sensible aria-expanded="false">

                                <x-icon name="search-outline" library="ion-icon"></x-icon>
                            </button>

                            <div class="hidden animate-fade-up absolute right-2 top-[4.75rem] w-[calc(100%-1rem)] rounded shadow bg-white p-2 border border-slate-200 sm:w-[350px] sm:right-0 sm:top-16
                                        dark:bg-header dark:border-zinc-800 dark:shadow-lg">

                                <form class="flex" action="#" method="GET" data-trigger="collapse">

                                    <input class="grow bg-gray-100 text-sm rounded-l-sm border-0 focus:ring-0 dark:bg-white/5 dark:placeholder-gray-200 dark:text-gray-200"
                                           placeholder="{{  __('Search') }}" id="search-mobile" name="search" type="text" spellcheck="false" autocomplete="off">

                                    <button class="button button-secondary rounded-l-none dark:button-primary">
                                        <x-icon class="w-5 h-5 text-xl" name="search-outline" library="ion-icon" />
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- End Search MOBILE -->

                        <!-- Start Notifications -->
                        <!-- <div class="sm:relative">
                            <button class="p-2 text-white rounded-full relative transition ease-out hover:bg-white/10 focus:outline-none focus:ring focus:ring-white/20 focus:bg-white/10"
                                    data-trigger="dropdown" data-dropdown-sensible aria-expanded="false">

                                <x-icon name="notifications" library="ion-icon"></x-icon>

                                @if(true)
                                    <span class="absolute top-0 right-0 w-[16px] h-[16px] bg-red-500 text-[11px] text-white shadow rounded-full">
                                        1
                                    </span>
                                @endif
                            </button>

                            <div class="hidden animate-fade-up absolute right-2 top-[4.75rem] w-[calc(100%-1rem)] rounded shadow-md bg-white py-2 border border-slate-200 sm:w-[350px] sm:right-0 sm:top-16
                                        dark:bg-header dark:border-zinc-800 dark:shadow-lg">


                                <div class="flex items-center justify-between px-4 py-2 text-gray-500 font-semibold dark:text-gray-200">
                                    {{ __('Notifications') }}

                                    <span class="badge badge-danger">
                                        1
                                    </span>
                                </div>


                                <div class="flex flex-col divide-y overflow-y-auto max-h-64 dark:divide-zinc-700">

                                    <a class="px-4 py-2 block text-sm text-gray-700 cursor-pointer transition ease-out hover:bg-gray-100 focus:bg-gray-200
                                              dark:text-gray-300 dark:hover:bg-white/5 dark:focus:bg-white/10" href="#">

                                        <span>
                                            ❤ Welcome and may our space be conducive to your development and may we grow together!
                                        </span>

                                        <div class="flex justify-end text-xs font-medium text-gray-400 mt-2">
                                            Nov 24, 2003
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div> -->
                        <!-- End Notifications -->

                        <!-- Start User Options -->
                        <div class="relative">
                            <button class="flex items-center justify-center space-x-2 text-white ml-2" data-trigger="dropdown" data-dropdown-sensible>

                                <div class="relative">
                                    <x-avatar-user :user="Auth::user()" />
                                    <span class="-bottom-0.5 -right-0.5 absolute w-3.5 h-3.5 bg-green-400 border-2 border-theme rounded-full dark:border-zinc-800"></span>
                                </div>

                                <span class="hidden text-sm text-current font-medium sm:block lg:text-base">
                                    {{ Auth::user()->name }}
                                </span>

                                <x-icon name="chevron-down" class="w-5 h-5 text-xl" library="ion-icon" />
                            </button>

                            <div class="hidden animate-zoom-in origin-top-right absolute right-0 top-14 rounded text-[15px] shadow bg-white py-2 min-w-[200px] border border-slate-200
                                        dark:bg-header dark:border-zinc-800 dark:shadow-lg">

                                <a class="flex items-center space-x-4 w-full px-4 py-2 text-gray-700 capitalize cursor-pointer transition hover:bg-gray-100 focus:bg-gray-200
                                          dark:text-gray-100 dark:hover:bg-white/5 dark:focus:bg-white/10" href="#">

                                    <i class="fa-solid fa-user"></i>
                                    <span>{{ __('profile') }}</span>
                                </a>

                                <a class="flex items-center space-x-4 w-full px-4 py-2 text-gray-700 capitalize cursor-pointer transition hover:bg-gray-100 focus:bg-gray-200
                                          dark:text-gray-100 dark:hover:bg-white/5 dark:focus:bg-white/10" href="{{ route('settings.account_data') }}">

                                    <i class="fa-solid fa-gear"></i>
                                    <span>{{ 'settings' }}</span>
                                </a>

                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf

                                    <button class="flex items-center space-x-4 px-4 py-2 text-gray-700 capitalize border-t w-full cursor-pointer transition hover:text-white hover:bg-red-400 focus:text-white focus:bg-red-500
                                                   dark:text-gray-100 dark:hover:bg-white/5 dark:focus:bg-white/10 dark:border-zinc-700" type="submit">

                                        <i class="fa-solid fa-power-off"></i>
                                        <span>{{ __('logout') }}</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- End User Options -->
                    </div>
                </div>
            </header>

            <!-- Navbar -->
            <div>
                <nav
                    x-show="open" x-cloak
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

                            <button class="p-2 text-white rounded-full transition hover:bg-white/10 focus:outline-none focus:ring focus:ring-white/20 focus:bg-white/10" @click="open = !open">
                                <x-icon name="close" library="ion-icon"></x-icon>
                            </button>
                        </div>

                        <div class="h-[calc(100%-4rem)] overflow-y-auto xl:h-full xl:pt-4">
                            <div class="h-full flex flex-col pt-2 px-3 pb-4 space-y-4 text-white xl:text-gray-700 dark:text-gray-400 capitalize">

                                <div class="space-y-2">
                                    <h2 class="font-semibold text-gray-200 ml-2 xl:text-gray-500 dark:text-gray-200">
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

                                            <a class="py-2 px-12 block relative text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200 dark:hover:bg-white/5 dark:focus:bg-white/10
                                                      before-marker before:absolute before:left-5 before:top-1/2 before:-translate-y-1/2"  href="#">

                                                {{ __('archived orders') }}
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Services -->

                                    <!-- Start Vehicles -->
                                    <div>
                                        <button class="flex items-center gap-x-3 relative py-2 px-3 w-full text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200 capitalize
                                                dark:hover:bg-white/10 dark:focus:bg-white/20 {{ $active['item'] == 'vehicles' ? $activeClasses : '' }}" data-trigger="collapse">

                                            <x-icon name="car{{ $active['item'] != 'vehicles' ? '-outline' : '' }}" library="ion-icon"></x-icon>

                                            <span class="grow flex justify-between items-center">
                                                {{ __('vehicles') }}
                                                <x-icon class="h-5 w-5 text-xl" name="chevron-down" library="ion-icon"></x-icon>
                                            </span>
                                        </button>

                                        <div class="{{ $active['item'] != 'vehicles' ? 'is-collapsed' : '' }} collapsible mt-2 capitalize space-y-1">
                                            <a class="py-2 px-12 block relative text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200 dark:hover:bg-white/5 dark:focus:bg-white/10
                                                      before-marker before:absolute before:left-5 before:top-1/2 before:-translate-y-1/2" href="{{ route('vehicles.index') }}">

                                                {{ __('all vehicles') }}
                                            </a>

                                            <a class="py-2 px-12 block relative text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200 dark:hover:bg-white/5 dark:focus:bg-white/10
                                                      before-marker before:absolute before:left-5 before:top-1/2 before:-translate-y-1/2" href="{{ route('vehicles.create') }}">

                                                {{ __('create vehicle') }}
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Vehicles -->

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
                                        <button class="flex items-center gap-x-3 relative py-2 px-3 w-full text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200
                                               dark:hover:bg-white/10 dark:focus:bg-white/20 {{ $active['item'] == 'settings' ? $activeClasses : '' }}" data-trigger="collapse">

                                            <x-icon name="settings{{ $active['item'] != 'settings' ? '-outline' : '-sharp' }}" library="ion-icon"></x-icon>

                                            <span class="grow flex justify-between items-center">
                                                Settings
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

                                        <x-icon name="arrow-back" library="ion-icon"></x-icon>
                                        {{ __('incomes') }}
                                    </a>
                                    <!-- End Incomes -->

                                    <!-- Start Expenses -->
                                    <a class="flex items-center gap-x-3 relative py-2 px-3 w-full text-current cursor-pointer rounded-sm transition hover:bg-white/10 focus:outline-none xl:hover:bg-gray-100 xl:focus:bg-gray-200
                                              dark:hover:bg-white/10 dark:focus:bg-white/20" href="{{ route('finance.dashboard') }}">

                                        <x-icon name="arrow-forward" library="ion-icon"></x-icon>
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
                    x-show="open" x-cloak
                    x-transition:enter="ease-in-out duration-500"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in-out duration-500"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    @click="open = !open"
                ><!-- Overlay Navigation --></div>
            </div>

            <!-- Page Content -->
            <div class="grow flex flex-col bg-body xl:ml-72">
                @if(Session::has('flash_message'))
                    <x-alert status="{{ Session::get('flash_message')['class'] }}" msg="{{ Session::get('flash_message')['msg'] }}"/>
                @endif

                <main class="grow pb-12">
                    {{ $slot }}
                </main>

                <x-layouts.footer />
            </div>
        </div>
    </div>

    @stack('outside')

    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/datatables-1.12.1/datatables.min.js') }}"></script>

    @stack('scripts')
</body>
</html>
