<div x-data="{ icon: false }" @click.window.outside="icon = false">
    <form wire:submit="save({{ $formation_id }})">

        <div class="md:flex">

            <div class="flex-auto">

                <x-forms.input-text-save @click="icon = true" name="Nouveau sous-titre" id="soustitre" model="soustitre.nom"
                    placeholder="Ajouter un nouveau sous-titre de programme...">
                </x-forms.input-text-save>

            </div>

            <div class="mx-2">

                <x-forms.input-text-save name="Position" id="ordre"
                    model="soustitre.ordre"></x-forms.input-text-save>

            </div>

            <x-buttons.save-button-icon></x-buttons.save-button-icon>

        </div>

    </form>

</div>
