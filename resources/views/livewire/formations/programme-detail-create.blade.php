<form wire:submit="save({{ $programmesoustitre_id }}, {{ $formation_id }})">

    <div class="flex gap-2 mb-2" x-data="{ icon: false }" @click.window.outside="icon = false">

        <div class="flex-auto mr-2" @click="icon = true">
            <x-forms.input-text-save name="" id="nom" model="detail.nom"
                placeholder="Ajoutez un nouveau détail" wire:keydown.debounce500ms="create"></x-forms.input-text-save>
        </div>

        <div class="mt-8">
            <x-buttons.save-button-icon></x-buttons.save-button-icon>
        </div>
        
    </div>

</form>
