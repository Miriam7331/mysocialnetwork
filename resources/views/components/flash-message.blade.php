<div>
    @if ($success)
    <div class="p-4 mb-4 text-sm text-white bg-green-500 rounded-lg" role="alert">
        {{ $success }}
    </div>
@endif

@if ($notice)
    <div class="p-4 mb-4 text-sm text-white bg-blue-500 rounded-lg" role="alert">
        {{ $notice }}
    </div>
@endif

</div>