<div x-data="{ open: false }" @click.outside="open = false">

    <x-button-add></x-button-add>

    <div x-show="open" class="fixed w-1/2 top-1/3 left-1/4 shadow-lg">

        <div class="flex flex-row items-center p-3 bg-teal-900">
            <img class="w-8 mr-2" src="{{url('storage/img/fonticone/add.svg')}}" alt="Add">
            <h4 class="text-xl text-teal-100">Création d'un nouveau produit</h4>
        </div>

        <form class=" border-gray-200 bg-gray-100 px-5 py-3 text-gray-900 " action="" wire:submit.prevent="save">

            <div class="flex flex-col mb-2">
    
                <label for="name">Nom du produit</label>
    
                <input id="name" type="text" wire:model.defer="produit.name"
                    class="form-input rounded border-1 focus:active:border-0">
                @error('produit.name')
                    <div class="text-red-900 text-xs">{{ $message }}</div>
                @enderror
    
    
            </div>
    
            <div class="flex flex-col mb-2">
    
                <label for="phytotype">Type de produit</label>
    
                <select name="phytotype_id" id="phytotype" wire:model.defer="produit.phytotype_id">

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
    
                <select name="phytounite_id" id="phytounite" wire:model.defer="produit.phytounite_id">

                    <option value="default" hidden>Choisissez une unité ...</option>

                    @foreach ($phytounites as $unite)
    
                    <option value="{{ $unite->id }}">{{ $unite->name }}</option>
                    
                    @endforeach
                </select>

                @error('produit.phytounite_id')
                    <div class="text-red-900 text-xs">{{ $message }}</div>
                @enderror

            </div>
    
            <x-button-save-cancel></x-button-save-cancel>
        </form>
    
    </div>

</div>
