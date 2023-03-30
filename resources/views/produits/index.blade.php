<x-app-layout>

    <x-titre :texte="'liste_produits'" :icone="'produits.svg'"></x-titre>

    <ul class="mx-2">
        @foreach ($produits as $produit)
            <a href="{{ route('produits.show', $produit->id) }}">
                <li class="my-3 p-3 flex flex-row items-center hover:bg-gray-200 border-b-2 ">
                    <img class="w-12" src="{{ url('storage/img/produits/' . $produit->phytotype->icone) }}"
                        alt="{{ $produit->phytotype->icone }}">
                    <p class="text-lg">
                        {{ ucfirst($produit->name) }}
                        ({{ $produit->phytounite->abbreviation }})
                    </p>
                </li>
            </a>
        @endforeach
    </ul>

</x-app-layout>
