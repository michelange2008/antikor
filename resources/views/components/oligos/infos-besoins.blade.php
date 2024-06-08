<div class="flex fixed top-0 left-0 z-40 justify-center w-full h-full bg-gray-200/50">
    <div class="px-6 py-3 m-auto bg-brique-100">
        <h2 class="text-base font-bold text-center sm:h2">Besoins des ruminants en oligo-éléments et vitamines</h2>
        <p class="text-sm italic text-center sm:text-base">d'après MESCHY F. - Alimentation minérale et vitaminique des ruminants :
            <br>actualisation des connaissances - INRA Prod. Anim., 2007, 20 (2), 119-128
        </p>
        <table class="mt-4 mb-2 w-full text-xs table-auto md:text-base sm:text-sm">
            <thead>
                <th class="px-1 py-1 text-left text-white border sm:px-3 bg-brique-900 border-brique-300">Elément</th>
                <th class="px-1 py-1 text-white border sm:px-3 bg-brique-900 border-brique-300">Seuil de carence</th>
                <th class="px-1 py-1 text-white border sm:px-3 bg-brique-900 border-brique-300">Apport journalier</br>recommandé
                </th>
                <th class="px-1 py-1 text-white border sm:px-3 bg-brique-900 border-brique-300">Toxicité</th>
                <th class="hidden px-1 py-1 text-white border sm:px-3 md:table-cell bg-brique-900 border-brique-300">
                    Maximum</br>règlementaire</th>
            </thead>
            <tbody>
                @foreach ($oligovitamines as $type => $elements)
                    @foreach ($elements as $element)
                        <tr class="text-center">
                            <td class="px-1 py-1 text-left border sm:px-3 border-brique-900">{{ __('oligos.'.$element) }}</td>

                            <td class="px-1 py-1 text-left border sm:px-3 border-brique-900">{{ $valeurs[$element]['carences'] }}
                            </td>

                            @if (is_array($valeurs[$element]['besoins']))
                                <td class="px-1 py-1 text-left border sm:px-3 border-brique-900">
                                    @foreach ($valeurs[$element]['besoins'] as $groupe => $valeur)
                                        <p>{{ $groupe }}: {{ $valeur }}</p>
                                    @endforeach
                                </td>
                            @else
                                <td class="px-1 py-1 text-left border sm:px-3 border-brique-900">
                                    {{ $valeurs[$element]['besoins'] }} </td>
                            @endif

                            @if (is_array($valeurs[$element]['toxicite']))
                                <td class="px-1 py-1 text-left border sm:px-3 border-brique-900">
                                    @foreach ($valeurs[$element]['toxicite'] as $groupe => $valeur)
                                        <p>{{ $groupe }}: {{ $valeur }}</p>
                                    @endforeach
                                </td>
                            @else
                                <td class="px-1 py-1 text-left border sm:px-3 border-brique-900">
                                    {{ $valeurs[$element]['toxicite'] }} </td>
                            @endif

                            <td class="hidden p-3 text-left border md:table-cell border-brique-900">
                                {{ $valeurs[$element]['max_reglem'] }} </td>

                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
        <div class="text-xs sm:text-sm md:text-base">
            <p class="font-bold">Les valeurs sont en mg/kg de MSI pour les oligo-éléments et en UI/kg de MSI pour les vitamines</p>
            <p>Certaines valeurs ont été modifiées. Dans la publication originale,
                les AJR en iode vont de 0,2 à 0,8 selon le niveau de production laitière.
            </p>
            <p>
                Les AJR pour les chèvres en cuivre sont à 10 ppm. et les AJR en vitamines A
                et E sont variables selon le % de concentré dans la ration.
                Pour ces dernières, nous avons pris une valeur intermédiaire.
            </p>
        </div>
        <x-buttons.success-button x-on:click="infosBesoins = false">Fermer</x-buttons.success-button>
    </div>
</div>
