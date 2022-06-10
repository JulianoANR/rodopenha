<x-app title="Settings">

    <!-- Header page -->
    <div class="my-6 px-4 md:px-6">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <div class="w-full md:w-max">
                <h1 class="w-full truncate text-2xl mb-1 font-bold text-gray-400 md:text-3xl dark:text-white">
                    Settings account
                </h1>

                <x-breadcrumb :path="['Settings' => route('settings.account_data'), 'Company' => route('settings.company_data')]" />
            </div>
        </div>
    </div>

    <section class="px-4 md:px-6">
        <x-settings active="company_data">
            <h2 class="text-xl font-semibold mb-4">
                {{ 'Company data' }}
            </h2>

            <form action="#" method="POST">
                <div class="mb-8 flex items-end gap-x-4">
                    <div class="w-48 h-48 relative">
                        <img class="w-full h-full object-cover rounded-full" src="https://media.ship.cars/media/f1-butom_8dO31W8_LSX3kdk.jpg" alt="">
                    </div>
                </div>

                <div>
                    <h1 class="uppercase text-sm font-semibold mb-2">
                        <i class="fa-solid fa-building"></i> Comapany Infomation
                    </h1>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="w-full">
                            <label class="text-sm font-semibold pl-1" for="">Owner's name</label>
                            <input class="input" value="{{ 'LEONARDO FROEDER' }}" type="text" id="">
                        </div>
                        <div class="w-full">
                            <label class="text-sm font-semibold pl-1" for="example02">Address</label>
                            <input class="input" value="15 Glenside Drive Blackstone, MA, 01504" type="email" id="example02">
                        </div>
                    </div>
                </div>

                <div>
                    <h1 class="uppercase text-sm font-semibold mb-2 mt-8">
                        <i class="fa-solid fa-phone"></i> Contact Infomation
                    </h1>

                    <div class="grid md:grid-cols-3 gap-4">
                        <div class="">
                            <label class="text-sm font-semibold pl-1" for="">Primary phone</label>
                            <input class="input" value="{{ '(561) 866-1518' }}" type="text" id="">
                        </div>
                        <div class="">
                            <label class="text-sm font-semibold pl-1" for="">Secondary phone</label>
                            <input class="input" value="{{ '(561) 866-1518' }}" type="text" id="">
                        </div>
                        <div class="">
                            <label class="text-sm font-semibold pl-1" for="">Fax number</label>
                            <input class="input" value="{{ '(561) 866-1518' }}" type="text" id="">
                        </div>
                        <div class="md:col-span-3">
                            <label class="text-sm font-semibold pl-1" for="">Email</label>
                            <input class="input" value="{{ 'f1autotransport@hotmail.com' }}" type="text" id="">
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button class="button button-secondary dark:button-primary uppercase" type="submit">
                        Update <i class="fa-solid fa-pen"></i>
                    </button>
                </div>
            </form>

        </x-settings>
    </section>

</x-app>
