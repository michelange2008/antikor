<div x-data="{ edit: @entangle('edit') }" @click.outside="edit = false" @keyup.escape="edit = false">

    <div class="flex flex-row justify-around">

        <x-button-edit></x-button-edit>

        <a href="{{ route('composition.edit', $preparation)}}">
            <x-buttons.blue-button><x-icones.settings></x-icones.settings> Changer la composition</x-buttons.blue-button>
        </a>

        <x-button-del></x-button-del>

    </div>
    
    <div x-cloak x-show='edit' x-show="more == {{ $preparation->id }}" x-transition
        class=" w-full lg:w-1/2 fixed top-2 left-0 lg:left-1/4 p-5 bg-orange-200">

        <x-titres.titre1 icone="modify_light.svg">{{ $preparation->name }}</x-titres.titre1>

        <form action="" wire:submit.prevent="update">

            <x-forms.input-text name="Nom" id="name" model="preparation"></x-forms.input-text>

            <x-forms.input-text name="Nom officiel" id="officiel" model="preparation"></x-forms.input-text>

            <x-forms.textarea name="Description" id="detail" model="preparation" rows="5"></x-forms.textarea>


            <x-buttons.save-cancel-button cancel="edit"></x-buttons.save-cancel-button>

        </form>

    </div>
</div>
