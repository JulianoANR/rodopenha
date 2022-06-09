<x-app title="Dashboard">

    <!-- Header page -->
    <div class="my-6 px-4 md:px-6">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <div class="w-full md:w-max">
                <h1 class="w-full truncate text-2xl mb-1 font-bold text-gray-400 md:text-3xl dark:text-white">
                    Hello {{ Auth::user()->name }}
                </h1>

                <x-breadcrumb :path="['Dashboard' => route('dashboard')]" />
            </div>

            <button class="button button-primary hidden md:flex">
                New document <i class="fa-solid fa-file-arrow-down"></i>
            </button>
        </div>
    </div>

    {{-- <div class="my-6 px-4 md:px-6">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-400 dark:text-white">
                Dashboard
            </h1>

            <x-breadcrumb :path="['Dashboard' => route('dashboard')]" />
        </div>
    </div> --}}



    <!-- Grid Cards -->
    <div class="px-4 md:px-6">
        {{-- <div class="grid gap-6 md:grid-cols-2">
            <div class="p-2 bg-white shadow rounded-sm dark:bg-zinc-800">

            </div>
        </div> --}}

        <div class="grid gap-6 sm:grid-cols-3">

            <div class="card card-primary animate-up">
                <div class="card-body p-5 flex items-center space-x-4">

                    <div class="grow">
                        <h3 class="text-2xl font-semibold text-white">{{ '0 Orders' }}</h3>

                        <div class="font-semibold text-gray-100">
                            {{ __('Pickup') }}
                        </div>

                        <div class="mt-4 text-xs text-gray-200">
                            <span class="font-bold mr-2">
                                <i class="fa-solid fa-arrow-trend-up"></i>
                                {{-- {{ 'TODAY' }} --}}
                            </span>

                            {{ __('For today') }}
                        </div>
                    </div>

                        <div class="w-12 h-12 bg-white/20 text-white flex items-center justify-center rounded-full">
                        <i class="fa-solid fa-user-group"></i>
                    </div>
                </div>
            </div>

            <div class="card card-success animate-up">
                <div class="card-body p-5 flex items-center space-x-4">

                    <div class="grow">
                        <h3 class="text-2xl font-semibold text-white">{{ '0 Orders' }}</h3>

                        <div class="font-semibold text-gray-100">
                            {{ 'Delivery' }}
                        </div>

                        <div class="mt-4 text-xs text-gray-200">
                            <span class="mr-2 rounded-full">
                                <i class="fa-solid fa-ban"></i>
                                {{-- {{ '--' }} --}}
                            </span>

                            {{ __('For today') }}
                        </div>
                    </div>

                    <div class="w-12 h-12 bg-white/20 text-white flex items-center justify-center rounded-full">
                        <i class="fa-solid fa-money-bill-transfer"></i>
                    </div>
                </div>
            </div>

            <div class="card card-orange animate-up">
                <div class="card-body p-5 flex items-center space-x-4">

                    <div class="grow">
                        <h3 class="text-2xl font-semibold text-white">{{ '0 Payments' }}</h3>

                        <div class="font-semibold text-gray-100">
                            {{ __('Pending') }}
                        </div>

                        <div class="mt-4 text-xs text-gray-200">
                            <span class="font-bold mr-2">
                                <i class="fa-solid fa-arrow-trend-down"></i>
                                {{-- {{ '1.5%' }} --}}
                            </span>

                            {{ __('For today') }}
                        </div>
                    </div>

                    <div class="w-12 h-12 bg-white/20 text-white flex items-center justify-center rounded-full">
                        <i class="fa-solid fa-sack-dollar"></i>
                    </div>
                </div>
            </div>
        </div>
        {{-- End cards --}}

        {{-- Table activity --}}
            
        {{-- End table activity --}}
    </div>

</x-app>


