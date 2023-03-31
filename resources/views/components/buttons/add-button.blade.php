@props(['route', 'texte'])

<div>
    <a class="flex flex-row rounded p-2 bg-teal-800 w-48 hover:bg-teal-500 text-teal-100 hover:text-teal-900"
        href="{{ route($route) }}">

        <img class="w-4 mr-2" src="{{ url('storage/img/fonticone/add.svg') }}" alt="add">
        <p>{{ $texte }}</p>
    </a>
</div>
