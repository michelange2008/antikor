<div @keyup.escape.window="editPrep = false">

    <x-titres.titre1 icone="modify_light.svg">{{ $preparation->name }}</x-titres.titre1>
    <x-titres.titre2 :class="'text-amber-900'">Modifier le texte</x-titres.titre2>

    <form wire:submit="updatePrep">

        <x-forms.input-text-save name="Nom" id="name" model="name" />

        <x-forms.input-text-save name="Nom officiel" id="officiel" model="officiel" />

        <x-forms.textarea-save name="Description" id="detail" model="detail" rows="3" />

        <x-forms.textarea-save name="Fabrication" id="fabrication" model="fabrication" rows="5" />

        <x-forms.input-file name="icone" model="icone" />

        @isset($icone)
            @if (in_array($icone->getClientOriginalExtension(), ['png', 'jpg', 'jpeg', 'svg']))
                <img class="m-3 w-8" src="{{ $icone->temporaryUrl() }}" alt="">
            @endif
        @else
            <img class="m-3 w-8" src="{{ url('storage/img/icones/' . $icone_name) }}">
        @endisset

        <div>
            <button class="px-3 py-1 my-1 text-center text-teal-100 bg-teal-900 rounded disabled:bg-gray-500"
                type="submit">
                Enregistrer
            </button>

            <button class="px-3 py-1 my-1 text-center bg-gray-300 rounded hover:bg-gray-800 hover:text-gray-200"
                wire:click=" editPrep = false">
                Annuler
            </button>
        </div>

    </form>

</div>
