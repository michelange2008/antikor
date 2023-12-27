<div>
    <form action="" wire:submit.prevent="update">

        <x-forms.input-text name="Sous-titre" id="soustitre" model="programmeform"></x-forms.input-text>
        <x-forms.input-text name="Détail" id="detail" model="programmeform"></x-forms.input-text>
        <x-buttons.save-cancel-button cancel="edit"></x-buttons.save-cancel-button>

    </form>
</div>
