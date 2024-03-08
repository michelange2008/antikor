<div class="my-3">
    <div class="px-2 py-3 text-white bg-brique-700">
        <h2 class="h2">Choix d'un minéral et quantités à apporter</h2>
    </div>
    <table class="my-2 w-full">
        <tr class="text-white bg-brique-900">
            <th rowspan="2" class="py-1 border border-b-0 border-gray-300">Nom du minéral</th>
            <th colspan="2" class="hidden lg:table-cell">Composition (g/kg)</th>
            <th rowspan="2" class="py-1 font-bold text-center border border-gray-300">Quantité (g/j)</th>
            <th colspan="2" class="hidden lg:table-cell">Apports</th>
        </tr>
        <tr class="text-white bg-brique-900">
            <th class="hidden py-1 text-center border border-t-0 border-gray-300 lg:table-cell">P absorb.</th>
            <th class="hidden py-1 text-center border border-t-0 border-gray-300 lg:table-cell">Ca absorb.</th>
            <th class="py-1 text-center border border-t-0 border-gray-300">P (g)</th>
            <th class="py-1 text-center border border-t-0 border-gray-300">Ca (g)</th>
        </tr>
        <tbody>
            @foreach ($liste_mineraux as $key => $mineral)
                @if ($mineral['bon'])
                    <tr class="hover:bg-brique-100">
                        <td class="p-2 border border-gray-300">
                            {{ $mineral['nom'] }} <span class="hidden text-sm lg:block">(Ca/P: {{ round($mineral['CaP'], 1) }})</span>
                            @if ($mineral['nouveau'])
                                <span class="cursor-pointer text-brique-700"
                                    wire:click="destroy({{ $key }})"><i class="fa-solid fa-trash"></i></span>
                            @endif
                            @isset($mineral['link'])
                                @if ($mineral['link'] != null)
                                    <a href="{{ $link_root }}{{ $mineral['link'] }}" target="_blank"
                                        title="Plus d'infos sur ce minéral (tables INRAE)">
                                        <i class="text-vert-700 fa-solid fa-circle-info"></i>
                                    </a>
                                @endif
                            @endisset
                        </td>
                        <td class="hidden p-2 text-center border border-gray-300 lg:table-cell">{{ round($mineral['P'], 1) }} </td>
                        <td class="hidden p-2 text-center border border-gray-300 lg:table-cell">{{ round($mineral['Ca'], 1) }} </td>
                        <td class="p-2 font-bold text-center border border-gray-300">
                            {{ round($mineral['qtt'] * 1000, 0) }}</td>
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
    <div id="nouveauMineral" class="my-1">
        <p class="font-bold">Ajouter un minéral</p>
        <form wire:submit="create">
            <div class="flex flex-col gap-2 md:flex-row">
                <input
                    class="block px-0.5 mt-0 w-full border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                    type="text" wire:model="nomNouveau" placeholder="Nom du minéral">
                <div class="text-sm text-brique-900">
                    @error('nomNouveau')
                        {{ $message }}
                    @enderror
                </div>
                <input
                    class="block px-0.5 mt-0 w-full text-center border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                    type="number" wire:model="PtotNouveau" placeholder="Phosphore total">
                <div class="text-sm text-brique-900">
                    @error('PtotNouveau')
                        {{ $message }}
                    @enderror
                </div>
                <input
                    class="block px-0.5 mt-0 w-full text-center border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
                    type="number" wire:model="CatotNouveau" placeholder="Calcium total">
                <div class="text-sm text-brique-900">
                    @error('CatotNouveau')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <x-buttons.success-button>Ajouter</x-buttons.success-button>
        </form>

    </div>
</div>
