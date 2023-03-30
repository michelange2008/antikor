<x-app-layout>

    <x-titre :texte="'liste_produits'" :icone="'produits.svg'"></x-titre>

    <ul>
        @foreach ($phytotypes as $phytotype)

        <li>{{$phytotype->name}}</li>
            
        @endforeach
    </ul>

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
