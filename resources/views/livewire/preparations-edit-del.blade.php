<div x-data="{ edit: false }" @click.outside="edit = false">
    <div class="flex flex-row justify-around">
        <x-button-edit></x-button-edit>

        <x-button-del></x-button-del>
    </div>
    <div x-cloak x-show='edit' class=" w-full sm:w-1/2 fixed top-16 left-0 sm:left-1/4 p-5 bg-orange-200"
        x-show="more == {{ $preparation->id }}" x-transition>
        <div class="flex bg-orange-900 py-3 rounded">
            <x-font-icone icone="modify_light.svg">
                </x-fonticone>
                <h4 class="text-xl text-orange-100">{{ ucfirst($preparation->name) }}</h4>
        </div>

        <form action="" wire:submit.prevent="update">

            <div class="flex flex-col my-2">

                <label for="name">Nom</label>

                <input id="name" type="text" wire:model.defer="preparation.name"
                    class="form-input rounded border-1 focus:active:border-0">
                @error('preparation.name')
                    <div class="text-red-900 text-xs">{{ $message }}</div>
                @enderror

            </div>

            <div class="flex flex-col my-2">
                <label for="officiel">Nom officiel</label>

                <input id="officiel" type="text" wire:model.defer="preparation.officiel"
                    class="form-input rounded border-1 focus:active:border-0">
                @error('preparation.officiel')
                    <div class="text-red-900 text-xs">{{ $message }}</div>
                @enderror

            </div>

            <div class="flex flex-col my-2">
                <label for="detail">Description</label>

                <textarea id="detail" wire:model.defer="preparation.detail" row="5"
                    class="form-input rounded border-1 focus:active:border-0"></textarea>
                @error('preparation.detail')
                    <div class="text-red-900 text-xs">{{ $message }}</div>
                @enderror

            </div>

            <x-button-save-cancel action="edit"></x-button-save-cancel>

        </form>

    </div>
</div>
