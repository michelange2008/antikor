<button @click=" edit = !edit"
    class="btn group
        bg-teal-800 hover:bg-teal-600 focus:ring-teal-600 active:bg-teal-900  active:ring-teal-900
        ">

    <img class="w-4 group-hover:invert" src="{{ url('storage/img/fonticone/modify_light.svg') }}" alt="add">

    <p>{{ ucfirst(__('boutons.edit')) }}</p>

  </button>
