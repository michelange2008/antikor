<x-app-layout>

    <x-titres.titre icone="modify_light.svg">{{ ucfirst($preparation->name) }}</x-titres.titre>
    <x-titres.titre2>Modification de la composition</x-titres.titre2>
    <form action="{{ route('composition.update', $preparation) }}" method="POST">
        @csrf
        @method('POST')
        <x-buttons.success-button>Enregistrer</x-buttons.success-button>
        <table class="w-full my-3">
            <thead>
                <tr class="bg-amber-900 text-white text-left">
                    <th class="py-3 px-2">Nom</th>
                    <th class="py-3 px-2">Quantité</th>
                    <th class="py-3 px-2 text-center">Suppr./Add</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    @foreach ($produits as $produit)
                        @if ($produit->phytotype_id == $type->id)
                            @if ($preparation->produits->contains($produit))
                                <tr class="even:bg-slate-200 hover:bg-slate-300">
                                    <td class="p-3 flex gap-3">
                                        <img class="w-6"
                                            src="{{ url('storage/img/produits/' . $produit->phytotype->icone) }}"
                                            alt="{{ $produit->phytotype->icone }}">

                                        {{ $produit->name }}
                                    </td>
                                    <td class="">
                                        <input
                                            class="border-0 bg-transparent hover:bg-slate-100 focus:bg-slate-100 w-32 text-right sm:text-left"
                                            type="number" id="{{ $produit->id }}" name="{{'Q_'.$produit->id}}"
                                            value="{{ $preparation->produits->where('id', $produit->id)->first()->pivot->quantite }}">
                                        <span
                                            class="sm:-ml-16 collapse sm:visible">{{ $produit->phytounite->abbreviation }}</span>
                                    </td>
                                    <td class="flex justify-center">
                                        <input type="checkbox" id="{{ $produit->id }}" name="{{"C_".$produit->id}}" checked>
                                    </td>
                                </tr>
                            @endif
                        @endif
                    @endforeach
                @endforeach

                @foreach ($types as $type)
                    @foreach ($produits as $produit)
                        @if ($produit->phytotype_id == $type->id)
                            @if (!$preparation->produits->contains($produit))
                                <tr class="even:bg-slate-200 hover:bg-slate-300">
                                    <td class="p-3 flex gap-3">
                                        <img class="w-6"
                                            src="{{ url('storage/img/produits/' . $produit->phytotype->icone) }}"
                                            alt="{{ $produit->phytotype->icone }}">

                                        {{ $produit->name }}
                                    </td>
                                    <td>
                                        <div class="invisible">
                                            <input
                                                class="border-0 bg-transparent hover:bg-slate-100 focus:bg-slate-100 w-32 text-right sm:text-left"
                                                type="number" id="{{ $produit->id }}" name="{{'Q_'.$produit->id}} value="">
                                            <span class="sm:-ml-16">{{ $produit->phytounite->abbreviation }}</span>
                                        </div>
                                    </td>
                                    <td class="flex justify-center">
                                        <input type="checkbox" id="{{ $produit->id }}" name="{{"C_".$produit->id}}" unchecked>
                                    </td>
                                </tr>
                            @endif
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </form>

</x-app-layout>
