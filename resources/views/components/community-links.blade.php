@props(['links'])

<div class="community-links">
    <h2 class="border-b border-white mb-2 pb-1">Community Links</h2> <!-- Añadir borde inferior -->
    <ul>
        @forelse($links as $link)
            <li class="flex justify-between mb-4 border-b border-white pb-2"> <!-- Borde inferior para cada link -->
                <a href="{{ $link->link }}" target="_blank" rel="noopener noreferrer">
                    {{ $link->title }}
                </a>
                <form action="{{ route('community-links.destroy', $link) }}" method="POST" style="display:inline;">
                    <span class="inline-block px-2 py-1 text-white text-sm font-semibold rounded"
                        style="background-color: {{ $link->channel->color }}">
                        {{ $link->channel->title }}
                    </span>

                    {{-- @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this link?');">Delete</button> --}}
                </form>
            </li>
        @empty
            {{-- <li>No links available.</li> --}}
        @endforelse
        @if ($links->isEmpty())
            <p>No approved contributions yet.</p>
        @else
            @foreach ($links as $link)
                {{-- <p>{{ $link->title }}</p> --}}
                <!-- Muestra más detalles del link aquí -->
            @endforeach
        @endif
    </ul>

    {{-- Pagination --}}
    {{ $links->links() }}
</div>

