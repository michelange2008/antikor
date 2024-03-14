<div>
    <div class="sticky top-0 z-20 p-3 bg-brique-900/80 text-white flex flex-row justify-between items-center">
        <p class="h3">{{ ucfirst($preparation->name) }}</p>
        <i class="fa-regular fa-rectangle-xmark cursor-pointer text-xl" wire:click="closeEdit" title="Fermer cette fenêtre"></i>
    </div>

    <form wire:submit.prevent class="p-3">
        <div class="flex flex-row justify-between">
        </div>

        <table class="w-full my-3">

            <tbody>
                @foreach ($types as $type)
                    @foreach ($produits as $produit)
                        @if ($produit->phytotype_id == $type->id)
                            @if ($preparation->produits->contains($produit))
                                <tr class="bg-slate-200 hover:bg-slate-300 font-bold">
                                    <td class="p-3 flex gap-3">
                                        <img class="w-6"
                                            src="{{ url('storage/img/produits/' . $produit->phytotype->icone) }}"
                                            alt="{{ $produit->phytotype->icone }}">

                                        {{ $produit->name }}
                                    </td>
                                    <td class="">
                                        <input
                                            class="border-0 bg-transparent hover:bg-slate-100 focus:bg-slate-100 w-32 text-right sm:text-left"
                                            type="number" id="{{ $produit->id }}" name="{{ 'Q_' . $produit->id }}"
                                            wire:key = "{{ $produit->id }}"
                                            wire:model.change = "liste_produits.{{$produit->id}}"
                                            value="{{ $preparation->produits->where('id', $produit->id)->first()->pivot->quantite }}">
                                        <span
                                            class="sm:-ml-16 collapse sm:visible">{{ $produit->phytounite->abbreviation }}</span>
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
                                <tr class=" hover:bg-slate-300">
                                    <td class="p-3 flex gap-3">
                                        <img class="w-6 grayscale"
                                            src="{{ url('storage/img/produits/' . $produit->phytotype->icone) }}"
                                            alt="{{ $produit->phytotype->icone }}">

                                        {{ $produit->name }}
                                    </td>
                                    <td>
                                        <div>
                                            <input
                                                class="border-0 bg-transparent hover:bg-slate-100 focus:bg-slate-100 w-32 text-right sm:text-left"
                                                type="number" id="{{ $produit->id }}" min=0
                                                name="{{ 'Q_' . $produit->id }}" value=0
                                                wire:key = "{{ $produit->id }}"
                                                wire:model.change.debouce.500ms = "liste_produits.{{$produit->id}}"
                                                >
                                                <span class="sm:-ml-16">{{ $produit->phytounite->abbreviation }}</span>
                                        </div>
                                    </td>

                                </tr>
                            @endif
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </form>

</div>
