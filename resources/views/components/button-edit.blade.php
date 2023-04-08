<button @click=" edit = !edit"
    class="group shadow-md flex flex-row justify-around items-center rounded p-2 bg-teal-800 w-36 hover:bg-teal-500 text-teal-100 hover:text-teal-900">

    <img class="w-4 group-hover:invert" src="{{ url('storage/img/fonticone/modify_light.svg') }}" alt="add">

    <p>{{ ucfirst(__('boutons.edit')) }}</p>

    </a>

</button>
