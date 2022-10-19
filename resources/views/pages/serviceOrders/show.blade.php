<x-app title="ORDER #14234" :active="['item' => 'service']">

    <div class="my-6 px-4 md:px-6">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <div class="w-full md:w-max">
                <div class="w-full inline-flex items-center mb-1 ">
                    <h1 class="truncate uppercase text-2xl font-bold text-gray-400 dark:text-white">
                        Order {{ $serviceOrder->load_id }}
                    </h1>

                    <x-status-badge :type="$serviceOrder->status" class="ml-4"></x-status-badge>
                </div>


                <x-breadcrumb :path="['Service Orders' => route('service-orders.index'), $serviceOrder->load_id => route('service-orders.show', $serviceOrder->id)]" />
            </div>

            <button class="button button-primary uppercase hidden md:flex">
                {{ __('add to a trip') }} <i class="fa-solid fa-plus"></i>
            </button>
        </div>
    </div>

    <div class="px-4 md:px-6">
        <div class="flex flex-wrap -mx-2 md:-mx-3">
            <div class="w-full px-2 mb-6 md:px-3 md:w-8/12">

                <!-- Start Detail -->
                <x-card class="mb-6">
                    <x-slot name="body">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-lg text-gray-700 font-semibold dark:text-gray-300">
                                <i class="ml-1 fa-solid fa-clipboard-list"></i> {{ __('Basic details') }}
                            </h2>

                            <div class="inline-flex gap-2">
                                <button
                                    x-data @click="$dispatch('slide-over', 'edit-basic')"
                                    class="button button-primary-soft button-xs text-sm dark:button-primary"
                                >
                                    Edit <i class="fa-solid fa-pen"></i>
                                </button>
                            </div>
                        </div>

                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left" id="table_order_delivery">
                                <thead class="text-gray-700 uppercase bg-gray-50 dark:text-gray-300 dark:bg-white/5 dark:text-white">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                            ID load
                                        </th>
                                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                            trailer type
                                        </th>
                                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                            Inspection type
                                        </th>
                                        <th scope="col" class="px-6 py-3 whitespace-nowrap">
                                            Dispatch Instructions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="dark:bg-transparent dark:border-zinc-700 odd:bg-transparent even:bg-gray-50 odd:dark:bg-transparent even:dark:bg-white/5">
                                        <th scope="row" class="px-6 py-4 font-normal text-gray-900 dark:text-white">
                                            {{ $serviceOrder->load_id }}
                                        </th>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $serviceOrder->trailer_type }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $serviceOrder->inspection_type }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if(!isset($serviceOrder->dispatch_instructions))
                                                No instruction <i class="text-danger fa-solid fa-ban"></i>
                                            @else
                                                {{ $serviceOrder->dispatch_instructions }}
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </x-slot>
                </x-card>
                <!-- End Detail -->

                <!-- Start Driver -->
                <x-card class="mb-6">
                    <x-slot name="body">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-lg text-gray-700 font-semibold dark:text-gray-300">
                                <i class="mr-1 fa-solid fa-user"></i> {{ __('Driver') }}
                            </h2>
                        </div>

                        @isset($serviceOrder->driver_id)
                            <div class="flex pb-6 border-b border-gray-200 dark:border-zinc-700">
                                <x-avatar-user
                                    class="!w-14 !h-14 !rounded bg-gray-100 dark:bg-white/5 dark:text-gray-300"
                                    :user="Auth::user()"
                                ></x-avatar-user>

                                <div class="flex flex-col items-start justify-between pl-3 w-full sm:flex-row">
                                    <div class="w-full">
                                        <p class="uppercase text-base font-semibold leading-5 text-gray-700 dark:text-gray-300">
                                            {{ $serviceOrder->driver->name }}
                                        </p>

                                        <p class="pt-2">
                                            {{ $serviceOrder->driver->phone }}
                                        </p>
                                    </div>

                                    <div class="flex flex-wrap gap-2 mt-2 sm:mt-0 md:flex-nowrap">
                                        <button
                                            x-data @click="$dispatch('slide-over', 'assign')"
                                            class="button button-primary-soft button-xs text-sm dark:button-primary whitespace-nowrap">

                                            Re-assign <i class="fa-solid fa-link"></i>
                                        </button>

                                        <form action="{{ route('service-orders.unassign', $serviceOrder->id) }}" method="POST">
                                            @csrf @method('PATCH')

                                            <button class="button button-danger-soft button-xs text-sm dark:button-danger whitespace-nowrap" type="submit">
                                                {{ __('Unassign') }} <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="relative overflow-x-auto mt-4">
                                <table class="w-full text-sm text-left" id="table_order_driver">
                                    <thead class="text-gray-700 uppercase bg-gray-50 dark:text-gray-300 dark:bg-white/5 dark:text-white">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Email
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Phone
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Truck
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Trailer
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Capacity
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="dark:bg-transparent dark:border-zinc-700 odd:bg-transparent even:bg-gray-50 odd:dark:bg-transparent even:dark:bg-white/5">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                {{ $serviceOrder->driver->email }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $serviceOrder->driver->phone ?? 'N/A' }}
                                            </td>
                                            <td class="px-6 py-4">
                                                2022 nissan rogue
                                            </td>
                                            <td class="px-6 py-4">
                                                Open
                                            </td>
                                            <td class="px-6 py-4">
                                                7
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="flex items-center">
                                <div class="w-14 h-14 min-w-[3.5rem] rounded bg-gray-100 flex items-center justify-center dark:bg-white/5">
                                    <i class="text-xs text-gray-800 dark:text-gray-300 fas fa-user"></i>
                                </div>

                                <div class="flex items-center justify-between w-full">
                                    <div class="pl-3 w-full">
                                        <p class="uppercase leading-5 text-gray-700 dark:text-gray-300">
                                            No driver <span class="hidden sm:inline">assigned</span> <i class="ml-1 fa-solid fa-circle-exclamation"></i>
                                        </p>
                                    </div>

                                    <button
                                        x-data @click="$dispatch('slide-over', 'assign')"
                                        class="button button-primary-soft button-xs text-sm dark:button-primary">

                                        Assign <i class="fa-solid fa-link"></i>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </x-slot>
                </x-card>
                <!-- End Driver -->

                <!-- Start Vehicle -->
                <x-card class="mb-6">
                    <x-slot name="body">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-lg text-gray-700 font-semibold dark:text-gray-300">
                                <i class="fa-solid fa-car"></i>
                                {{ __('Vehicle') }}
                            </h2>

                            <div class="inline-flex gap-2">
                                <button
                                    x-data @click="$dispatch('slide-over', 'add-vehicle')"
                                    class="button button-primary-soft button-xs text-sm dark:button-primary">

                                    New <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left" id="table_order_vehicle">
                                <thead class="text-gray-700 uppercase bg-gray-50 dark:text-gray-300 dark:bg-white/5 dark:text-white">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Model
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Category
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Color
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Condition
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Vin
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($serviceOrder->vehicles as $vehicle)
                                        <tr @class(['border-b' => !$loop->last , 'dark:bg-transparent dark:border-zinc-700 odd:bg-transparent even:bg-gray-50 odd:dark:bg-transparent even:dark:bg-white/5'])>
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                                {{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $vehicle->type->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $vehicle->color }}
                                            </td>
                                            <td class="px-6 py-4">
                                                @if($vehicle->operable)
                                                    {{ __('Operable') }}
                                                @else
                                                    <span class="whitespace-nowrap text-gray-400 dark:text-gray-500">
                                                        {{ __('Inoperable') }} <i class="fa-solid fa-car-burst"></i>
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $vehicle->vin }}
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                <div class="inline-flex items-center gap-2">
                                                    <button x-data @click="$dispatch('slide-over', 'edit-vehicle-{{ $vehicle->id }}')" class="button-icon button-icon-xs button-primary-soft rounded">
                                                        <i class="fa-solid fa-pen"></i>
                                                    </button>

                                                    @if(count($serviceOrder->vehicles) > 1)
                                                        <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST">
                                                            @csrf @method('DELETE')

                                                            <button class="button-icon button-icon-xs button-danger-soft rounded">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="flex items-center justify-between justify-end mt-4">
                            <span class="font-medium">Total of {{ count($serviceOrder->vehicles) }} vehicles</span>
                        </div>
                    </x-slot>
                </x-card>
                <!-- End vehicle -->

                <!-- Start Pickup -->
                <x-card class="mb-6">
                    <x-slot name="body">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-lg text-gray-700 font-semibold dark:text-gray-300">
                                <i class="fa-solid fa-map-location-dot"></i>
                                {{ __('Pickup') }}
                            </h2>

                            <div class="inline-flex gap-2">
                                <button
                                    x-data @click="$dispatch('slide-over', 'edit-pickup')"
                                    class="button button-primary-soft button-xs text-sm dark:button-primary">

                                    Edit <i class="fa-solid fa-pen"></i>
                                </button>
                            </div>
                        </div>

                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left" id="table_order_pickup">
                                <thead class="text-gray-700 uppercase bg-gray-50 dark:text-gray-300 dark:bg-white/5 dark:text-white">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Address
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Contact name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Phone
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Contact type
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($serviceOrder->pickup)
                                        <tr class="dark:bg-transparent dark:border-zinc-700 odd:bg-transparent even:bg-gray-50 odd:dark:bg-transparent even:dark:bg-white/5">
                                            <th scope="row" class="px-6 py-4 w-60 min-w-[15rem] font-medium text-gray-900 dark:text-white">
                                                {{ $serviceOrder->pickup->address }}
                                            </th>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $serviceOrder->pickup->contact->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $serviceOrder->pickup->contact->phone }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $serviceOrder->pickup->contact->type }}
                                            </td>
                                        </tr>
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </x-slot>
                </x-card>
                <!-- End Pickup -->

                <!-- Start Delivery -->
                <x-card>
                    <x-slot name="body">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-lg text-gray-700 font-semibold dark:text-gray-300">
                                <i class="fa-solid fa-map-location-dot"></i>
                                {{ __('Delivery') }}
                            </h2>

                            <div class="inline-flex gap-2">
                                <button
                                    x-data @click="$dispatch('slide-over', 'edit-delivery')"
                                    class="button button-primary-soft button-xs text-sm dark:button-primary
                                ">

                                    Edit <i class="fa-solid fa-pen"></i>
                                </button>
                            </div>
                        </div>

                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left" id="table_order_delivery">
                                <thead class="text-gray-700 uppercase bg-gray-50 dark:text-gray-300 dark:bg-white/5 dark:text-white">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Address
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Contact name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Phone
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Contact type
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($serviceOrder->delivery)
                                        <tr class="dark:bg-transparent dark:border-zinc-700 odd:bg-transparent even:bg-gray-50 odd:dark:bg-transparent even:dark:bg-white/5">
                                            <th scope="row" class="px-6 py-4 w-60 min-w-[15rem] font-medium text-gray-900 dark:text-white">
                                                {{ $serviceOrder->delivery->address }}
                                            </th>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $serviceOrder->delivery->contact->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $serviceOrder->delivery->contact->phone }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $serviceOrder->delivery->contact->type }}
                                            </td>
                                        </tr>
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </x-slot>
                </x-card>
                <!-- End Delivery -->
            </div>

            <div class="w-full px-2 mb-6 md:px-3 md:w-4/12">
                <!-- Start Payment/Shipper -->
                <x-card class="mb-6">
                    <x-slot name="body">
                        <!-- Payment -->
                        <div class="flex items-center justify-between mb-2">
                            <h2 class="text-lg text-gray-700 font-semibold dark:text-gray-300">
                                <i class="fa-solid fa-dollar-sign"></i>
                                {{ __('Payment') }}
                            </h2>

                            <div class="inline-flex gap-2">
                                <button
                                    x-data @click="$dispatch('slide-over', 'edit-payment')"
                                    class="button button-primary-soft button-xs text-sm dark:button-primary"
                                >

                                    Edit <i class="fa-solid fa-pen"></i>
                                </button>
                            </div>
                        </div>

                        <div class="relative overflow-x-auto">
                            <table id="table_payment_order">
                                @isset($serviceOrder->payment)
                                    <tbody>
                                        <tr class="text-gray-700 dark:text-gray-300">
                                            <td class="p-1 whitespace-nowrap">
                                                Carrier pay:
                                            </td>

                                            <td class="p-1 font-bold">
                                                $ {{ $serviceOrder->payment->carrier_pay }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="p-1 whitespace-nowrap">
                                                Type:
                                            </td>

                                            <td class="p-1">
                                                {{ $serviceOrder->payment->type->value }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="p-1 whitespace-nowrap">
                                                Method:
                                            </td>

                                            <td class="p-1">
                                                {{ $serviceOrder->payment->method->value }}
                                            </td>
                                        </tr>
                                    </tbody>
                                @endisset
                            </table>
                        </div>
                    </x-slot>
                </x-card>
                <!-- End Payment -->

                <!-- Start Shipper -->
                <x-card class="mb-6">
                    <x-slot name="body">
                        <!-- Shipper -->
                        <div class="flex items-center justify-between mb-2">
                            <h2 class="text-lg text-gray-700 font-semibold dark:text-gray-300">
                                <i class="fa-solid fa-user-group"></i> {{ __('Shipper') }}
                            </h2>

                            <div class="inline-flex gap-2">
                                <button
                                    x-data @click="$dispatch('slide-over', 'edit-shipper')"
                                    class="button button-primary-soft button-xs text-sm dark:button-primary"
                                >

                                    Edit <i class="fa-solid fa-pen"></i>
                                </button>
                            </div>
                        </div>

                        <div class="relative overflow-x-auto">
                            <table id="table_shipper_order">
                                <tbody>
                                    @if($serviceOrder->shipper->contact->type === 'business')
                                        <tr>
                                            <td class="p-1">
                                                <i class="fa-solid fa-building"></i>
                                            </td>

                                            <td class="p-1 whitespace-nowrap">
                                                {{ $serviceOrder->shipper->contact->company }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="p-1">
                                                <i class="fa-solid fa-clock"></i>
                                            </td>

                                            <td class="p-1 whitespace-nowrap">
                                                {{ $serviceOrder->shipper->contact->working_from }} - {{ $serviceOrder->shipper->contact->working_to }}
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td class="p-1">
                                            <i class="fa-solid fa-user"></i>
                                        </td>

                                        <td class="p-1 whitespace-nowrap">
                                            uShip Logistics LLC 1
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="p-1">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </td>

                                        <td class="p-1">
                                            205 Riverside Dr. STE A, austin, TX, 78704
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="p-1">
                                            <i class="fa-solid fa-phone"></i>
                                        </td>

                                        <td class="p-1">
                                            N/A
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </x-slot>
                </x-card>
                <!-- End Shipper -->

                <!-- Start Damages -->
                <x-card class="mb-6">
                    <x-slot name="body">
                        <div x-data="{ expanded: false }">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-lg text-gray-700 font-semibold dark:text-gray-300">
                                    <i class="fa-solid fa-car-burst"></i> {{ __('Damages') }}
                                </h2>

                                <button class="button button-icon button-primary-soft button-icon-xs" @click="expanded = !expanded">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>

                            <div x-show="expanded" x-collapse x-cloak>
                                <div class="flex flex-wrap -mx-2">
                                    <div class="w-full px-2 mb-4 md:w-full">
                                        <label class="text-smpl-1 mb-2" for="amount">Amount *</label>

                                        <x-input
                                            id="amount"
                                            name="amount"
                                            type="text"
                                            class="focus:ring-0"
                                            x-mask:dynamic="$money($input)"
                                            placeholder="$ 0.00"
                                        ></x-input>
                                    </div>
                                </div>

                                <div class="flex flex-wrap -mx-2">
                                    <div class="w-full px-2 mb-4 md:w-full">
                                        <label class="text-smpl-1 mb-2" for="description">Description *</label>

                                        <x-textarea
                                            id="description"
                                            name="description"
                                            class="focus:ring-0"
                                        ></x-textarea>
                                    </div>
                                </div>
                            </div>

                            @if(true)
                                <div class="flex flex-col space-y-4">
                                    <div class="flex items-center">
                                        <div class="w-full pr-3">
                                            <h3 class="font-semibold dark:text-gray-300">
                                                - $25.00
                                            </h3>

                                            <div class="w-full mt-1">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            </div>
                                        </div>

                                        {{-- <form action="#" method="POST">
                                            @csrf @method('DELETE')

                                            <button class="button-icon button-danger-soft button-icon-xs">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form> --}}
                                    </div>
                                </div>
                            @else
                                <div class="flex items-center justify-between">
                                    <span>No damage in that order</span>
                                </div>
                            @endif
                        </div>
                    </x-slot>
                </x-card>
                <!-- End Damages -->
            </div>
        </div>
    </div>

    @isset($serviceOrder)
        <x-slide-over class="!p-0" title="Basic details" :initialState="$errors->has('basic.*')" id="edit-basic">
            <form class="h-full" action="{{ route('service-orders.update', $serviceOrder->id) }}" method="POST">
                @csrf @method('PUT')

                <div class="min-h-[calc(100%-4rem)] p-4 md:px-6">

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="load_id">ID load *</label>

                            <x-input
                                id="load_id"
                                name="basic[load_id]"
                                type="text"
                                value="{{ $errors->has('basic.*') ? old('basic.load_id') : $serviceOrder->load_id }}"
                            ></x-input>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="trailer_type">Trailer Type *</label>

                            <select class="input @error('basic.trailer_type') is-border-danger @enderror" id="trailer_type" name="basic[trailer_type]">
                                <option
                                    @selected(($errors->has('basic.*') ? old('basic.trailer_type') : $serviceOrder->trailer_type) === 'opened')
                                    value="opened">Opened
                                </option>

                                <option
                                    @selected(($errors->has('basic.*') ? old('basic.trailer_type') : $serviceOrder->trailer_type) === 'closed')
                                    value="closed">Closed
                                </option>
                            </select>

                            @error('basic.trailer_type')
                                <span class="inline-block uppercase text-danger text-[12px] pl-2 mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="inspection_type">Inspection Type *</label>

                            <select class="input @error('basic.inspection_type') is-border-danger @enderror" id="inspection_type" name="basic[inspection_type]">
                                <option
                                    @selected(($errors->has('basic.*') ? old('basic.inspection_type') : $serviceOrder->inspection_type) === 'standard')
                                    value="standard">Standart
                                </option>

                                <option
                                    @selected(($errors->has('basic.*') ? old('basic.inspection_type') : $serviceOrder->inspection_type) === 'M22')
                                    value="M22">M22
                                </option>
                            </select>

                            @error('basic.inspection_type')
                                <span class="inline-block uppercase text-danger text-[12px] pl-2 mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="inline-block text-sm font-semibold pl-1 mb-1" for="dispatch_instruction">Dispatch Instructions</label>

                            <x-textarea
                                id="dispatch_instruction"
                                name="basic[dispatch_instructions]"
                                rows="4"
                                value="{{ $errors->has('basic.*') ? old('basic.dispatch_instructions') : $serviceOrder->dispatch_instructions }}"
                            ></x-textarea>

                            @error('basic.dispatch_instruction')
                                <span class="inline-block uppercase text-danger text-[12px] pl-2 mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="h-16 w-full flex justify-end items-center gap-2 border-t px-4 md:px-6 dark:border-zinc-700">
                    <button class="button button-primary uppercase" type="submit">
                        {{ __('update basic details') }}
                    </button>
                </div>
            </form>
        </x-slide-over>
    @endisset

    @if(true)
        <x-slide-over class="!p-0" title="Assign driver" :initialState="$errors->has('driver')" id="assign">
            <form class="h-full" action="{{ route('service-orders.assign', $serviceOrder->id) }}" method="POST">
                @csrf @method('PATCH')

                <div class="min-h-[calc(100%-4rem)] p-4 md:px-6">
                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="driver">Select a driver *</label>

                            <x-selects.select-user
                                id="driver"
                                name="driver"
                                api="{{ route('get.users') }}"
                                value="{{ $errors->has('driver') ? old('driver') : $serviceOrder->driver_id }}"
                            ></x-selects.select-user>
                        </div>
                    </div>
                </div>

                <div class="h-16 w-full flex justify-end items-center gap-2 border-t px-4 md:px-6 dark:border-zinc-700">
                    <button class="button button-primary uppercase" type="submit">
                        {{ !isset($serviceOrder->driver_id) ? __('assign driver') : __('re-assign driver') }}
                    </button>
                </div>
            </form>
        </x-slide-over>
    @endif

    @if(true)
        <x-slide-over class="!p-0" title="New vehicle" :initialState="$errors->has('vehicle.new.*')" id="add-vehicle">
            <form class="h-full" action="{{ route('vehicles.store', $serviceOrder->id) }}" method="POST">
                @csrf

                <div class="min-h-[calc(100%-4rem)] p-4 md:px-6">

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_vin">VIN *</label>

                            <x-input
                                name="vehicle[new][vin]"
                                type="text"
                                value="{{ $errors->has('vehicle.new.*') ? old('vehicle.new.vin') : '' }}"
                            ></x-input>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_make">Make *</label>

                            <x-input
                                name="vehicle[new][make]"
                                type="text"
                                value="{{ $errors->has('vehicle.new.*') ? old('vehicle.new.make') : '' }}"
                            ></x-input>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_model">Model *</label>

                            <x-input
                                name="vehicle[new][model]"
                                type="text"
                                value="{{ $errors->has('vehicle.new.*') ? old('vehicle.new.model') : '' }}"
                            ></x-input>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_year">Year *</label>

                            <x-input
                                name="vehicle[new][year]"
                                type="text"
                                x-mask="9999"
                                placeholder="YYYY"
                                value="{{ $errors->has('vehicle.new.*') ? old('vehicle.new.year') : '' }}"
                            ></x-input>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_color">Color *</label>

                            <x-input
                                name="vehicle[new][color]"
                                type="text"
                                value="{{ $errors->has('vehicle.new.*') ? old('vehicle.new.color') : '' }}"
                            ></x-input>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_operable">Operable *</label>

                            <select class="input @error('vehicle.new.operable') is-border-danger @enderror" id="vehicle_operable" name="vehicle[new][operable]">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_type">Type *</label>

                            <select class="input" id="vehicle_type" name="vehicle[new][type]">
                                @foreach(\App\Models\VehicleType::all() as $vehicle)
                                    <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                                @endforeach
                            </select>

                            @error("vehicle.new.type")
                                <span class="inline-block uppercase text-danger text-[12px] pl-2 mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_lot">Lot Number *</label>

                            <x-input
                                name="vehicle[new][lot_number]"
                                type="text"
                                value="{{ $errors->has('vehicle.new.*') ? old('vehicle.new.lot_number') : '' }}"
                            ></x-input>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_buyer">Buyer Number *</label>

                            <x-input
                                name="vehicle[new][buyer]"
                                type="text"
                                x-mask="(999) 999-9999"
                                placeholder="(___) ___-____"
                                value="{{ $errors->has('vehicle.new.*') ? old('vehicle.new.buyer') : '' }}"
                            ></x-input>
                        </div>
                    </div>
                </div>

                <div class="h-16 w-full flex justify-end items-center gap-2 border-t px-4 md:px-6 dark:border-zinc-700">
                    <button class="button button-primary uppercase" type="submit">
                        {{ __('add vehicle') }}
                    </button>
                </div>
            </form>
        </x-slide-over>
    @endif

    @foreach($serviceOrder->vehicles as $vehicle)
        <x-slide-over
            class="!p-0"
            title="{{ $vehicle->make }} {{ $vehicle->year }} {{ $vehicle->model }}"
            :initialState="$errors->has('vehicle.' . $vehicle->id . '.*')"
            id="edit-vehicle-{{ $vehicle->id }}"
        >

            <form class="h-full" action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
                @csrf @method('PUT')

                <div class="min-h-[calc(100%-4rem)] p-4 md:px-6">

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_vin">VIN *</label>

                            <x-input
                                name="vehicle[{{ $vehicle->id }}][vin]"
                                type="text"
                                value='{{ $errors->has("vehicle.{$vehicle->id}.*") ? old("vehicle.{$vehicle->id}.vin") : $vehicle->vin }}'
                            ></x-input>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_make">Make *</label>

                            <x-input
                                name="vehicle[{{ $vehicle->id }}][make]"
                                type="text"
                                value='{{ $errors->has("vehicle.{$vehicle->id}.*") ? old("vehicle.{$vehicle->id}.make") : $vehicle->make }}'
                            ></x-input>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_model">Model *</label>

                            <x-input
                                name="vehicle[{{ $vehicle->id }}][model]"
                                type="text"
                                value='{{ $errors->has("vehicle.{$vehicle->id}.*") ? old("vehicle.{$vehicle->id}.model") : $vehicle->model }}'
                            ></x-input>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_year">Year *</label>

                            <x-input
                                name="vehicle[{{ $vehicle->id }}][year]"
                                type="text"
                                x-mask="9999"
                                value='{{ $errors->has("vehicle.{$vehicle->id}.*") ? old("vehicle.{$vehicle->id}.year") : $vehicle->year }}'
                            ></x-input>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_color">Color *</label>

                            <x-input
                                name="vehicle[{{ $vehicle->id }}][color]"
                                type="text"
                                value='{{ $errors->has("vehicle.{$vehicle->id}.*") ? old("vehicle.{$vehicle->id}.color") : $vehicle->color }}'
                            ></x-input>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_operable">Operable *</label>

                            <select
                                class="input @error("vehicle.{$vehicle->id}.operable") is-border-danger @enderror"
                                id="vehicle_operable"
                                name="vehicle[{{ $vehicle->id }}][operable]"
                            >
                                <option
                                    @selected(($errors->has("vehicle.{$vehicle->id}.*") ? boolval(old("vehicle.{$vehicle->id}.operable")) : $vehicle->operable) === true)
                                    value="1">Yes
                                </option>

                                <option
                                    @selected(($errors->has("vehicle.{$vehicle->id}.*") ? boolval(old("vehicle.{$vehicle->id}.operable")) : $vehicle->operable) === false)
                                    value="0">No
                                </option>
                            </select>

                            @error("vehicle.{$vehicle->id}.operable")
                                <span class="inline-block uppercase text-danger text-[12px] pl-2 mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_type">Type *</label>

                            <select class="input @error("vehicle.{$vehicle->id}.type") is-border-danger @enderror" id="vehicle_type" name="vehicle[{{ $vehicle->id }}][type]">
                                @foreach(\App\Models\VehicleType::all() as $type)
                                    <option
                                        @selected(($errors->has("vehicle.{$vehicle->id}.*") ? old("vehicle.{$vehicle->id}.type") : $vehicle->type->id) === $type->id)
                                        value="{{ $type->id }}">{{ $type->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error("vehicle.{$vehicle->id}.type")
                                <span class="inline-block uppercase text-danger text-[12px] pl-2 mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_lot">Lot Number *</label>

                            <x-input
                                name="vehicle[{{ $vehicle->id }}][lot_number]"
                                type="text"
                                value='{{ $errors->has("vehicle.{$vehicle->id}.*") ? old("vehicle.{$vehicle->id}.lot_number") : $vehicle->lot_number }}'
                            ></x-input>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="vehicle_buyer">Buyer Number *</label>

                            <x-input
                                name="vehicle[{{ $vehicle->id }}][buyer]"
                                type="text"
                                x-mask="(999) 999-9999"
                                placeholder="(___) ___-____"
                                value='{{ $errors->has("vehicle.{$vehicle->id}.*") ? old("vehicle.{$vehicle->id}.buyer") : $vehicle->buyer_number }}'
                            ></x-input>
                        </div>
                    </div>
                </div>

                <div class="h-16 w-full flex justify-end items-center gap-2 border-t px-4 md:px-6 dark:border-zinc-700">
                    <button class="button button-primary uppercase" type="submit">
                        {{ __('Update vehicle') }}
                    </button>
                </div>
            </form>
        </x-slide-over>
    @endforeach

    @isset($serviceOrder->pickup)
        <x-slide-over class="!p-0" title="Pickup" :initialState="$errors->has('pickup.*')" id="edit-pickup">
            <form class="h-full" action="{{ route('pickup.update', $serviceOrder->pickup->id) }}" method="POST">
                @csrf @method('PUT')

                <div x-data="{ active: '{{ $errors->has('pickup.*') ? old('pickup.type_contact') : $serviceOrder->pickup->contact->type }}' }" class="min-h-[calc(100%-4rem)] p-4 md:px-6">
                    <input x-show="false" :value="active" name="pickup[type_contact]" type="text">

                    <div class="flex items-center space-x-2 mb-4">
                        <div class="inline-flex gap-2 p-1 bg-gray-100 rounded-sm dark:bg-white/5">
                            <button
                                class="button button-sm button-primary"
                                @click="active = 'personal'"
                                :class="active === 'personal' ? 'button-primary' : 'button-primary-outline'"
                                type="button"
                            >
                                {{ __('Personal Contact') }}
                            </button>

                            <button
                                class="button button-sm"
                                @click="active = 'business'"
                                :class="active === 'business' ? 'button-primary' : 'button-primary-outline'"
                                type="button"
                            >
                                {{ __('Business Contact') }}
                            </button>
                        </div>
                    </div>

                    <div x-show="active === 'business'">
                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="pickup_company">Company Name *</label>

                                <x-input
                                    id="pickup_company"
                                    name="pickup[company]"
                                    type="text"
                                    x-bind:disabled="active !== 'business'"
                                    value="{{ $errors->has('pickup.*') ? old('pickup.company') : $serviceOrder->pickup->contact->company }}"
                                ></x-input>
                            </div>

                            <div class="w-full px-2 mb-4 md:w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="pickup_working_from">Working from *</label>

                                <x-input
                                    id="pickup_working_from"
                                    name="pickup[working_from]"
                                    type="time"
                                    x-bind:disabled="active !== 'business'"
                                    value="{{ $errors->has('pickup.*') ? old('pickup.working_from') : $serviceOrder->pickup->contact->working_from }}"
                                ></x-input>
                            </div>

                            <div class="w-full px-2 mb-4 md:w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="pickup_working_to">Working to *</label>

                                <x-input
                                    id="pickup_working_to"
                                    name="pickup[working_to]"
                                    type="time"
                                    x-bind:disabled="active !== 'business'"
                                    value="{{ $errors->has('pickup.*') ? old('pickup.working_to') : $serviceOrder->pickup->contact->working_to }}"
                                ></x-input>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="pickup_name">Contact Name *</label>

                            <x-input
                                id="pickup_name"
                                name="pickup[name]"
                                type="text"
                                value="{{ $errors->has('pickup.*') ? old('pickup.name') : $serviceOrder->pickup->contact->name }}"
                            ></x-input>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="pickup_email">Contact Email *</label>

                            <x-input
                                id="pickup_email"
                                name="pickup[email]"
                                type="email"
                                value="{{ $errors->has('pickup.*') ? old('pickup.email') : $serviceOrder->pickup->contact->email }}"
                            ></x-input>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="pickup_phone">Contact Phone *</label>

                            <x-input
                                id="pickup_phone"
                                name="pickup[phone]"
                                type="text"
                                x-mask="(999) 999-9999"
                                placeholder="(___) ___-____"
                                value="{{ $errors->has('pickup.*') ? old('pickup.phone') : $serviceOrder->pickup->contact->phone }}"
                            ></x-input>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="pickup_address">Address *</label>

                            <x-input
                                id="pickup_address"
                                name="pickup[address]"
                                type="text"
                                value="{{ $errors->has('pickup.*') ? old('pickup.address') : $serviceOrder->pickup->address }}"
                            ></x-input>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="pickup_notes">Notes</label>

                            <x-input
                                id="pickup_notes"
                                name="pickup[notes]"
                                type="text"
                                value="{{ $errors->has('pickup.*') ? old('pickup.notes') : $serviceOrder->pickup->notes }}"
                            ></x-input>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="pickup_zip">Zip *</label>

                            <x-input
                                id="pickup_zip"
                                name="pickup[zip]"
                                type="text"
                                value="{{ $errors->has('pickup.*') ? old('pickup.zip') : $serviceOrder->pickup->zip }}"
                            ></x-input>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="pickup_date">Pickup date *</label>

                            <x-input
                                id="pickup_date"
                                name="pickup[date]"
                                type="date"
                                value="{{ $errors->has('pickup.*') ? old('pickup.date') : $serviceOrder->pickup->date->format('Y-m-d') }}"
                            ></x-input>
                        </div>
                    </div>

                    <div class="w-full mt-2 px-2 mb-4">
                        <div class="inline-flex items-center gap-3">
                            <input
                                type="checkbox"
                                class="checkbox"
                                id="pickup_signature"
                                name="pickup[not_signature]"
                                @checked($errors->has('pickup.*') ? old('pickup.not_signature') : !$serviceOrder->pickup->signature_required)
                            >

                            <label class="font-semibold text-base cursor-pointer select-none" for="pickup_signature">
                                {{ __('Signature not required') }}
                                <i class="ml-1 fa-solid fa-circle-exclamation"></i>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="h-16 w-full flex justify-end items-center gap-2 border-t px-4 md:px-6 dark:border-zinc-700">
                    <button class="button button-primary uppercase" type="submit">
                        {{ __('Update pickup') }}
                    </button>
                </div>
            </form>
        </x-slide-over>
    @endisset

    @isset($serviceOrder->delivery)
        <x-slide-over class="!p-0" title="Delivery" :initialState="$errors->has('delivery.*')" id="edit-delivery">
            <form class="h-full" action="{{ route('delivery.update', $serviceOrder->delivery->id) }}" method="POST">
                @csrf @method('PUT')

                <div class="min-h-[calc(100%-4rem)] p-4 md:px-6">
                    <div x-data="{ active: '{{ $errors->has('delivery.*') ? old('delivery.type_contact') : $serviceOrder->delivery->contact->type }}' }">
                        <input x-show="false" :value="active" name="delivery[type_contact]" type="text">

                        <div class="flex items-center space-x-2 mb-4">
                            <div class="inline-flex gap-2 p-1 bg-gray-100 rounded-sm dark:bg-white/5">
                                <button
                                    class="button button-sm button-primary"
                                    @click="active = 'personal'"
                                    :class="active === 'personal' ? 'button-primary' : 'button-primary-outline'"
                                    type="button"
                                >
                                    {{ __('Personal Contact') }}
                                </button>

                                <button
                                    class="button button-sm"
                                    @click="active = 'business'"
                                    :class="active === 'business' ? 'button-primary' : 'button-primary-outline'"
                                    type="button"
                                >
                                    {{ __('Business Contact') }}s
                                </button>
                            </div>
                        </div>

                        <div x-show="active === 'business'">
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-full">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="delivery_company">Company Name *</label>

                                    <x-input
                                        id="delivery_company"
                                        name="delivery[company]"
                                        type="text"
                                        x-bind:disabled="active !== 'business'"
                                        value="{{ $errors->has('delivery.*') ? old('delivery.company') : $serviceOrder->delivery->contact->company }}"
                                    ></x-input>
                                </div>

                                <div class="w-full px-2 mb-4 md:w-full">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="delivery_working_from">Working from *</label>

                                    <x-input
                                        id="delivery_working_from"
                                        name="delivery[working_from]"
                                        type="time"
                                        x-bind:disabled="active !== 'business'"
                                        value="{{ $errors->has('delivery.*') ? old('delivery.working_from') : $serviceOrder->delivery->contact->working_from }}"
                                    ></x-input>
                                </div>

                                <div class="w-full px-2 mb-4 md:w-full">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="delivery_working_to">Working to *</label>

                                    <x-input
                                        id="delivery_working_to"
                                        name="delivery[working_to]"
                                        type="time"
                                        x-bind:disabled="active !== 'business'"
                                        value="{{ $errors->has('delivery.*') ? old('delivery.working_to') : $serviceOrder->delivery->contact->working_to }}"
                                    ></x-input>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="delivery_name">Contact Name *</label>

                                <x-input
                                    id="delivery_name"
                                    name="delivery[name]"
                                    type="text"
                                    value="{{ $errors->has('delivery.*') ? old('delivery.name') : $serviceOrder->delivery->contact->name }}"
                                ></x-input>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="delivery_email">Contact Email *</label>

                                <x-input
                                    id="delivery_email"
                                    name="delivery[email]"
                                    type="email"
                                    value="{{ $errors->has('delivery.*') ? old('delivery.email') : $serviceOrder->delivery->contact->email }}"
                                ></x-input>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="delivery_phone">Contact Phone *</label>

                                <x-input
                                    id="delivery_phone"
                                    name="delivery[phone]"
                                    type="text"
                                    x-mask="(999) 999-9999"
                                    placeholder="(___) ___-____"
                                    value="{{ $errors->has('delivery.*') ? old('delivery.phone') : $serviceOrder->delivery->contact->phone }}"
                                ></x-input>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="delivery_address">Address *</label>

                                <x-input
                                    id="delivery_address"
                                    name="delivery[address]"
                                    type="text"
                                    value="{{ $errors->has('delivery.*') ? old('delivery.address') : $serviceOrder->delivery->address }}"
                                ></x-input>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="delivery_notes">Notes</label>

                                <x-input
                                    id="delivery_notes"
                                    name="delivery[notes]"
                                    type="text"
                                    value="{{ $errors->has('delivery.*') ? old('delivery.notes') : $serviceOrder->delivery->notes }}"
                                ></x-input>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="delivery_zip">Zip *</label>

                                <x-input
                                    id="delivery_zip"
                                    name="delivery[zip]"
                                    type="text"
                                    value="{{ $errors->has('delivery.*') ? old('delivery.zip') : $serviceOrder->delivery->zip }}"
                                ></x-input>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="delivery_date">Pickup date *</label>

                                <x-input
                                    id="delivery_date"
                                    name="delivery[date]"
                                    type="date"
                                    value="{{ $errors->has('delivery.*') ? old('delivery.date') : $serviceOrder->delivery->date->format('Y-m-d') }}"
                                ></x-input>
                            </div>
                        </div>

                        <div class="w-full mt-2 px-2 mb-4">
                            <div class="inline-flex items-center gap-3">
                                <input
                                    type="checkbox"
                                    class="checkbox"
                                    id="delivery_signature"
                                    name="delivery[not_signature]"
                                    @checked($errors->has('delivery.*') ? old('delivery.not_signature') : !$serviceOrder->delivery->signature_required)
                                >

                                <label class="font-semibold text-base cursor-pointer select-none" for="pickup_signature">
                                    {{ __('Signature not required') }}
                                    <i class="ml-1 fa-solid fa-circle-exclamation"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="h-16 w-full flex justify-end items-center gap-2 border-t px-4 md:px-6 dark:border-zinc-700">
                    <button class="button button-primary uppercase" type="submit">
                        {{ __('update delivery') }}
                    </button>
                </div>
            </form>
        </x-slide-over>
    @endisset

    @isset($serviceOrder->payment)
        <x-slide-over class="!p-0" title="Payment" :initialState="$errors->has('payment.*')" id="edit-payment">
            <form class="h-full" action="{{ route('payment.update', $serviceOrder->payment->id) }}" method="POST">
                @csrf @method('PUT')

                <div class="min-h-[calc(100%-4rem)] p-4 md:px-6">

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="payment_carrier">Carrier Pay *</label>

                            <x-input
                                id="payment_carrier"
                                name="payment[carrier]"
                                type="text"
                                x-mask:dynamic="$money($input)"
                                placeholder="0.00"
                                value="{{ $errors->has('payment.*') ? old('payment.carrier') : $serviceOrder->payment->carrier_pay }}"
                            ></x-input>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="payment_method">Method *</label>

                            <select class="input @error('payment.method') is-border-danger @enderror" id="payment_method" name="payment[method]">
                                @foreach(\App\Enums\PaymentMethodsEnum::cases() as $method)
                                    <option
                                        @selected(($errors->has('payment.*') ? old('payment.method') : $serviceOrder->payment->method->value) === $method->value)
                                        value="{{ $method->value }}">{{ $method->value }}
                                    </option>
                                @endforeach
                            </select>

                            @error('payment.method')
                                <span class="inline-block uppercase text-danger text-[12px] pl-2 mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="payment_type">Type *</label>

                            <select class="input @error('payment.type') is-border-danger @enderror" id="payment_type" name="payment[type]">
                                @foreach(\App\Enums\PaymentTypesEnum::cases() as $type)
                                    <option
                                        @selected(($errors->has('payment.*') ? old('payment.type') : $serviceOrder->payment->type->value) === $type->value)
                                        value="{{ $type->value }}">{{ $type->value }}
                                    </option>
                                @endforeach
                            </select>

                            @error('payment.type')
                                <span class="inline-block uppercase text-danger text-[12px] pl-2 mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label for="payment_notes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Payment notes</label>

                            <x-textarea
                                id="payment_notes"
                                name="payment[notes]"
                                rows="4"
                                value="{{ $errors->has('payment.*') ? old('payment.notes') : $serviceOrder->payment->notes }}"
                            ></x-textarea>
                        </div>
                    </div>
                </div>

                <div class="h-16 w-full flex justify-end items-center gap-2 border-t px-4 md:px-6 dark:border-zinc-700">
                    <button class="button button-primary uppercase" type="submit">
                        {{ __('update payment') }}
                    </button>
                </div>
            </form>
        </x-slide-over>
    @endisset

    @isset($serviceOrder->shipper)
        <x-slide-over class="!p-0" title="Shipper" :initialState="$errors->has('shipper.*')" id="edit-shipper">
            <form class="h-full" action="{{ route('shipper.update', $serviceOrder->shipper->id) }}" method="POST">
                @csrf @method('PUT')

                <div class="min-h-[calc(100%-4rem)] p-4 md:px-6">
                    <div x-data="{ active: '{{ $errors->has('shipper.*') ? old('shipper.type_contact') : $serviceOrder->shipper->contact->type }}' }">
                        <input x-show="false" :value="active" name="shipper[type_contact]" type="text">

                        <div class="flex items-center space-x-2 mb-4">
                            <div class="inline-flex gap-2 p-1 bg-gray-100 rounded-sm dark:bg-white/5">
                                <button
                                    class="button button-sm button-primary"
                                    @click="active = 'personal'"
                                    :class="active === 'personal' ? 'button-primary' : 'button-primary-outline'"
                                    type="button"
                                >
                                    {{ __('Personal Contact') }}
                                </button>

                                <button
                                    class="button button-sm"
                                    @click="active = 'business'"
                                    :class="active === 'business' ? 'button-primary' : 'button-primary-outline'"
                                    type="button"
                                >
                                    {{ __('Business Contact') }}s
                                </button>
                            </div>
                        </div>

                        <div x-show="active === 'business'">
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full px-2 mb-4 md:w-full">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="shipper_company">Company Name</label>

                                    <x-input
                                        id="shipper_company"
                                        name="shipper[company]"
                                        type="text"
                                        x-bind:disabled="active !== 'business'"
                                        value="{{ $errors->has('shipper.*') ? old('shipper.company') : $serviceOrder->shipper->contact->company }}"
                                    ></x-input>
                                </div>

                                <div class="w-full px-2 mb-4 md:w-full">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="shipper_working_from">Working from</label>

                                    <x-input
                                        id="shipper_working_from"
                                        name="shipper[working_from]"
                                        type="time"
                                        x-bind:disabled="active !== 'business'"
                                        value="{{ $errors->has('shipper.*') ? old('shipper.working_from') : $serviceOrder->shipper->contact->working_from }}"
                                    ></x-input>
                                </div>

                                <div class="w-full px-2 mb-4 md:w-full">
                                    <label class="text-sm font-semibold pl-1 mb-2" for="shipper_working_to">Working to</label>

                                    <x-input
                                        id="shipper_working_to"
                                        name="shipper[working_to]"
                                        type="time"
                                        x-bind:disabled="active !== 'business'"
                                        value="{{ $errors->has('shipper.*') ? old('shipper.working_to') : $serviceOrder->shipper->contact->working_to }}"
                                    ></x-input>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="shipper_name">Contact Name *</label>

                                <x-input
                                    id="shipper_name"
                                    name="shipper[name]"
                                    type="text"
                                    value="{{ $errors->has('shipper.*') ? old('shipper.name') : $serviceOrder->shipper->contact->name }}"
                                ></x-input>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="shipper_email">Contact Email *</label>

                                <x-input
                                    id="shipper_email"
                                    name="shipper[email]"
                                    type="email"
                                    value="{{ $errors->has('shipper.*') ? old('shipper.email') : $serviceOrder->shipper->contact->email }}"
                                ></x-input>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="shipper_phone">Contact Phone *</label>

                                <x-input
                                    id="shipper_phone"
                                    name="shipper[phone]"
                                    type="text"
                                    x-mask="(999) 999-9999"
                                    placeholder="(___) ___-____"
                                    value="{{ $errors->has('shipper.*') ? old('shipper.phone') : $serviceOrder->shipper->contact->phone }}"
                                ></x-input>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="shipper_address">Address *</label>

                                <x-input
                                    id="shipper_address"
                                    name="shipper[address]"
                                    type="text"
                                    value="{{ $errors->has('shipper.*') ? old('shipper.address') : $serviceOrder->shipper->address }}"
                                ></x-input>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="shipper_notes">Notes</label>

                                <x-input
                                    id="shipper_notes"
                                    name="shipper[notes]"
                                    type="text"
                                    value="{{ $errors->has('shipper.*') ? old('shipper.notes') : $serviceOrder->shipper->notes }}"
                                ></x-input>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full px-2 mb-4 md:w-full">
                                <label class="text-sm font-semibold pl-1 mb-2" for="shipper_zip">Zip *</label>

                                <x-input
                                    id="shipper_zip"
                                    name="shipper[zip]"
                                    type="text"
                                    value="{{ $errors->has('shipper.*') ? old('shipper.zip') : $serviceOrder->shipper->zip }}"
                                ></x-input>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="h-16 w-full flex justify-end items-center gap-2 border-t px-4 md:px-6 dark:border-zinc-700">
                    <button class="button button-primary uppercase" type="submit">
                        {{ __('update shipper') }}
                    </button>
                </div>
            </form>
        </x-slide-over>
    @endisset
</x-app>
