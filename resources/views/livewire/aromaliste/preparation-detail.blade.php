<div class="bg-gray-300 shadow-lg shadow-gray-800 w-3/4 relative" x-data="{ editPrep: @entangle('editPrep'), showComposition: @entangle('showComposition') }" @click.outside="showDetail = 0">

    @isset($preparation)

        <div class="flex flex-row gap-3 items-center p-3 font-bold border-b-2 border-b-white">
            <img class="w-8" src="{{ url('storage/img/icones/' . $preparation->icone) }}"
                alt="{{ ucfirst($preparation->icone) }}" />
            <p class="px-1 py-2 text-lg text-left">
                {{ ucfirst($preparation->name) }}
                <span class="italic">({{ ucfirst($preparation->officiel) }})</span>
            </p>
        </div>
        <div class="px-3 py-3 border border-y-0 sm:px-5" colspan="3">
            <div>
                <p class="py-1 text-lg text-gray-800">Description</p>
                <p class="px-3">{{ ucfirst($preparation->detail) }}</p>
            </div>
            <div class="my-3">
                <p class="py-1 text-lg text-gray-800">Composition et matériel</p>
                <div class="grid grid-cols-1 gap-1 justify-start sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 md:gap-3">
                    @foreach ($types as $type)
                        @if ($preparation->produits->where('phytotype_id', $type->id)->count() > 0)
                            <div class="p-3 w-auto bg-teal-100">
                                <div class="flex flex-row gap-2 justify-start items-center">
                                    <img class="w-6" src="{{ url('storage/img/produits/' . $type->icone) }}"
                                        alt="">
                                    <h3 class="mb-1 text-lg font-bold">{{ ucfirst($type->name) }}
                                    </h3>
                                </div>
                                @foreach ($preparation->produits as $produit)
                                    @if ($type->id === $produit->phytotype_id)
                                        <div class="flex flex-row gap-2 justify-between">
                                            <p>{{ ucfirst($produit->name) }}:</p>
                                            <p>{{ $produit->pivot->quantite }}
                                                {{ $produit->phytounite->abbreviation }} </p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div>
                <p class="py-1 text-lg text-gray-800">Préparation</p>
                <p class="px-3">{{ ucfirst($preparation->fabrication) }}</p>

            </div>
        </div>
        <div class=" p-3 mb-5 border border-y-0">

            <div class="flex flex-wrap gap-y-1 gap-x-3 justify-around sm:justify-between">
                <div class="flex flex-row gap-2">
                    <x-buttons.success-button wire:click="edit({{ $preparation->id }})">
                        <x-icones.edit :collapse="true"></x-icones.edit> Modifier
                    </x-buttons.success-button>

                    <button
                        class=" btn bg-amber-800 hover:bg-amber-600 focus:ring-amber-600 active:bg-amber-900  active:ring-amber-900"
                        wire:click="delete({{ $preparation->id }})" wire:confirm>
                        <x-icones.del :collapse="true"></x-icones.del> Supprimer
                    </button>

                    <x-buttons.blue-button wire:click="editComposition({{ $preparation->id }})">
                        <x-icones.settings :collapse="true"></x-icones.settings> Changer la composition
                    </x-buttons.blue-button>
                </div>
                <div>
                    <button
                        class = "btn bg-gray-800 hover:bg-gray-400 focus:ring-gray-600 active:bg-gray-900  active:ring-gray-900"
                        wire:click = "closeDetail" x-on:click="showDetail = 0, editPrep = false">
                        Fermer
                    </button>
                </div>
            </div>
        </div>

        <div class="fixed left-0 z-50 top-20 p-5 w-full bg-orange-200 lg:w-1/2 lg:left-1/4" x-cloak x-show="editPrep"
            x-transition x-cloak @click.outside="editPrep = false">

            <livewire:aromaliste.preparation-edit :preparation_id="$preparation->id" />

        </div>

        <div class="fixed z-50 top-20 w-full left-0 md:w-1/2 md:left-1/4 lg:w-1/2 lg:left-auto lg:right-20 h-screen bg-white overflow-scroll"
            x-show="showComposition">

            <livewire:aromaliste.composition :preparation_id="$preparation->id" />
        </div>

    @endisset


</div>
