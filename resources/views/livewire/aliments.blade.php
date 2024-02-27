<div x-data="{ open: @entangle('openModal'), edit: @entangle('editModal') }">
    <x-titres.titre icone="aliment.svg">Aliments</x-titres.titre>

    <div x-show="open">
        <x-aliments.create-modal :altypes="$altypes" :alstades="$alstades" />
    </div>
    <div x-show="edit != 0 ">
        <x-aliments.edit-modal :altypes="$altypes" :alstades="$alstades" />
    </div>
    <x-button-add />
    <div>
        <table class="w-full border-2">
            <thead class="text-white border-2 bg-brique-900 border-brique-900">
                <th class="py-2">Type</th>
                <th>Aliment</th>
                <th>Stade</th>
                <th>MS (%)</th>
                <th>P total</th>
                <th>P abs.</th>
                <th>Ca total</th>
                <th>Ca abs.</th>
                <th>Edit</th>
                <th>Del</th>
            </thead>
            <tbody class="border-2 divide-x-2 divide-y-2 divide-gray-200">
                @foreach ($liste_aliments as $key => $aliment)
                    <tr class="border-2 divide-x-2 divide-y-2 divide-gray-200">
                        <td class="p-2">
                            {{ ucfirst($aliment->altype->nom) }}
                        </td>
                        <td class="p-2">
                            {{ $aliment->nom }}
                        </td>
                        <td class="p-2">
                            {{ $aliment->alstade == null ? '-' : $aliment->alstade->nom }}
                        </td>
                        <td class="p-2 text-center">
                            {{ round($aliment->MS, 1) }}
                        </td>
                        <td class="p-2 text-center">
                            {{ $aliment->Ptot }}
                        </td>
                        <td class="p-2 font-bold text-center">
                            {{ $aliment->P }}
                        </td>
                        <td class="p-2 text-center">
                            {{ $aliment->Catot }}
                        </td>
                        <td class="p-2 font-bold text-center">
                            {{ $aliment->Ca }}
                        </td>
                        <td class="text-center cursor-pointer">
                            <i class="text-vert fa-solid fa-pen-to-square" wire:click='edit({{$aliment->id}})'></i>
                        </td>
                        <td class="text-center cursor-pointer">
                            <i class="text-brique fa-solid fa-trash"
                                wire:confirm="Etes-vous sûr.e.s de vouloir supprimer cet aliment ?"
                                wire:click="delete({{ $aliment->id }})"></i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
