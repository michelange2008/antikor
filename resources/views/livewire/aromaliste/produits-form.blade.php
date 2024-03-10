<div class="my-3 bg-white shadow-lg shadow-slate-700">

    <p class="p-3 text-white bg-vert-900">Modifier ce produit</p>

    <div class="p-3 pb-0">

        <form action="" wire:submit="update">

            <div class="mb-2 last:mb-0">

                <label for="name" class="text-gray-700 text-bold">Nom du produit</label>

                <input id="name" type="text" wire:model="name"
                    class="block mt-1 w-full bg-gray-100 rounded-md border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                @error('name')
                    <div class="text-xs text-red-900">{{ $message }}</div>
                @enderror


            </div>

            <div class="flex flex-col mb-2 last:mb-0">

                <label for="phytotype">
                    <span class="text-gray-700">Type de produit</span>

                    <select name="phytotype" id="phytotype" wire:model="phytotype_id"
                        class="block mt-1 w-full bg-gray-100 rounded-md border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                        @foreach ($phytotypes as $type)
                            @if ($type->id == $phytotype_id)
                                <option selected value="{{ $type->id }}">{{ $type->name }}</option>
                            @else
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </label>
            </div>

            <div class="flex flex-col mb-2 last:mb-0">

                <label for="phytounite">
                    <span class="text-gray-700">Unité</span>

                    <select name="phytounite" id="phytounite" wire:model="phytounite_id"
                        class="block mt-1 w-full bg-gray-100 rounded-md border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                        @foreach ($phytounites as $unite)
                            @if ($unite->id == $phytounite_id)
                                <option selected value="{{ $unite->id }}">{{ $unite->name }}</option>
                            @else
                                <option value="{{ $unite->id }}">{{ $unite->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="flex flex-row justify-between">
                <div>
                    <x-buttons.success-button>Enregistrer</x-buttons.success-button>
                    <x-buttons.cancel-button wire:click="close">Annuler</x-buttons.cancel-button>
                </div>
                <div class="flex justify-center self-center mx-2 mt-5 text-xl text-gray-500 hover:text-red-900">

                    <div class="cursor-pointer" wire:click="destroy({{ $produit->id }})" wire:confirm title="Supprimer ce produit">

                        <i class="fa-solid fa-trash"></i>

                    </div>
                </div>

            </div>
        </form>

    </div>

</div>
