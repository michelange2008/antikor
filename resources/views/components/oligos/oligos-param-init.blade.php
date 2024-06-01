<div class="p-4 my-3 bg-gray-300 shadow shadow-gray-800">
    <h2 class="h2">Valeurs initiales</h2>
    <div class="flex flex-col gap-3 sm:flex-row">

        <label class="block flex-grow my-1">
            <span class="text-gray-700">Atelier</span>
            <select class="block px-0.5 mt-0 w-full border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                name="ateliers" id="ateliers" wire:model='init.atelier' wire:change.debounce = "setParametre('init')">
                @foreach ($ateliers as $espece => $ateliersParEspece)
                    @foreach ($ateliersParEspece as $atelier)
                        @if ($atelier == $init['atelier'])
                            <option selected value="{{ $atelier }}">{{ ucfirst(__('oligos.'.$atelier)) }}</option>
                        @else
                            <option value="{{ $atelier }}">{{ ucfirst(__('oligos.'.$atelier)) }}</option>
                        @endif
                    @endforeach
                @endforeach
            </select>
        </label>

        <label class="block flex-grow my-1">
            <span class="text-gray-700">Stade</span>

            <select class="block px-0.5 mt-0 w-full border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                name="stades" id="stades" wire:model='init.stade' wire:change.debounce = "setParametre('init')">
                @foreach ($stades as $stade)
                    @if ($stade == $init['stade'])
                        <option selected value="{{ $stade }}">{{ ucfirst( __( 'oligos.'.$stade)) }}</option>
                    @else
                        <option value="{{ $stade }}">{{ ucfirst( __( 'oligos.'.$stade)) }}</option>
                    @endif
                @endforeach
            </select>
        </label>

        <label class="block flex-grow my-1">
            <span class="text-gray-700">Quantité de minéral distribué (g/j par animal)</span>
            <input
                class="block px-0.5 mt-0 w-full text-center border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                type="number" step="1" min="0" wire:model="init.quantite"
                wire:change.debounce="setParametre('init')">
        </label>

    </div>
</div>
