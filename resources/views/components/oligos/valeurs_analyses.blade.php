<div>
    @if ($substrat_choisi != null)
        <div class="border border-vert-900">
            <div>
                <p class="p-3 text-xl text-center text-white bg-bleu-900">
                    {{ ucfirst($substrat_choisi) }} ({{ $dosages['unités'][$substrat_choisi] }})
                </p>
            </div>
            <div class="flex flex-row gap-3 justify-between p-3 sm:flex-col md:flex-row">

                <div>
                    <p>Carence</p>
                    <p>{{ $dosages['carence'][$substrat_choisi] }} </p>
                </div>
                <div>
                    <p>Plage physiologique</p>
                    <p>{{ $dosages['normal'][$substrat_choisi] }} </p>
                </div>
                <div>
                    <p>Intoxication</p>
                    <p>{{ $dosages['intoxication'][$substrat_choisi] }} </p>
                </div>
            </div>
        </div>
    @endif
</div>
