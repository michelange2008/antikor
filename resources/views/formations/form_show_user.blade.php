<x-guestin-layout>

    @include('formations.form_nav', [
        'route' => 'front.formationShow',
        'route_liste' => 'front.formations',
    ])

    @include('formations.form_show_detail')

</x-guestin-layout>
