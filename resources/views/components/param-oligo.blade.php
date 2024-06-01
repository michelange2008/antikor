        {{-- Utilisé par oligos.blade.php
            Affiche un bouton qui n'a pas le même aspect si le parametre
            en cause (espece, atelier, stade) est non-choisi/choisi
            - Non choisi: gris clair avec curseur main
            - Choisi: vert foncé avec texte balnc et curseur main
            --}}
        @if ( $element_courant == $element )
            <div id="{{ $element }}"
                class="px-2 py-2 my-2 text-sm text-center text-white shadow cursor-pointer md:py-3 md:px-4 active:bg-gray-800 active:text-white md:text-base bg-vert-700 shadow-vert-900"
                title="" >

                <span>{{ ucfirst( __('oligos.'.$element) ) }}</span>

            </div>
        @else
            <div id="{{ $element }}"
                class="px-2 py-2 my-2 text-sm text-center bg-gray-300 shadow cursor-pointer md:py-3 md:px-4 active:bg-gray-800 active:text-white md:text-base shadow-gray-800"
                title="Cliquer pour sélectionner">

                <span>{{ ucfirst( __('oligos.'.$element) ) }}</span>

            </div>
        @endif
