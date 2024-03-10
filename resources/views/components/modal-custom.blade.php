@props([
    'name',
    'open' => false,
])

<div 
    x-data="{
        open: @js($open),

    }"
    x-show="open"
    x-cloak 
    x-on:open-modal.window="$event.detail == '{{ $name }}' ? open = !open : null"
    x-trap.inert.noscroll="open" 

    @keydown.escape="open = false"
    x-transition:enter="ease-out duration-100"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="flex fixed inset-0 top-0 z-40 flex-col justify-center py-5 bg-gray-400/50">

    <div 
        x-show='open' @click.outside="open = false"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="m-auto w-full shadow transition-all sm:w-3/4 lg:w-2/3 xl-w-1/2">

        {{ $slot }}

    </div>

</div>
