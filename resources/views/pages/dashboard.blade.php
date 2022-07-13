<x-app title="Dashboard" active="dashboard">

    <div class="my-6 px-4 md:px-6">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <div class="w-full md:w-max">
                <h1 class="w-full truncate text-2xl mb-1 font-bold text-gray-400 md:text-3xl dark:text-white">
                    Hello {{ Auth::user()->name }}
                </h1>

                <x-breadcrumb :path="['Dashboard' => route('dashboard')]" />
            </div>

            <a class="button button-primary capitalize waves-effect hidden md:flex" href="{{ route('service-orders.create') }}">
                {{ __('create order') }} <i class="fa-solid fa-plus"></i>
            </a>
        </div>
    </div>

    <div class="px-4 md:px-6">
        <div class="flex flex-wrap -mx-2 md:-mx-3">

            <!-- Cards Status -->
            <div class="w-full px-2 mb-6 md:w-1/3 md:px-3">
                <div class="card animate-up">
                    <div class="card-body p-5 flex items-center space-x-4">

                        <div class="grow">
                            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ __('0 Orders') }}</h3>

                            <div class="font-semibold">
                                {{ __('Pickup') }}
                            </div>

                            <div class="mt-4 text-xs text-gray-400">
                                <span class="font-bold mr-2">
                                    <i class="fa-solid fa-arrow-trend-up"></i>
                                    {{ '0%' }}
                                </span>

                                {{ 'For today' }}
                            </div>
                        </div>

                        <div class="w-12 h-12 bg-primary-soft text-primary flex items-center justify-center rounded dark:text-white">
                            <i class="fa-solid fa-user-group"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full px-2 mb-6 md:w-1/3 md:px-3">
                <div class="card animate-up">
                    <div class="card-body p-5 flex items-center space-x-4">

                        <div class="grow">
                            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ __('0 Orders') }}</h3>

                            <div class="font-semibold">
                                {{ __('Delivery') }}
                            </div>

                            <div class="mt-4 text-xs text-gray-400">
                                <span class="font-bold mr-2">
                                    <i class="fa-solid fa-ban"></i>
                                    {{ '--' }}
                                </span>

                                {{ 'For today' }}
                            </div>
                        </div>

                        <div class="w-12 h-12 bg-success-soft text-success flex items-center justify-center rounded dark:text-white">
                            <i class="fa-solid fa-money-bill-transfer"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full px-2 mb-6 md:w-1/3 md:px-3">
                <div class="card animate-up">
                    <div class="card-body p-5 flex items-center space-x-4">

                        <div class="grow">
                            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">{{ __('0 Payments') }}</h3>

                            <div class="font-semibold">
                                {{ __('Pending') }}
                            </div>

                            <div class="mt-4 text-xs text-gray-400">
                                <span class="font-bold mr-2">
                                    <i class="fa-solid fa-arrow-trend-down"></i>
                                    {{ '0%' }}
                                </span>

                                {{ 'For today' }}
                            </div>
                        </div>

                        <div class="w-12 h-12 bg-warning-soft text-warning flex items-center justify-center rounded dark:text-white">
                            <i class="fa-solid fa-sack-dollar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap -mx-2 md:-mx-3">

            <!-- Start Payments -->
            <div class="w-full px-2 mb-6 md:px-3">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div>
                            {{ __('Payments') }}

                            <!-- Criar tooltip -->
                            <span class="ml-1 cursor-pointer">
                                <i class="fa-solid fa-circle-exclamation"></i>
                            </span>
                        </div>
                    </div>

                    <div class="card-body !p-0">
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left">
                                <thead class="text-gray-700 uppercase bg-gray-50 dark:text-gray-300 dark:bg-white/5 dark:text-white">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Order ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Payment Type
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Contract Terms
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Remaining Days
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Price
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b dark:bg-transparent dark:border-zinc-700 odd:bg-transparent even:bg-gray-50 odd:dark:bg-transparent even:dark:bg-white/5">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            Contract Terms
                                        </th>
                                        <td class="px-6 py-4">
                                            Company check
                                        </td>
                                        <td class="px-6 py-4">
                                            Not defined
                                        </td>
                                        <td class="px-6 py-4">
                                            3 days overdue
                                        </td>
                                        <td class="px-6 py-4">
                                            $2999
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        </td>
                                    </tr>
                                    <tr class="border-b dark:bg-transparent dark:border-zinc-700 odd:bg-transparent even:bg-gray-50 odd:dark:bg-transparent even:dark:bg-white/5">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            Contract Terms
                                        </th>
                                        <td class="px-6 py-4">
                                            Company check
                                        </td>
                                        <td class="px-6 py-4">
                                            Not defined
                                        </td>
                                        <td class="px-6 py-4">
                                            3 days overdue
                                        </td>
                                        <td class="px-6 py-4">
                                            $2999
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        </td>
                                    </tr>
                                    <tr class="border-b dark:bg-transparent dark:border-zinc-700 odd:bg-transparent even:bg-gray-50 odd:dark:bg-transparent even:dark:bg-white/5">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            Contract Terms
                                        </th>
                                        <td class="px-6 py-4">
                                            Company check
                                        </td>
                                        <td class="px-6 py-4">
                                            Not defined
                                        </td>
                                        <td class="px-6 py-4">
                                            3 days overdue
                                        </td>
                                        <td class="px-6 py-4">
                                            $2999
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        </td>
                                    </tr>
                                    <tr class="dark:bg-transparent dark:border-zinc-700 odd:bg-transparent even:bg-gray-50 odd:dark:bg-transparent even:dark:bg-white/5">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            Contract Terms
                                        </th>
                                        <td class="px-6 py-4">
                                            Company check
                                        </td>
                                        <td class="px-6 py-4">
                                            Not defined
                                        </td>
                                        <td class="px-6 py-4">
                                            3 days overdue
                                        </td>
                                        <td class="px-6 py-4">
                                            $2999
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Payments -->

            <!-- Start Recent Activities -->
            <div class="w-full px-2 mb-6 md:px-3">

                <div class="card">
                    <div class="card-header">
                        {{ __('Recent Activities') }}
                    </div>

                    <div class="card-body">
                        <div class="relative overflow-x-auto">

                            <table id="table_recent_activities" class="stripe hover">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Service Order</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="font-medium text-gray-900 dark:text-gray-300 whitespace-nowrap">
                                            Alberto Luiz
                                        </td>
                                        <td>
                                            Picked Up
                                        </td>
                                        <td>
                                            <a href="#">
                                                ORDER #14325
                                            </a>
                                        </td>
                                        <td class="whitespace-nowrap">
                                            {{ now() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium text-gray-900 dark:text-gray-300 whitespace-nowrap">
                                            Alberto Luiz
                                        </td>
                                        <td>
                                        <span>
                                            Picked Up
                                        </span>
                                        </td>
                                        <td>
                                            <a href="#">
                                                ORDER #14325
                                            </a>
                                        </td>
                                        <td class="whitespace-nowrap">
                                            {{ now() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium text-gray-900 dark:text-gray-300 whitespace-nowrap">
                                            Alberto Luiz
                                        </td>
                                        <td>
                                        <span>
                                            Picked Up
                                        </span>
                                        </td>
                                        <td>
                                            <a href="#">
                                                ORDER #14325
                                            </a>
                                        </td>
                                        <td class="whitespace-nowrap">
                                            {{ now() }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Recent Activities -->
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready( function () {
                var table = $('#table_recent_activities').DataTable({
                    "responsive": true,
                    "scrollCollapse": true,

                    "lengthMenu": [
                        [25, 50, 75, 100 - 1],
                        ["25", "50", "75", "100", "Tudo"]
                    ]
                });
            });
        </script>
    @endpush

</x-app>

