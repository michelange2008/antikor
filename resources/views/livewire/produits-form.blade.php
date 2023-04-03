<div class="my-3 p-2 bg-white">

    <form action="" wire:submit.prevent="save">

        <div class="mb-2 last:mb-0 ">

            <label for="name">Nom du produit</label>

            <input id="name" type="text" wire:model.defer="produit.name"
                class="form-input rounded border-1 focus:active:border-0">
            @error('produit.name')
                <div class="text-red-900 text-xs">{{ $message }}</div>
            @enderror


        </div>

        <div class="flex flex-col mb-2 last:mb-0 ">

            <label for="phytotype">Type de produit</label>

            <select name="phytotype" id="phytotype" wire:model.defer="produit.phytotype_id">
                @foreach ($phytotypes as $type)

                @if ($type->id == $produit->phytotype->id)

                <option selected value="{{ $type->id }}">{{ ucfirst($type->name) }}</option>

                @else
                    
                <option value="{{ $type->id }}">{{ ucfirst($type->name) }}</option>
                
                @endif
                    
                @endforeach
            </select>
        </div>

        <div class="flex flex-col mb-2 last:mb-0 ">

            <label for="phytounite">Unité</label>

            <select name="phytounite" id="phytounite" wire:model.defer="produit.phytounite_id">
                @foreach ($phytounites as $unite)

                @if ($unite->id == $produit->phytounite->id)

                <option selected value="{{ $unite->id }}">{{ $unite->name }}</option>

                @else
                    
                <option value="{{ $unite->id }}">{{ $unite->name }}</option>
                
                @endif
                    
                @endforeach
            </select>
        </div>

        <button class="rounded my-1 px-3 py-1 text-center bg-teal-900 text-teal-100 disabled:bg-gray-500" type="submit"
            wire:loading.attr="disabled">Enregistrer</button>
        <div class="text-gray-500" wire:loading>Sauvegarde...</div>
        <x-button-cancel></x-button-cancel>
    </form>

</div>
