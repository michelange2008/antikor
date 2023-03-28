<div class="w-full">
    <div class="collapse h-0 md:h-auto md:visible ">
        <div class="bg-gray-900 text-gray-200 p-2">
            <h1>Menu</h1>
        </div>
        <ul class=" text-xs lg:text-base overflow-hidden text-ellipsis">
            <x-menu-guest-item :intitule="'Formations'" :image="'formations.jpg'" :route="'front.formations'"></x-menu-guest-item>
            <x-menu-guest-item :intitule="'Parasitisme'" :image="'parasitisme.jpg'" :route="'front.parasitisme'"></x-menu-guest-item>
            <x-menu-guest-item :intitule="'Reproduction'" :image="'reproduction.jpg'" :route="'front.reproduction'"></x-menu-guest-item>
        </ul>
    </div>
</div>
