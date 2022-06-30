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
        <form action="{{ route('vehicles.store') }}" method="POST">
            @csrf

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
                            {{--<div class="flex flex-wrap -mx-2">
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
                                    <label class="text-sm font-semibold pl-1 mb-2" for="driver">Driver</label>
                                    <x-selects.select-user name="driver" api="{{ route('data.users') }}"></x-selects.select-user>
                                </div>
                            </div> --}}

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-2/6">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="company">Company</label>
                                    <x-input id="company" name="company" type="text"></x-input>
                                </div>
                                <div class="w-full px-2 mb-4 md:w-2/6">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="shift">Shift</label>
                                    <x-input id="shift" name="shift" type="text"></x-input>
                                </div>
                                <div class="w-full px-2 mb-4 md:w-2/6">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="fleet">Fleet</label>
                                    <x-input id="fleet" name="fleet" type="text"></x-input>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-4/6">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="driver">Driver</label>
                                    <x-selects.select-user name="driver" api="{{ route('data.users') }}"></x-selects.select-user>
                                </div>
                                <div class="w-full px-2 mb-4 md:w-1/6">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="license_plate">License plate</label>
                                    <x-input id="license_plate" name="license_plate" type="text"></x-input>
                                </div>
                                <div class="w-full px-2 mb-4 md:w-1/6">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="license_truck">Truck license plate</label>
                                    <x-input id="license_truck" name="license_truck" type="text"></x-input>
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

                                <div x-show="active === 'new'">
                                    <div class="flex flex-wrap -mx-2">
                                        <div class="w-full px-2 mb-4 md:w-4/12">
                                            <label class="text-sm font-semibold pl-1 mb-2" for="trailer_capacity">Capacity</label>
                                            <input class="input" id="trailer_capacity" name="trailer[capacity] " type="text" :disabled="active !== 'new'">
                                        </div>

                                        <div class="w-full px-2 mb-4 md:w-4/12">
                                            <label class="text-sm font-semibold pl-1 mb-2" for="trailer_type">Trailer Type</label>
                                            <select class="input" id="trailer_type" name="trailer[type]">
                                                <option selected value="open">Open</option>
                                                <option value="closed">Closed</option>
                                            </select>
                                        </div>

                                        <div class="w-full px-2 mb-4 md:w-4/12">
                                            <label class="text-sm font-semibold pl-1 mb-2" for="trailer_model">Model</label>
                                            <input class="input" id="trailer_model" name="trailer[model] " type="text" :disabled="active !== 'new'">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end mt-5">
                                <button class="button button-primary uppercase" type="submit">Save Vehicle <i class="fa-solid fa-box-archive"></i></button>
                            </div>
                        </x-slot>
                    </x-card>
                    <!-- End Trailer -->
                </div>
            </div>
        </form>
    </div>

</x-app>
