<x-app title="Users">

    <!-- Header page -->
    <div class="my-6 px-4 md:px-6">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <div class="w-full md:w-max">
                <h1 class="w-full truncate text-2xl mb-1 font-bold text-gray-400 md:text-3xl dark:text-white">
                    Users
                </h1>

                <x-breadcrumb :path="['Users' => route('users.index')]" />
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
                    {{ __('manage users') }}
                </div>

                <div class="card-body px-2 py-5 sm:p-5 overflow-scroll max-h-96 ">
                    <table id="table_recent_activities" class="stripe hover display">
                        <thead>
                            <tr>
                                <th>Usuario</th>
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


