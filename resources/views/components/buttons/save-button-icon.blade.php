{{-- Pour le changement d'aspect de l'icone, il faut ajouter dans le div parent la ligne suivante:
x-data="{ icon: false }" @click.window.outside="icon = false"

et

@click="icon = true"

dans l'élément que l'on clique pour changer l'aspect de l'icone
--}}
<div class="flex justify-center self-center mx-3 text-xl">

    <div x-show="!icon" class="text-gray-300">
        <button type="submit" disabled>
            <i class="fa-solid fa-floppy-disk"></i>
        </button>
    </div>
    
    <div x-show="icon" class="text-teal-700 hover:text-teal-900">
        <button type="submit">
            <i class="fa-solid fa-floppy-disk"></i>
        </button>
    </div>

</div>