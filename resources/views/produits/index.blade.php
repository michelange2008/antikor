<x-app-layout>

    <x-titre :texte="'liste_produits'" :icone="'produits.svg'"></x-titre>

    <ul class="grid grid-flow-row  grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-1 md:gap-2 xl:gap-3 ">
        @foreach ($phytotypes as $phytotype)

        <li class="flex flex-row justify-start items-center  p-2 xl:p-3 bg-slate-300 hover:bg-slate-700 hover:text-stone-200">
                <img class="w-8" src="{{ url('storage/img/produits/'.$phytotype->icone)}}" alt="{{$phytotype->name}}">
                <p class="ml-1 md:ml-2 xl:ml-3">{{$phytotype->name}}</p>
        </li>
            
        @endforeach

        <li class="flex flex-row justify-start items-center  p-2 xl:p-3 bg-slate-300 hover:bg-slate-700 hover:text-stone-200">
            <img class="w-8" src="{{ url('storage/img/produits/fait.svg')}}" alt="tous">
            <p class="ml-1 md:ml-2 xl:ml-3">Tout</p>
    </li>
        
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
