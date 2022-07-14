<x-app title="Settings" :active="['item' => 'settings']">

    <!-- Header page -->
    <div class="my-6 px-4 md:px-6">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <div class="w-full md:w-max">
                <h1 class="mb-1 truncate uppercase text-2xl font-bold text-gray-400 dark:text-white">
                    Settings account
                </h1>

                <x-breadcrumb :path="['Settings' => route('settings.account_data')]" />
            </div>
        </div>
    </div>

    <div class="px-4 md:px-6">
        <x-layouts.settings active="account_data">

            <div x-data="{ edit: false}" id="AccountData">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl text-gray-700 font-semibold dark:text-gray-300">{{ 'Account data' }}</h2>

                    <div class="inline-flex gap-4 items-center">
                        <span class="text-xs font-semibold text-gray-400" x-text="edit ? 'edit enabled' : 'edit disabled'"></span>

                        <button class="button-icon button-primary button-icon-xs rounded " @click="edit = !edit">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                    </div>
                </div>

                <div class="flex items-start pb-6 border-b border-gray-200 dark:border-zinc-700">
                    <x-avatar-user class="!w-32 !h-32 !rounded" :user="Auth::user()" />

                    <div class="flex items-start justify-between w-full h-full">
                        <div class="pl-3 mt-2 w-full h-full">
                            <p class="text-xl font-semibold text-gray-700 dark:text-gray-300">{{ Auth::user()->name }}</p>
                            <p class="text-sm pl-1">Admin</p>

                            <button class="button button-sm button-secondary mt-6 pl-2 dark:button-primary" :disabled="!edit">
                                Change picture <i class="fa-solid fa-file-arrow-up"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="pt-6">
                    <h1 class="pl-2 mb-4 text-gray-700 text-sm font-semibold uppercase dark:text-gray-300">
                        Account info
                    </h1>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-1/2">
                            <label class="text-sm font-semibold pl-1" for="">Full name</label>
                            <input class="input" value="{{ 'Anderson Froeder' }}" type="text" :disabled="!edit">
                        </div>

                        <div class="w-full px-2 mb-4 md:w-1/2">
                            <label class="text-sm font-semibold pl-1" for="">Phone</label>
                            <input class="input" value="f1autotransport@hotmail.com" type="email" :disabled="!edit">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full px-2 mb-4 md:w-full">
                            <label class="text-sm font-semibold pl-1" for="">Email</label>
                            <input class="input" value="f1autotransport@hotmail.com" type="email" :disabled="!edit">
                        </div>
                    </div>
                </div>

                <div class="pt-6 flex items-center justify-end">
                    <button class="button button-primary uppercase" type="submit" :disabled="!edit">
                        SAVE <i class="fa-solid fa-floppy-disk"></i>
                    </button>
                </div>
            </div>

            <!-- <h2 class="text-xl text-gray-700 font-semibold mb-4 dark:text-gray-300">
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
            </form> -->
        </x-layouts.settings>
    </div>

</x-app>
