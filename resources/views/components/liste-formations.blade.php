<ul class=" py-2 ">

    @foreach ($formations as $formation)
    <a href="{{ route($route_formationShow, $formation)}}">
        <li class="flex flex-row justify-between py-3 border-b-2 last:border-b-0 md:hover:bg-gray-100">
                <div class="flex flex-row justify-start gap-3 sm:gap-5 items-start sm:items-center ">
                    <img class="w-10 lg:w-12" src="{{ url('storage/img/formations/icones/' . $formation->icone) }}"
                        alt="{{ $formation->icone }}">
                    <div class="flex flex-col">
                        <p class="font-semibold text-md sm:text-base md:text-lg lg:text-xl ">{{ $formation->name }}</p>
                        <!-- Sur petit écran affichage des icones sous le titre de la formation -->
                        <div class="sm:collapse visible justify-start">
                            <x-liste-especes :especes="$formation->especes"></x-liste-especes>
                        </div>
                        <p class="text-sm md:text-base lg:text:lg  ">{{ $formation->duree }} - {{ $formation->lieu }}
                        </p>
                    </div>
                </div>
                <!-- Sur grand écran affichage des icones d'espèces au bout de la ligne -->
                <div class="collapse sm:visible  justify-end">
                    <x-liste-especes :especes="$formation->especes"></x-liste-especes>
                </div>
            </li>
        </a>
    @endforeach

</ul>
