<div class="shadow shadow-gray-900 bg-gray-300 p-5">
    <h2 class="h2">Besoins et seuils de toxicité (mg/kg de MSI)</h2>
    <table class="w-full mt-3">
        <thead>
            <tr>
                <th class="border-gray-300 border-r-2"></th>
                <th colspan="3" class="p-2 text-center bg-vert-700 text-white border-gray-300 border-l-2">Besoins</th>
                <th colspan="2" class="p-2 text-center bg-brique-700 text-white border-gray-300 border-l-2">Seuils de
                    toxicité</th>
            </tr>
            <tr>
                <th class=""></th>
                @foreach ($ateliers as $at => $atelier)
                    <th class="border-t-2 p-3 text-center bg-vert-100 border-gray-300 border-l-2">
                        {{ ucfirst($atelier) }} </th>
                @endforeach
                @foreach ($especes as $esp => $espece)
                    <th class="border-t-2 p-3 text-center bg-brique-100 border-gray-300 border-l-2">
                        {{ ucfirst($espece) }}</th>
                @endforeach
            </tr>
        </thead>
        @foreach ($oligovitamines['oligoelements'] as $abbreviation => $nom)
            <tr class="border-t-2 border-gray-400">
                <td class="p-3 font-bold border-r-2 border-gray-300 text-vert-900">{{ ucfirst($nom) }} </td>
                @foreach ($ateliers as $at => $atelier)
                    <td class="p-3 text-center border-gray-300 border-l-2 bg-vert-100">
                        <input
                            class="mt-1 block w-full rounded text-center bg-vert-300 border-transparent focus:vert-brique-900 focus:bg-gray-100 focus:ring-0"
                            type="number" step="1" min="0" value="{{ $besoins[$at][$abbreviation] }}"
                            wire:model="besoins.{{ $at }}.{{ $abbreviation }}"
                            wire:change.debounce="setParametre('besoins')">
                    </td>
                @endforeach
                @foreach ($especes as $esp => $espece)
                    <td class="p-3 text-center border-gray-300 border-l-2 bg-brique-100">
                        <input
                            class="mt-1 block w-full rounded text-center bg-brique-300 border-transparent focus:border-brique-900 focus:bg-gray-100 focus:ring-0"
                            type="number" step="1" min="0" value="{{ $toxicites[$esp][$abbreviation] }}"
                            wire:model="toxicites.{{ $esp }}.{{ $abbreviation }}"
                            wire:change.debounce="setParametre('toxicites')">
                    </td>
                @endforeach

            </tr>
        @endforeach

        @foreach ($oligovitamines['vitamines'] as $abbreviation => $nom)
            <tr class="@if($loop->first) border-t-4 @else border-t-2 @endif border-gray-400">
                <td class="p-3 font-bold border-r-2 border-gray-300 text-brique-900">{{ ucfirst($nom) }} </td>
                @foreach ($ateliers as $at => $atelier)
                    <td class="p-3 text-center border-gray-300 border-l-2 bg-vert-100">
                        <input
                            class="mt-1 block w-full rounded text-center bg-vert-300 border-transparent focus:vert-brique-900 focus:bg-gray-100 focus:ring-0"
                            type="number" step="1" min="0" value="{{ $besoins[$at][$abbreviation] }}"
                            wire:model="besoins.{{ $at }}.{{ $abbreviation }}"
                            wire:change.debounce="setParametre('besoins')">
                    </td>
                @endforeach
                @foreach ($especes as $esp => $espece)
                    <td class="p-3 text-center border-gray-300 border-l-2 bg-brique-100">
                        <input
                            class="mt-1 block w-full rounded text-center bg-brique-300 border-transparent focus:border-brique-900 focus:bg-gray-100 focus:ring-0"
                            type="number" step="1" min="0" value="{{ $toxicites[$esp][$abbreviation] }}"
                            wire:model="toxicites.{{ $esp }}.{{ $abbreviation }}"
                            wire:change.debounce="setParametre('toxicites')">
                    </td>
                @endforeach

            </tr>
        @endforeach
        
    </table>
</div>
