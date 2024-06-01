<div class="p-5 bg-gray-300 shadow shadow-gray-900">
    <h2 class="h2">Apports, besoins et seuils de toxicité (mg/kg ou UI de MSI)</h2>
    <div class="p-3">
        @foreach ($oligovitamines as $type => $oligovitamine)
            <h3 class="h3">{{ ucfirst($type) }}</h3>
            <div class="flex flex-col gap-3 py-1 sm:flex-row sm:flex-wrap">
                @foreach ($oligovitamine as $element)
                    <div class="flex-grow border border-slate-800">
                        <p class="p-3 text-lg font-bold text-white bg-slate-800">{{ ucfirst(__('oligos.'.$element)) }} </p>
                        <div class="p-3">
                            @foreach ($valeurs as $elt => $donnees)
                                @if ($element == $elt)
                                    @foreach ($donnees as $intitule => $valeur)
                                        @if (is_array($valeur))
                                            <span class="font-bold">{{ ucfirst(__('oligos.' . $intitule)) }}</span>
                                            <div class="flex flex-row ml-1">
                                            @foreach ($valeur as $nom => $detail)
                                                    <label class="block flex-grow mx-1 my-1">
                                                        <span
                                                            class="text-gray-700">{{ ucfirst(__('oligos.' . $nom)) }}</span>
                                                        <input
                                                            class="block px-0.5 mt-0 w-full text-center border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                                                            type="number" step="0.1" min="0"
                                                            wire:model="valeurs.{{ $element }}.{{ $intitule }}.{{ $nom }}"
                                                            wire:change.live="setValeurs()"
                                                            wire:blur.live="setValeurs()">
                                                    </label>
                                                    @endforeach
                                                </div>
                                        @else
                                            <div>
                                                <label class="block my-1">
                                                    <span
                                                        class="font-bold">{{ ucfirst(__('oligos.' . $intitule)) }}</span>
                                                    <input
                                                        class="block px-0.5 mt-0 w-full text-center border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                                                        type="number" step="0.1" min="0"
                                                        wire:model="valeurs.{{ $element }}.{{ $intitule }}"
                                                        wire:change.live="setValeurs()" wire:blur.live="setValeurs()">
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
