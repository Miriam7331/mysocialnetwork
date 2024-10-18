<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Links') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($links->isEmpty())
                        <p>{{ __('You have not published any links yet.') }}</p>
                    @else
                        <ul>
                            @foreach ($links as $link)
                                <li class="mb-4 flex justify-between items-center">
                                    <div class="flex items-center">
                                        <a href="{{ $link->url }}" target="_blank"
                                            class="text-blue-600 hover:underline">{{ $link->title }}</a>
                                    </div>
                                    <div class="flex items-center ml-4">
                                        <span class="px-2 py-1 text-sm text-white rounded"
                                            style="background-color: {{ $link->channel->color ?? '#ccc' }};">
                                            {{ $link->channel->title ?? 'N/A' }}
                                        </span>
                                    </div>
                                </li>
                                <div class="flex items-center mt-2">
                                    <span class="text-sm text-white-600">
                                        {{ __('Last modified: :date', ['date' => $link->updated_at->format('d/m/Y H:i')]) }}
                                    </span>
                                    <div class="border-l border-white mx-2 h-6"></div>
                                        <span
                                        class="px-2 py-1 text-sm rounded {{ $link->approved ? 'text-green-500' : 'text-yellow-500' }} ">
                                        {{ $link->approved ? __('Approved') : __('Pending') }}
                                    </span>
                                </div>
                            @endforeach
                        </ul>
                        {{ $links->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
