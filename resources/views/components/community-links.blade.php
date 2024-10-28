@props(['links'])

<div class="community-links">
    <h2 class="border-b border-white mb-2 pb-1">Community Links</h2>
    <ul>
        @forelse($links as $link)
            <li class="flex items-center mb-4 border-b border-white pb-2"> <!-- Flex para mantener alineados los elementos -->
                <a href="{{ $link->link }}" target="_blank" rel="noopener noreferrer" class="flex-grow text-white-500">
                    {{ $link->title }}
                </a>
                <span class="ml-2 text-white text-sm">
                    Votos: {{ $link->users_count }} <!-- Aquí se muestra el conteo -->
                </span>
                <form action="{{ route('community-links.destroy', $link) }}" method="POST" style="display:inline;">
                    <a href="/dashboard/{{ $link->channel->slug }}" class="inline-block ml-2">
                        <span class="px-2 py-1 text-white text-sm font-semibold rounded"
                              style="background-color: {{ $link->channel->color }}">
                            {{ $link->channel->title }}
                        </span>
                    </a>
                </form>
            </li>
        @empty
            <p>No approved contributions yet.</p>
        @endforelse
    </ul>

    {{-- Pagination --}}
    {{ $links->links() }}
</div>
