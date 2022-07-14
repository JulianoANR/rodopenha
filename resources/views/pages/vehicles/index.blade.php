<x-app title="Vehicles" :active="['item' => 'vehicles']">

    <!-- Header page -->
    <div class="my-6 px-4 md:px-6">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <div class="w-full md:w-max">
                <h1 class="mb-1 truncate uppercase text-2xl font-bold text-gray-400 dark:text-white">
                    TRUCKS
                </h1>

                <x-breadcrumb :path="['Truck' => route('vehicles.index')]" />
            </div>

            <a class="button button-primary uppercase hidden md:flex " href="{{ route('vehicles.create') }}">
                {{ __('create truck') }} <i class="fa-solid fa-plus"></i>
            </a>
        </div>
    </div>

    <!-- Grid cards -->
    <div class="px-4 md:px-6">
        <div class="flex flex-wrap -mx-2 md:-mx-3">

            <div class="w-full px-2 mb-6">
                <!-- Start Vehicles -->
                <x-card>
                    <x-slot name="header">
                        {{ __('manage vehicles') }}
                    </x-slot>

                    <x-slot name="body">
                        <div class="relative overflow-x-auto">
                            <table class="stripe hover" id="table_all_vehicles">
                                <thead>
                                    <tr>
                                        <th scope="col" class="whitespace-nowrap">
                                            Model
                                        </th>
                                        <th scope="col" class="whitespace-nowrap">
                                            Make
                                        </th>
                                        <th scope="col" class="whitespace-nowrap">
                                            License plate
                                        </th>
                                        <th scope="col" class="whitespace-nowrap">
                                            Truck license plate
                                        </th>
                                        <th scope="col" class="whitespace-nowrap">
                                            Driver
                                        </th>
                                        <th scope="col" class="whitespace-nowrap">
                                            Has trailer
                                        </th>
                                        <th scope="col" class="whitespace-nowrap">
                                            Company
                                        </th>
                                        <th scope="col" class="whitespace-nowrap">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="col" class="text-left font-medium whitespace-nowrap">
                                            2009 Ford Mustang
                                        </th>
                                        <td class="text-left">
                                            Ford
                                        </td>
                                        <td class="text-left">
                                            BVVX003
                                        </td>
                                        <td class="text-left">
                                            BVVX003
                                        </td>
                                        <td class="text-left">
                                            No linked driver
                                        </td>
                                        <td class="text-left">
                                            <span class="badge badge-primary">
                                                Yes (1)
                                            </span>
                                        </td>
                                        <td class="text-left">
                                            Invent Digital
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
                <!-- End Vehicles -->
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready( function () {
                var table = $('#table_all_vehicles').DataTable({
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
