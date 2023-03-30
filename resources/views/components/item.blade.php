<div>
    <a href="{{ route($route, $id) }}">
        <li class="my-3 p-3 flex flex-row items-center hover:bg-gray-200 border-b-2 ">
            <img class="w-12" src="{{ url('storage/img/produits/' . $icone) }}" alt="{{ $icone }}">
            <p class="text-lg">
                {{ ucfirst($name) }}
                ({{ $detail }})
            </p>
            @isset($description)
                <p>{{ $description }}</p>
            @endisset
        </li>
    </a>
</div>
