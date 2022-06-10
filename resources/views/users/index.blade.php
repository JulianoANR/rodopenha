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

            <button class="button button-primary hidden md:flex">
                Create New User <i class="fa-solid fa-plus fa-lg"></i>
            </button>
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
                                <th>User</th>
                                <th>Permissions</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="relative flex">
                                        <x-avatar-user :user="Auth::user()" />
                                        <span class="ml-5">Juliano Appezzato</span>
                                    </div>
                                </td>
                                <td>
                                    Onwer
                                </td>
                                <td>example@gmail.com</td>
                                <td>
                                    <button class="button button-secondary"><i class="py-3 fa-solid fa-gear fa-xl"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="relative flex">
                                        <x-avatar-user :user="Auth::user()" />
                                        <span class="ml-5">Alberto Luiz</span>
                                    </div>
                                </td>
                                <td>
                                    Driver
                                </td>
                                <td>example3@gmail.com</td>
                                <td>
                                    <button class="button button-secondary"><i class="py-3 fa-solid fa-gear fa-xl"></i></button>
                                    <button class="ml-2 button button-info"><i class="py-3 fa-solid fa-truck-front fa-xl"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="relative flex">
                                        <x-avatar-user :user="Auth::user()" />
                                        <span class="ml-5">Roberto</span>
                                    </div>
                                </td>
                                <td>
                                    Supervisor / Driver
                                </td>
                                <td>example2@gmail.com</td>
                                <td>
                                    <button class="button button-secondary"><i class="py-3 fa-solid fa-gear fa-xl"></i></button>
                                    <button class="ml-2 button button-info"><i class="py-3 fa-solid fa-truck-front fa-xl"></i></button>
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


