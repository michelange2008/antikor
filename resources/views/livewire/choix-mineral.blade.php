<div class="my-3">
    <div class="px-2 py-3 text-white bg-brique-700">
        <h2 class="h2">Choix d'un minéral et quantités à apporter</h2>
    </div>
    <table class="my-2 w-full">
        <thead class="text-white bg-brique-900">
            <td class="p-2 border border-gray-300">Nom du minéral</td>
            <td class="p-2 text-center border border-gray-300">Rapport Ca/P</td>
            <td class="p-2 font-bold text-center border border-gray-300">Quantité (g/j)</td>
            <td class="p-2 text-center border border-gray-300">P (g)</td>
            <td class="p-2 text-center border border-gray-300">Ca (g)</td>
        </thead>
        <tbody>
            @foreach ($liste_mineraux as $key => $mineral)
                @if ($mineral['bon'])
                    <tr class="hover:bg-brique-100">
                        <td class="p-2 border border-gray-300">
                            {{ $mineral['nom'] }}
                            @if ($mineral['nouveau'])
                                <span class="cursor-pointer text-brique-700"
                                    wire:click="destroy({{ $key }})"><i class="fa-solid fa-trash"></i></span>
                            @endif
                            @if ($mineral['link'] != null)
                                <a href="{{ $link_root }}{{ $mineral['link'] }}" target="_blank"
                                    title="Plus d'infos sur ce minéral (tables INRAE)">
                                    <i class="text-vert-700 fa-solid fa-circle-info"></i>
                                </a>
                            @endif
                        </td>
                        <td class="p-2 text-center border border-gray-300">{{ round($mineral['CaP'], 1) }} </td>
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
