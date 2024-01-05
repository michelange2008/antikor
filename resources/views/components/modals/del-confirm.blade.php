<div 
    x-show="open" 
    x-transition.opacity 
    x-cloak
    x-trap.inert="open" 
    class="fixed top-0 left-0 w-full h-full bg-transparent">

    <div class="mx-auto my-60 w-1/3 bg-gray-200">

        <form action="" wire:submit="{{ $action }}">

            <div class="p-4 text-lg font-bold text-white bg-red-800">
                <h1><i class="fa-solid fa-triangle-exclamation"></i> {{ $texte ?? '' }} </h1>
            </div>

            <div class="flex justify-end p-4">

                <x-buttons.save-cancel-button confirm="Oui" cancel="Non"></x-buttons.save-cancel-button>

            </div>
        </form>
    </div>

</div>
