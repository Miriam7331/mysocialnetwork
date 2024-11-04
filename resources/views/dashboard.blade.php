<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Contributions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <x-flash-message />

                <!-- Pestañas de orden -->
                <div class="flex space-x-4 p-6">
                    <ul class="flex space-x-4">
                        <li>
                            <a class="px-4 py-2 rounded-lg {{ request()->exists('popular') ? 'text-white hover:text-blue-700' : 'text-gray-500 underline cursor-not-allowed' }}"
                                href="{{ request()->url() }}">
                                Most recent
                            </a>
                        </li>
                        <li>
                            <a class="px-4 py-2 rounded-lg {{ request()->exists('popular') ? 'text-gray-500 underline cursor-not-allowed' : 'text-white hover:text-blue-700' }}"
                                href="?popular">
                                Most popular
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="grid grid-cols-3 gap-4 p-6">
                    <div class="col-span-2 text-gray-900 dark:text-gray-100">
                        {{ __('Here you will see the Community Links!') }}

                        <x-community-links :links="$links" />
                    </div>

                    <div class="col-span-1">
                        <x-community-add-link :channels="$channels" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
