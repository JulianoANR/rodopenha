<x-app title="Users" :active="['item' => 'service']">

    <div class="my-6 px-4 md:px-6">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <div class="w-full md:w-max">
                <h1 class="mb-1 truncate uppercase text-2xl font-bold text-gray-400 dark:text-white">
                    Service Orders
                </h1>

                <x-breadcrumb :path="['Service Orders' => route('service-orders.index')]" />
            </div>

            <a href="{{ route('dashboard') }}" class="button button-primary uppercase hidden md:flex">
                <x-icon name="arrow-undo" class="w-5 h-5 text-xl" library="ion-icon" />
                {{ __('return') }}
            </a>
        </div>
    </div>

    <div class="px-4 md:px-6">
        <div class="flex flex-wrap -mx-2 md:-mx-3">

            <div class="w-full px-2 mb-6 md:px-3">
                <x-card>
                    <x-slot name="header">{{ __('manage orders') }}</x-slot>

                    <x-slot name="body">
                        <div class="relative overflow-x-auto">
                            <table class="stripe hover responsive" id="table_all_orders">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            {{ __('order') }}
                                        </th>
                                        <th scope="col">
                                            {{ __('driver') }}
                                        </th>
                                        <th scope="col">
                                            {{ __('status') }}
                                        </th>
                                        <th scope="col">
                                            {{ __('picked up') }}
                                        </th>
                                        <th scope="col">
                                            {{ __('delivered') }}
                                        </th>
                                        <th scope="col">
                                            {{ __('actions') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($serviceOrders as $serviceOrder)
                                        <tr>
                                            <td class="text-gray-700 whitespace-nowrap dark:text-gray-300">
                                                {{ $serviceOrder->load_id }}
                                            </td>

                                            <td class="align-middle whitespace-nowrap">
                                                <div class="flex items-center gap-1.5 w-full h-full">
                                                    <x-avatar-user class="w-9 h-9 min-h-[2.25rem] min-w-[2.25rem]" :user="Auth::user()" />
                                                    <span class="ml-3 font-semibold">Giovani Appezzato</span>
                                                </div>
                                            </td>

                                            <td class="align-middle">
                                                <x-status-badge :type="$serviceOrder->status"></x-status-badge>
                                            </td>

                                            <td class="align-middle min-w-[15rem]">
                                                {{ $serviceOrder->pickup->address }}
                                            </td>

                                            <td class="align-middle min-w-[15rem]">
                                                {{ $serviceOrder->delivery->address }}
                                            </td>

                                            <td class="align-middle">
                                                <div class="flex justify-center items-center gap-x-3">
                                                    @can('isAdmin')
                                                        <a class="button button-icon button-icon-xs button-primary rounded" href="{{ route('service-orders.show', $serviceOrder->id) }}">
                                                            <i class="fa-solid fa-pen-clip"></i>
                                                        </a>

                                                        <form action="{{ route('service-orders.destroy', $serviceOrder->id) }}" method="POST">
                                                            @csrf @method('DELETE')

                                                            <button class="button button-icon button-icon-xs button-danger rounded">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <a class="button button-icon button-icon-xs button-primary rounded" href="{{ route('service-orders.show', $serviceOrder->id) }}">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </a>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
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
            const tableAllOrders = $('#table_all_orders').DataTable({
                dom: 'Bfrtip',
                "scrollCollapse": true,
                "searching": false
            });
        </script>
    @endpush
</x-app>


