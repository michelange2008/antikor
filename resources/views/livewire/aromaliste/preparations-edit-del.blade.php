<div x-data="{ edit: @entangle('edit').live,  del_prep: @entangle('del_prep').live}" @click.outside="edit = false" @keyup.escape="edit = false">

    <div class="flex flex-wrap gap-y-1 gap-x-3 justify-around sm:justify-between">
        <div class="flex flex-row gap-2">
            <x-buttons.success-button x-on:click=" edit = !edit">
                <x-icones.edit :collapse="true"></x-icones.edit> Modifier
            </x-buttons.success-button>

            <x-buttons.danger-button x-on:click="del_prep = true">
                <x-icones.del :collapse="true"></x-icones.del> Supprimer
            </x-buttons.danger-button>
            
            <a class="flex" href="{{ route('composition.edit', $preparation) }}">
                <x-buttons.blue-button>
                    <x-icones.settings :collapse="true"></x-icones.settings> Changer la composition
                </x-buttons.blue-button>
            </a>
        </div>

        <div>
            <x-buttons.reset-button x-on:click="more = false">
                <x-icones.return></x-icones.return>Fermer
            </x-buttons.reset-button>
        </div>

    </div>

    <div x-cloak x-show='edit' x-show="more == {{ $preparation->id }}" x-transition
        class="fixed left-0 top-2 p-5 w-full bg-orange-200 lg:w-1/2 lg:left-1/4">

        <x-titres.titre1 icone="modify_light.svg">{{ $preparation->name }}</x-titres.titre1>
        <x-titres.titre2 :class="'text-amber-900'">Modifier le texte</x-titres.titre2>

        <form action="" wire:submit="update">

            <x-forms.input-text name="Nom" id="name" model="preparation"></x-forms.input-text>

            <x-forms.input-text name="Nom officiel" id="officiel" model="preparation"></x-forms.input-text>

            <x-forms.textarea name="Description" id="detail" model="preparation" rows="3"></x-forms.textarea>

            <x-forms.textarea name="Fabrication" id="fabrication" model="preparation" rows="5"></x-forms.textarea>

            <x-forms.input-file name="Icone ({{ $preparation->icone }})" model="icone"></x-forms.input-file>

            @isset($icone)
                @if (in_array($icone->getClientOriginalExtension(), ['png', 'jpg', 'jpeg', 'svg']))
                    <img class="m-3 w-8" src="{{ $icone->temporaryUrl() }}" alt="">
                @endif
            @else
                <img class="m-3 w-8" src="{{ url('storage/img/icones/'.$preparation->icone)}}">
            @endisset


            <x-buttons.save-cancel-button cancel="edit"></x-buttons.save-cancel-button>

        </form>

    </div>

    {{-- Fenêtre modale qui demande la confirmation de la suppression d'une préparation --}}
    <div x-cloak x-show="del_prep"
        class="flex fixed inset-0 z-50 flex-col justify-around p-4 m-auto w-full h-3/5 bg-white shadow-lg sm:w-4/5 md:w-2/3 lg:w-1/2 sm:h-1/3 border-1">

        <x-titres.titre1 :class="'bg-red-900'" :icone="'warning.svg'">Suppression d'une préparation ?</x-titres.titre1>

        <div class="m-5">
            <p>En cliquant sur le bouton <span class="px-1 text-red-900 border text-bold">
                    CONFIRMER</span>, vous supprimerez définitivement la préparation:
            </p>
            <p class="my-3 text-xl font-bold text-center">
                {{ ucfirst($preparation->name) }}
            </p>
            <p>
                Sinon cliquez sur le bouton <span class="px-1 text-gray-700 border text-bold">ANNULER</span>
            </p>
        </div>

        <div class="flex gap-2">
            <x-buttons.danger-button wire:click="delete_preparation">
                <x-icones.warning></x-icones.warning>Confirmer le suppression
            </x-buttons.danger-button>
            <x-buttons.reset-button x-on:click="del_prep = false">
                <x-icones.reset></x-icones.reset>Annuler
            </x-buttons.reset-button>
        </div>
    </div>
</div>
