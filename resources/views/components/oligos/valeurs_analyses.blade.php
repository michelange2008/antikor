<div>
    @if ($substrat_choisi != null)
        <div class="border border-vert-900">
            <div>
                <p class="p-3 text-xl text-center text-white bg-bleu-900">
                    {{ ucfirst($substrat_choisi) }} ({{ $dosages[$substrat_choisi]["unités"] }})
                </p>
            </div>
            <div class="flex flex-row justify-between text-center border sm:flex-col md:flex-row border-bleu-900">

                <div class="flex-grow p-3 border border-collapse border-bleu-900">
                    <p class="italic">Carence</p>
                    <p class="text-xl font-bold text-orange-900"><&nbsp{{ $dosages[$substrat_choisi]["carence"] }} </p>
                </div>
                <div class="flex-grow p-3 border border-collapse border-bleu-900">
                    <p class="italic">Plage physiologique</p>
                    <p class="text-xl font-bold text-vert-900">{{ $dosages[$substrat_choisi]["normal"] }} </p>
                </div>
                <div class="flex-grow p-3 border border-bleu-900">
                    <p class="italic">Intoxication</p>
                    <p class="text-xl font-bold text-brique-900">{{ $dosages[$substrat_choisi]["intoxication"] }} </p>
                </div>
            </div>
            </div>
        </div>
    @endif
</div>
