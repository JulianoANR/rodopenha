<x-app title="Users">

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

            <!-- List ALl -->
            <div class="w-full px-2 mb-6 md:px-3">

                <x-card>
                    <x-slot name="header">
                        {{ __('manage orders') }}
                    </x-slot>

                    <x-slot name="body" class="!p-0">
                        <div class="relative overflow-x-auto px-5 py-4">
                            <table id="table_all_orders" class="stripe hover">

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
                                    <tr>
                                        <td class="font-bold text-gray-900 dark:text-gray-300 whitespace-nowrap">
                                            #14234
                                        </td>

                                        <td class="align-middle whitespace-nowrap">
                                            Giovani Appezzato
                                        </td>

                                        <td class="align-middle">
                                            <span class="badge badge-danger">
                                                Picked Up
                                            </span>
                                        </td>

                                        <td class="align-middle">
                                            9217 Apollo Heights Ave, Las Vegas, NV, 89110
                                        </td>

                                        <td class="align-middle">
                                            724 Silverwood drive, lake mary, FL, 32746
                                        </td>

                                        <td class="align-middle">
                                            2015 toyota camry
                                        </td>

                                        <td>
                                            <div class="inline-flex items-center gap-x-3">
                                                <a class="button-icon button-icon-sm button-secondary-soft rounded" href="#">
                                                    <i class="fa-solid fa-gear"></i>
                                                </a>

                                                <button class="button-icon button-icon-sm button-info-soft rounded">
                                                    <i class="fa-solid fa-truck-front"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="font-bold text-gray-900 dark:text-gray-300 whitespace-nowrap">
                                            #23423
                                        </td>

                                        <td class="align-middle whitespace-nowrap">
                                            Juliano Appezzato
                                        </td>

                                        <td class="align-middle">
                                            <span class="badge-warning">
                                                Delivery
                                            </span>
                                        </td>

                                        <td class="align-middle">
                                            2371 Southwest 36th Street, Fort Lauderdale, FL, Fort Lauderdale, FL, 33312
                                        </td>

                                        <td class="align-middle">
                                            31205 Interstate 10, Boerne, TX, Boerne, TX, 78006
                                        </td>

                                        <td class="align-middle">
                                            2021 Toyota Corolla
                                        </td>

                                        <td>
                                            <div class="inline-flex items-center gap-x-3">
                                                <a class="button-icon button-icon-sm button-secondary-soft rounded" href="#">
                                                    <i class="fa-solid fa-gear"></i>
                                                </a>

                                                <button class="button-icon button-icon-sm button-info-soft rounded">
                                                    <i class="fa-solid fa-truck-front"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="font-bold text-gray-900 dark:text-gray-300 whitespace-nowrap">
                                            #13245
                                        </td>

                                        <td class="align-middle whitespace-nowrap">
                                            Not assigned
                                        </td>

                                        <td class="align-middle">
                                            <span class="badge-secondary">
                                                Assigned
                                            </span>
                                        </td>

                                        <td class="align-middle">
                                            6175 NW 104TH CT, miami, FL, 33178
                                        </td>

                                        <td class="align-middle">
                                            1522 Tamar lane, austin, TX, 78727
                                        </td>

                                        <td class="align-middle">
                                            2000 honda crv
                                        </td>

                                        <td>
                                            <div class="inline-flex items-center gap-x-3">
                                                <a class="button-icon button-icon-sm button-secondary-soft rounded" href="#">
                                                    <i class="fa-solid fa-gear"></i>
                                                </a>

                                                <button class="button-icon button-icon-sm button-info-soft rounded">
                                                    <i class="fa-solid fa-truck-front"></i>
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

    @push('header')
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    @endpush

    @push('scripts')
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
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


