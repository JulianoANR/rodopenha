<x-app title="Settings" :active="['item' => 'settings']">

    <!-- Header page -->
    <div class="my-6 px-4 md:px-6">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <div class="w-full md:w-max">
                <h1 class="w-full truncate text-2xl mb-1 font-bold text-gray-400 md:text-3xl dark:text-white">
                    Settings account
                </h1>

                <x-breadcrumb :path="['settings' => route('settings.account_data')]" />
            </div>
        </div>
    </div>

    <div class="px-4 md:px-6">
        <x-settings active="account_data">
            <h2 class="text-xl text-gray-700 font-semibold mb-4 dark:text-gray-300">
                {{ 'Account data' }}
            </h2>

            <form action="#" method="POST">
                <div class="mb-8 flex items-end gap-x-4">

                    <div class="w-48 h-48 relative">
                        <img class="w-full h-full object-cover rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </div>
                </div>

                <div>
                    <h1 class="pl-2 mb-2  text-gray-700 font-semibold text-base uppercase dark:text-gray-300">
                        <i class="fa-solid fa-user mr-1"></i> Account info
                    </h1>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="w-full">
                            <label class="text-sm font-semibold pl-1" for="">Full name</label>
                            <input class="input" value="{{ 'Anderson Froeder' }}" type="text" id="">
                        </div>
                        <div class="w-full">
                            <label class="text-sm font-semibold pl-1" for="">Phone</label>
                            <input class="input" value="f1autotransport@hotmail.com" type="email" id="">
                        </div>
                        <div class="w-full md:col-span-2">
                            <label class="text-sm font-semibold pl-1" for="">Email</label>
                            <input class="input" value="f1autotransport@hotmail.com" type="email" id="">
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button class="button button-secondary dark:button-primary uppercase" type="submit">
                        SAVE
                    </button>
                </div>
            </form>
        </x-settings>
    </div>

</x-app>
