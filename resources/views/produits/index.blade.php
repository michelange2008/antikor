<x-app-layout>

    <x-titre :texte="'liste_produits'" :icone="'produits.svg'"></x-titre>

    <div class="grid grid-flow-row  grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-1 md:gap-2 xl:gap-3 ">
        @foreach ($phytotypes as $phytotype)

            <x-buttons.butticon :icone="'storage/img/produits/'.$phytotype->icone" :name="$phytotype->name"></x-buttons.butticon>

        @endforeach

        <x-buttons.butticon :icone="'storage/img/produits/fait.svg'" :name="'Tout'"></x-buttons.butticon>

    </div>

    <ul class="mx-2">

        @foreach ($produits as $produit)
            <x-item 
                :name="$produit->name" :icone="$produit->phytotype->icone" 
                :detail="$produit->phytounite->abbreviation"
                :route="'produits.show'"
                :id="$produit->id">
            </x-item>
        @endforeach
    </ul>


</x-app-layout>
