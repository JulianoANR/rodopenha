<x-app title="Vehicles" :active="['item' => 'trips']">

    <!-- Header page -->
    <div class="my-6 px-4 md:px-6">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <div class="w-full md:w-max">
                <h1 class="mb-1 truncate uppercase text-2xl font-bold text-gray-400 dark:text-white">
                    {{ __('trips') }}
                </h1>

                <x-breadcrumb :path="['Trips' => route('vehicles.index')]" />
            </div>

            <a class="button button-primary uppercase hidden md:flex " href="#">
                {{ __('create trip') }} <i class="fa-solid fa-plus"></i>
            </a>
        </div>
    </div>

    <!-- Grid cards -->
    <div class="px-4 md:px-6">
        <div class="flex flex-wrap -mx-2 md:-mx-3">

            <div class="w-full px-2 mb-6 md:px-3 md:w-full">
                <x-card>
                    <x-slot name="header">
                        {{ __('manage trip') }}
                    </x-slot>

                    <x-slot name="body">
                        <div class="relative overflow-x-auto">
                            <table class="stripe hover" id="table_all_trips">
                                <thead>
                                    <tr>
                                        <th scope="col" class="whitespace-nowrap">
                                            Trip ID
                                        </th>
                                        <th scope="col" class="whitespace-nowrap">
                                            Total orders
                                        </th>
                                        <th scope="col" class="whitespace-nowrap">
                                            Status
                                        </th>
                                        <th scope="col" class="whitespace-nowrap">
                                            Driver
                                        </th>
                                        <th scope="col" class="whitespace-nowrap">
                                            Date
                                        </th>
                                        <th scope="col" class="whitespace-nowrap">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="col" class="text-left font-medium whitespace-nowrap">
                                           AdminTRIP-#2588755
                                        </th>
                                        <td class="text-left">
                                            <span class="badge badge-primary">
                                                2
                                            </span>
                                        </td>
                                        <td class="text-left">
                                            2x Pickup
                                        </td>
                                        <td class="text-left">
                                            <div class="flex items-center gap-1.5 w-full h-full">
                                                <x-avatar-user class="w-9 h-9 min-w-[2.25rem]" :user="Auth::user()" />
                                                <span class="ml-3 font-semibold">Admin</span>
                                            </div>
                                        </td>
                                        <td class="text-left">
                                            28/06/2022
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
                var table = $('#table_all_trips').DataTable({
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
