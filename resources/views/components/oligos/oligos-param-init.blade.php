<div class="p-4 my-3 bg-gray-300 shadow shadow-gray-800">
    <h2 class="h2">Valeurs initiales</h2>
    <label class="block my-1">
        <span class="text-gray-700">Quantité de minéral distribué</span>
        <input
            class="block px-0.5 mt-0 w-full text-center border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
            type="number" step="1" min="0" wire:model="init.quantite"
            wire:change.debounce="setParametre('init')">
    </label>

    <label class="block my-1">
        <span class="text-gray-700">Atelier</span>
        <select
            class="block px-0.5 mt-0 w-full border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
            name="ateliers" id="ateliers" wire:model='init.atelier'
            wire:change.debounce = "setParametre('init')">
            @foreach ($ateliers as $at => $atelier)
                @if ($at == $atelier)
                    <option selected value="{{ $at }}">{{ $atelier }}</option>
                @else
                    <option value="{{ $at }}">{{ $atelier }}</option>
                @endif
            @endforeach
        </select>

        <label class="block my-1">
            <span class="text-gray-700">Stade</span>

            <select
                class="block px-0.5 mt-0 w-full border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                name="stades" id="stades" wire:model='init.stade'
                wire:change.debounce = "setParametre('init')">
                @foreach ($stades as $st => $stade)
                    @if ($st == $stade)
                        <option selected value="{{ $st }}">{{ $stade }}</option>
                    @else
                        <option value="{{ $st }}">{{ $stade }}</option>
                    @endif
                @endforeach
            </select>
        </label>
</div>
