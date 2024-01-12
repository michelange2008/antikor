<div class="flex flex-row gap-2 justify-between">

    <div class="flex-auto">
        <x-forms.input-text-blur :id="$objectif->id" name='' model='nom' />
    </div>

    <div class="mt-8 text-3xl text-gray-300 cursor-pointer hover:text-red-800 active:text-black" wire:click="delete()"
        wire:confirm="Voulez-vous vraiment supprimer cet objectif ?" title="Supprimer cet objectif">
        <i class="fa-solid fa-square-xmark"></i>
    </div>
    
</div>
