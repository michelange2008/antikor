<div x-data="{ editMode: @entangle('editMode') }">
    <x-titres.titre icone="aliment.svg">{{ $titre }}</x-titres.titre>
    <div class="flex flex-row justify-end">
        <x-buttons.navigate-button route="/intranet/aliments" libelle="Retour aux aliments" fa="rotate-left"/>
    </div>

    <table class="w-full">
        <thead class="text-white bg-brique-900">
            @foreach ($libelles as $libelle)
                <th class="py-3 border border-gray-400">{{ $libelle }}</th>
            @endforeach
        </thead>
        <tbody>
            @foreach ($alstades as $stade)
                <tr>
                    <td class="p-2 border border-gray-400">
                        <p class="py-2" x-show="editMode != {{ $stade->id }}">{{ $stade->nom }}</p>
                        <input
                            class="block px-0.5 mt-0 w-full border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                            x-show="editMode == {{ $stade->id }}" type="text" wire:model="editItem.nom">
                    </td>

                    <td class="p-2 text-center border border-gray-400">{{ $stade->aliments->count() }}</td>

                    <td class="p-2 text-center border border-gray-400">
                        <i x-show="editMode != {{ $stade->id }}"
                            class="block cursor-pointer text-vert-900 fa-regular fa-pen-to-square"
                            wire:click="edit({{ $stade->id }})"></i>
                        <i x-show="editMode == {{ $stade->id }}"
                            class="block cursor-pointer fa-regular fa-floppy-disk" wire:click="update()"></i>
                    </td>

                    <td class="p-2 text-center border border-gray-400">
                        @if ($stade->aliments->count() == 0)
                            <i class="text-brique-700 fa-solid fa-trash" wire:click="destroy({{ $stade->id }})"
                                wire:confirm="Etes-vous sûr.e.s"></i>
                        @endif
                    </td>
                </tr>
            @endforeach
            <form wire:submit="store()">
                <tr>
                    <td class="text-center border border-gray-500">
                        <input
                            class="block px-1 mt-0 w-full border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                            type="text" wire:model="nouvelItem.nom" placeholder="Nom du nouveau stade" required>
                    </td>

                    <td class="text-center border border-gray-500"></td>
                    <td class="text-center border border-gray-500 text-vert">
                        <button type="submit">
                            <i class="fa-solid fa-square-plus"></i>
                    </td>
                    </button>
                    <td class="text-center border border-gray-500"></td>
                </tr>
            </form>
        </tbody>
    </table>
</div>
