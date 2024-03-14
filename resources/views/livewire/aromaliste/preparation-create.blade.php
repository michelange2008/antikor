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
                        name="description" id="description" cols="30" rows="5" wire:model="detail"></textarea>
                    @error('detail')
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
