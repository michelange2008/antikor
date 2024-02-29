<div class="flex fixed top-0 left-0 justify-center w-full h-screen bg-gray-300/50">

    <div class="p-5 m-auto w-1/3 bg-brique-300">
        <form wire:submit="storeAliment()">

            <h3 class="p-3 my-2 text-center text-white h3 bg-brique-900">Modifier l'aliment</h3>

            <input type="hidden" wire:model="'aliment.id'">
            
            <x-forms.input-text-save id="new" name="Nom de l'aliment" :model="'aliment.nom'" />

            <x-forms.input-number-save id="qtt" name="Quantité (kg)" step="0.01" min="0" :model="'aliment.qtt'" />

            <x-forms.input-number-save id="MS" name="MS (%)" step="0.1" min="0" max=100 :model="'aliment.MS'" />
            <div class="flex flex-row gap-2 justify-between">
                <x-forms.input-number-save id="Ptot" name="P total" step="0.1" min="0" :model="'aliment.Ptot'" />
                <x-forms.input-number-save id="P" name="P absorbable" step="0.1" min="0" :model="'aliment.P'" />
            </div>
            <div class="flex flex-row gap-2 justify-between">
                <x-forms.input-number-save id="Catot" name="Ca total" step="0.1" min="0" :model="'aliment.Catot'" />
                <x-forms.input-number-save id="Ca" name="Ca absorbable" step="0.1" min="0"
                    :model="'aliment.Ca'" />
            </div>

            <x-buttons.save-cancel-button2 />
        </form>
    </div>

</div>
