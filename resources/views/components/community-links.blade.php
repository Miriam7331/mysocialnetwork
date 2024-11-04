@props(['links'])

<div class="community-links">
    <h2 class="border-b border-white mb-2 pb-1">Community Links</h2>
    <ul>
        @forelse($links as $link)
            <li class="flex items-center mb-4 border-b border-white pb-2">
                <a href="{{ $link->link }}" target="_blank" rel="noopener noreferrer" class="flex-grow text-white-500">
                    {{ $link->title }}
                </a>
                <span class="ml-2 text-white text-sm">
                    Votos: {{ $link->users_count }}
                </span>

                <!-- Aquí se agrega el formulario de votación -->
                <form method="POST" action="/votes/{{ $link->id }}" style="display:inline;">
                    @csrf
                    <button type="submit"
                        class="px-4 py-2 {{ Auth::check() && Auth::user()->votedFor($link) ? 'bg-green-500 hover:bg-green-600 text-white' : 'bg-gray-500 hover:bg-gray-600 text-white' }} rounded disabled:opacity-50"
                        {{ !Auth::user() || !Auth::user()->isTrusted() ? 'disabled' : '' }}>
                        Votar
                    </button>
                </form>

                <a href="/dashboard/{{ $link->channel->slug }}" class="inline-block ml-2">
                    <span class="px-2 py-1 text-white text-sm font-semibold rounded"
                        style="background-color: {{ $link->channel->color }}">
                        {{ $link->channel->title }}
                    </span>
                </a>
            </li>
        @empty
            <p>No approved contributions yet.</p>
        @endforelse
    </ul>

    {{-- Pagination --}}
    {{ $links->appends($_GET)->links() }}
</div>
