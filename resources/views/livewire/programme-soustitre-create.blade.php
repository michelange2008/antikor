<form wire:submit="save({{ $formation_id }})">

    <div class="gap-2 mx-2 md:flex" x-data="{ icon: false }" @click.window.outside="icon = false">

        <div class="flex-auto" @click="icon = true">
            <x-forms.input-text-save name="Nouveau sous-titre" id="soustitre" model="soustitre.nom"
                placeholder="Ajouter un nouveau sous-titre de programme...">
            </x-forms.input-text-save>
        </div>

        <div class="mx-2">
            <x-forms.input-text-save name="Position" id="ordre" model="soustitre.ordre"></x-forms.input-text-save>
        </div>

        <div class="mt-8">
            <x-buttons.save-button-icon></x-buttons.save-button-icon>
        </div>

    </div>

</form>
