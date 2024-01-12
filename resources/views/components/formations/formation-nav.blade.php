{{-- ->form-show_guest si guest non connecté et form_show_admin si admin connecté d'où
les variables $route_detail et $route_liste différente selon le type d'utilisateur --}}
<div class="my-2">

    @if ($previousformation != null)
        <a href="{{ route($routedetail, $previousformation) }}">
            <x-buttons.generic-button :color="'teal'">
                < Préc. </x-buttons.generic-button>
        </a>
    @endif

    <a href="{{ route($routeliste) }}">
        <x-buttons.generic-button :color="'gray'">Retour à la liste</x-buttons.generic-button>
    </a>

    @if ($nextformation != null)
        <a href="{{ route($routedetail, $nextformation) }}">
            <x-buttons.generic-button :color="'teal'">Suiv. ></x-buttons.generic-button>
        </a>
    @endif

</div>
