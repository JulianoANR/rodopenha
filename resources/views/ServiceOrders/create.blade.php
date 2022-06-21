<x-app title="New Service Order" :active="['item' => 'service']">

    <!-- Header page -->
    <div class="my-6 px-4 md:px-6">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <div class="w-full md:w-max">
                <h1 class="w-full truncate text-2xl mb-1 font-bold text-gray-400 md:text-3xl dark:text-white">
                    Create New Service Order
                </h1>

                <x-breadcrumb :path="['Service Orders' => route('service-orders.index'), 'New Service Order' => route('service-orders.create')]" />
            </div>

            <a href="{{ route('service-orders.index') }}" class="button button-primary capitalize hidden md:flex">
                <x-icon name="arrow-undo" class="w-5 h-5 text-xl" library="ion-icon" />
                {{ __('return') }}
            </a>
        </div>
    </div>

    <!-- Grid Cards -->
    <div class="px-4 md:px-6">
        <form action="{{ route('service-orders.store') }}" method="POST">
            @csrf

            <div class="flex justify-center items-center w-full">
                <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-40 p-4 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer hover:bg-gray-100
                                                  dark:bg-white/5 dark:hover:bg-white/10 dark:border-zinc-700">

                    <div class="flex flex-col justify-center items-center pt-5 pb-6">
                        <svg class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Drop</span> dispatch sheet</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            Drag and Drop file(s) anywhere and they will automatically upload. Verify the uploaded information and manually fill out the missing details.
                        </p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" />
                </label>
            </div>

            <div class="grid gap-6 mt-6">

                <!-- Start Orders -->
                <x-card>
                    <x-slot name="header">
                        <span>{{ __('Order') }} <i class="ml-1 fa-solid fa-clipboard-list"></i></span>
                    </x-slot>

                    <x-slot name="body">
                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-1/3">
                                <label class="text-sm font-semibold pl-1 mb-2" for="load_id">ID Load</label>
                                <input class="input" id="load_id" name="basic[load_id]" type="text">
                            </div>

                            <div class="w-full px-2 mb-4 md:w-1/3">
                                <label class="text-sm font-semibold pl-1 mb-2" for="trailer_type">Trailer Type</label>
                                <select class="input" id="trailer_type" name="basic[trailer_type]">
                                    <option selected value="open">Open</option>
                                    <option value="closed">Closed</option>
                                </select>
                            </div>

                            <div class="w-full px-2 mb-4 md:w-1/3">
                                <label class="text-sm font-semibold pl-1 mb-2" for="inspection_type">Inspection Type</label>
                                <select class="input" id="inspection_type" name="basic[inspection_type]">
                                    <option selected value="standart">Standart</option>
                                    <option value="M22">M22</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-3">
                            <label for="dispatch_instructions" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Dispatch Instructions</label>
                            <textarea class="input" id="dispatch_instructions" name="basic[dispatch_instructions]" rows="4" placeholder="{{ __('Add some shipping instructions') }}"></textarea>
                        </div>
                    </x-slot>
                </x-card>
                <!-- End Orders -->

                <!-- Start Vehicles -->
                <x-card>
                    <x-slot name="header">
                        <span>{{ __('Vehicles') }} <i class="ml-1 fa-solid fa-truck-front"></i></span>
                    </x-slot>

                    <x-slot name="body">
                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-3/12">
                                <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_vin">VIN</label>
                                <input class="input" id="vehicle_vin" name="vehicle_vin" type="text">
                            </div>

                            <div class="w-full px-2 mb-4 md:w-3/12">
                                <label class="text-sm font-semibold pl-1 mb-2" for=vehicle_"make">Make</label>
                                <input class="input" id="vehicle_make" name="vehicle_make" type="text">
                            </div>

                            <div class="w-full px-2 mb-4 md:w-3/12">
                                <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_model">Model</label>
                                <input class="input" id="vehicle_model" name="vehicle_model" type="text">
                            </div>

                            <div class="w-full px-2 mb-4 md:w-3/12 grid md:grid-cols-2 gap-4">
                                <div class="w-full">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_year">Year</label>
                                    <input class="input" id="vehicle_year" name="vehicle_year" type="number" placeholder="YYYY">
                                </div>
                                <div class="w-full">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_color">Color</label>
                                    <input class="input" id=vehicle_"color" name="vehicle_color" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-3/12">
                                <label class="text-sm font-semibold pl-1 mb-2" for="operable">Operable</label>
                                <select class="input" id="operable" name="vehicle_operable">
                                    <option selected value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="w-full px-2 mb-4 md:w-3/12">
                                <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_type">Type</label>
                                <select class="input" id="vehicle_type" name="vehicle_type">
                                    <option selected>Sedan</option>
                                    <option>Van</option>
                                    <option>Mini-Van</option>
                                    <option>Motorcycle</option>
                                    <option>Pickup</option>
                                    <option>SUV</option>
                                </select>
                            </div>
                            <div class="w-full px-2 mb-4 md:w-3/12">
                                <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_lot">Lot Number</label>
                                <input class="input" id="vehicle_lot" name="vehicle_lot" type="text">
                            </div>
                            <div class="w-full px-2 mb-4 md:w-3/12">
                                <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_buyer">Buyer</label>
                                <input class="input" id="vehicle_buyer" name="vehicle_buyer" type="text">
                            </div>
                        </div>
                    </x-slot>
                </x-card>
                <!-- End Vehicle -->

                <!-- Start Pickup -->
                <x-card>
                    <x-slot name="header">
                        <span>{{ __('Pickup') }} <i class="ml-1 fa-solid fa-map-location-dot"></i></span>
                    </x-slot>

                    <x-slot name="body">
                        <div x-data="{ active: 'business' }">
                            <div class="flex items-center space-x-2 mb-5">
                                <div class="inline-flex gap-2 p-1 bg-gray-100 rounded-sm dark:bg-white/5">
                                    <button class="button button-sm button-primary" @click="active = 'personal'" :class="active === 'personal' ? 'button-primary' : 'button-primary-outline'" type="button">
                                        Personal Contact
                                    </button>

                                    <button class="button button-sm" @click="active = 'business'" :class="active === 'business' ? 'button-primary' : 'button-primary-outline'" type="button">
                                        Business Contact
                                    </button>
                                </div>

                                <div class="text-xs capitalize font-bold hidden md:block">
                                    Active: <span x-text="active"></span> Contact
                                </div>
                            </div>

                            <div x-show="active === 'business'">
                                <div class="flex flex-wrap -mx-2">
                                    <div class="w-full px-2 mb-4 md:w-8/12">
                                        <label class="text-sm font-semibold pl-1 mb-2" for="pickup_company">Company Name</label>
                                        <input class="input" id="pickup_company" name="pickup[company] " type="text" :disabled="active !== 'business'">
                                    </div>

                                    <div class="w-full px-2 mb-4 md:w-2/12">
                                        <label class="text-sm font-semibold pl-1 mb-2" for="pickup_working_from">Working from</label>
                                        <input class="input" id="pickup_working_from" name="pickup[working_from]" type="time" :disabled="active !== 'business'">
                                    </div>

                                    <div class="w-full px-2 mb-4 md:w-2/12">
                                        <label class="text-sm font-semibold pl-1 mb-2" for="pickup_working_to">Working to</label>
                                        <input class="input" id="pickup_working_to" name="pickup[working_to]" type="time" :disabled="active !== 'business'">
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="pickup_name">Contact Name</label>
                                    <input class="input" id="pickup_name" name="pickup[name]" type="text">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="pickup_email">Contact Email</label>
                                    <input class="input" id="pickup_email" name="pickup[email]" type="email">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="pickup_phone">Contact Phone</label>
                                    <input class="input" id="pickup_phone" name="pickup[phone]" type="text" x-mask="(999) 999-9999" placeholder="(___) ___-____">
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="pickup_address">Address</label>
                                    <input class="input" id="pickup_address" name="pickup[address]" type="text">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="pickup_notes">Notes</label>
                                    <input class="input" id="pickup_notes" name="pickup[notes]" type="text">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="pickup_zip">Zip</label>
                                    <input class="input" id="pickup_zip" name="pickup[zip]" type="text">
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-1/2">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="pickup_date">Pickup date</label>
                                    <input class="input" id="pickup_date" name="pickup[date]" type="date">
                                </div>
                                <div class="w-full px-2 mb-4 md:w-1/2">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="pickup_restrictions">Restrictions</label>

                                    <select class="input" id="pickup_restrictions" name="pickup[restrictions]" disabled>
                                        <option selected>No restrictions</option>
                                    </select>
                                </div>

                                <div class="w-full mt-2 px-2 mb-4">
                                    <div class="inline-flex items-center gap-3 ml-1">
                                        <input class="checkbox scale-110" id="pickup_signature" name="pickup[signature]" type="checkbox">
                                        <label class="font-semibold text-base capitalize cursor-pointer select-none" for="pickup_signature">
                                            {{ __('signature not required') }}

                                            <div class="inline relative" x-data="{ tooltip: false }">
                                                <i class="ml-1 fa-solid fa-circle-exclamation" @mouseover="tooltip = true" @mouseleave="tooltip = false"></i>

                                                <div class="absolute top-1/2 -translate-y-1/2 left-[110%] ml-2 z-10 w-72 p-2 text-sm leading-tight text-white bg-zinc-800 rounded-md shadow-lg" x-cloak x-show="tooltip" >
                                                    <div class="space-y-1.5">
                                                        <span>If turned on, this setting will skip the customer Review and Signature steps during the driver's inspection.</span>
                                                        <span>A stamp saying 'Customer Not Present' will be applied on the BOL instead of a signature.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-slot>
                </x-card>
                <!-- End Pickup -->

                <!-- Start Delivery -->
                <x-card>
                    <x-slot name="header">
                        <span>{{ __('Delivery') }} <i class="ml-1 fa-solid fa-map-location-dot"></i></span>
                    </x-slot>

                    <x-slot name="body">
                        <div x-data="{ active: 'business' }">
                            <div class="flex items-center space-x-2 mb-5">
                                <div class="inline-flex gap-2 p-1 bg-gray-100 rounded-sm dark:bg-white/5">
                                    <button class="button button-sm button-primary" @click="active = 'personal'" :class="active === 'personal' ? 'button-primary' : 'button-primary-outline'" type="button">
                                        Personal Contact
                                    </button>

                                    <button class="button button-sm" @click="active = 'business'" :class="active === 'business' ? 'button-primary' : 'button-primary-outline'" type="button">
                                        Business Contact
                                    </button>
                                </div>

                                <div class="text-xs capitalize font-bold hidden md:block">
                                    Active: <span x-text="active"></span> Contact
                                </div>
                            </div>

                            <div x-show="active === 'business'">
                                <div class="flex flex-wrap -mx-2">
                                    <div class="w-full px-2 mb-4 md:w-8/12">
                                        <label class="text-sm font-semibold pl-1 mb-2" for="delivery_company">Company Name</label>
                                        <input class="input" id="delivery_company" name="delivery[company]" type="text" :disabled="active !== 'business'">
                                    </div>

                                    <div class="w-full px-2 mb-4 md:w-2/12">
                                        <label class="text-sm font-semibold pl-1 mb-2" for="delivery_working_from">Working from</label>
                                        <input class="input" id="delivery_working_from" name="delivery[working_from]" type="time" :disabled="active !== 'business'">
                                    </div>

                                    <div class="w-full px-2 mb-4 md:w-2/12">
                                        <label class="text-sm font-semibold pl-1 mb-2" for="delivery_working_to">Working to</label>
                                        <input class="input" id="delivery_working_to" name="delivery[working_to]" type="time" :disabled="active !== 'business'">
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="delivery_name">Contact Name</label>
                                    <input class="input" id="delivery_name" name="delivery[name]" type="text">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="delivery_email">Contact Email</label>
                                    <input class="input" id="delivery_email" name="delivery[email]" type="email">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="delivery_phone">Contact Phone</label>
                                    <input class="input" id="delivery_phone" name="delivery[phone]" type="text" x-mask="(999) 999-9999" placeholder="(___) ___-____">
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="delivery_address">Address</label>
                                    <input class="input" id="delivery_address" name="delivery[address]" type="text">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="delivery_notes">Notes</label>
                                    <input class="input" id="delivery_notes" name="delivery[notes]" type="text">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="delivery_zip">Zip</label>
                                    <input class="input" id="delivery_zip" name="delivery[zip]" type="text">
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-1/2">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="delivery_date">Delivery date</label>
                                    <input class="input" id="delivery_date" name="delivery[date]" type="date">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/2">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="delivery_restrictions">Restrictions</label>

                                    <select class="input" id="delivery_restrictions" name="delivery[restrictions]" disabled>
                                        <option selected>No restrictions</option>
                                    </select>
                                </div>

                                <div class="w-full mt-2 px-2 mb-4">
                                    <div class="inline-flex items-center gap-3 ml-1">
                                        <input class="checkbox scale-110" id="delivery_signature" name="delivery[signature]" type="checkbox">
                                        <label class="font-semibold text-base capitalize cursor-pointer select-none" for="delivery_signature">
                                            {{ __('signature not required') }}
                                            <i class="ml-1 fa-solid fa-circle-exclamation"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-slot>
                </x-card>
                <!-- End Delivery -->

                <!-- Start Payment -->
                <x-card>
                    <x-slot name="header">
                        <span>{{ __('Payment') }} <i class="ml-1 fa-solid fa-credit-card"></i></span>
                    </x-slot>

                    <x-slot name="body">
                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-1/2">
                                <label class="text-sm font-semibold pl-1 mb-2" for="payment_carrier">Carrier Pay</label>
                                <input class="input" id="payment_carrier" name="payment[carrier]" type="text">
                            </div>

                            <div class="w-full px-2 mb-4 md:w-1/2">
                                <label class="text-sm font-semibold pl-1 mb-2" for="payment_type">Type</label>
                                <select class="input" id="payment_type" name="payment[type]">
                                    <option selected>COD</option>
                                    <option>COP</option>
                                    <option>Billing</option>
                                    <option>uShip</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-3">
                            <label for="payment_notes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Payment notes</label>
                            <textarea class="input" id="payment_notes" name="payment[notes]" rows="4"></textarea>
                        </div>
                    </x-slot>
                </x-card>
                <!-- End Payment -->

                <!-- Start Shipper -->
                <x-card>
                    <x-slot name="header">
                        <span>{{ __('Shipper') }} <i class="ml-1 fa-solid fa-clipboard-user"></i></span>
                    </x-slot>

                    <x-slot name="body">
                        <div x-data="{ active: 'business' }">
                            <div class="flex items-center space-x-2 mb-5">
                                <div class="inline-flex gap-2 p-1 bg-gray-100 rounded-sm dark:bg-white/5">
                                    <button class="button button-sm button-primary" @click="active = 'personal'" :class="active === 'personal' ? 'button-primary' : 'button-primary-outline'" type="button">
                                        Personal Contact
                                    </button>

                                    <button class="button button-sm" @click="active = 'business'" :class="active === 'business' ? 'button-primary' : 'button-primary-outline'" type="button">
                                        Business Contact
                                    </button>
                                </div>

                                <div class="text-xs capitalize font-bold hidden md:block">
                                    Active: <span x-text="active"></span> Contact
                                </div>
                            </div>

                            <div x-show="active === 'business'">
                                <div class="flex flex-wrap -mx-2">
                                    <div class="w-full px-2 mb-4 md:w-8/12">
                                        <label class="text-sm font-semibold pl-1 mb-2" for="shipper_company">Company Name</label>
                                        <input class="input" id="shipper_company" name="shipper[company]" type="text" :disabled="active !== 'business'">
                                    </div>

                                    <div class="w-full px-2 mb-4 md:w-2/12">
                                        <label class="text-sm font-semibold pl-1 mb-2" for="shipper_working_from">Working from</label>
                                        <input class="input" id="shipper_working_from" name="shipper[working_from]" type="time" :disabled="active !== 'business'">
                                    </div>

                                    <div class="w-full px-2 mb-4 md:w-2/12">
                                        <label class="text-sm font-semibold pl-1 mb-2" for="shipper_working_to">Working to</label>
                                        <input class="input" id="shipper_working_to" name="shipper[working_to]" type="time" :disabled="active !== 'business'">
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="shipper_name">Contact Name</label>
                                    <input class="input" id="shipper_name" name="shipper[name]" type="text">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="shipper_email">Contact Email</label>
                                    <input class="input" id="shipper_email" name="shipper[email]" type="email">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="shipper_phone">Contact Phone</label>
                                    <input class="input" id="shipper_phone" name="shipper[phone]" type="text" x-mask="(999) 999-9999" placeholder="(___) ___-____">
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="shipper_address">Address</label>
                                    <input class="input" id="shipper_address" name="shipper[address]" type="text">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="shipper_notes">Notes</label>
                                    <input class="input" id="shipper_notes" name="shipper[notes]" type="text">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="shipper_zip">Zip</label>
                                    <input class="input" id="shipper_zip" name="shipper[zip]" type="text">
                                </div>
                            </div>

                            <div class="flex justify-end mb-5 mt-10">
                                <button class="button button-primary uppercase" type="submit">Save Order <i class="fa-solid fa-box-archive"></i></button>
                            </div>
                        </div>
                    </x-slot>
                </x-card>
                <!-- End Shipper -->
            </div>
        </form>
    </div>

    @push('header')
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    @endpush

    @push('scripts')
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready( function () {-
                var table = $('#table_recent_activities').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'colvis'
                    ],
                    "responsive": true,
                    "scrollCollapse": true,
                    "paging": false,
                    "order": [
                        [3, "desc"]
                    ],
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json",
                        "buttons": {
                            "colvis": 'Exibir'
                        }
                    },
                    "lengthMenu": [
                        [25, 50, 75, 100 - 1],
                        ["25", "50", "75", "100", "Tudo"]
                    ]
                });
            });
        </script>
    @endpush

</x-app>

