<form wire:submit='create({{ $formation_id }})'>
    
    <div class="flex gap-2" x-data="{ icon: false }" @click.window.outside="icon = false">

        <div class="flex-auto" @click="icon = true">
            <x-forms.input-text-save id="nouveau_objectif" name='' placeholder="Nouvel objectif" model='nom' />
        </div>

        <div class="mt-8">
            <x-buttons.save-button-icon></x-buttons.save-button-icon>
        </div>

    </div>
        
</form>
