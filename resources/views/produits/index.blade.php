<x-app-layout>

    <x-titre :texte="'liste_produits'" :icone="'produits.svg'"></x-titre>

    <x-buttons.add-button :route="'produits.create'" :texte="'Créer un produit'"></x-buttons.add-button>

    <x-titres.sous-titre :texte="'selectionner_produit'"></x-titres.sous-titre>

    <div class="grid grid-flow-row  grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-1 md:gap-2 xl:gap-3 ">
        
        @foreach ($phytotypes as $phytotype)

            <x-buttons.butticon :icone="'storage/img/produits/'.$phytotype->icone" :name="$phytotype->name"></x-buttons.butticon>

        @endforeach

        <x-buttons.butticon :icone="'storage/img/produits/fait.svg'" :name="'Tout'"></x-buttons.butticon>

    </div>

    <x-titres.sous-titre :texte="'liste_produits'"></x-titres.sous-titre>

    <ul class="mx-2 grid grid-flow-row sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-1 md:gap-2 ">

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
