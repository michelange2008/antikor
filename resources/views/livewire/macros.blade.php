<div>


    <x-titres.titre icone="mineraux_light.svg">Dois-je donner des minéraux à mes animaux ?</x-titres.titre>

    <div id="principal" class="flex flex-col gap-3 lg:flex-row">

        <div id="parametres" class="lg:w-1/2">

            {{-- atelier / Poids --}}
            <div id="troupeau">
                <div class="px-2 py-3 text-white bg-brique">
                    <h2 class="h2">Le troupeau</h2>
                </div>
                <div id="atelier" class="my-3">
                    <h3 class="py-1 pl-2 bg-gray-300 text-vert-900 h3 lg:pl-0 lg:text-center">1 - Choisir le type de
                        troupeau</h3>
                    <div class="flex flex-row gap-8 my-1 lg:justify-center">
                        @foreach ($ateliers as $abbreviation => $atelier)
                            <div class="cursor-pointer" wire:click="choixAtelier('{{ $abbreviation }}')">
                                @if ($abbreviation == $troupeau['atelier'])
                                    <img class="border-2 shadow-lg border-vert shadow-vert-900"
                                        src="{{ url('storage/img/icones/' . $atelier['icone']) }}" alt="">
                                @else
                                    <img class="brightness-75"
                                        src="{{ url('storage/img/icones/' . $atelier['icone']) }}" alt="">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="stade" class="mb-3">
                    <h3 class="py-1 pl-2 bg-gray-300 text-vert-900 h3 lg:pl-0 lg:text-center">2 - Choisir le stade
                        physiologique</h3>
                    <div class="flex flex-row gap-4 justify-center lg:mx-4 lg:justify-center lg:my-2">

                        @foreach ($stades as $st)
                            <div class="flex-auto" wire:click=" setStade('{{ $st }}') ">
                                @include('components.param-oligo', [
                                    'abbreviation_courante' => $troupeau['stade'],
                                    'abbreviation' => $st,
                                    'parametre' => 'stade',
                                    'nom' => $st,
                                ])
                            </div>
                        @endforeach

                    </div>
                </div>

                <div id="parametres" class="my-3">
                    <h3 class="py-1 pl-2 bg-gray-300 text-vert-900 h3 lg:pl-0 lg:text-center">3 - Modifier les
                        paramètres</h3>
                    <div class="flex flex-col gap-3 p-2 my-1 bg-gray-300 lg:ml-4 lg:my:2">
                        <x-forms.input-number-change id="poids" model="troupeau.parametres.poids"
                            name="Poids moyen des animaux (kg)" />
                        @if ($troupeau['stade'] == 'gestation')
                            <x-forms.input-number-change id="prolificite" model="troupeau.parametres.prolificite"
                                step="0.1" name="Prolificité" />
                        @else
                            <x-forms.input-number-change id="production" model="troupeau.parametres.quantite"
                                step="0.1" name="Production laitière quotidienne (litres/jour)" />
                        @endif
                    </div>
                </div>
                <div id="besoins" class="grid grid-cols-2 my-3 divide-x-2 divide-y-2 divide-white h2">
                    <div class="col-span-2 px-2 py-3 bg-gray-400">
                        <h2>Les besoins (grammes/jour d'élément <span class="underline">absorbable</span>)</h2>
                    </div>
                    <div class="flex flex-col gap-1 items-center px-2 py-3 bg-blue-400">
                        <p>Phosphore</p>
                        <p>{{ $besoins['p'] }}</p>
                    </div>
                    <div class="flex flex-col gap-1 items-center px-2 py-3 bg-orange-400">
                        <p>Calcium</p>
                        <p>{{ $besoins['ca'] }}</p>
                    </div>
                </div>
            </div>

            <div id="ration">
                <div class="px-2 py-3 text-white bg-brique">
                    <h2 class="h2">La ration</h2>
                </div>
            </div>

        </div>


        <div id="apports" class="lg:w-1/2">
            <div id="bilan" class="mb-3">
                <div class="px-2 py-3 text-white bg-brique">
                    <h2 class="h2">Le bilan</h2>
                </div>
                <figure>
                    <div id="container" class="my-2"></div>
                </figure>
            </div>

            <div id="mineral">
                <div class="px-2 py-3 text-white bg-brique">
                    <h2 class="h2">Quel minéral</h2>
                </div>
            </div>

        </div>

    </div>
</div>

@push('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
@endpush
