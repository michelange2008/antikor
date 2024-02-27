<div class="flex fixed top-0 justify-center w-screen h-screen bg-gray-300/50">

    <div class="p-5 m-auto w-1/3 bg-brique-300">
        <form wire:submit="store">

            <h3 class="p-3 my-2 text-center text-white h3 bg-brique-900">Modifier l'aliment</h3>

            <x-forms.select-save id="type" label="Type d'aliment" name="type" :model="'altype_id'"
                :options="$altypes" champ="nom" />

            <x-forms.input-text-save id="new" name="Nom de l'aliment" :model="'nom'" />

            <x-forms.select-save id="stade" label="Stade de récolte" name="stade" :model="'alstade_id'"
                :options="$alstades" champ="nom" />

            <x-forms.input-number-save id="MS" name="MS (%)" step="0.1" min="0" max=100 :model="'MS'" />
            <div class="flex flex-row gap-2 justify-between">
                <x-forms.input-number-save id="Ptot" name="P total" step="0.1" min="0" :model="'Ptot'" />
                <x-forms.input-number-save id="P" name="P absorbable" step="0.1" min="0" :model="'P'" />
            </div>
            <div class="flex flex-row gap-2 justify-between">
                <x-forms.input-number-save id="Catot" name="Ca total" step="0.1" min="0" :model="'Catot'" />
                <x-forms.input-number-save id="Ca" name="Ca absorbable" step="0.1" min="0"
                    :model="'Ca'" />
            </div>

            <x-buttons.save-cancel-button2 />
        </form>
    </div>

</div>
