<div class="flex flex-row gap-3 my-3 p-5 bg-gray-300 shadow shadow-gray-900">
    <div>
        <h2 class="h2">Liste de oligoéléments</h2>
        <table class="w-full my-3 p-4 ">
            <thead class="text-left">
                <th class="border p-3">Abbréviation</th>
                <th class="border p-3">Nom</th>
            </thead>
            <tbody>
                @foreach ($oligovitamines['oligoelements'] as $abbreviation => $nom)
                    <tr>
                        <td class="border p-3">
                            {{ $abbreviation }}
                        </td>
                        <td class="p-3 border">
                            {{ $nom }}
                        </td>
                    </tr>
                @endforeach

                <form wire:submit="addElement('oligoelements')">

                    <tr>
                        <td class="border p-3">
                            <input type="text" wire:model="nouvelElement.oligoelements.abbreviation"
                                placeholder="Abbréviation">
                        </td>
                        <td class="border p-3">
                            <input type="text" wire:model="nouvelElement.oligoelements.nom" placeholder="Nom">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit">Plus</button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>
    <div>

        <h2 class="h2">Liste des vitamines</h2>

        <table class="w-full my-3 p-4 ">
            <thead class="text-left">
                <th class="border p-3">Abbréviation</th>
                <th class="border p-3">Nom</th>
            </thead>
            <tbody>

                @foreach ($oligovitamines['vitamines'] as $abbreviation => $nom)
                    <tr>
                        <td class="border p-3">
                            {{ $abbreviation }}
                        </td>
                        <td class="p-3 border">
                            {{ $nom }}
                        </td>
                    </tr>
                @endforeach
                <form wire:submit="addElement('vitamines')">

                    <tr>
                        <td class="border p-3">
                            <input type="text" wire:model="nouvelElement.vitamines.abbreviation"
                                placeholder="Abbréviation">
                        </td>
                        <td class="border p-3">
                            <input type="text" wire:model="nouvelElement.vitamines.nom" placeholder="Nom">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit">Plus</button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>
</div>
