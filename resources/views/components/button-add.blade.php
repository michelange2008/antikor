<button @click=" open = !open"  class="shadow-md flex flex-row justify-around rounded p-2 bg-teal-800 w-30 hover:bg-teal-500 text-teal-100 hover:text-teal-900" type="submit">

        <img class="w-4 mr-2" src="{{ url('storage/img/fonticone/add.svg') }}" alt="add">

        <p>{{ ucfirst(__('boutons.add')) }}</p>

    </a>

</button>
