<ul class="">

    @foreach ($formations as $formation)
        <li
            class="flex relative flex-row justify-between px-2 py-5 my-5 bg-gray-200 shadow shadow-gray-400 hover:shadow-gray-700 hover:bg-gray-300">
            @auth()
                <div class="absolute top-1 right-1 text-gray-400 cursor-pointer hover:text-red-800" wire:click="delete({{ $formation->id }})" wire:confirm="Attention, tu vas supprimer une formation!">
                    <i class="fa-solid fa-square-xmark"></i>
                </div>
            @endauth

            <a class="block" href="{{ route($route, $formation) }}">
                <div class="flex flex-row gap-3 justify-start items-start sm:gap-5 sm:items-center">

                    <img class="w-10 max-h-16 lg:w-12" src="{{ url('storage/img/icones/' . $formation->icone) }}"
                        alt="{{ $formation->icone }}">

                    <div class="flex flex-col">
                        <p class="font-semibold text-md sm:text-base md:text-lg lg:text-xl">{{ $formation->name }}
                            @if ($formation->subname != null)
                                <span class="text-gray-600">({{ $formation->subname }})</span>
                            @endif
                        </p>
                        <!-- Sur petit écran affichage des icones sous le titre de la formation -->
                        <div class="block justify-start sm:hidden">
                            <x-liste-especes :especes="$formation->especes"></x-liste-especes>
                        </div>
                        <p class="text-sm md:text-base lg:text:lg">{{ $formation->duree->nom }}
                        </p>
                    </div>

                </div>
            </a>

            <!-- Sur grand écran affichage des icones d'espèces au bout de la ligne -->
            <div class="hidden justify-end sm:block">
                <x-liste-especes :especes="$formation->especes"></x-liste-especes>
            </div>

        </li>
    @endforeach

</ul>
