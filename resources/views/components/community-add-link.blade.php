{{-- ESTE ES EL FORMULARIO DE LA DERECHA EN EL DASHBOARD --}}

<div class="md:col-span-1 bg-gray-800 p-6 rounded-lg shadow-md border border-gray-600 self-start">
    <h3 class="text-xl font-semibold mb-4 text-white">Contribute a link</h3>

    {{-- @if(session('message'))
        <div class="bg-green-500 text-white p-4 mb-4">
            {{ session('message') }}
        </div>
    @endif --}}
    
    <x-flash-message />


    <form method="POST" action="/dashboard">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-white font-medium">Title:</label>
            <input type="text" id="title" name="title"
                class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('title') is-invalid @enderror"
                placeholder="What is the title of your article?" value="{{ old('title') }}">
        </div>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-4">
            <label for="link" class="block text-white font-medium">Link:</label>
            <input type="text" id="link" name="link"
                class="mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('link') is-invalid @enderror"
                placeholder="What is the URL?" value="{{ old('link') }}">
        </div>
        @error('link')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-4">
            <label for="channel" class="block text-white font-medium">Channel:</label>
            <select
                class="@error('channel_id') is-invalid @enderror mt-1 block w-full rounded-md border-gray-600 bg-gray-700 text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                name="channel_id">
                <option selected disabled>Pick a Channel...</option>
                @foreach ($channels as $channel)
                    <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                        {{ $channel->title }}
                    </option>
                @endforeach
            </select>
            @error('channel_id')
                <span class="text-red-500 mt-2">{{ $message }}</span>
            @enderror
        </div>

        <div class="pt-3">
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Contribute!</button>
        </div>
    </form>
</div>
