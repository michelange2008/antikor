<div>

    <li class="p-3 flex flex-row justify-between bg-gray-200 hover:bg-gray-300 border-b-2 ">
        <div class="flex flex-row items-center">
            <img class="w-12" src="{{ url('storage/img/produits/' . $icone) }}" alt="{{ $icone }}">
            <p class="text-lg ">
                {{ ucfirst($name) }}
                ({{ $detail }})
            </p>
        </div>
            
        <div class="flex flex-row bg-gray-300 shadow px-3 py-1 ml-3 cursor-pointer">
            <img class="w-6 mx-1" src="{{ url('storage/img/fonticone/edit.svg')}}" alt="Editer">
        </div>

        
    </li>

</div>
