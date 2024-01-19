<div class="mt-4">
    <p class="font-bold">{{ $titre }}</p>
    @foreach ($items as $item)
        <li class="px-2 list-none">
            <div class="flex flex-row gap-1 align-middle">
                @if (in_array($item->id, $liste))
                    <div wire:click.prevent = "toggleListe({{ $item->id }})">
                        <i title="Retirer cette permission"
                            class="text-2xl text-gray-400 cursor-pointer hover:text-red-800 fa-solid fa-square-minus"></i>
                    </div>
                    <div class="p-2 font-bold">
                        {{ $item->name }} <i class="text-teal-800 fa-solid fa-check"></i>
                    </div>
                @else
                    <div wire:click.prevent = "toggleListe({{ $item->id }})">
                        <i title="Ajouter cette permission"
                            class="mt-1 text-2xl text-gray-400 cursor-pointer hover:text-teal-800 fa-solid fa-square-plus"></i>
                    </div>
                    <div class="p-2">
                        {{ $item->name }}
                    </div>
                @endif
            </div>
       </li>
    @endforeach
</div>
