    <div id="{{ $val }}" wire:click = "toggle('{{ $parametre }}','{{ $val }}')"
        class="my-2 basis-1/3 sm:basis-1/2 text-center cursor-pointer py-3 px-4 bg-gray-300 shadow shadow-gray-800 active:bg-gray-800 active:text-white
    @if ($param == $val) bg-teal-800 text-white shadow-teal-900 @endif"
    >

        <span>{{ $valeur }}</span>

    </div>