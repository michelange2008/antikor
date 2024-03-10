<div x-data="{ create: @entangle('create').live, editId: @entangle('editId') }">

    <x-titres.titre icone="produits_light.svg">@lang('titres.liste_produits')</x-titre>

        <div>

            <div class="flex flex-row gap-5 justify-between items-center">

                <div class="flex flex-row my-2 grow sm:my-0">
                    <img class="mr-2 w-8" src="{{ url('storage/img/fonticone/search.svg') }}" alt="">

                    <input class="border-r-0 sm:grow" type="text" placeholder="Rechercher un produit"
                        wire:model.live.debounce.500ms="search">

                    <img class="px-2 w-10 border border-gray-500 cursor-pointer border-left-0" wire:click="resetSearch"
                        src="{{ url('storage/img/fonticone/reset.svg') }}" alt="reset">

                </div>

                <x-buttons.success-round x-on:click="create = !create">Ajouter</x-buttons.success-round>
                <div class="z-50" x-show="create" x-cloak @click.outside="create = false" @keyup.escape.window="create = false">
                    @include('livewire.aromaliste.produit-create')
                </div>

            </div>

            <x-titres.sous-titre :texte="'selectionner_produit'"></x-titres.sous-titre>

            <ul class="grid grid-cols-4 grid-flow-row gap-1 sm:grid-cols-8 md:grid-cols-8 md:gap-2 xl:gap-3">

                <div class="flex flex-row justify-start items-center p-2 rounded cursor-pointer group xl:p-3 bg-slate-300 hover:bg-slate-700 hover:text-stone-200"
                    wire:click="resetSearch">
                    <img class="w-6 group-hover:brightness-200" src="{{ url('storage/img/produits/fait.svg') }}"
                        alt="Tout">
                    <p class="ml-1 md:ml-2 xl:ml-3">Tout</p>
                </div>

                @foreach ($phytotypes as $phytotype)
                    <div class="flex flex-row justify-start items-center p-2 rounded cursor-pointer group xl:p-3 bg-slate-300 hover:bg-slate-700 hover:text-stone-200"
                        wire:click="selectType({{ $phytotype->id }})">
                        <img class="w-6 group-hover:brightness-200"
                            src="{{ url('storage/img/produits/' . $phytotype->icone) }}" alt="{{ $phytotype->name }}">
                        <p class="ml-1 md:ml-2 xl:ml-3">{{ $phytotype->abbreviation }}</p>
                    </div>
                @endforeach



            </ul>

            <x-titres.sous-titre :texte="'liste_produits'"></x-titres.sous-titre>

            <x-bloc-grille>

                @foreach ($produits as $produit)
                    <li class="flex relative flex-col p-3 bg-gray-200 border-b-2 hover:bg-gray-300">
                        <div class="flex flex-row justify-between">
                            <div class="flex flex-row items-center">
                                <img class="mr-1 w-10"
                                    src="{{ url('storage/img/produits/' . $produit->phytotype->icone) }}"
                                    alt="{{ $produit->icone }}">
                                <p class="text-lg">
                                    {{ ucfirst($produit->name) }}
                                    ({{ $produit->phytounite->abbreviation }})
                                </p>
                            </div>

                            <button class="flex flex-row px-3 py-1 ml-3 bg-gray-300 shadow hover:bg-gray-100"
                                wire:click="edit({{ $produit->id }})">
                                <img class="mx-1 w-6" src="{{ url('storage/img/fonticone/edit.svg') }}" alt="Editer">
                            </button>
                        </div>
                        <div class="absolute top-14 z-50 self-center w-full" 
                        x-show="editId == {{ $produit->id }}" 
                        x-cloak @click.outside="editId = 0"
                        @keyup.escape.window="editId = 0" >
                            @include('livewire.aromaliste.produits-form')
                        </div>

                    </li>
                @endforeach

            </x-bloc-grille>

        </div>

</div>
