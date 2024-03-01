<div class="my-3">
    <div class="px-2 py-3 text-white bg-brique-700">
        <h2 class="h2">Choix d'un minéral et quantités à apporter</h2>
    </div>
    <table class="my-2 w-full">
        <thead class="text-white bg-brique-900">
            <td class="p-2 border border-gray-300">Nom du minéral</td>
            <td class="p-2 text-center border border-gray-300">Rapport Ca/P</td>
            <td class="p-2 text-center border border-gray-300">Quantité (g/j)</td>
            <td class="p-2 text-center border border-gray-300">P (g)</td>
            <td class="p-2 text-center border border-gray-300">Ca (g)</td>
        </thead>
        <tbody>
            @foreach ($liste_mineraux as $mineral)
                @if ($mineral['bon'])
                    <tr>
                        <td class="p-2 border border-gray-300">
                            {{ $mineral['nom'] }}
                        </td>
                        <td class="p-2 text-center border border-gray-300">{{ round($mineral['CaP'], 1)}} </td>
                        <td class="p-2 text-center border border-gray-300">{{ round($mineral['qtt'] * 1000, 0) }}</td>
                        <td class="p-2 text-center border border-gray-300">
                            {{ round($mineral['apportsP'], 2) }}
                            <span class="italic text-gray-700">
                                ({{ $mineral['couvBesoinsP'] }}%)
                            </span>
                        </td>
                        <td class="p-2 text-center border border-gray-300">
                            {{ round($mineral['apportsCa'], 2) }}
                            <span class="italic text-gray-700">
                                ({{ $mineral['couvBesoinsCa'] }}%)
                            </span>
                        </td>
                    </tr>
                @endif
            @endforeach

        </tbody>
    </table>
    <div id="nouveauMineral">
        <form wire:submit="create">
            <input type="text" wire:model="nomNouveau" placeholder="Nom du minéral">
            <input type="number" wire:model="PtotNouveau" placeholder="Phosphore total">
            <input type="number" wire:model="CatotNouveau" placeholder="Calcium total">
            <x-buttons.success-button>Ajouter</x-buttons.success-button>
        </form>
            
    </div>
</div>
