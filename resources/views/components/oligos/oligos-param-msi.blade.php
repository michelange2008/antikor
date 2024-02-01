<div class="lg:w-2/3 w-full p-3 bg-gray-300 shadow shadow-gray-800 my-3">
    <h2 class="h2">Matière sèche ingérée (kg MSI/j/animal</h2>

    <div class="flex flex-row gap-2">

        @foreach ($msi as $atelier => $detail)
            <div class="basis-full">

                <h3 class="h3">{{ ucfirst($ateliers[$atelier]) }}</h3>
                @foreach ($detail as $stade => $val_msi)
                    <label class="block m-2">
                        <span class="text-gray-700">{{ ucfirst($stades[$stade]) }}</span>

                        <input
                            class="block px-0.5 mt-0 w-full text-center border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                            type="number" step="0.1" min="0"
                            wire:model="msi.{{ $atelier }}.{{ $stade }}"
                            wire:change.debounce="setParametre('msi')">
                    </label>

                @endforeach
            </div>
        @endforeach
    </div>
</div>
