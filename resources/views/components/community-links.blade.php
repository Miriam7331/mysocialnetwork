
@props(['links'])

<div class="community-links">
    <h2>Community Links</h2>
    <ul>
        @forelse($links as $link)
            <li>
                <a href="{{ $link->link }}" target="_blank" rel="noopener noreferrer">
                    {{ $link->title }}
                </a>
                <form action="{{ route('community-links.destroy', $link) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this link?');">Delete</button>
                </form>
            </li>
        @empty
            <li>No links available.</li>
        @endforelse
    </ul>

    {{-- Pagination --}}
    {{ $links->links() }}
</div>

<style>
    .community-links {
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 5px;
        margin-top: 20px;
    }
    .community-links h2 {
        margin-bottom: 10px;
    }
    .community-links ul {
        list-style-type: none;
        padding: 0;
    }
    .community-links li {
        margin-bottom: 8px;
    }
</style>
