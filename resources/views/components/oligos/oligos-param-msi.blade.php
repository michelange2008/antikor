<div class="p-3 my-3 w-full bg-gray-300 shadow shadow-gray-800">
    <h2 class="h2">Matière sèche ingérée (kg MSI/j/animal</h2>

    <div class="flex flex-col gap-2 sm:flex-row">

        @foreach ($msi as $atelier => $stades)
            <div class="flex flex-col flex-grow lg:flex-row">

                    <div class="flex flex-col m-2">

                        <h3 class="h3">{{ ucfirst( __( 'oligos.'.$atelier ) ) }}</h3>
                        @foreach ($stades as $stade => $val_msi)
                            <label class="block">
                                <span class="text-vert-700">{{ ucfirst( __('oligos.'.$stade) ) }}</span>

                                <input
                                    class="block px-0.5 mt-0 w-full text-center border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                                    type="number" step="0.1" min="0"
                                    wire:model="msi.{{ $atelier }}.{{ $stade }}"
                                    wire:change.debounce="setParametre('msi')">
                            </label>
                        @endforeach
                    </div>
            </div>
        @endforeach
    </div>
</div>
