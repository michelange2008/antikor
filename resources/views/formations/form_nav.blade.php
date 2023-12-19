{{-- ->form-show_guest si guest non connecté et form_show_admin si admin connecté d'où
les variables $route_detail et $route_liste différente selon le type d'utilisateur --}}
<div class="my-2">

    @if ($previous_formation != null)
        <a href="{{ route($route_detail, $previous_formation) }}">
            <x-buttons.generic-button :color="'teal'">
                < Préc. </x-buttons.generic-button>
        </a>
    @endif

    <a href="{{ route($route_liste) }}">
        <x-buttons.generic-button :color="'gray'">Retour à la liste</x-buttons.generic-button>
    </a>

    @if ($next_formation != null)
        <a href="{{ route($route_detail, $next_formation) }}">
            <x-buttons.generic-button :color="'teal'">Suiv. ></x-buttons.generic-button>
        </a>
    @endif

</div>
