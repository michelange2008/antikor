{{-- -> FrontController: ce qui explique le paramètre dans le menu navigation
    entre les différentes formations qui correspond à un guest non connecté --}}
<x-guestin-layout>

    <x-formations.formation-nav :previousformation="$previousFormation" :nextformation="$nextFormation" routedetail="formations.show"
        routeliste="front.formations" />

    <x-formations.formation-show-detail :formation="$formation" :programme="$programme" />


</x-guestin-layout>
