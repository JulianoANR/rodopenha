<x-app title="Users" :active="['item' => 'service']">

    <!-- Header page -->
    <div class="my-6 px-4 md:px-6">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <div class="w-full md:w-max">
                <h1 class="w-full truncate text-2xl mb-1 font-bold text-gray-400 md:text-3xl dark:text-white">
                    Service Orders
                </h1>

                <x-breadcrumb :path="['Service Orders' => route('service-orders.index')]" />
            </div>

            <a href="{{ route('dashboard') }}" class="button button-primary capitalize hidden md:flex">
                <x-icon name="arrow-undo" class="w-5 h-5 text-xl" library="ion-icon" />
                {{ __('return') }}
            </a>
        </div>
    </div>

    <div class="px-4 md:px-6">
        <div class="flex flex-wrap -mx-2 md:-mx-3">

            <!-- List all -->
            <div class="w-full px-2 mb-6 md:px-3">

                <x-card>
                    <x-slot name="header">
                        {{ __('manage orders') }}
                    </x-slot>

                    <x-slot name="body">
                        <div class="relative overflow-x-auto">
                            <table class="stripe hover" id="table_all_orders">
                                <thead>
                                    <tr>
                                        <th>{{ __('order') }}</th>
                                        <th>{{ __('driver') }}</th>
                                        <th>{{ __('status') }}</th>
                                        <th>{{ __('picked up') }}</th>
                                        <th>{{ __('delivered') }}</th>
                                        <th>{{ __('vehicles') }}</th>
                                        <th>{{ __('actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($serviceOrders as $serviceOrder)
                                        <tr>
                                            <td class="font-bold text-gray-700 whitespace-nowrap dark:text-gray-300">
                                                {{ $serviceOrder->load_id }}
                                            </td>

                                            <td class="align-middle whitespace-nowrap">
                                                <div class="flex items-center gap-1.5 w-full h-full">
                                                    <x-avatar-user class="w-9 h-9 min-w-[2.25rem]" :user="Auth::user()" />
                                                    <span class="ml-3 font-semibold">Giovani Appezzato</span>
                                                </div>
                                            </td>

                                            <td class="align-middle">
                                                <span class="badge badge-primary">
                                                    Picked Up
                                                </span>
                                            </td>

                                            <td class="align-middle min-w-[15rem]">
                                                {{ $serviceOrder->pickup->address }}
                                            </td>

                                            <td class="align-middle min-w-[15rem]">
                                                {{ $serviceOrder->pickup->address }}
                                            </td>

                                            <td class="align-middle whitespace-nowrap">
                                                2015 toyota camry
                                            </td>

                                            <td class="align-middle">
                                                <div class="inline-flex justify-end items-center gap-x-3">
                                                    <a class="button-icon button-icon-sm button-primary rounded" href="{{ route('service-orders.show', $serviceOrder->id) }}">
                                                        <i class="fa-solid fa-gear"></i>
                                                    </a>

                                                    <button class="button button-icon button-icon-sm button-danger rounded">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td class="font-bold text-gray-700 whitespace-nowrap dark:text-gray-300">
                                            #14234
                                        </td>

                                        <td class="align-middle whitespace-nowrap">
                                            <div class="flex items-center gap-1.5 w-full h-full">
                                                <x-avatar-user class="w-9 h-9 min-w-[2.25rem]" :user="Auth::user()" />
                                                <span class="ml-3 font-semibold">Giovani Appezzato</span>
                                            </div>
                                        </td>

                                        <td class="align-middle">
                                            <span class="badge badge-primary">
                                                Picked Up
                                            </span>
                                        </td>

                                        <td class="align-middle min-w-[15rem]">
                                            9217 Apollo Heights Ave, Las Vegas, NV, 89110
                                        </td>

                                        <td class="align-middle min-w-[15rem]">
                                            3842 North Highway 95, lake havasu city, AZ, 86404
                                        </td>

                                        <td class="align-middle whitespace-nowrap">
                                            2015 toyota camry
                                        </td>

                                        <td class="align-middle">
                                            <div class="inline-flex justify-end items-center gap-x-3">
                                                <a class="button-icon button-icon-sm button-primary-soft rounded" href="{{ route('service-orders.show', 1) }}">
                                                    <i class="fa-solid fa-gear"></i>
                                                </a>

                                                <button class="button button-icon button-icon-sm button-danger-soft rounded">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="font-bold text-gray-700 whitespace-nowrap dark:text-gray-300">
                                            #23423
                                        </td>

                                        <td class="align-middle whitespace-nowrap">
                                            <div class="flex items-center gap-1.5 w-full h-full">
                                                <x-avatar-user class="w-9 h-9 min-w-[2.25rem]" :user="Auth::user()" />
                                                <span class="ml-3 font-semibold">Admin</span>
                                            </div>
                                        </td>

                                        <td class="align-middle">
                                            <span class="badge badge-info">
                                                Delivery
                                            </span>
                                        </td>

                                        <td class="align-middle min-w-[15rem]">
                                            2371 Southwest 36th Street, Fort Lauderdale, FL, Fort Lauderdale, FL, 33312
                                        </td>

                                        <td class="align-middle min-w-[15rem]">
                                            31205 Interstate 10, Boerne, TX, Boerne, TX, 78006
                                        </td>

                                        <td class="align-middle whitespace-nowrap">
                                            2021 Toyota Corolla
                                        </td>

                                        <td class="align-middle">
                                            <div class="inline-flex justify-end items-center gap-x-3">
                                                <a class="button-icon button-icon-sm button-primary-soft rounded" href="{{ route('service-orders.show', 1) }}">
                                                    <i class="fa-solid fa-gear"></i>
                                                </a>

                                                <button class="button button-icon button-icon-sm button-danger-soft rounded">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </x-slot>
                </x-card>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            var table = $('#table_all_orders').DataTable({
                "responsive": true,
                "scrollCollapse": true,

                "lengthMenu": [
                    [10, 25, 50, 75, 100 - 1],
                    ["10", "25", "50", "75", "100", "Tudo"]
                ]
            });
        </script>
    @endpush

</x-app>


