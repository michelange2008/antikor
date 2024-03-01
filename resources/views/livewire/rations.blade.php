<div class="mt-3" x-data="{ alChoisi: @entangle('alimentChoisi'), edit: @entangle('editModal') }">

    <div x-show="edit != 0 " x-cloak>
        <x-rations.edit-modal />
    </div>

    <div>
        <table class="w-full border">
            <thead class="text-white bg-brique-900">
                <th class="py-2 pl-3 text-left border border-gray-400">Nom de l'aliment</th>
                <th class="py-2 border border-gray-400">Qtt brute (kg)</th>
                <th class="py-2 border border-gray-400">Qtt de MS (kg)</th>
                <th class="py-2 border border-gray-400">P absorb. (g)</th>
                <th class="py-2 border border-gray-400">Ca absorb. (g)</th>
                <th class="py-2 border border-gray-400"> Edit</th>
                <th class="py-2 border border-gray-400"> Suppr.</th>
            </thead>
            <tbody>
                @isset($ration)
                    @foreach ($ration as $aliment_id => $aliment)
                        <tr>
                            <td class="py-2 pl-3 text-left">{{ $aliment['nom'] }}</td>
                            <td class="text-center">{{ $aliment['qtt'] }} </td>
                            <td class="text-center">{{ $aliment['qttMS'] }} </td>
                            <td class="text-center">{{ $aliment['P'] }} </td>
                            <td class="text-center">{{ $aliment['Ca'] }} </td>
                            <td class="text-center" title="Modifier cet aliment"
                                wire:click="editAliment({{ $aliment_id }}, '{{ $aliment['nom'] }}', {{ $aliment['qtt'] }})">
                                <i class="cursor-pointer text-vert-900 fa-solid fa-pen-to-square"></i>
                            </td>
                            <td class="text-center" title="Supprimer cet aliment"
                                wire:click="delAliment({{ $aliment_id }})">
                                <i class="cursor-pointer text-brique-900 fa-solid fa-trash"></i>
                            </td>
                        </tr>
                    @endforeach
                @endisset
                <tr>
                    <td colspan="6" class="py-1"></td>
                </tr>
                <tr class="text-white bg-brique-700">
                    <td class="py-2 pl-3 border border-gray-400">{{ $rationTotale['nom'] }}</td>
                    <td class="text-center border border-gray-400">{{ $rationTotale['qtt'] }}</td>
                    <td class="text-center border border-gray-400">{{ $rationTotale['qttMS'] }}</td>
                    <td class="text-center border border-gray-400">{{ $rationTotale['P'] }}</td>
                    <td class="text-center border border-gray-400">{{ $rationTotale['Ca'] }}</td>
                    <td class="text-center border border-gray-400"></td>
                    <td class="text-center border border-gray-400" title="Supprimer tous les aliments"
                        wire:click="delAliments()">
                        <i class="text-white cursor-pointer fa-solid fa-trash">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <h3 class="py-1 pl-2 mt-3 bg-gray-300 text-vert-900 h3 lg:pl-0 lg:text-center">Choisir les aliments</h3>
    </div>
    <form wire:submit="addAlimentToRation()">
        <div class="flex flex-col gap-2">
            <div>
                <select
                    class="block mt-1 w-full bg-gray-200 rounded-md border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                    name="altype" id="altype" wire:model.change="altypeChoisi">
                    <option hidden value="">Choisir un type d'aliment</option>
                    @foreach ($altypes as $altype)
                        <option class="py-2" value="{{ $altype->id }}">
                            {{ $altype->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <select
                    class="block mt-1 w-full bg-gray-200 rounded-md border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                    name="aliment" id="aliment" wire:model.change="alimentChoisi">
                    <option hidden value="">Choisir un aliment</option>
                    @foreach ($liste_aliments as $aliment)
                        <option class="py-3" value="{{ $aliment->id }}">
                            {{ $aliment->nom }}
                            @if ($aliment->alstade != null)
                                - {{ $aliment->alstade->nom }}
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <div>
                    <p>Indiquer la quantité consommée (kg brut)</p>
                    <input x-show="alChoisi > 0"
                        class="block mt-1 w-full bg-gray-200 rounded-md border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                        type="number" wire:model='qtt' step="0.001" min="0">
                    <input x-show="alChoisi == 0"
                        class="block mt-1 w-full bg-gray-100 rounded-md border focus:border-gray-500 focus:bg-white focus:ring-0"
                        type="number" disabled>
                </div>
                <div>
                    @if ($alimentChoisi == 0)
                        <button disabled
                            class="text-gray-900 bg-gray-400 btn hover:bg-gray-400 hover:text-gray-900">Ajouter
                            l'aliment</button>
                    @else
                        <x-buttons.success-button>Ajouter l'aliment</x-buttons.success-button>
                    @endif

                </div>
            </div>
        </div>
    </form>
</div>
