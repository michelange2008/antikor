<div>

    <h1 class="h2 my-3">Besoins des animaux vs valeurs d'un complément en oligo-éléments</h1>

    <div id="espece">
        <h3 class="h3 my-1">Choisir le type de production</h3>
        <div class="flex flex-row gap-3">

            @include('components.param-oligo', [
                'param' => $espece,
                'val' => 'cp',
                'parametre' => 'espece',
                'valeur' => 'Chèvres',
            ])


            @include('components.param-oligo', [
                'param' => $espece,
                'val' => 'oa',
                'parametre' => 'espece',
                'valeur' => 'Brebis allaitantes',
            ])

        </div>
    </div>
    <div id="stade">
        <div id="stade_chevre">
            <h3 class="h3 my-1">Choisir le stade physiologique</h3>
            <div class="flex flex-row gap-3">
                    {{-- <div class="m-2 py-3 px-4 bg-gray-300 shadow shadow-gray-800 active:bg-gray-800 active:text-white">
                        Gestation</div>
                    <p class="m-2 py-3 px-4 bg-gray-300 shadow shadow-gray-800 active:bg-gray-800 active:text-white">
                        Lactation</p> --}}

                @include('components.param-oligo', [
                    'param' => $stade,
                    'val' => 'ge',
                    'parametre' => 'stade',
                    'valeur' => 'Gestation',
                ])


                @include('components.param-oligo', [
                    'param' => $stade,
                    'val' => 'la',
                    'parametre' => 'stade',
                    'valeur' => 'Lactation',
                ])

            </div>
        </div>
    </div>
</div>
