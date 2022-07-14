
<header class="sticky top-0 z-20 h-16 w-full flex items-center bg-theme shadow-[0_2px_4px_rgba(0,0,0,0.5)] dark:shadow-none">

    <div class="h-16 flex items-center pl-4 md:pl-6 xl:w-72">
        <div class="flex items-center gap-1">

            <button class="-translate-x-2 p-2 text-white rounded-full cursor-pointer hover:transition hover:ease-out hover:bg-white/10 focus:outline-none focus:ring focus:ring-white/20 focus:bg-white/10 xl:hidden" @click="open = !open">
                <svg class="w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
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
            <button x-data="toggleFullScreen" @click="toggle()"
                class="hidden lg:block p-2 text-white rounded-full relative transition ease-out hover:bg-white/10 focus:outline-none focus:ring focus:ring-white/20 focus:bg-white/10"
            >

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
