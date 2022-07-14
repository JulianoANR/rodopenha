<x-app title="Users" :active="['item' => 'users']">

    <!-- Header page -->
    <div class="my-6 px-4 md:px-6">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <div class="w-full md:w-max">
                <h1 class="mb-1 truncate uppercase text-2xl font-bold text-gray-400 dark:text-white">
                    Users
                </h1>

                <x-breadcrumb :path="['Users' => route('users.index')]" />
            </div>

            <button class="button button-primary hidden md:flex uppercase">
                create user <i class="fa-solid fa-plus fa-lg"></i>
            </button>
        </div>
    </div>

    <!-- Grid Cards -->
    <div class="px-4 md:px-6">
        <div class="flex flex-wrap -mx-2 md:-mx-3">

            <div class="w-full px-2 mb-6 md:px-3">

                <x-card>
                    <x-slot name="header">
                        {{ __('manage users') }}
                    </x-slot>

                    <x-slot name="body">
                        <div class="relative overflow-x-auto">
                            <table class="stripe hover" id="table_all_users">
                                <thead>
                                    <tr>
                                        <th scope="col" class="whitespace-nowrap">
                                            User
                                        </th>
                                        <th scope="col" class="whitespace-nowrap">
                                            Permissions
                                        </th>
                                        <th scope="col" class="whitespace-nowrap">
                                            Email
                                        </th>
                                        <th scope="col" class="whitespace-nowrap">
                                            Phone
                                        </th>
                                        <th scope="col" class="whitespace-nowrap">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="text-left align-middle whitespace-nowrap">
                                           <div class="flex items-center gap-1.5 h-full">
                                               <x-avatar-user class="w-9 h-9 min-w-[2.25rem]" :user="Auth::user()" />
                                               <span class="font-semibold">Admin</span>
                                           </div>
                                        </th>

                                        <td class="text-left whitespace-nowrap">
                                            Supervisor
                                        </td>

                                        <td class="text-left whitespace-nowrap">
                                            admin@admin.com
                                        </td>

                                        <td class="text-left whitespace-nowrap">
                                            (954) 709-8060
                                        </td>

                                        <td class="text-left">
                                            <div class="inline-flex items-center gap-3">
                                                <button class="button button-icon button-icon-sm button-primary-soft rounded">
                                                    <i class="fa-solid fa-pen-clip"></i>
                                                </button>

                                                <button class="button button-icon button-icon-sm button-danger-soft rounded">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-left align-middle whitespace-nowrap">
                                            <div class="flex items-center gap-1.5 h-full">
                                                <x-avatar-user class="w-9 h-9 min-w-[2.25rem]" :user="Auth::user()" />
                                                <span class="font-semibold">Giovani Appezzato</span>
                                            </div>
                                        </th>

                                        <td class="text-left whitespace-nowrap">
                                            Driver
                                        </td>

                                        <td class="text-left whitespace-nowrap">
                                            giovani.apztt@gmail.com
                                        </td>

                                        <td class="text-left whitespace-nowrap">
                                            (954) 258-7390
                                        </td>

                                        <td class="text-left">
                                            <div class="inline-flex items-center gap-3">
                                                <button class="button button-icon button-icon-sm button-primary-soft rounded">
                                                    <i class="fa-solid fa-pen-clip"></i>
                                                </button>

                                                <button class="button button-icon button-icon-sm button-secondary-soft rounded">
                                                    <i class="fa-solid fa-truck-front"></i>
                                                </button>

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
            $(document).ready( function () {
                var table = $('#table_all_users').DataTable({
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
                    "lengthMenu": [
                        [25, 50, 75, 100 - 1],
                        ["25", "50", "75", "100", "Tudo"]
                    ]
                });
            });
        </script>
    @endpush

</x-app>


