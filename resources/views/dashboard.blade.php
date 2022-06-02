<x-dashboard title="Dashboard">

    <!-- Header page -->
    <div class="my-6 px-4 md:px-6">
        <div class="flex flex-wrap gap-2 justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-400 dark:text-white">
                Dashboard
            </h1>

            <x-breadcrumb :path="['Dashboard' => route('dashboard')]" />
        </div>
    </div>

    <div class="px-4 md:px-6">
        <div class="grid gap-10 lg:grid-cols-2">
            <div class="w-full overflow-hidden rounded-sm aspect-w-16 aspect-h-9">
                <img class="object-cover" src="https://images.unsplash.com/photo-1630702379394-e202e2fbe01e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=600&amp;q=80" alt="image" />
            </div>
            <div class="flex flex-col justify-center">
                <div class="flex space-x-3">
                    <span class="px-3 py-1 text-sm rounded-full bg-sky-100 text-sky-600">TailwindCSS</span>
                    <span class="px-3 py-1 text-sm rounded-full bg-red-100 text-red-600">Laravel</span>
                </div>
                <h3 class="mt-5 text-2xl font-bold text-gray-900 dark:text-white">Welcome To The Template</h3>
                <p class="mt-3 text-gray-500 dark:text-gray-200">Equity agile development burn rate buyer strategy founders user experience customer. Termsheet series A financing direct mailing infrastructure research &amp; development twitter.</p>
                <div class="flex mt-5 space-x-3">
                    <button class="button button-primary uppercase waves-effect">
                        Get started
                    </button>
                </div>
            </div>
        </div>
        <h2 class="mt-10 text-3xl text-gray-900 dark:text-white">Latest Articles</h2>
        <div class="grid mt-5 lg:grid-cols-3 gap-y-14 lg:gap-10">
            <div>
                <div class="w-full overflow-hidden rounded-sm aspect-w-13 aspect-h-9">
                    <img class="object-cover" src="https://images.unsplash.com/photo-1630702379394-e202e2fbe01e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=600&amp;q=80" alt="image" />
                </div>
                <div class="flex mt-5 space-x-3">
                    <span class="px-3 py-1 text-sm rounded-full bg-emerald-100 text-emerald-600">Engineering</span>
                    <span class="px-3 py-1 text-sm rounded-full bg-amber-100 text-amber-600">Design</span>
                </div>
                <h3 class="mt-5 text-2xl font-bold text-gray-900 dark:text-white">20 Myths About TailwindCSS</h3>
                <p class="mt-3 text-gray-500 dark:text-gray-200">Equity agile development burn rate buyer strategy founders user experience customer. Termsheet series A financing direct mailing infrastructure research &amp; development twitter.</p>
                <div class="flex mt-5 space-x-3">
                    <div class="flex-shrink-0">
                        <img class="object-cover w-12 h-12 rounded-full" src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=100&amp;q=80" alt="image" />
                    </div>
                    <div class="flex flex-col">
                        <span class="font-medium dark:text-gray-200">Ronald Matthews</span>
                        <span class="text-gray-500 dark:text-gray-200">Oct 14, 2021 • 6 min read</span>
                    </div>
                </div>
            </div>
            <div>
                <div class="w-full overflow-hidden rounded-sm aspect-w-13 aspect-h-9">
                    <img class="object-cover" src="https://images.unsplash.com/photo-1601933470096-0e34634ffcde?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="image" />
                </div>
                <div class="flex mt-5 space-x-3">
                    <span class="px-3 py-1 text-sm rounded-full bg-fuchsia-100 text-fuchsia-600">Product</span>
                    <span class="px-3 py-1 text-sm rounded-full bg-emerald-100 text-emerald-600">Engineering</span>
                </div>
                <h3 class="mt-5 text-2xl font-bold text-gray-900 dark:text-white">15 Best TailwindCSS Website Templates</h3>
                <p class="mt-3 text-gray-500 dark:text-gray-200">Agile development burn rate buyer strategy founders user experience customer. Termsheet series A financing direct mailing infrastructure research &amp; development twitter.</p>
                <div class="flex mt-5 space-x-3">
                    <div class="flex-shrink-0">
                        <img class="object-cover w-12 h-12 rounded-full" src="https://images.unsplash.com/photo-1541647376583-8934aaf3448a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=100&amp;q=80" alt="image" />
                    </div>
                    <div class="flex flex-col">
                        <span class="font-medium dark:text-gray-200">Joseph Peck</span>
                        <span class="text-gray-500 dark:text-gray-200">Sep 03, 2021 • 6 min read</span>
                    </div>
                </div>
            </div>
            <div>
                <div class="w-full overflow-hidden rounded-sm aspect-w-13 aspect-h-9">
                    <img class="object-cover" src="https://images.unsplash.com/photo-1630283018262-d0df4afc2fef?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="image" />
                </div>
                <div class="flex mt-5 space-x-3">
                    <span class="px-3 py-1 text-sm rounded-full bg-amber-100 text-amber-600">Design</span>
                </div>
                <h3 class="mt-5 text-2xl font-bold text-gray-900 dark:text-white">Why Top brands switch to TailwindCSS</h3>
                <p class="mt-3 text-gray-500 dark:text-gray-200">Development burn rate buyer strategy founders user experience customer. Termsheet series A financing direct mailing infrastructure research &amp; development twitter.</p>
                <div class="flex mt-5 space-x-3">
                    <div class="flex-shrink-0">
                        <img class="object-cover w-12 h-12 rounded-full" src="https://images.unsplash.com/photo-1549351512-c5e12b11e283?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=100&amp;q=80" alt="image" />
                    </div>
                    <div class="flex flex-col">
                        <span class="font-medium dark:text-gray-200">Emily Gilbert</span>
                        <span class="text-gray-500 dark:text-gray-200">Aug 20, 2021 • 6 min read</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Grid Cards -->
    <div class="px-4 md:px-6">
        <div class="grid gap-6 md:grid-cols-2">
            <div class="bg-white shadow rounded-md dark:bg-zinc-800">
                <!-- ... -->
            </div>
        </div>
    </div>

</x-dashboard>


