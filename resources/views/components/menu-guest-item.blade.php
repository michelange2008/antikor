@props(['intitule', 'image', 'route'])

<div>
    <li class="my-2 bg-gray-200 text-center hover:bg-teal-500 hover:text-white" title="{{ $intitule }}">
        <a href="{{ route($route)}}">
            <img src="{{ url('storage/img/'.$image)}}" alt="{{ $intitule }}">
            <h5>{{ $intitule }}</h5>
        </a>
    </li>

</div>