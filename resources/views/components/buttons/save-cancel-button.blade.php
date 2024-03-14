<div>
    <button class="px-3 py-1 my-1 text-center text-teal-100 bg-teal-900 rounded disabled:bg-gray-500" type="submit"
        wire:loading.attr="disabled" @click="open = false">
        {{ $confirm ?? "Enregistrer"}}
    </button>

    <button
        class="px-3 py-1 my-1 text-center bg-gray-300 rounded hover:bg-gray-800 hover:text-gray-200" type="reset"
        @click="open = false, {{ $action ?? 'action' }} = 0 ">
        {{ $cancel ?? "Annuler" }}
    </button>
</div>
