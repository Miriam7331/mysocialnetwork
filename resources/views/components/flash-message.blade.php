<div>
    @if($success)
        <div class="bg-blue-500 text-white p-4 mb-4">
            {{ $success }}
        </div>
    @endif

    @if($notice)
        <div class="bg-green-500 text-white p-4 mb-4">
            {{ $notice }}
        </div>
    @endif
</div>
