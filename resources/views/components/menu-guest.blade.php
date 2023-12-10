<div class="w-full">
    <div class="h-0 collapse md:h-auto md:visible">
        <div class="p-2 text-gray-200 bg-gray-900">
            <h1>Menu</h1>
        </div>
        <ul class="overflow-hidden text-xs lg:text-base text-ellipsis">
            <x-menu-guest-item :intitule="'Accueil'" :image="'accueil.jpg'" :route="'front.index'"></x-menu-guest-item>
            <x-menu-guest-item :intitule="'Formations'" :image="'formations.jpg'" :route="'front.formations'"></x-menu-guest-item>
            <x-menu-guest-item :intitule="'Parasitisme'" :image="'parasitisme.jpg'" :route="'front.parasitisme'"></x-menu-guest-item>
            <x-menu-guest-item :intitule="'Reproduction'" :image="'reproduction.jpg'" :route="'front.reproduction'"></x-menu-guest-item>
        </ul>
    </div>
</div>
