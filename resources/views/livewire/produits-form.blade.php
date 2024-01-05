<div class="my-3 p-2 bg-white">

    <form action="" wire:submit="save">

        <div class="mb-2 last:mb-0 ">

            <label for="name">Nom du produit</label>

            <input id="name" type="text" wire:model="produit.name"
                class="form-input rounded border-1 focus:active:border-0">
            @error('produit.name')
                <div class="text-red-900 text-xs">{{ $message }}</div>
            @enderror


        </div>

        <div class="flex flex-col mb-2 last:mb-0 ">

            <label for="phytotype">Type de produit</label>

            <select name="phytotype" id="phytotype" wire:model="produit.phytotype_id">
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

            <select name="phytounite" id="phytounite" wire:model="produit.phytounite_id">
                @foreach ($phytounites as $unite)

                @if ($unite->id == $produit->phytounite->id)

                <option selected value="{{ $unite->id }}">{{ $unite->name }}</option>

                @else
                    
                <option value="{{ $unite->id }}">{{ $unite->name }}</option>
                
                @endif
                    
                @endforeach
            </select>
        </div>

        <x-buttons.success-button>Enregistrer</x-buttons.success-button>
        <x-buttons.cancel-button wire:click="cancel()">Annuler</x-buttons.cancel-button>
    </form>

</div>
