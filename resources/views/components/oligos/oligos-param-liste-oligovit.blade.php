<div class="flex flex-col gap-3 p-5 my-3 bg-gray-300 shadow lg:flex-row shadow-gray-900">
    <div>
        <h2 class="h2">Liste de oligoéléments</h2>
        <table class="p-4 my-3 w-full">
            <thead class="text-left">
                <th class="p-3 border">Abbréviation</th>
                <th class="p-3 border">Nom</th>
            </thead>
            <tbody>
                @foreach ($oligovitamines['oligoelements'] as $element)
                    <tr>
                        <td class="p-3 border">
                            {{ $element }}
                        </td>
                        <td class="p-3 border">
                            {{ __('oligos.'.$element) }}
                        </td>
                    </tr>
                @endforeach

                <form wire:submit="addElement('oligoelements')">

                    <tr>
                        <td class="p-3 border">
                            <input type="text" wire:model="nouvelElement.oligoelements.abbreviation"
                                placeholder="Abbréviation">
                        </td>
                        <td class="p-3 border">
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

        <table class="p-4 my-3 w-full">
            <thead class="text-left">
                <th class="p-3 border">Abbréviation</th>
                <th class="p-3 border">Nom</th>
            </thead>
            <tbody>

                @foreach ($oligovitamines['vitamines'] as $element)
                    <tr>
                        <td class="p-3 border">
                            {{ $element }}
                        </td>
                        <td class="p-3 border">
                            {{ __('oligos.'.$element) }}
                        </td>
                    </tr>
                @endforeach
                <form wire:submit="addElement('vitamines')">

                    <tr>
                        <td class="p-3 border">
                            <input type="text" wire:model="nouvelElement.vitamines.abbreviation"
                                placeholder="Abbréviation">
                        </td>
                        <td class="p-3 border">
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
