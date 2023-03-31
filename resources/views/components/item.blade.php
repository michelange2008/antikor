<div>
    <a href="{{ route($route, $id) }}">
        <li class="p-3 flex flex-row items-center bg-gray-200 hover:bg-gray-300 border-b-2 ">
            <img class="w-12" src="{{ url('storage/img/produits/' . $icone) }}" alt="{{ $icone }}">
            <p class="text-lg ">
                {{ ucfirst($name) }}
                ({{ $detail }})
            </p>
            @isset($description)
                <p>{{ $description }}</p>
            @endisset
        </li>
    </a>
</div>
