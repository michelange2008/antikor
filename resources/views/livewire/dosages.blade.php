<div>
    <x-titres.titre icone="dosages.svg">Dosages des oligos-éléments et des vitamines</x-titres.titre>

    <div class="flex flex-col gap-3 sm:flex-row">
        <div class="flex-grow sm:w_1/3">
            <p class="p-3 text-xl text-white bg-gray-800">Choisir un élément</p>
            @if ($element_choisi != null)
                <div class="p-2 mx-auto my-4 text-sm italic text-center bg-gray-300 rounded-md shadow w-fit hover:cursor-pointer shadow-black hover:bg-brique-500 active:bg-brique-900 active:text-white"
                    wire:click=reset_element>
                    <i class="fa-solid fa-list"></i>&nbsp;
                    Tout afficher
                </div>
            @endif

            @foreach ($oligovitamines as $type => $elements)
                <div>
                    @if ($element_choisi == null)
                        <div class="p-3 text-lg font-bold">
                            {{ ucfirst($type) }}
                        </div>
                    @endif

                    @foreach ($elements as $element)
                        @if ($element_choisi != null)
                            @if ($element == $element_choisi)
                                <div class="p-3 m-1 text-lg text-white sm:text-xl bg-vert-900">
                                    {{ ucfirst(__('oligos.' . $element)) }}
                                </div>

                                @include('components.oligos.type_analyse')


                            @endif
                        @else
                            <div class="p-3 m-1 bg-gray-300 hover:cursor-pointer hover:bg-vert-500 active:bg-vert-900 active:text-white"
                                wire:click=choisi_element('{{ $element }}')>

                                {{ ucfirst(__('oligos.' . $element)) }}
                            </div>
                        @endif
                    @endforeach

                </div>
            @endforeach
        </div>

        <div class="invisible sm:visible sm:w-2/3">

            @include('components.oligos.valeurs_analyses')
         
        </div>

    </div>
</div>
