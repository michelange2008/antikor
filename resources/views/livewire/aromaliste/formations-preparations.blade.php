<div x-data="{ showProduits: @entangle('showProduits') }">
    <x-titres.titre>{{ $formation->name }} ({{ strtolower($formation->subname) }}) </x-titres.titre>
    <div x-show="!showProduits">
        <div class="flex flex-row justify-between items-center ml-3 text-sm md:text-base lg:text-lg">
            <label class="flex flex-row gap-5 items-center w-full" for="nombreStagiaires">
                <p class="">Nombre de stagiaires</p>
                <input
                    class="block mt-1 w-12 bg-gray-100 rounded-md border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                    type="number" name="nombreStagiaires" min="0" max="30" step="1"
                    wire:model.blur="nombreStagiaires">
            </label>

        </div>
        <select wire:model.live = "formationChoisie"
            class="block mt-1 w-full text-sm bg-gray-100 rounded-md border-transparent md:text-base lg:text-lg focus:border-gray-500 focus:bg-white focus:ring-0"
            name="formations" id="formations">
            @foreach ($formations as $formation)
                <option value="" hidden>Choisir une formation</option>
                @if ($formation->preparations->count() > 0)
                    <option value="{{ $formation->id }}">{{ $formation->name }} ({{ strtolower($formation->subname) }})
                    </option>
                @endif
            @endforeach
            <option value="1000">Toutes les préparations</option>
            <option value="0">Aucune préparation</option>
        </select>

        <div class="my-3">
            @isset($listePreparations)
                @foreach ($listePreparations as $preparation)
                    @if ($preparationsChoisies->contains($preparation))
                        <div class="flex flex-row gap-2 items-center p-3 my-1 cursor-pointer bg-vert-300 text-vert-900 hover:font-bold"
                            wire:click = "togglePrep({{ $preparation->id }})">
                            <img class="w-8" src="{{ url('storage/img/icones/' . $preparation->icone) }}" alt="">
                            <p class="">{{ ucfirst($preparation->name) }}</p>
                        </div>
                    @else
                        <div class="flex flex-row gap-2 items-center p-3 my-1 text-gray-700 bg-gray-100 cursor-pointer hover:text-black md:hover:bg-gray-300"
                            wire:click = "togglePrep({{ $preparation->id }})">
                            <img class="w-8" src="{{ url('storage/img/icones/' . $preparation->icone) }}" alt="">
                            <p class="">{{ ucfirst($preparation->name) }}</p>
                        </div>
                    @endif
                @endforeach
            @endisset
        </div>
        <button
            class="flex fixed right-3 bottom-3 z-50 justify-center items-center p-3 w-12 h-12 text-base rounded-full shadow-xl btn btn-success"
            @click = "showProduits = true" title="Voir les produits">
            <i class="fa-solid fa-droplet"></i>
        </button>
    </div>

    <div x-show="showProduits">

        <button
            class="flex fixed right-3 bottom-3 z-50 justify-center items-center p-3 w-12 h-12 text-base rounded-full shadow-xl btn btn-success"
            @click = "showProduits = false" title="Voir les préparations">
            <i class="fa-solid fa-jar"></i>
        </button>

        @if (count($listeProduits) == 0)
            <p class="font-bold text-brique-900"><i class="fa-solid fa-face-flushed"></i>&nbsp;Pas de préparation donc pas de produit</p>
        @endif

        @foreach ($listeProduits as $groupeDeProduits)
            @foreach ($groupeDeProduits as $key => $produit)
                @if ($loop->first)
                    <div
                        class="flex flex-row gap-2 items-center p-2 bg-{{ $produit->phytotype->couleur }}-700 text-white font-bold">
                        <img class="w-6 brightness-200"
                            src="{{ url('storage/img/produits/' . $produit->phytotype->icone) }}" alt="">
                        <p>{{ ucfirst($produit->phytotype->name) }}</p>
                    </div>
                @endif
                    <div x-data="{ pris_{{ $key }}: false }">
                        <div x-show="!pris_{{ $key }}"
                            @click = "pris_{{ $key }} = !pris_{{ $key }}"
                            class="p-3 my-1 cursor-pointer bg-{{ $produit->phytotype->couleur }}-300 text-brique-900 hover:font-bold">
                            <p>{{ $produit->name }} : {{ $produit->quantite }}
                                {{ $produit->phytounite->abbreviation }}
                            </p>
                        </div>
                        <div x-show="pris_{{ $key }}"
                            @click = "pris_{{ $key }} = !pris_{{ $key }}"
                            class="flex flex-row gap-2 items-center p-3 my-1 text-gray-900 bg-gray-300 cursor-pointer hover:font-bold">
                            <img class="w-6" src="{{ url('storage/img/produits/' . $produit->phytotype->icone) }}"
                                alt="">
                            <p>{{ $produit->name }} : {{ $produit->quantite }}
                                {{ $produit->phytounite->abbreviation }}
                            </p>
                        </div>
                    </div>
            @endforeach
        @endforeach
    </div>

</div>
