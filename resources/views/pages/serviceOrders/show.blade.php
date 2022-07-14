<x-app title="ORDER #14234" :active="['item' => 'service']">

    <div class="my-6 px-4 md:px-6">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <div class="w-full md:w-max">
                <div class="w-full inline-flex items-center mb-1 ">
                    <h1 class="truncate uppercase text-2xl font-bold text-gray-400 dark:text-white">
                        ORDER #14234
                    </h1>

                    <span class="badge-info ml-4">Assigned</span>
                </div>


                <x-breadcrumb :path="['Service Orders' => route('service-orders.index'), '#14234' => route('service-orders.show', $serviceOrder->id)]" />
            </div>

            <button class="button button-primary uppercase hidden md:flex">
                {{ __('add to a trip') }} <i class="fa-solid fa-plus"></i>
            </button>
        </div>
    </div>

    <div class="px-4 md:px-6">
        <h3 class="font-semibold mb-3">
            <i class="text-warning mr-1 fa-solid fa-triangle-exclamation"></i>
            Pickup date was today. <span class="text-warning"><a href="#">Update status?</a></span>
        </h3>

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
                            <table id="table_payment_order">
                                <tbody>
                                    <tr class="font-semibold text-gray-700 dark:text-gray-300">
                                        <td class="p-1 whitespace-nowrap">
                                            ID Load
                                        </td>

                                        <td class="p-1 font-bold">
                                            #3824426-AT
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="p-1 whitespace-nowrap">
                                            Trailer type
                                        </td>

                                        <td class="p-1">
                                            Open
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="p-1 whitespace-nowrap">
                                            Inspection type
                                        </td>

                                        <td class="p-1">
                                            Standard
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="p-1 whitespace-nowrap">
                                            Dispatch Instructions
                                        </td>

                                        <td class="p-1">
                                            No instruction <i class="text-danger fa-solid fa-ban"></i>
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

                        <div class="flex items-center pb-6 border-b border-gray-200 dark:border-zinc-700">
                            <x-avatar-user class="!w-14 !h-14 !rounded" :user="Auth::user()" />

                            <div class="flex items-start justify-between w-full">
                                <div class="pl-3 w-full">
                                    <p tabindex="0" class="text-xl font-medium leading-5 text-gray-700 dark:text-gray-300">Dogecoin nerds</p>
                                    <p tabindex="0" class="text-sm pt-2 ">Admin | Driver | Dispatcher</p>
                                </div>

                                <button class="button-icon button-icon-xs button-primary-soft rounded">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
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
                                            dogecoin.nerds@gmail.com
                                        </th>
                                        <td class="px-6 py-4">
                                            (555) 2854-25685
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
                    </x-slot>
                </x-card>
                <!-- End Driver -->

                <!-- Start Vehicle -->
                <x-card class="mb-6">
                    <x-slot name="body">
                        <h2 class="text-lg text-gray-700 font-semibold dark:text-gray-300 mb-6">
                            <i class="fa-solid fa-car"></i> {{ __('Vehicle') }}
                        </h2>

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
                                            Type
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
                                    <tr class="border-b dark:bg-transparent dark:border-zinc-700 odd:bg-transparent even:bg-gray-50 odd:dark:bg-transparent even:dark:bg-white/5">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            2022 nissan rogue
                                        </th>
                                        <td class="px-6 py-4">
                                            Sedan
                                        </td>
                                        <td class="px-6 py-4">
                                            Open
                                        </td>
                                        <td class="px-6 py-4">
                                            Operable
                                        </td>
                                        <td class="px-6 py-4">
                                            5N1BT3AAXNC702546
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="inline-flex items-center gap-2">
                                                <button class="button-icon button-icon-xs button-primary-soft rounded">
                                                    <i class="fa-solid fa-pen"></i>
                                                </button>

                                                <button class="button-icon button-icon-xs button-danger-soft rounded">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="border-b dark:bg-transparent dark:border-zinc-700 odd:bg-transparent even:bg-gray-50 odd:dark:bg-transparent even:dark:bg-white/5">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            2016 chevrolet tahoe
                                        </th>
                                        <td class="px-6 py-4">
                                            Sedan
                                        </td>
                                        <td class="px-6 py-4">
                                            Open
                                        </td>
                                        <td class="px-6 py-4">
                                            Operable
                                        </td>
                                        <td class="px-6 py-4">
                                            5N1BT3AAXNC702546
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="inline-flex items-center gap-2">
                                                <button class="button-icon button-icon-xs button-primary-soft rounded">
                                                    <i class="fa-solid fa-pen"></i>
                                                </button>

                                                <button class="button-icon button-icon-xs button-danger-soft rounded">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="dark:bg-transparent dark:border-zinc-700 odd:bg-transparent even:bg-gray-50 odd:dark:bg-transparent even:dark:bg-white/5">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            2020 chevrolet silverado 1500
                                        </th>
                                        <td class="px-6 py-4">
                                            Sedan
                                        </td>
                                        <td class="px-6 py-4">
                                            Open
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="whitespace-nowrap text-gray-400 dark:text-gray-500">
                                                Inoperable <i class="fa-solid fa-car-burst"></i>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            5N1BT3AAXNC702546
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="inline-flex items-center gap-2">
                                                <button class="button-icon button-icon-xs button-primary-soft rounded">
                                                    <i class="fa-solid fa-pen"></i>
                                                </button>

                                                <button class="button-icon button-icon-xs button-danger-soft rounded">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="flex items-center justify-between justify-end mt-4">
                            <span class="font-medium">
                                Total of 5 vehicles
                            </span>
                        </div>
                    </x-slot>
                </x-card>
                <!-- End vehicle -->

                <!-- Start Pickup -->
                <x-card class="mb-6">
                    <x-slot name="body">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-lg text-gray-700 font-semibold dark:text-gray-300">
                                <i class="fa-solid fa-map-location-dot"></i> {{ __('Pickup') }}
                            </h2>

                            <div class="inline-flex gap-2">
                                <button
                                    x-data @click="$dispatch('slide-over', 'edit-pickup')"
                                    class="button button-primary-soft button-xs text-sm dark:button-primary"
                                >

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
                                    <tr class="border-b dark:bg-transparent dark:border-zinc-700 odd:bg-transparent even:bg-gray-50 odd:dark:bg-transparent even:dark:bg-white/5">
                                        <th scope="row" class="px-6 py-4 w-60 min-w-[15rem] font-medium text-gray-900 dark:text-white">
                                            3842 North Highway 95, lake havasu city, AZ, 86404
                                        </th>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Avery Goad (Anderson Nissan)
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            (928) 764-4203
                                        </td>
                                        <td class="px-6 py-4">
                                            Bussines
                                        </td>
                                    </tr>
                                    <tr class="dark:bg-transparent dark:border-zinc-700 odd:bg-transparent even:bg-gray-50 odd:dark:bg-transparent even:dark:bg-white/5">
                                        <th scope="row" class="px-6 py-4 w-60 min-w-[15rem] font-medium text-gray-900 dark:text-white">
                                            2042 Ackerman Rd, san antonio, TX, 78219
                                        </th>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            *CONTACT DISPATCHER*
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            N/A
                                        </td>
                                        <td class="px-6 py-4">
                                            Personal
                                        </td>
                                    </tr>
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
                                <i class="fa-solid fa-map-location-dot"></i> {{ __('Delivery') }}
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
                                    <tr class="dark:bg-transparent dark:border-zinc-700 odd:bg-transparent even:bg-gray-50 odd:dark:bg-transparent even:dark:bg-white/5">
                                        <th scope="row" class="px-6 py-4 w-60 min-w-[15rem] font-medium text-gray-900 dark:text-white">
                                            3842 North Highway 95, lake havasu city, AZ, 86404
                                        </th>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Avery Goad (Anderson Nissan)
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            (928) 764-4203
                                        </td>
                                        <td class="px-6 py-4">
                                            Bussines
                                        </td>
                                    </tr>
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
                                <i class="fa-solid fa-dollar-sign"></i> {{ __('Payment') }}
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

                        <div class="relative overflow-x-auto mb-4">
                            <table id="table_payment_order">
                                <tbody>
                                    <tr class="font-semibold text-gray-700 dark:text-gray-300">
                                        <td class="p-1 whitespace-nowrap">
                                            Carrier pay
                                        </td>

                                        <td class="p-1 font-bold">
                                            $825
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="p-1 whitespace-nowrap">
                                            Receivables
                                        </td>

                                        <td class="p-1">
                                            $825 <span class="cursor-pointer ml-1"><i class="fa-solid fa-circle-exclamation"></i></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

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
                <!-- End Payment/Shipper -->

                <!-- Start Damages -->
                <x-card class="mb-6">
                    <x-slot name="body">
                        <!-- Payment -->
                        <div class="flex items-center justify-between mb-2">
                            <h2 class="text-lg text-gray-700 font-semibold dark:text-gray-300">
                                <i class="fa-solid fa-car-burst"></i> {{ __('Damages') }}
                            </h2>
                        </div>

                        <div class="flex items-center justify-between">
                            <span>No damage in that order</span>

                            <button class="button button-icon button-primary-soft button-icon-xs rounded-sm">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </x-slot>
                </x-card>
                <!-- End Damages -->
            </div>
        </div>
    </div>

    <x-slide-over
        class="!p-0"
        title="Basic details"
        initialState="false"
        id="edit-basic"
    >
        <form class="h-full" action="{{ route('service-orders.update', 1) }}" method="POST">
            @csrf
            @method('put')

            <div class="min-h-[calc(100%-4rem)] p-4 md:px-6">
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label class="text-sm font-semibold pl-1 mb-2" for="load_id">ID Load</label>
                        <input class="input" id="load_id" name="basic[load_id]" type="text">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label class="text-sm font-semibold pl-1 mb-2" for="trailer_type">Trailer Type</label>
                        <select class="input" id="trailer_type" name="basic[trailer_type]">
                            <option selected value="open">Open</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label class="text-sm font-semibold pl-1 mb-2" for="inspection_type">Inspection Type</label>
                        <select class="input" id="inspection_type" name="basic[inspection_type]">
                            <option selected value="standart">Standart</option>
                            <option value="M22">M22</option>
                        </select>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 md:w-full">
                        <label for="dispatch_instructions" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Dispatch Instructions</label>
                        <textarea class="input" id="dispatch_instructions" name="basic[dispatch_instructions]" rows="4" placeholder="{{ __('Add some shipping instructions') }}"></textarea>
                    </div>
                </div>
            </div>

            <div class="h-16 w-full flex justify-end items-center gap-2 border-t px-4 md:px-6 dark:border-zinc-700">
                <button class="button button-primary uppercase" type="submit">
                    {{ __('save') }}
                </button>
            </div>
        </form>
    </x-slide-over>

    <x-slide-over class="!p-0"
        title="Payment"
        initialState="false"
        id="edit-payment"
    >
        <form class="h-full" action="#" method="POST">
            <div class="min-h-[calc(100%-4rem)] p-4 md:px-6">

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label class="text-sm font-semibold pl-1 mb-2" for="payment_carrier">Carrier Pay</label>
                        <input class="input" id="payment_carrier" name="payment[carrier]" type="text">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label class="text-sm font-semibold pl-1 mb-2" for="inspection_type">Inspection Type</label>
                        <select class="input" id="inspection_type" name="basic[inspection_type]">
                            <option selected value="standart">Standart</option>
                            <option value="M22">M22</option>
                        </select>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label for="payment_notes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Payment notes</label>
                        <textarea class="input" id="payment_notes" name="payment[notes]" rows="4"></textarea>
                    </div>
                </div>
            </div>

            <div class="h-16 w-full flex justify-end items-center gap-2 border-t px-4 md:px-6 dark:border-zinc-700">
                <button class="button button-primary uppercase" type="submit">
                    {{ __('save') }}
                </button>
            </div>
        </form>
    </x-slide-over>

    <x-slide-over class="!p-0" title="Shipper" initialState="false" id="edit-shipper">

        <form class="h-full" action="#" method="POST" x-data="{ active: 'business' }">
            <div class="min-h-[calc(100%-4rem)] p-4 md:px-6">
                <div class="flex items-center space-x-2 mb-4">
                    <div class="inline-flex gap-2 p-1 bg-gray-100 rounded-sm dark:bg-white/5">
                        <button class="button button-sm button-primary" @click="active = 'personal'" :class="active === 'personal' ? 'button-primary' : 'button-primary-outline'" type="button">
                            Personal Contact
                        </button>

                        <button class="button button-sm" @click="active = 'business'" :class="active === 'business' ? 'button-primary' : 'button-primary-outline'" type="button">
                            Business Contact
                        </button>
                    </div>
                </div>

                <div x-show="active === 'business'">
                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="shipper_company">Company Name</label>
                            <input class="input" id="shipper_company" name="shipper[company]" type="text" :disabled="active !== 'business'">
                        </div>

                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="shipper_working_from">Working from</label>
                            <input class="input" id="shipper_working_from" name="shipper[working_from]" type="time" :disabled="active !== 'business'">
                        </div>

                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="shipper_working_to">Working to</label>
                            <input class="input" id="shipper_working_to" name="shipper[working_to]" type="time" :disabled="active !== 'business'">
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label class="text-sm font-semibold pl-1 mb-2" for="shipper_name">Contact Name</label>
                        <input class="input" id="shipper_name" name="shipper[name]" type="text">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label class="text-sm font-semibold pl-1 mb-2" for="shipper_email">Contact Email</label>
                        <input class="input" id="shipper_email" name="shipper[email]" type="email">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-1/2">
                        <label class="text-sm font-semibold pl-1 mb-2" for="shipper_phone">Contact Phone</label>
                        <input class="input" id="shipper_phone" name="shipper[phone]" type="text" x-mask="(999) 999-9999" placeholder="(___) ___-____">
                    </div>

                    <div class="w-full px-2 mb-4 md:w-1/2">
                        <label class="text-sm font-semibold pl-1 mb-2" for="shipper_zip">Zip</label>
                        <input class="input" id="shipper_zip" name="shipper[zip]" type="text">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label class="text-sm font-semibold pl-1 mb-2" for="shipper_address">Address</label>
                        <input class="input" id="shipper_address" name="shipper[address]" type="text">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label class="text-sm font-semibold pl-1 mb-2" for="shipper_notes">Notes</label>
                        <input class="input" id="shipper_notes" name="shipper[notes]" type="text">
                    </div>
                </div>
            </div>

            <div class="h-16 w-full flex justify-end items-center gap-2 border-t px-4 md:px-6 dark:border-zinc-700">
                <button class="button button-primary uppercase" type="submit">
                    {{ __('save') }}
                </button>
            </div>
        </form>
    </x-slide-over>

    <x-slide-over class="!p-0" title="Pickup" initialState="false" id="edit-pickup">

        <form class="h-full" action="#" method="POST" x-data="{ active: 'business' }">
            <div class="min-h-[calc(100%-4rem)] p-4 md:px-6">

                <div class="flex items-center space-x-2 mb-4">
                    <div class="inline-flex gap-2 p-1 bg-gray-100 rounded-sm dark:bg-white/5">
                        <button class="button button-sm button-primary" @click="active = 'personal'" :class="active === 'personal' ? 'button-primary' : 'button-primary-outline'" type="button">
                            Personal Contact
                        </button>

                        <button class="button button-sm" @click="active = 'business'" :class="active === 'business' ? 'button-primary' : 'button-primary-outline'" type="button">
                            Business Contact
                        </button>
                    </div>
                </div>

                <div x-show="active === 'business'">
                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="pickup_company">Company Name</label>
                            <input class="input" id="pickup_company" name="pickup[company] " type="text" :disabled="active !== 'business'">
                        </div>

                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="pickup_working_from">Working from</label>
                            <input class="input" id="pickup_working_from" name="pickup[working_from]" type="time" :disabled="active !== 'business'">
                        </div>

                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="pickup_working_to">Working to</label>
                            <input class="input" id="pickup_working_to" name="pickup[working_to]" type="time" :disabled="active !== 'business'">
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label class="text-sm font-semibold pl-1 mb-2" for="pickup_name">Contact Name</label>
                        <input class="input" id="pickup_name" name="pickup[name]" type="text">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label class="text-sm font-semibold pl-1 mb-2" for="pickup_email">Contact Email</label>
                        <input class="input" id="pickup_email" name="pickup[email]" type="email">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-1/2">
                        <label class="text-sm font-semibold pl-1 mb-2" for="pickup_phone">Contact Phone</label>
                        <input class="input" id="pickup_phone" name="pickup[phone]" type="text" x-mask="(999) 999-9999" placeholder="(___) ___-____">
                    </div>

                    <div class="w-full px-2 mb-4 md:w-1/2">
                        <label class="text-sm font-semibold pl-1 mb-2" for="pickup_zip">Zip</label>
                        <input class="input" id="pickup_zip" name="pickup[zip]" type="text">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label class="text-sm font-semibold pl-1 mb-2" for="pickup_address">Address</label>
                        <input class="input" id="pickup_address" name="pickup[address]" type="text">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label class="text-sm font-semibold pl-1 mb-2" for="pickup_notes">Notes</label>
                        <input class="input" id="pickup_notes" name="pickup[notes]" type="text">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label class="text-sm font-semibold pl-1 mb-2" for="pickup_date">Pickup date</label>
                        <input class="input" id="pickup_date" name="pickup[date]" type="date">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label class="text-sm font-semibold pl-1 mb-2" for="pickup_restrictions">Restrictions</label>

                        <select class="input" id="pickup_restrictions" name="pickup[restrictions]" disabled>
                            <option selected>No restrictions</option>
                        </select>
                    </div>
                </div>

                <div class="w-full mt-2 px-2 mb-4">
                    <div class="inline-flex items-center gap-3 ml-1">
                        <input class="checkbox scale-110" id="pickup_signature" name="pickup[signature]" type="checkbox">
                        <label class="font-semibold text-base capitalize cursor-pointer select-none" for="pickup_signature">
                            {{ __('signature not required') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="h-16 w-full flex justify-end items-center gap-2 border-t px-4 md:px-6 dark:border-zinc-700">
                <button class="button button-primary uppercase" type="submit">
                    {{ __('save') }}
                </button>
            </div>
        </form>
    </x-slide-over>

    <x-slide-over class="!p-0" title="Delivery" initialState="false" id="edit-delivery">

        <form class="h-full" action="#" method="POST" x-data="{ active: 'business' }">
            <div class="min-h-[calc(100%-4rem)] p-4 md:px-6">

                <div class="flex items-center space-x-2 mb-4">
                    <div class="inline-flex gap-2 p-1 bg-gray-100 rounded-sm dark:bg-white/5">
                        <button class="button button-sm button-primary" @click="active = 'personal'" :class="active === 'personal' ? 'button-primary' : 'button-primary-outline'" type="button">
                            Personal Contact
                        </button>

                        <button class="button button-sm" @click="active = 'business'" :class="active === 'business' ? 'button-primary' : 'button-primary-outline'" type="button">
                            Business Contact
                        </button>
                    </div>
                </div>

                <div x-show="active === 'business'">
                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="delivery_company">Company Name</label>
                            <input class="input" id="pickup_company" name="delivery[company] " type="text" :disabled="active !== 'business'">
                        </div>

                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="delivery_working_from">Working from</label>
                            <input class="input" id="pickup_working_from" name="delivery[working_from]" type="time" :disabled="active !== 'business'">
                        </div>

                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1 mb-2" for="delivery_working_to">Working to</label>
                            <input class="input" id="pickup_working_to" name="delivery[working_to]" type="time" :disabled="active !== 'business'">
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label class="text-sm font-semibold pl-1 mb-2" for="delivery_name">Contact Name</label>
                        <input class="input" id="pickup_name" name="delivery[name]" type="text">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label class="text-sm font-semibold pl-1 mb-2" for="delivery_email">Contact Email</label>
                        <input class="input" id="pickup_email" name="pickup[email]" type="email">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-1/2">
                        <label class="text-sm font-semibold pl-1 mb-2" for="delivery_phone">Contact Phone</label>
                        <input class="input" id="pickup_phone" name="delivery[phone]" type="text" x-mask="(999) 999-9999" placeholder="(___) ___-____">
                    </div>

                    <div class="w-full px-2 mb-4 md:w-1/2">
                        <label class="text-sm font-semibold pl-1 mb-2" for="delivery_zip">Zip</label>
                        <input class="input" id="pickup_zip" name="delivery[zip]" type="text">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label class="text-sm font-semibold pl-1 mb-2" for="delivery_address">Address</label>
                        <input class="input" id="pickup_address" name="delivery[address]" type="text">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label class="text-sm font-semibold pl-1 mb-2" for="delivery_notes">Notes</label>
                        <input class="input" id="pickup_notes" name="delivery[notes]" type="text">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label class="text-sm font-semibold pl-1 mb-2" for="delivery_date">Pickup date</label>
                        <input class="input" id="pickup_date" name="delivery[date]" type="date">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-2">
                    <div class="w-full px-2 mb-4 md:w-full">
                        <label class="text-sm font-semibold pl-1 mb-2" for="delivery_restrictions">Restrictions</label>

                        <select class="input" id="pickup_restrictions" name="delivery[restrictions]" disabled>
                            <option selected>No restrictions</option>
                        </select>
                    </div>
                </div>

                <div class="w-full mt-2 px-2 mb-4">
                    <div class="inline-flex items-center gap-3 ml-1">
                        <input class="checkbox scale-110" id="pickup_signature" name="delivery[signature]" type="checkbox">
                        <label class="font-semibold text-base capitalize cursor-pointer select-none" for="delivery_signature">
                            {{ __('signature not required') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="h-16 w-full flex justify-end items-center gap-2 border-t px-4 md:px-6 dark:border-zinc-700">
                <button class="button button-primary uppercase" type="submit">
                    {{ __('save') }}
                </button>
            </div>
        </form>
    </x-slide-over>
</x-app>
