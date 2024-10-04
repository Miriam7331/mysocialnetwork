<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Community Contributions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-3 gap-4 p-6">
                    <!-- Contenedor para los enlaces (2/3) -->
                    <div class="col-span-2 text-gray-900 dark:text-gray-100">
                        {{ __("Here you will see the Community Links!") }}

                        <x-community-links :links="$links" />

                        <!-- <ul>
                            @foreach ($links as $link)
                            <li>
                                {{$link->title}}
                                <small>Contributed by: {{$link->creator->name}} {{$link->updated_at->diffForHumans()}}</small>
                            </li>
                            @endforeach
                        </ul>
                        {{$links->links()}} -->
                    </div>

                    <!-- Contenedor para el componente (1/3) -->
                    <div class="col-span-1">
                        <x-community-add-link />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
