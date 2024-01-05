{{-- Pour le changement d'aspect de l'icone, il faut ajouter dans le div parent la ligne suivante:
x-data="{ icon: false }" @click.window.outside="icon = false"

et

@click="icon = true"

dans l'élément que l'on clique pour changer l'aspect de l'icone
--}}
<div class="text-3xl">

    <div x-show="!icon" class="text-gray-300">
        <button type="submit" disabled>
            <i class="fa-solid fa-square-plus"></i>
        </button>
    </div>
    
    <div x-show="icon" class="text-teal-700 hover:text-teal-900">
        <button type="submit">
            <i class="fa-solid fa-square-plus"></i>
        </button>
    </div>

</div>