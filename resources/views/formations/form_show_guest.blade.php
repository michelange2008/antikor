{{-- -> FrontController: ce qui explique le paramètre dans le menu navigation
    entre les différentes formations qui correspond à un guest non connecté --}}
<x-guestin-layout>

    @include('formations.form_nav', [
        'route_detail' => 'front.formationShow', // Permet de passer à une autre formation, prec ou suiv
        'route_liste' => 'front.formations',// retour à la liste des formations
    ])

    @include('formations.form_show_detail')

</x-guestin-layout>
