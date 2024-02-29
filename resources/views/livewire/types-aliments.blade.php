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
            @foreach ($altypes as $type)
                <tr>
                    <td class="p-2 border border-gray-400">
                        <p class="py-2" x-show="editMode != {{ $type->id }}">{{ $type->nom }}</p>
                        <input
                            class="block px-0.5 mt-0 w-full border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                            x-show="editMode == {{ $type->id }}" type="text" wire:model="editItem.nom">
                    </td>

                    <td class="p-2 text-center border border-gray-400" style="background-color: {{ $type->couleur }}">
                        <input x-show="editMode == {{ $type->id }}" type="color" wire:model="editItem.couleur">

                    </td>

                    <td class="p-2 text-center border border-gray-400">{{ $type->aliments->count() }}</td>

                    <td class="p-2 text-center border border-gray-400">
                        <i x-show="editMode != {{ $type->id }}"
                            class="block cursor-pointer text-vert-900 fa-regular fa-pen-to-square"
                            wire:click="edit({{ $type->id }})"></i>
                        <i x-show="editMode == {{ $type->id }}"
                            class="block cursor-pointer fa-regular fa-floppy-disk" wire:click="update()"></i>
                    </td>

                    <td class="p-2 text-center border border-gray-400">
                        @if ($type->aliments->count() == 0)
                            <i class="text-brique-700 fa-solid fa-trash" wire:click="destroy({{ $type->id }})"
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
                            type="text" wire:model="nouvelItem.nom" placeholder="Nom du nouveau type" required>
                    </td>

                    <td class="text-center border border-gray-500">
                        <input class="px-1 w-full h-10" type="color" wire:model="nouvelItem.couleur">
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
