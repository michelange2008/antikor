<div x-data="{ edit: @entangle('edit') }" @click.outside="edit = false" @keyup.escape="edit = false">
    <div class="flex flex-row justify-around">
        <x-button-edit></x-button-edit>

        <x-button-del></x-button-del>
    </div>
    <div x-cloak x-show='edit' x-show="more == {{ $preparation->id }}" x-transition
        class=" w-full sm:w-1/2 fixed top-16 left-0 sm:left-1/4 p-5 bg-orange-200">

        <x-titres.titre1 :texte="$preparation->name" icone="modify_light.svg" couleur="orange"></x-titres.titre1>

        <form action="" wire:submit.prevent="update">

            <x-forms.input-text name="Nom" id="name" model="preparation"></x-forms.input-text>

            <x-forms.input-text name="Nom officiel" id="officiel" model="preparation"></x-forms.input-text>

            <x-forms.textarea name="Description" id="detail" model="preparation" rows="5"></x-forms.textarea>

            <div>
                @foreach ($types as $type)
                    <h3 class="font-bold">{{ ucfirst($type->name) }}</h3>
                    @foreach ($preparation->produits as $produit)
                        @if ($produit->pivot != null && $produit->phytotype_id == $type->id )
                            <p>{{ $produit->name }}: {{ $produit->pivot->quantite }} {{ $produit->phytounite->abbreviation }}</p>
                        @endif
                    @endforeach
                @endforeach
            </div>

            <x-buttons.save-cancel-button cancel="edit"></x-buttons.save-cancel-button>

        </form>

    </div>
</div>
