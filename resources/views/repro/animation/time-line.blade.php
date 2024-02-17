<nav id="menu" class="flex flex-row">

    <button id="depart" class="w-12 h-12 bg-vert-900" title="Retour à J0">
      <img class="p-2 hover:invert" src="{{ url('storage/img/reproduction/depart.svg')}}" alt="">
    </button>
    <button id="pause" class="w-12 h-12 border-white bg-vert-900 border-x" title="Mettre en pause l'animation">
      <img class="p-2 hover:invert" src="{{ url('storage/img/reproduction/pause.svg') }}" alt="">
    </button>
    <button id="play" class="w-12 h-12 bg-vert-900" title="Démarrer l'animation">
      <img class="p-2 hover:invert" src="{{ url('storage/img/reproduction/start.svg') }}" alt="">
    </button>
  
    <div id="timeline" class="w-full h-12 bg-gray-400">
  
      <div id="ligne" class="flex mx-3 my-4 bg-vert">
        <?php for ($i=0; $i < 40 ; $i++) {
          echo "<div class='jour'></div>";
        } ?>
      </div>
      <div id="marque"></div>
  
    </div>
  
  </nav>