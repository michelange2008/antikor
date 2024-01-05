<div x-data="{ open: false }">

    <form wire:submit>
        <div class="md:flex">

            <div class="flex-auto">

                <x-forms.input-text-blur name="Sous-titre" id="nom" model="soustitre.nom"></x-forms.input-text-blur>

            </div>

            <div class="mx-2">

                <x-forms.input-number-blur name="Ordre" id="ordre"
                    model="soustitre.ordre"></x-forms.input-number-blur>
            </div>

            <x-buttons.trash-button></x-buttons.trash-button>

        </div>
    </form>
    <x-modals.del-confirm action="destroy({{ $formation_id }})"
        texte="Voulez-vous vraiment supprimer ce sous-titre ?"></x-modals.del-confirm>

</div>
