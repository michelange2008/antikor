<div x-data="{ edit: false }" @click.outside="edit = false">
    <div class="flex flex-row justify-around">
        <x-button-edit></x-button-edit>

        <x-button-del></x-button-del>
    </div>
    <div x-cloak x-show='edit' class=" w-full sm:w-1/2 fixed top-16 left-0 sm:left-1/4 p-5 bg-orange-200" x-show="more == {{ $item->id }}"
        x-transition>
        <div class="flex bg-orange-900 py-3 rounded">
            <x-font-icone icone="modify_light.svg"></x-fonticone>
            <h4 class="text-xl text-orange-100">{{ ucfirst($item->name) }}</h4>
        </div>

        <form action="" wire:submit.prevent="update">

            @foreach ($cols->champs as $champs => $col)
            @if ($col->type == "text")
            <div class="flex flex-col mb-2">
    
                <label for="name">{{ ucfirst($col->name) }} </label>
    
                <input id="name" type="text" wire:model.defer="item.name "
                    class="form-input rounded border-1 focus:active:border-0" >
                @error('item.name')
                    <div class="text-red-900 text-xs">{{ $message }}</div>
                @enderror
                
            </div>


            @endif
            @endforeach

            <x-button-save-cancel></x-button-save-cancel>

        </form>
    </div>
</div>
