<div x-show="create" class="fixed  w-11/12 sm:w-1/2 top-1/3 left-2 sm:left-1/4 shadow-lg">

    <div class="flex flex-row items-center p-3 bg-teal-900">
        <img class="w-8 mr-2" src="{{ url('storage/img/fonticone/add.svg') }}" alt="Add">
        <h4 class="text-xl text-teal-100">Création d'un nouveau produit</h4>
    </div>

    <form class=" border-gray-200 bg-gray-100 px-5 py-3 text-gray-900 " action="" wire:submit="save">

        <div class="flex flex-col mb-2">

            <label for="name">Nom du produit</label>

            <input id="name" type="text" wire:model="produit.name"
                class="form-input rounded border-1 focus:active:border-0">
            @error('produit.name')
                <div class="text-red-900 text-xs">{{ $message }}</div>
            @enderror


        </div>

        <div class="flex flex-col mb-2">

            <label for="phytotype">Type de produit</label>

            <select name="phytotype_id" id="phytotype" wire:model="produit.phytotype_id">

                <option value="default" hidden>Choisissez un type ...</option>

                @foreach ($phytotypes as $type)
                    <option value="{{ $type->id }}">{{ ucfirst($type->name) }}</option>
                @endforeach

            </select>

            @error('produit.phytotype_id')
                <div class="text-red-900 text-xs">{{ $message }}</div>
            @enderror

        </div>

        <div class="flex flex-col mb-2">

            <label for="phytounite">Unité</label>

            <select name="phytounite_id" id="phytounite" wire:model="produit.phytounite_id">

                <option value="default" hidden>Choisissez une unité ...</option>

                @foreach ($phytounites as $unite)
                    <option value="{{ $unite->id }}">{{ $unite->name }}</option>
                @endforeach
            </select>

            @error('produit.phytounite_id')
                <div class="text-red-900 text-xs">{{ $message }}</div>
            @enderror

        </div>

        <x-buttons.save-cancel-button cancel="Annuler"></x-buttons.save-cancel-button>
    </form>

</div>
