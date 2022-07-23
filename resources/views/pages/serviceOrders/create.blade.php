<x-app title="Create Service Order" :active="['item' => 'service']">

    <div class="my-6 px-4 md:px-6">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <div class="w-full md:w-max">
                <h1 class="w-full truncate text-2xl mb-1 font-bold text-gray-400 md:text-2xl dark:text-white uppercase">
                    Create Service Order
                </h1>

                <x-breadcrumb :path="['Service Orders' => route('service-orders.index'), 'Create Service Order' => route('service-orders.create')]" />
            </div>

            <a href="{{ route('service-orders.index') }}" class="button button-primary uppercase hidden md:flex">
                <x-icon name="arrow-undo" class="w-5 h-5 text-xl" library="ion-icon" />
                {{ __('return') }}
            </a>
        </div>
    </div>

    <div class="px-4 md:px-6">
        <form action="{{ route('service-orders.store') }}" method="POST">
            @csrf

            {{--<div class="flex justify-center items-center w-full">
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
            </div> --}}

            <div class="grid gap-6 mt-6">

                <!-- Start Orders -->
                <x-card>
                    <x-slot name="header">
                        <span>{{ __('Order') }} <i class="ml-1 fa-solid fa-clipboard-list"></i></span>
                    </x-slot>

                    <x-slot name="body">
                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-1/3">
                                <label class="text-sm font-semibold pl-1 mb-2" for="load_id">ID Load *</label>

                                <x-input
                                    id="load_id"
                                    name="basic[load_id]"
                                    type="text"
                                ></x-input>
                            </div>

                            <div class="w-full px-2 mb-4 md:w-1/3">
                                <label class="text-sm font-semibold pl-1 mb-2" for="trailer_type">Trailer Type *</label>

                                <select class="input @error('basic.trailer_type') is-border-danger @enderror" id="trailer_type" name="basic[trailer_type]">
                                    <option value="opened" @selected(old('basic.trailer_type') == 'opened')>Opened</option>
                                    <option value="closed" @selected(old('basic.trailer_type') == 'closed')>Closed</option>
                                </select>

                                @error('basic.trailer_type')
                                    <span class="inline-block uppercase text-danger text-[12px] pl-2 mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="w-full px-2 mb-4 md:w-1/3">
                                <label class="text-sm font-semibold pl-1 mb-2" for="inspection_type">Inspection Type *</label>

                                <select class="input @error('basic.inspection_type') is-border-danger @enderror" id="inspection_type" name="basic[inspection_type]">
                                    <option selected value="standard">Standart</option>
                                    <option value="M22">M22</option>
                                </select>

                                @error('basic.inspection_type')
                                    <span class="inline-block uppercase text-danger text-[12px] pl-2 mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-3">
                            <label for="dispatch_instructions" class="inline-block text-sm font-semibold pl-1 mb-1">Dispatch Instructions</label>

                            <x-textarea
                                id="dispatch_instructions"
                                name="basic[dispatch_instructions]"
                                rows="4"
                            ></x-textarea>
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
                        <div x-data="CreateVehicle({{ old('vehicles') ? json_encode(old('vehicles')) : "[]" }})">

                            <template x-for="(vehicle, index) in vehicles" :key="index">
                                <div class="flex flex-wrap -mx-2 md:flex-nowrap" :class="{'mb-8': index !== (vehicles.length - 1)}">
                                    <div class="w-full px-2 md:w-full">
                                        <div class="flex flex-wrap -mx-2">
                                            <div class="w-full px-2 mb-4 md:w-3/12">
                                                <label class="text-sm font-semibold pl-1 mb-2" :for="`vehicles_${index}_vin`">VIN</label>

                                                <x-input
                                                    x-model="vehicle.vin"
                                                    x-bind:name="`vehicles[${index}][vin]`"
                                                    x-bind:id="`vehicles_${index}_vin`"
                                                    type="text"
                                                ></x-input>
                                            </div>

                                            <div class="w-full px-2 mb-4 md:w-3/12">
                                                <label class="text-sm font-semibold pl-1 mb-2" :for="`vehicles_${index}_make`">Make</label>

                                                <x-input
                                                    x-model="vehicle.make"
                                                    x-bind:name="`vehicles[${index}][make]`"
                                                    x-bind:id="`vehicles_${index}_make`"
                                                    type="text"
                                                ></x-input>
                                            </div>

                                            <div class="w-full px-2 mb-4 md:w-3/12">
                                                <label class="text-sm font-semibold pl-1 mb-2" :for="`vehicles_${index}_model`">Model</label>

                                                <x-input
                                                    x-model="vehicle.model"
                                                    x-bind:name="`vehicles[${index}][model]`"
                                                    x-bind:id="`vehicles_${index}_model`"
                                                    type="text"
                                                ></x-input>
                                            </div>

                                            <div class="w-full px-2 mb-4 md:w-3/12 grid md:grid-cols-2 gap-4">
                                                <div class="w-full">
                                                    <label class="text-sm font-semibold pl-1 mb-2" :for="`vehicles_${index}_year`">Year</label>

                                                    <x-input
                                                        x-model="vehicle.year"
                                                        x-bind:name="`vehicles[${index}][year]`"
                                                        x-bind:id="`vehicles_${index}_year`"
                                                        x-data="{}" x-mask="9999"
                                                        type="text"
                                                        placeholder="YYYY"
                                                    ></x-input>
                                                </div>
                                                <div class="w-full">
                                                    <label class="text-sm font-semibold pl-1 mb-2" :for="`vehicles_${index}_color`">Color</label>

                                                    <x-input
                                                        x-model="vehicle.color"
                                                        x-bind:name="`vehicles[${index}][color]`"
                                                        x-bind:id="`vehicles_${index}_color`"
                                                        type="text"
                                                    ></x-input>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex flex-wrap -mx-2">
                                            <div class="w-full px-2 mb-4 md:w-3/12">
                                                <label class="text-sm font-semibold pl-1 mb-2" :for="`vehicles_${index}_operable`">Operable</label>

                                                <select class="input" x-model="vehicle.operable" :name="`vehicles[${index}][operable]`" :id="`vehicles_${index}_operable`">
                                                    <option selected value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>

                                            <div class="w-full px-2 mb-4 md:w-3/12">
                                                <label class="text-sm font-semibold pl-1 mb-2" :for="`vehicles_${index}_type`">Type</label>

                                                <select class="input" x-model="vehicle.type" :name="`vehicles[${index}][type]`" :id="`vehicles_${index}_type`">
                                                    @foreach(\App\Models\VehicleType::all() as $vehicle)
                                                        <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="w-full px-2 mb-4 md:w-3/12">
                                                <label class="text-sm font-semibold pl-1 mb-2" :for="`vehicles_${index}_lot`">Lot Number</label>

                                                <x-input
                                                    x-model="vehicle.lot_number"
                                                    x-bind:name="`vehicles[${index}][lot_number]`"
                                                    x-bind:id="`vehicles_${index}_lot`"
                                                    type="text"
                                                ></x-input>
                                            </div>
                                            <div class="w-full px-2 mb-4 md:w-3/12">
                                                <label class="text-sm font-semibold pl-1 mb-2" :for="`vehicles_${index}_buyer`">Buyer</label>

                                                <x-input
                                                    x-model="vehicle.buyer"
                                                    x-bind:name="`vehicles[${index}][buyer]`"
                                                    x-bind:id="`vehicles_${index}_buyer`"
                                                    type="text"
                                                ></x-input>
                                            </div>
                                        </div>
                                    </div>

                                    <template x-if="vehicles.length > 1">
                                        <div class="w-full px-2 md:w-max">
                                            <button class="w-full button-icon button-danger button-icon-sm !rounded md:mt-5 md:button-icon" type="button" @click="remove(index)">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </template>
                                </div>
                            </template>

                            <div class="flex items-center justify-between mt-5">
                                <span class="font-semibold" x-text="`{{ __('Total vehicles') }}: ${vehicles.length}`"></span>

                                <button class="button button-primary button-sm uppercase" type="button" @click="add()">
                                    add vehicle
                                </button>
                            </div>
                        </div>

                        {{-- <div class="flex flex-wrap -mx-2">
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
                                    <input class="input" id="vehicle_year" name="vehicle_year" x-data x-mask="9999" type="text" placeholder="YYYY">
                                </div>
                                <div class="w-full">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_color">Color</label>
                                    <input class="input" id="vehicle_color" name="vehicle_color" type="text">
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
                        </div> --}}
                    </x-slot>
                </x-card>
                <!-- End Vehicle -->

                <!-- Start Pickup -->
                <x-card>
                    <x-slot name="header">
                        <span>{{ __('Pickup') }} <i class="ml-1 fa-solid fa-map-location-dot"></i></span>
                    </x-slot>

                    <x-slot name="body">
                        <div x-data="{ active: '{{ old('pickup.type_contact') ?? 'business' }}' }">

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
                                    <input x-show="false" x-cloak :value="active" name="pickup[type_contact]" type="text">
                                </div>
                            </div>

                            @error('pickup.type_contact')
                                <span class="block uppercase text-danger text-[12px] pl-2 -mt-4 mb-5" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div x-show="active === 'business'">
                                <div class="flex flex-wrap -mx-2">
                                    <div class="w-full px-2 mb-4 md:w-8/12">
                                        <label class="text-sm font-semibold pl-1 mb-2" for="pickup_company">Company Name *</label>

                                        <x-input
                                            id="pickup_company"
                                            name="pickup[company]"
                                            type="text" x-bind:disabled="active !== 'business'"
                                        ></x-input>
                                    </div>

                                    <div class="w-full px-2 mb-4 md:w-2/12">
                                        <label class="text-sm font-semibold pl-1 mb-2" for="pickup_working_from">Working from *</label>

                                        <x-input
                                            id="pickup_working_from"
                                            name="pickup[working_from]"
                                            type="time"
                                            x-bind:disabled="active !== 'business'"
                                        ></x-input>
                                    </div>

                                    <div class="w-full px-2 mb-4 md:w-2/12">
                                        <label class="text-sm font-semibold pl-1 mb-2" for="pickup_working_to">Working to *</label>

                                        <x-input
                                            id="pickup_working_to"
                                            name="pickup[working_to]"
                                            type="time" x-bind:disabled="active !== 'business'"
                                        ></x-input>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="pickup_name">Contact Name *</label>

                                    <x-input
                                        id="pickup_name"
                                        name="pickup[name]"
                                        type="text"
                                    ></x-input>
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="pickup_email">Contact Email *</label>

                                    <x-input
                                        id="pickup_email"
                                        name="pickup[email]"
                                        type="email"
                                    ></x-input>
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="pickup_phone">Contact Phone *</label>

                                    <x-input
                                        id="pickup_phone"
                                        name="pickup[phone]"
                                        type="text"
                                        x-mask="(999) 999-9999"
                                        placeholder="(___) ___-____"
                                    ></x-input>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="pickup_address">Address *</label>

                                    <x-input
                                        id="pickup_address"
                                        name="pickup[address]"
                                        type="text"
                                    ></x-input>
                                </div>

                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="pickup_notes">Notes</label>

                                    <x-input
                                        id="pickup_notes"
                                        name="pickup[notes]"
                                        type="text"
                                    ></x-input>
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="pickup_zip">Zip *</label>

                                    <x-input
                                        id="pickup_zip"
                                        name="pickup[zip]"
                                        type="text"
                                    ></x-input>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-1/2">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="pickup_date">Pickup date *</label>

                                    <x-input
                                        id="pickup_date"
                                        name="pickup[date]"
                                        type="date"
                                    ></x-input>
                                </div>
                                <div class="w-full px-2 mb-4 md:w-1/2">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="pickup_restrictions">Restrictions</label>

                                    <select class="input" id="pickup_restrictions" name="pickup[restrictions]" disabled>
                                        <option selected>No restrictions</option>
                                    </select>
                                </div>

                                <div class="w-full mt-2 px-2 mb-4">
                                    <div class="inline-flex items-center gap-3 ml-1">
                                        <x-checkbox id="pickup_signature" name="pickup[not_signature]"></x-checkbox>

                                        <label class="font-semibold text-base cursor-pointer select-none" for="pickup_signature">
                                            {{ __('Signature not required') }}
                                            <i class="ml-1 fa-solid fa-circle-exclamation"></i>
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
                        <div x-data="{ active: '{{ old('delivery.type_contact') ?? 'business' }}' }">

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
                                    <input x-show="false" x-cloak :value="active" name="delivery[type_contact]" type="text">
                                </div>
                            </div>

                            <div x-show="active === 'business'">
                                <div class="flex flex-wrap -mx-2">
                                    <div class="w-full px-2 mb-4 md:w-8/12">
                                        <label class="text-sm font-semibold pl-1 mb-2" for="delivery_company">Company Name *</label>

                                        <x-input
                                            id="delivery_company"
                                            name="delivery[company]"
                                            type="text"
                                            x-bind:disabled="active !== 'business'"
                                        ></x-input>
                                    </div>

                                    <div class="w-full px-2 mb-4 md:w-2/12">
                                        <label class="text-sm font-semibold pl-1 mb-2" for="delivery_working_from">Working from *</label>

                                        <x-input
                                            id="delivery_working_from"
                                            name="delivery[working_from]"
                                            type="time"
                                            x-bind:disabled="active !== 'business'"
                                        ></x-input>
                                    </div>

                                    <div class="w-full px-2 mb-4 md:w-2/12">
                                        <label class="text-sm font-semibold pl-1 mb-2" for="delivery_working_to">Working to *</label>

                                        <x-input
                                            id="delivery_working_to"
                                            name="delivery[working_to]"
                                            type="time"
                                            x-bind:disabled="active !== 'business'"
                                        ></x-input>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="delivery_name">Contact Name *</label>

                                    <x-input
                                        id="delivery_name"
                                        name="delivery[name]"
                                        type="text"
                                    ></x-input>
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="delivery_email">Contact Email *</label>

                                    <x-input
                                        id="delivery_email"
                                        name="delivery[email]"
                                        type="email"
                                    ></x-input>
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="delivery_phone">Contact Phone *</label>

                                    <x-input
                                        id="delivery_phone"
                                        name="delivery[phone]"
                                        type="text"
                                        x-mask="(999) 999-9999"
                                        placeholder="(___) ___-____"
                                    ></x-input>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="delivery_address">Address *</label>

                                    <x-input
                                        id="delivery_address"
                                        name="delivery[address]"
                                        type="text"
                                    ></x-input>
                                </div>

                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="delivery_notes">Notes</label>

                                    <x-input
                                        id="delivery_notes"
                                        name="delivery[notes]"
                                        type="text"
                                    ></x-input>
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="delivery_zip">Zip *</label>

                                    <x-input
                                        id="delivery_zip"
                                        name="delivery[zip]"
                                        type="text"
                                    ></x-input>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-1/2">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="delivery_date">Delivery date *</label>

                                    <x-input
                                        id="delivery_date"
                                        name="delivery[date]"
                                        type="date"
                                    ></x-input>
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/2">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="delivery_restrictions">Restrictions</label>

                                    <select class="input" id="delivery_restrictions" name="delivery[restrictions]" disabled>
                                        <option selected>No restrictions</option>
                                    </select>
                                </div>

                                <div class="w-full mt-2 px-2 mb-4">
                                    <div class="inline-flex items-center gap-3 ml-1">
                                        <x-checkbox id="delivery_signature" name="delivery[not_signature]"></x-checkbox>

                                        <label class="font-semibold text-base cursor-pointer select-none" for="delivery_signature">
                                            {{ __('Signature not required') }}
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
                            <div class="w-full px-2 mb-4 md:w-1/3">
                                <label class="text-sm font-semibold pl-1 mb-2" for="payment_carrier">Carrier Pay *</label>

                                <x-input
                                    id="payment_carrier"
                                    name="payment[carrier]"
                                    type="text"
                                ></x-input>
                            </div>

                            <div class="w-full px-2 mb-4 md:w-1/3">
                                <label class="text-sm font-semibold pl-1 mb-2" for="payment_method">Method *</label>

                                <select class="input @error('payment.method') is-border-danger @enderror" id="payment_method" name="payment[method]">
                                    @foreach(\App\Enums\PaymentMethodsEnum::cases() as $method)
                                        <option value="{{ $method->value }}">{{ $method->value }}</option>
                                    @endforeach
                                </select>

                                @error('payment.method')
                                    <span class="inline-block uppercase text-danger text-[12px] pl-2 mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="w-full px-2 mb-4 md:w-1/3">
                                <label class="text-sm font-semibold pl-1 mb-2" for="payment_type">Type *</label>

                                <select class="input @error('payment.type') is-border-danger @enderror" id="payment_type" name="payment[type]">
                                    @foreach(\App\Enums\PaymentTypesEnum::cases() as $type)
                                        <option value="{{ $type->value }}">{{ $type->value }}</option>
                                    @endforeach
                                </select>

                                @error('payment.type')
                                    <span class="inline-block uppercase text-danger text-[12px] pl-2 mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-3">
                            <label for="payment_notes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Payment notes</label>

                            <x-textarea
                                id="payment_notes"
                                name="payment[notes]"
                                rows="4"
                            ></x-textarea>
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
                        <div x-data="{ active: '{{ old('shipper.type_contact') ?? 'business' }}' }">

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
                                    <input x-show="false" x-cloak :value="active" name="shipper[type_contact]" type="text">
                                </div>
                            </div>

                            <div x-show="active === 'business'">
                                <div class="flex flex-wrap -mx-2">
                                    <div class="w-full px-2 mb-4 md:w-8/12">
                                        <label class="text-sm font-semibold pl-1 mb-2" for="shipper_company">Company Name *</label>

                                        <x-input
                                            id="shipper_company"
                                            name="shipper[company]"
                                            type="text"
                                            x-bind:disabled="active !== 'business'"
                                        ></x-input>
                                    </div>

                                    <div class="w-full px-2 mb-4 md:w-2/12">
                                        <label class="text-sm font-semibold pl-1 mb-2" for="shipper_working_from">Working from *</label>

                                        <x-input
                                            id="shipper_working_from"
                                            name="shipper[working_from]"
                                            type="time"
                                            x-bind:disabled="active !== 'business'"
                                        ></x-input>
                                    </div>

                                    <div class="w-full px-2 mb-4 md:w-2/12">
                                        <label class="text-sm font-semibold pl-1 mb-2" for="shipper_working_to">Working to *</label>

                                        <x-input
                                            id="shipper_working_to"
                                            name="shipper[working_to]"
                                            type="time"
                                            x-bind:disabled="active !== 'business'"
                                        ></x-input>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="shipper_name">Contact Name *</label>

                                    <x-input
                                        id="shipper_name"
                                        name="shipper[name]"
                                        type="text"
                                    ></x-input>
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="shipper_email">Contact Email *</label>

                                    <x-input
                                        id="shipper_email"
                                        name="shipper[email]"
                                        type="email"
                                    ></x-input>
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="shipper_phone">Contact Phone *</label>

                                    <x-input
                                        id="shipper_phone"
                                        name="shipper[phone]"
                                        type="text"
                                        x-mask="(999) 999-9999"
                                        placeholder="(___) ___-____"
                                    ></x-input>
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="shipper_address">Address *</label>

                                    <x-input
                                        id="shipper_address"
                                        name="shipper[address]"
                                        type="text"
                                    ></x-input>
                                </div>

                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="shipper_notes">Notes</label>

                                    <x-input
                                        id="shipper_notes"
                                        name="shipper[notes]"
                                        type="text"
                                    ></x-input>
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="shipper_zip">Zip *</label>

                                    <x-input
                                        id="shipper_zip"
                                        name="shipper[zip]"
                                        type="text"
                                    ></x-input>
                                </div>
                            </div>

                            <div class="flex justify-end mb-5 mt-10">
                                <button class="button button-primary uppercase" type="submit">
                                    Save Order <i class="fa-solid fa-box-archive"></i>
                                </button>
                            </div>
                        </div>
                    </x-slot>
                </x-card>
                <!-- End Shipper -->
            </div>
        </form>
    </div>
</x-app>

