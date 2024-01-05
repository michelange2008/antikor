<div x-data="{ open: false }" >

    <div class="md:flex">

        <div class="flex-auto">

            <x-forms.input-text-blur name="" id="nom" model="detail.nom"></x-forms.input-text-blur>

        </div>

        <div class="mx-2"></div>

        <div>

            <x-buttons.trash-button></x-buttons.trash-button>
            
        </div>

    </div>
    <x-modals.del-confirm action="destroy({{ $formation_id }})"
    texte="Voulez-vous vraiment supprimer ce détail ?"></x-modals.del-confirm>

</div>
