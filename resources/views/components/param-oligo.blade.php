    <div id="{{ $val }}" wire:click = "toggle('{{ $parametre }}','{{ $val }}')"
        class="my-2 text-center cursor-pointer py-2 px-2 md:py-3 md:px-4 
        bg-gray-300 shadow shadow-gray-800 active:bg-gray-800 active:text-white text-sm md:text-base
    @if ($param == $val) bg-teal-800 text-white shadow-teal-900 @endif"
    >

        <span>{{ $valeur }}</span>

    </div>