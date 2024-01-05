<div x-data="{ icon: false }" @click.window.outside="icon = false">
    <form wire:submit="save({{ $programmesoustitre_id }}, {{ $formation_id }})">

        <div class="flex">

            <div class="flex-auto mr-2">

                <x-forms.input-text-save @click="icon = true" name="" id="nom" model="detail.nom"
                    placeholder="Ajoutez un nouveau détail" wire:keydown.debounce500ms="create"></x-forms.input-text-save>

            </div>

            <x-buttons.save-button-icon></x-buttons.save-button-icon>
        </div>
    </form>

</div>
