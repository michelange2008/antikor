{{-- -> FormationController pour admin connecté --}}
<x-app-layout>

    @include('formations.form_nav', [
        'route_detail' => 'formations.show',
        'route_liste' => 'formations.index'
    ])

    @include('formations.form_show_detail')

    <div class="my-2">


        <a href="{{ route('formations.edit', $formation) }}">
            <x-buttons.route-success-button :route="route('formations.edit', $formation)" fa="fa-pencil">Modifier</x-buttons.route-success-button>
        </a>


    </div>


</x-app-layout>
