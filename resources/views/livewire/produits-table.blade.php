<div>

    <div class="flex flex-col sm:flex-row justify-between gap-5">

        <div class="grow flex flex-row  my-2 sm:my-0">
            <img class="w-8 mr-2" src="{{ url('storage/img/fonticone/search.svg') }}" alt="">

            <input class="grow" type="text" placeholder="Rechercher un produit" wire:model.debounce.500ms="search">

        </div>

        <x-buttons.add-button :route="'produits.create'" :texte="'produit_create'"></x-buttons.add-button>

    </div>

    <x-titres.sous-titre :texte="'selectionner_produit'"></x-titres.sous-titre>

    <ul class="grid grid-flow-row grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-1 md:gap-2 xl:gap-3">

        @foreach ($phytotypes as $phytotype)

        <div class="group flex flex-row justify-start items-center cursor-pointer rounded p-2 xl:p-3 bg-slate-300 hover:bg-slate-700 hover:text-stone-200"
                wire:click="selectType({{ $phytotype->id }})">
                <img class="w-8 group-hover:brightness-200" src="{{ url('storage/img/produits/'.$phytotype->icone) }}"
                    alt="{{ $phytotype->name }}">
                <p class="ml-1 md:ml-2 xl:ml-3">{{ $phytotype->name }}</p>
            </div>

            {{-- <x-buttons.butticon :icone="'storage/img/produits/' . $phytotype->icone" :name="$phytotype->name" wire:click="selectType({{$phytotype->id}})"></x-buttons.butticon> --}}
        @endforeach

        {{-- <x-buttons.butticon :icone="'storage/img/produits/fait.svg'" :name="'Tout'"></x-buttons.butticon> --}}

        <div class="group flex flex-row justify-start items-center cursor-pointer rounded p-2 xl:p-3 bg-slate-300 hover:bg-slate-700 hover:text-stone-200"
            wire:click="tousTypes">
            <img class="w-8 group-hover:brightness-200" src="{{ url('storage/img/produits/fait.svg') }}" alt="Tout">
            <p class="ml-1 md:ml-2 xl:ml-3">Tout</p>
        </div>

    </ul>

    <x-titres.sous-titre :texte="'liste_produits'"></x-titres.sous-titre>

    <x-bloc-grille>

        @foreach ($produits as $produit)
            <li class="p-3 flex flex-col bg-gray-200 hover:bg-gray-300 border-b-2 ">
                <div class="flex flex-row justify-between">
                    <div class="flex flex-row items-center">
                        <img class="w-10 mr-1" src="{{ url('storage/img/produits/' . $produit->phytotype->icone) }}"
                            alt="{{ $produit->icone }}">
                        <p class="text-lg ">
                            {{ ucfirst($produit->name) }}
                            ({{ $produit->phytounite->abbreviation }})
                        </p>
                    </div>

                    <button class="flex flex-row bg-gray-300 hover:bg-gray-100 shadow px-3 py-1 ml-3"
                        wire:click="startEdit({{ $produit->id }})">
                        <img class="w-6 mx-1" src="{{ url('storage/img/fonticone/edit.svg') }}" alt="Editer">
                    </button>
                </div>
                @if ($editId == $produit->id)
                    <livewire:produits-form :produit="$produit" :key="$produit->id" />
                @endif
            </li>
        @endforeach

    </x-bloc-grille>

    {{-- {{ $produits->links() }} --}}

</div>
