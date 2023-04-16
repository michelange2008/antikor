<div>
    @if (session('message'))
        @if (session('type') == 'danger')
        <div class="flex bg-red-900 text-white p-5 my-3 rounded-lg">
            {{ session('message') }}
        </div>
        @elseif(session('type') == 'warning')
        <div class="flex bg-orange-300 text-black p-5 my-3 rounded-lg">
            {{ session('message') }}
        </div>
        @else
        <div class="flex bg-teal-300 p-5 my-3 rounded-lg">
            {{ session('message') }}
        </div>
        @endif
    @endif
</div>
