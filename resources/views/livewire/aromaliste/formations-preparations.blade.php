<div>
    <x-titres.titre>Formations et préparations</x-titres.titre>
    <div>

        <label class="block" for="formations">
            <select wire:model.change = "formationChoisie"
                class="block mt-1 w-full bg-gray-100 rounded-md border-transparent md:text-base text-md focus:border-gray-500 focus:bg-white focus:ring-0"
                name="formations" id="formations">
                @foreach ($formations as $formation)
                    <option value="" hidden>Choisir une formation</option>
                    @if ($formation->preparations->count() > 0)
                        <option value="{{ $formation->id }}">{{ $formation->name }} ({{ $formation->subname }})</option>
                    @endif
                @endforeach
            </select>
        </label>
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
                        <div class="flex flex-row gap-2 items-center p-3 my-1 text-gray-700 bg-gray-100 cursor-pointer hover:text-black hover:bg-gray-300"
                            wire:click = "togglePrep({{ $preparation->id }})">
                            <img class="w-8" src="{{ url('storage/img/icones/' . $preparation->icone) }}" alt="">
                            <p class="">{{ ucfirst($preparation->name) }}</p>
                        </div>
                    @endif
                @endforeach
            @endisset
        </div>
        <div class="flex flex-row justify-between items-center mx-2">
            <label class="flex flex-row gap-5 items-center w-full" for="nombreStagiaires">
                <p class="">Nombre de stagiaires</p>
                <input
                    class="block mt-1 w-12 bg-gray-100 rounded-md border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                    type="number" name="nombreStagiaires" min="0" max="30" step="1"
                    wire:model.blur="nombreStagiaires">
            </label>
            <button wire:click="showProduits" class="btn bg-vert-700">Valider</button>
        </div>
    </div>

    <div>
        Produits
        @foreach ($listeProduits as $produit)
            
            <p>{{$produit->name}} : {{ $produit->quantite}} </p>

        @endforeach
    </div>

</div>
