<div x-data="{ detail: @entangle('detail'), open: @entangle('open') }" @click.outside="detail = false" @keyup.escape.window="detail = 0">
    <x-titres.titre :class="'my-5'" :icone="$icone_titre">{{ __('titres.' . $texte_titre) }}</x-titre>

        <div>

            <x-buttons.success-round x-on:click.prevent="$dispatch('open-modal' , 'add_prep')"></x-buttons.success-round>

            <x-modal-custom name="add_prep">

                <div class="flex flex-col justify-between p-5 bg-brique-300">

                    <x-titres.titre1 icone="modify_light.svg">Nouvelle préparation</x-titres.titre1>

                    <form action="" wire:submit="create">

                        <div class="my-3 md:flex md:flex-row md:gap-3">

                            <label for="name" class="block w-full">
                                <span class="text-gray-700">Nom</span>
                                <input
                                    class="block mt-1 w-full bg-gray-100 rounded-md border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                    type="text" wire:model="name">
                                @error('name')
                                    <div class="text-xs text-red-900">{{ $message }}</div>
                                @enderror
                            </label>

                            <label for="officiel" class="block w-full">
                                <span class="text-gray-700">Nom officiel</span>
                                <input
                                    class="block mt-1 w-full bg-gray-100 rounded-md border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                    type="text" wire:model="officiel">
                                @error('officiel')
                                    <div class="text-xs text-red-900">{{ $message }}</div>
                                @enderror
                            </label>

                        </div>

                        <label for="description" class="block my-3">
                            <span class="text-gray-700">Description</span>
                            <textarea
                                class="block mt-1 w-full bg-gray-100 rounded-md border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                name="description" id="description" cols="30" rows="5" wire:model="description"></textarea>
                            @error('description')
                                <div class="text-xs text-red-900">{{ $message }}</div>
                            @enderror
                        </label>

                        <label for="fabrication" class="block">
                            <span class="text-gray-700">Fabrication</span>
                            <textarea
                                class="block mt-1 w-full bg-gray-100 rounded-md border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                name="fabrication" id="fabrication" cols="30" rows="10" wire:model="fabrication"></textarea>
                            @error('fabrication')
                                <div class="text-xs text-red-900">{{ $message }}</div>
                            @enderror
                        </label>

                        <x-forms.input-file name="Icone" model="icone"></x-forms.input-file>

                        @if ($icone)
                            @if (in_array($icone->getClientOriginalExtension(), ['png', 'jpg', 'jpeg', 'svg']))
                                <img class="m-3 w-8" src="{{ $icone->temporaryUrl() }}" alt="">
                            @endif
                        @endif

                        <x-buttons.save-cancel-button></x-buttons.save-cancel-button>

                    </form>

                </div>

            </x-modal-custom>

        </div>

        @foreach ($preparations as $preparation)
            <li class="flex relative flex-row gap-3 items-center p-3 mb-1 border border-gray-300 cursor-pointer hover:bg-gray-300"
                wire:click="toggleDetail({{ $preparation->id }})">
                <img class="w-8" src="{{ url('storage/img/icones/' . $preparation->icone) }}"
                    alt="{{ ucfirst($preparation->icone) }}">
                <p class="px-1 py-2 text-lg text-left">
                    {{ ucfirst($preparation->name) }}
                    <span class="italic">({{ ucfirst($preparation->officiel) }})</span>
                </p>

                <div class="absolute top-0 left-0 z-10 w-full bg-gray-300 shadow-lg shadow-gray-800"
                    x-show="detail == {{ $preparation->id }}">
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
                            <div
                                class="grid grid-cols-1 gap-1 justify-start sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 md:gap-3">
                                @foreach ($types as $type)
                                    @if ($preparation->produits->where('phytotype_id', $type->id)->count() > 0)
                                        <div class="p-3 w-auto bg-teal-100">
                                            <div class="flex flex-row gap-2 justify-start items-center">
                                                <img class="w-6"
                                                    src="{{ url('storage/img/produits/' . $type->icone) }}"
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
                </div>

                {{-- <div class="bg-gray-200 border-b-8 border-gray-100" x-cloak
                            x-show="detail == {{ $preparation->id }}" x-transition>
                            <div class="p-3 mb-5 border border-y-0" colspan="3">
                                <livewire:aromaliste.preparations-edit-del :preparation="$preparation" :key="$preparation->id" />
                            </div>
                        </div> --}}
            </li>
        @endforeach
        {{-- </tbody> --}}
        {{-- </table> --}}



</div>
