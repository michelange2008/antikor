<div>
    @if ($substrat_choisi != null)
            <div class="flex flex-row justify-between text-center sm:flex-col md:flex-row">

                <div class="flex-grow p-3 bg-orange-100">
                    <p class="italic">Carence</p>
                    <p><&nbsp{{ $dosages['carence'][$substrat_choisi] }} </p>
                </div>
                <div class="flex-grow p-3 bg-vert-300">
                    <p class="italic">Plage physiologique</p>
                    <p>{{ $dosages['normal'][$substrat_choisi] }} </p>
                </div>
                <div class="flex-grow p-3 bg-brique-300">
                    <p class="italic">Intoxication</p>
                    <p>{{ $dosages['intoxication'][$substrat_choisi] }} </p>
                </div>
            </div>
    @endif
</div>
