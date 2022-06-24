<x-app title="Create vehicles" :active="['item' => 'vehicles']">

    <!-- Header page -->
    <div class="my-6 px-4 md:px-6">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <div class="w-full md:w-max">
                <h1 class="w-full truncate text-2xl mb-1 font-bold text-gray-400 md:text-3xl dark:text-white">
                    Create Vehicle
                </h1>

                <x-breadcrumb :path="['Vehicles' => route('vehicles.index'), 'Create vehicle' => route('vehicles.create')]" />
            </div>

            <a class="button button-primary capitalize hidden md:flex" href="{{ route('vehicles.index') }}">
                <x-icon name="arrow-undo" class="w-5 h-5 text-xl" library="ion-icon" />
                {{ __('return') }}
            </a>
        </div>
    </div>

    <!-- Grid cards -->
    <div class="px-4 md:px-6">
        <div class="flex flex-wrap -mx-2 md:-mx-3">
            <div class="w-full px-2 mb-6 md:px-3 md:w-full">

                <!-- Start Vehicle -->
                <x-card class="mb-6">
                    <x-slot name="header">
                        <span>
                            {{ __('Vehicle') }}
                            <i class="ml-1 fa-solid fa-truck-front"></i>
                        </span>
                    </x-slot>

                    <x-slot name="body">
                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-1/3">
                                <label class="text-sm font-semibold pl-1 mb-2" for="make">Make</label>
                                <select class="input" id="payment_type" name="make">
                                    <option>Ford</option>
                                    <option>COD</option>
                                    <option>COP</option>
                                    <option>Billing</option>
                                    <option>uShip</option>
                                </select>
                            </div>
                            <div class="w-full px-2 mb-4 md:w-1/3">
                                <label class="text-sm font-semibold pl-1 mb-2" for="model">Model</label>
                                <input class="input" id="model" name="model" type="text">
                            </div>
                            <div class="w-full px-2 mb-4 md:w-1/3">
                                <label class="text-sm font-semibold pl-1 mb-2" for="model">Driver</label>
                                <input class="input" id="make" name="make" type="text">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-3/5">
                                <label class="text-sm font-semibold pl-1 mb-2" for="company">Company</label>
                                <input class="input" id="company" name="company" type="text">
                            </div>
                            <div class="w-full px-2 mb-4 md:w-1/5">
                                <label class="text-sm font-semibold pl-1 mb-2" for="company">License plate</label>
                                <input class="input" id="company" name="company" type="text">
                            </div>
                            <div class="w-full px-2 mb-4 md:w-1/5">
                                <label class="text-sm font-semibold pl-1 mb-2" for="company">Truck license plate</label>
                                <input class="input" id="company" name="company" type="text">
                            </div>
                        </div>
                    </x-slot>
                </x-card>
                <!-- End Vehicle -->

                <!-- Start Trailer -->
                <x-card>
                    <x-slot name="header">
                        <span>
                            {{ __('Trailer') }}
                            <i class="ml-1 fa-solid fa-caravan"></i>
                        </span>
                    </x-slot>

                    <x-slot name="body">
                        <div x-data="{ active: 'new' }">
                            <div class="flex items-center space-x-2 mb-5">
                                <div class="inline-flex gap-2 p-1 bg-gray-100 rounded dark:bg-white/5">
                                    <button class="button button-sm button-primary" @click="active = 'new'" :class="active === 'new' ? 'button-primary' : 'button-primary-outline'" type="button">
                                        New trailer
                                    </button>

                                    <button class="button button-sm" @click="active = 'bind'" :class="active === 'bind' ? 'button-primary' : 'button-primary-outline'" type="button">
                                        Bind a trailer
                                    </button>
                                </div>

                                <div class="text-xs capitalize font-bold hidden md:block">
                                    Active: <span x-text="active"></span> Trailer
                                </div>
                            </div>
                        </div>
                    </x-slot>
                </x-card>
            </div>
        </div>
    </div>
</x-app>
