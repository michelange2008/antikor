<div>

    <x-titres.titre icone="modalites_light.svg">Paramètres de l'outil oligoéléments</x-titres.titre>

    <div class="flex flex-col w-full sm:w-1/3 md:w-1/4">
        <div class="p-4 my-3 bg-gray-300 shadow shadow-gray-800">
            <label class="block">
                <span class="text-gray-700">Tolerance</span>

                <input
                    class="block px-0.5 mt-0 w-full text-center border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                    type="number" step="0.1" min="0" wire:model="tolerance"
                    wire:click.debounce="setParametre('tolerance')">
            </label>
        </div>
        <div class="p-4 my-3 bg-gray-300 shadow shadow-gray-800">
            <h2 class="h2">Valeurs initiales</h2>
            <label class="block my-1">
                <span class="text-gray-700">Quantité de minéral distribué</span>
                <input
                    class="block px-0.5 mt-0 w-full text-center border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                    type="number" step="1" min="0" wire:model="init.quantite"
                    wire:click.debounce="setParametre('init')">
            </label>

            <label class="block my-1">
                <span class="text-gray-700">Atelier</span>
                <select
                    class="block px-0.5 mt-0 w-full border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                    name="ateliers" id="ateliers" wire:model='init.atelier'
                    wire:click.debounce = "setParametre('init')">
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
                        wire:click.debounce = "setParametre('init')">
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

    </div>


    <a href="{{ route('oligos.outil') }}">
        <x-buttons.success-button><i class="mr-1 fa-solid fa-calculator"></i>Retour à l'outil</x-buttons.success-button>
    </a>
</div>
