@props(['route', 'texte'])

<div class="shadow-md rounded p-2 bg-teal-800 w-40 hover:bg-teal-500 text-teal-100 hover:text-teal-900">

    <a class=" flex flex-row" href="{{ route($route) }}">

        <img class="w-4 mr-2" src="{{ url('storage/img/fonticone/add.svg') }}" alt="add">

        <p>{{ ucfirst(__('boutons.'.$texte)) }}</p>

    </a>

</div>
