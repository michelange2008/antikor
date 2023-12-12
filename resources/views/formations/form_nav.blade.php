<div class="mx-2 my-5">

    @if ($previous_formation != null)
    <a href="{{ route($route, $previous_formation) }}">
        <x-buttons.generic-button :color="'teal'">
                < Préc. </x-buttons.generic-button>
            </a>
            @endif
            
            <a href="{{ route($route_liste)}}">
                <x-buttons.generic-button :color="'gray'">Retour à la liste</x-buttons.generic-button>
            </a>
            
            @if ($next_formation != null)
            <a href="{{ route($route, $next_formation) }}">
            <x-buttons.generic-button :color="'teal'">Suiv. ></x-buttons.generic-button>
        </a>
        @endif
        
    </div>
