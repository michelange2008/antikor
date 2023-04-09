<div x-data="{ edit: @entangle('edit') }" @click.outside="edit = false" @keyup.escape="edit = false">
    <div class="flex flex-row justify-around">
        <x-button-edit></x-button-edit>

        <x-button-del></x-button-del>
    </div>
    <div x-cloak x-show='edit' x-show="more == {{ $preparation->id }}" x-transition
        class=" w-full lg:w-1/2 fixed top-2 left-0 lg:left-1/4 p-5 bg-orange-200">

        <x-titres.titre1 :texte="$preparation->name" icone="modify_light.svg" couleur="orange"></x-titres.titre1>

        <form action="" wire:submit.prevent="update">

            <x-forms.input-text name="Nom" id="name" model="preparation"></x-forms.input-text>

            <x-forms.input-text name="Nom officiel" id="officiel" model="preparation"></x-forms.input-text>

            <x-forms.textarea name="Description" id="detail" model="preparation" rows="5"></x-forms.textarea>

            <div x-data="{ del: false }">
                <p>Composition</p>
                <div class="columns-2 p-2 bg-white border border-gray-600 rounded">
                    <div>
                        @foreach ($preparation->produits->sort() as $produit)
                            <div class="flex flex-row gap-2 p-2">
                                <div x-on:click="del = del=={{ $produit->id }} ? false : {{ $produit->id }}"
                                    class="cursor-pointer" title="Supprimer {{ $produit->name }}">
                                    <img class="w-6 grayscale hover:grayscale-0"
                                        src="{{ url('storage/img/fonticone/del.svg') }}" alt="">
                                </div>
                                <img class="w-6" src="{{ url('storage/img/produits/' . $produit->phytotype->icone) }}"
                                    alt="">
                                <p>{{ $produit->name }}:
                                    {{ $produit->pivot->quantite . ' ' . $produit->phytounite->abbreviation }} </p>

                                <div x-cloak x-show="del=={{ $produit->id }}" 
                                    class="z-50 fixed top-96 left-0 w-full mx-5 sm:left-1/3 sm:w-1/3 h-32 flex justify-center items-center bg-transparent">
                                    <div class=" flex flex-row gap-1 px-3 py-2 rounded shadow-xl object-center bg-red-600 hover:bg-red-300 text-gray-50 hover:text-black">
                                        <x-font-icone icone="del_light.svg"></x-font-icone>
                                        <button class="">Supprimer {{ $produit->name}} ?</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>

            <x-buttons.save-cancel-button cancel="edit"></x-buttons.save-cancel-button>

        </form>

    </div>
</div>
