<div>

    <div id="{{ $val }}" wire:click = "toggle('{{ $parametre }}','{{ $val }}')"
        class="m-2 cursor-pointer py-3 px-4 bg-gray-300 shadow shadow-gray-800 active:bg-gray-800 active:text-white
    @if ($param == $val) bg-teal-800 text-white shadow-teal-900 @endif"
    >

        <span>{{ $valeur }}</span>

    </div>

</div>
