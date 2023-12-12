<x-app-layout>

    @include('formations.form_nav', [
        'route' => 'formations.show',
        'route_liste' => 'formations.index'
    ])

    @include('formations.form_show_detail')

    <div class="m-2">


        <a href="{{ route('formations.edit', $formation) }}">
            <x-buttons.success-button>Modifier</x-buttons.success-button>
        </a>


    </div>


</x-app-layout>
