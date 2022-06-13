<x-app title="New Service Order">

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

            <div class="card">
                <div class="card-header">
                    <span>
                        {{ __('Order') }}
                        <i class="ml-1 fa-solid fa-clipboard-list"></i>
                    </span>
                </div>

                <div class="card-body">
                    <div class="grid md:grid-cols-3 gap-4">
                        <div class="w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="load_id">ID Load</label>
                            <input class="input" name="load_id" type="text" id="load_id">
                        </div>
                        <div class="w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="trailer_type">Trailer Type</label>
                            <select class="input" id="trailer_type">
                                <option selected value="open">Open</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="example06">Inspection Type</label>
                            <select class="input" id="inspection_type">
                                <option selected value="standart">Standart</option>
                                <option value="M22">M22</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Dispatch Instructions</label>
                        <textarea id="message" rows="4" class="input" placeholder="{{ __('Add some shipping instructions') }}"></textarea>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header flex content-between">
                    {{ __('Vehicles') }}
                    <button class="button button-primary">Inspection Type<i class="fa-solid fa-file"></i></button>
                </div>

                <div class="card-body">

                    <div class="vehicles">

                        <div class="grid md:grid-cols-4 gap-4">
                            <div class="w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="load_id">VIN</label>
                                <input class="input" name="vin" type="text" id="vin">
                            </div>
                            <div class="w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Make</label>
                                <input class="input" name="vin" type="text" id="vin">
                            </div>
                            <div class="w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Model</label>
                                <input class="input" name="vin" type="text" id="vin">
                            </div>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="w-full">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Year</label>
                                    <input class="input" name="year" type="text" id="year">
                                </div>
                                <div class="w-full">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Color</label>
                                    <input class="input" name="color" type="text" id="color">
                                </div>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-4 gap-4 mt-2">
                            <div class="w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="example06">Operable</label>
                                <select class="input" id="inspection_type">
                                    <option selected value="standart">Yes</option>
                                    <option value="M22">No</option>
                                </select>
                            </div>
                            <div class="w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="example06">Type</label>
                                <select class="input" id="inspection_type">
                                    <option selected value="standart">Sedan</option>
                                    <option value="M22">Van</option>
                                    <option value="M22">Mini-Van</option>
                                    <option value="M22">Motorcycle</option>
                                    <option value="M22">Pickup</option>
                                    <option value="M22">SUV</option>
                                </select>
                            </div>
                            <div class="w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Lot</label>
                                <input class="input" name="vin" type="text" id="vin">
                            </div>
                            <div class="w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Buyer</label>
                                <input class="input" name="year" type="text" id="year">
                            </div>
                        </div>

                        <div class="flex justify-end my-5">
                            <button class="button button-secondary">Add Vehicle<i class="fa-solid fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <span>
                        {{ __('Pickup') }}
                        <i class="ml-1 fa-solid fa-map-location-dot"></i>
                    </span>
                </div>

                <div class="card-body">
                    <div x-data="{ active: 'personal' }">
                        <div class="flex items-center space-x-2 mb-5">
                            <div class="inline-flex gap-2 p-1 bg-gray-100 rounded-sm dark:bg-white/5">
                                <button class="button button-sm button-primary" @click="active = 'personal'" :class="active === 'personal' ? 'button-primary' : 'button-primary-outline'">
                                    Personal Contact
                                </button>

                                <button class="button button-sm" @click="active = 'business'" :class="active === 'business' ? 'button-primary' : 'button-primary-outline'">
                                    Business Contact
                                </button>
                            </div>

                            <div class="text-xs capitalize font-bold hidden md:block">
                                Active: <span x-text="active"></span> Contact
                            </div>
                        </div>

                        <div x-show="active === 'personal'">
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Contact Name</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Contact Email</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Contact Phone</label>
                                    <input class="input" name="vin" type="text" id="vin" placeholder="(__)_____-____">
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Address</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Notes</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Zip</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>
                            </div>
                        </div>

                        <div x-show="active === 'business'">
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-4/12">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Company Name</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-3/12">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Contact Name</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-3/12">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Contact Email</label>
                                    <input class="input" name="vin" type="email" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-2/12">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Contact Phone</label>
                                    <input class="input" name="vin" type="text" id="vin" placeholder="(__)_____-____">
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-1/2">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Working from</label>
                                    <input class="input" name="vin" type="time" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/2">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Working to</label>
                                    <input class="input" name="vin" type="time" id="vin">
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Address</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>
                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Notes</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>
                                <div class="w-full px-2 mb-4 md:w-1/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Zip</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-1/2">
                                <label class="text-sm font-semibold pl-1 mb-2" for="">Pickup date</label>
                                <input class="input" name="vin" type="date" id="vin">
                            </div>
                            <div class="w-full px-2 mb-4 md:w-1/2">
                                <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Restrictions</label>

                                <select class="input" disabled id="vin">
                                    <option selected>No restrictions</option>
                                    <option value="1">One</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <span>
                        {{ __('Delivery') }}
                        <i class="ml-1 fa-solid fa-map-location-dot"></i>
                    </span>
                </div>

                <div class="card-body pb-5">
                    <div x-data="{ active: 'personal' }">
                        <div class="flex items-center space-x-2 mb-5">
                            <div class="inline-flex gap-2 p-1 bg-gray-100 rounded-sm dark:bg-white/5">
                                <button class="button button-sm button-primary" @click="active = 'personal'" :class="active === 'personal' ? 'button-primary' : 'button-primary-outline'">
                                    Personal Contact
                                </button>

                                <button class="button button-sm" @click="active = 'business'" :class="active === 'business' ? 'button-primary' : 'button-primary-outline'">
                                    Business Contact
                                </button>
                            </div>

                            <div class="text-xs capitalize font-bold hidden md:block">
                                Active: <span x-text="active"></span> Contact
                            </div>
                        </div>

                        <div x-show="active === 'personal'">
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Contact Name</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Contact Email</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Contact Phone</label>
                                    <input class="input" name="vin" type="text" id="vin" placeholder="(__)_____-____">
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Address</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Notes</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Zip</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>
                            </div>
                        </div>

                        <div x-show="active === 'business'">
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-4/12">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Company Name</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-3/12">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Contact Name</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-3/12">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Contact Email</label>
                                    <input class="input" name="vin" type="email" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-2/12">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Contact Phone</label>
                                    <input class="input" name="vin" type="text" id="vin" placeholder="(__)_____-____">
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-1/2">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Working from</label>
                                    <input class="input" name="vin" type="time" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/2">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Working to</label>
                                    <input class="input" name="vin" type="time" id="vin">
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Address</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>
                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Notes</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>
                                <div class="w-full px-2 mb-4 md:w-1/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Zip</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-1/2">
                                <label class="text-sm font-semibold pl-1 mb-2" for="">Delivery date</label>
                                <input class="input" name="vin" type="date" id="vin">
                            </div>
                            <div class="w-full px-2 mb-4 md:w-1/2">
                                <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Restrictions</label>

                                <select class="input" disabled id="vin">
                                    <option selected>No restrictions</option>
                                    <option value="1">One</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    {{ __('Payment') }}
                </div>

                <div class="card-body">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Carrier Pay</label>
                            <input class="input" name="load_id" type="text" id="load_id">
                        </div>
                        <div class="w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="trailer_type">Type</label>
                            <select class="input" id="trailer_type">
                                <option selected value="open">COD</option>
                                <option value="closed">COP</option>
                                <option value="closed">Billing</option>
                                <option value="closed">uShip</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Payment notes</label>
                        <textarea id="message" rows="4" class="input" placeholder=""></textarea>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <span>
                        {{ __('Shipper') }}
                        <i class="ml-1 fa-solid fa-clipboard-user"></i>
                    </span>
                </div>

                <div class="card-body">
                    <div x-data="{ active: 'personal' }">
                        <div class="flex items-center space-x-2 mb-5">
                            <div class="inline-flex gap-2 p-1 bg-gray-100 rounded-sm dark:bg-white/5">
                                <button class="button button-sm button-primary" @click="active = 'personal'" :class="active === 'personal' ? 'button-primary' : 'button-primary-outline'">
                                    Personal Contact
                                </button>

                                <button class="button button-sm" @click="active = 'business'" :class="active === 'business' ? 'button-primary' : 'button-primary-outline'">
                                    Business Contact
                                </button>
                            </div>

                            <div class="text-xs capitalize font-bold hidden md:block">
                                Active: <span x-text="active"></span> Contact
                            </div>
                        </div>

                        <div x-show="active === 'personal'">
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Contact Name</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Contact Email</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/3">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Contact Phone</label>
                                    <input class="input" name="vin" type="text" id="vin" placeholder="(__)_____-____">
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Address</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Notes</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Zip</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>
                            </div>
                        </div>

                        <div x-show="active === 'business'">
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-4/12">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Company Name</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-3/12">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Contact Name</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-3/12">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Contact Email</label>
                                    <input class="input" name="vin" type="email" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-2/12">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Contact Phone</label>
                                    <input class="input" name="vin" type="text" id="vin" placeholder="(__)_____-____">
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-1/2">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Working from</label>
                                    <input class="input" name="vin" type="time" id="vin">
                                </div>

                                <div class="w-full px-2 mb-4 md:w-1/2">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Working to</label>
                                    <input class="input" name="vin" type="time" id="vin">
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Address</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>
                                <div class="w-full px-2 mb-4 md:w-2/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Notes</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>
                                <div class="w-full px-2 mb-4 md:w-1/5">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="load_id">Zip</label>
                                    <input class="input" name="vin" type="text" id="vin">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mb-5 mt-10">
                        <button class="button button-primary">Save Service Order <i class="fa-solid fa-box-archive"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('header')
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    @endpush

    @push('scripts')
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready( function () {
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

