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

            <a href="{{ route('dashboard') }}" class="button button-primary hidden md:flex">
                Return
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
    </div>

    <!-- Grid Cards -->
    <div class="px-4 md:px-6">

        <div class="grid gap-6 mt-6">

            {{-- Table users --}}
            <div class="card">
                <div class="card-header capitalize">
                    {{ __('manage orders') }}
                </div>

                <div class="card-body px-2 py-5 sm:p-5 ">
                    <table id="table_recent_activities" class="stripe hover display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Status</th>
                                <th >Driver</th>
                                <th>Picked Up</th>
                                <th>Delivered</th>
                                <th>Vehicles</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ORDER <b>#14234</b></td>
                                <td class="w-48">
                                    <div class="relative flex">
                                        <x-avatar-user :user="Auth::user()" />
                                        <span class="ml-5">Juliano Appezzato</span>
                                    </div>
                                </td>
                                <td class="w-24">
                                    <span class="px-3 py-1 text-sm rounded-full bg-sky-200 text-sky-600">
                                        Picked Up
                                    </span>
                                </td>
                                <td>724 Silverwood drive, lake mary, FL, 32746</td>
                                <td>1522 Tamar lane, austin, TX, 78727</td>
                                <td>2015 toyota camry</td>
                                <td>
                                    <button class="button button-secondary"><i class="py-3 fa-solid fa-gear fa-xl"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>ORDER <b>#23423</b></td>
                                <td class="w-28">
                                    <span class="px-3 py-1 text-sm rounded-full bg-red-200 text-red-600">
                                        Not Assigned
                                    </span>
                                </td>
                                <td>
                                    <span class="px-3 py-1 text-sm rounded-full bg-gray-200 text-gray-600">
                                        New
                                    </span>
                                </td>
                                <td>9217 Apollo Heights Ave, Las Vegas, NV, 89110</td>
                                <td>16203 2nd St E, Redington Beach, FL, 33708</td>
                                <td>2020 Honda CR-V</td>
                                <td>
                                    <button class="button button-secondary"><i class="py-3 fa-solid fa-gear fa-xl"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>ORDER <b>#13245</b></td>
                                <td>
                                    <div class="relative flex">
                                        <x-avatar-user :user="Auth::user()" />
                                        <span class="ml-5">John Peter</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="px-3 py-1 text-sm rounded-full bg-green-200 text-green-600">
                                        Delivered
                                    </span>
                                </td>
                                <td>2371 Southwest 36th Street, Fort Lauderdale, FL, Fort Lauderdale, FL, 33312</td>
                                <td>31205 Interstate 10, Boerne, TX, Boerne, TX, 78006</td>
                                <td>2021 Toyota Corolla</td>
                                <td>
                                    <button class="button button-secondary"><i class="py-3 fa-solid fa-gear fa-xl"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>ORDER <b>#13245</b></td>
                                <td>
                                    <div class="relative flex">
                                        <x-avatar-user :user="Auth::user()" />
                                        <span class="ml-5">João Silva</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="px-3 py-1 text-sm rounded-full bg-green-200 text-green-600">
                                        Delivered
                                    </span>
                                </td>
                                <td>6175 NW 104TH CT, miami, FL, 33178</td>
                                <td> 78660 PLEASANTON PKWY, pflugerville, TX, 78660</td>
                                <td>2000 honda crv</td>
                                <td>
                                    <button class="button button-secondary"><i class="py-3 fa-solid fa-gear fa-xl"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        {{-- End table activity --}}
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
                        [0, "desc"]
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


