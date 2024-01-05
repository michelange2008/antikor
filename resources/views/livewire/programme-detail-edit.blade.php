<div x-data="{ open: false }">

    <div class="gap-2 md:flex">

        <div class="flex-auto">

            <x-forms.input-text-blur name="" id="nom" model="detail.nom"></x-forms.input-text-blur>

        </div>

        <div class="mt-8 text-3xl text-gray-300 cursor-pointer hover:text-red-800 active:text-black"
            wire:click="destroy()" wire:confirm="Voulez-vous vraiment supprimer cet objectif ?"
            title="Supprimer cet objectif">
            <i class="fa-solid fa-square-xmark"></i>
        </div>

    </div>

</div>
