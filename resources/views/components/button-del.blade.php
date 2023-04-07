<button @click=" open = !open"  class="shadow-md flex flex-row justify-around items-center rounded p-2 bg-red-800 w-36 hover:bg-red-500 text-red-100 hover:red-teal-900" type="submit">

        <img class="w-4" src="{{ url('storage/img/fonticone/del_light.svg') }}" alt="add">

        <p>{{ ucfirst(__('boutons.del')) }}</p>

    </a>

</button>
