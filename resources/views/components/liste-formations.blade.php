<div class=" py-2 ">

    @foreach ($formations as $formation)

        <div class="flex flex-row justify-between items-center py-3">

            <div class="flex flex-row justify-start gap-1 sm:gap-5">
                <img class="w-10 lg:w-12" src="{{ url('storage/img/formations/icones/' . $formation->icone) }}"
                    alt="{{ $formation->icone }}">
                <div class="flex flex-col">
                    <p class="font-semibold text-sm sm:text-base md:text-lg lg:text-xl ">{{ $formation->name }}</p>
                    <p class="text-sm md:text-base lg:text:lg  ">{{ $formation->duree }} - {{ $formation->lieu }}</p>
                </div>
            </div>

            <div class="flex flex-row justify-end">

                @foreach ($formation->especes as $espece)
                    <img class="w-6 sm:w-8 lg:w-12 sm:mx-1" src="{{ url('storage/img/formations/icones/' . $espece->icone) }}"
                        alt="{{ $espece->nom }}">
                @endforeach

            </div>

        </div>

    @endforeach

</div>
