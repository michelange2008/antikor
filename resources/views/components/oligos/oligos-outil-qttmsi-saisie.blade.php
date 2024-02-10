<div
    class="flex flex-row gap-1 justify-center py-2 my-2 text-center text-white align-middle md:pl-40 md:text-left lg:pl-16 lg:my-3">

    <i class="text-5xl md:hidden fa-solid fa-square-caret-up" x-on:click="valeur = valeur + {{ $step }}"
        wire:click="maj"></i>
    <input
        class="inline-block w-32 text-center bg-gray-100 rounded-md border-transparent text-vert-900 md:text-lg lg:text-xl focus:border-gray-500 focus:bg-white focus:ring-0"
        type="number" step="{{ $step }}" min="0" wire:model="{{ $parametre }}"
        wire:change.debounce="maj" />

    <span class="hidden ml-1 md:inline md:text-lg lg:text-xl">{{ $unite }}</span>
    <i class="text-5xl md:hidden fa-solid fa-square-caret-down" x-on:click="valeur = valeur - {{ $step }}"
        wire:click="maj"></i>
    <div>
        @error($parametre)
            {{ $message }}
        @enderror

    </div>

</div>
