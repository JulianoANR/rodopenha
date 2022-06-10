<x-app title="Dashboard">

    <!-- Header page -->
    <div class="my-6 px-4 md:px-6">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <div class="w-full md:w-max">
                <h1 class="w-full truncate text-2xl mb-1 font-bold text-gray-400 md:text-3xl dark:text-white">
                    Hello {{ Auth::user()->name }}
                </h1>

                <x-breadcrumb :path="['Dashboard' => route('dashboard')]" />
            </div>


        </div>
    </div>

    {{-- <div class="my-6 px-4 md:px-6">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-400 dark:text-white">
                Dashboard
            </h1>

            <x-breadcrumb :path="['Dashboard' => route('dashboard')]" />
        </div>
    </div> --}}



    <!-- Grid Cards -->
    <div class="px-4 md:px-6">
        {{-- <div class="grid gap-6 md:grid-cols-2">
            <div class="p-2 bg-white shadow rounded-sm dark:bg-zinc-800">

            </div>
        </div> --}}

        <div class="grid gap-6 sm:grid-cols-3">

            <div class="card card-primary animate-up">
                <div class="card-body p-5 flex items-center space-x-4">

                    <div class="grow">
                        <h3 class="text-2xl font-semibold text-white">{{ '0 Orders' }}</h3>

                        <div class="font-semibold text-gray-100">
                            {{ __('Pickup') }}
                        </div>

                        <div class="mt-4 text-xs text-gray-200">
                            <span class="font-bold mr-2">
                                <i class="fa-solid fa-arrow-trend-up"></i>
                                {{-- {{ 'TODAY' }} --}}
                            </span>

                            {{ __('For today') }}
                        </div>
                    </div>

                        <div class="w-12 h-12 bg-white/20 text-white flex items-center justify-center rounded-full">
                        <i class="fa-solid fa-user-group"></i>
                    </div>
                </div>
            </div>

            <div class="card card-success animate-up">
                <div class="card-body p-5 flex items-center space-x-4">

                    <div class="grow">
                        <h3 class="text-2xl font-semibold text-white">{{ '0 Orders' }}</h3>

                        <div class="font-semibold text-gray-100">
                            {{ 'Delivery' }}
                        </div>

                        <div class="mt-4 text-xs text-gray-200">
                            <span class="mr-2 rounded-full">
                                <i class="fa-solid fa-ban"></i>
                                {{-- {{ '--' }} --}}
                            </span>

                            {{ __('For today') }}
                        </div>
                    </div>

                    <div class="w-12 h-12 bg-white/20 text-white flex items-center justify-center rounded-full">
                        <i class="fa-solid fa-money-bill-transfer"></i>
                    </div>
                </div>
            </div>

            <div class="card card-orange animate-up">
                <div class="card-body p-5 flex items-center space-x-4">

                    <div class="grow">
                        <h3 class="text-2xl font-semibold text-white">{{ '0 Payments' }}</h3>

                        <div class="font-semibold text-gray-100">
                            {{ __('Pending') }}
                        </div>

                        <div class="mt-4 text-xs text-gray-200">
                            <span class="font-bold mr-2">
                                <i class="fa-solid fa-arrow-trend-down"></i>
                                {{-- {{ '1.5%' }} --}}
                            </span>

                            {{ __('For today') }}
                        </div>
                    </div>

                    <div class="w-12 h-12 bg-white/20 text-white flex items-center justify-center rounded-full">
                        <i class="fa-solid fa-sack-dollar"></i>
                    </div>
                </div>
            </div>
        </div>
        {{-- End cards --}}

        <div class="grid gap-6 mt-6">

            {{-- Table activity --}}
            <div class="card">
                <div class="card-header capitalize">
                    {{ __('recent activities') }}
                </div>

                <div class="card-body px-2 py-5 sm:p-5 overflow-scroll max-h-96 ">
                    <table id="table_recent_activities" class="stripe hover display">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th class="text-center">Status</th>
                                <th>Service Order</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="relative flex">
                                        <x-avatar-user :user="Auth::user()" />
                                        <span class="ml-5">Alberto Luiz</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="px-3 py-1 text-sm rounded-full bg-sky-200 text-sky-600">
                                        Picked Up
                                    </span>
                                </td>
                                <td><a class="hover:underline underline-offset-2" href="#">ORDER #14325</a></td>
                                <td>{{ now() }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="relative flex">
                                        <x-avatar-user :user="Auth::user()" />
                                        <span class="ml-5">Juliano Appezzato</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="px-3 py-1 text-sm rounded-full bg-green-200 text-green-600">
                                        Delivered
                                    </span>
                                </td>
                                <td><a class="hover:underline underline-offset-2" href="#">ORDER #45324</a></td>
                                <td>{{ now() }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="relative flex">
                                        <x-avatar-user :user="Auth::user()" />
                                        <span class="ml-5">Matheus Henrique</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="px-3 py-1 text-sm rounded-full bg-green-200 text-green-600">
                                        Delivered
                                    </span>
                                </td>
                                <td><a class="hover:underline underline-offset-2" href="#">ORDER #23421</a></td>
                                <td>{{ now() }}</td>
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

