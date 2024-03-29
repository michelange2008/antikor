<div x-data="{ open: false }">

        <div class="md:flex">

            <div class="flex-auto">

                <x-forms.input-text-blur :id="'soustitre_'.$id_item" name="Sous-titre" model="soustitre.nom"></x-forms.input-text-blur>

            </div>

            <div class="mx-2">

                <x-forms.input-number-blur :id="'ordre_'.$id_item" name="Ordre" model="soustitre.ordre"></x-forms.input-number-blur>
            </div>

            <div class="mt-8 text-3xl text-gray-300 cursor-pointer hover:text-red-800 active:text-black"
                wire:click="destroy()" wire:confirm="Voulez-vous vraiment supprimer cet objectif ?"
                title="Supprimer cet objectif">
                <i class="fa-solid fa-square-xmark"></i>
            </div>

        </div>
    </form>


</div>
