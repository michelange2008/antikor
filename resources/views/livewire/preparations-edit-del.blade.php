<div x-data="{ edit: @entangle('edit').live,  del_prep: @entangle('del_prep').live}" @click.outside="edit = false" @keyup.escape="edit = false">

    <div class="flex flex-wrap gap-x-3 gap-y-1 justify-around sm:justify-between">
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
        class=" w-full lg:w-1/2 fixed top-2 left-0 lg:left-1/4 p-5 bg-orange-200">

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
                    <img class="w-8 m-3" src="{{ $icone->temporaryUrl() }}" alt="">
                @endif
            @else
                <img class="w-8 m-3" src="{{ url('storage/img/icones/'.$preparation->icone)}}">
            @endisset


            <x-buttons.save-cancel-button cancel="edit"></x-buttons.save-cancel-button>

        </form>

    </div>

    {{-- Fenêtre modale qui demande la confirmation de la suppression d'une préparation --}}
    <div x-cloak x-show="del_prep"
        class="fixed m-auto inset-0 z-50 
            w-full sm:w-4/5 md:w-2/3 lg:w-1/2 h-3/5 sm:h-1/3
            flex flex-col justify-around border-1 shadow-lg bg-white p-4">

        <x-titres.titre1 :class="'bg-red-900'" :icone="'warning.svg'">Suppression d'une préparation ?</x-titres.titre1>

        <div class="m-5">
            <p>En cliquant sur le bouton <span class="text-bold text-red-900 border px-1">
                    CONFIRMER</span>, vous supprimerez définitivement la préparation:
            </p>
            <p class="font-bold text-xl text-center my-3">
                {{ ucfirst($preparation->name) }}
            </p>
            <p>
                Sinon cliquez sur le bouton <span class="text-bold text-gray-700 border px-1">ANNULER</span>
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
