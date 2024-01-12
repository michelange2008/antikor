<div>

    <x-formations.formation-nav :previousformation="$previousFormation" :nextformation="$nextFormation" routedetail="formations.show"
        routeliste="formations.index" />

    @include('formations.form_show_detail')

    <div class="my-2">


        <a href="{{ route('formations.edit', $formation) }}">
            <x-buttons.success-button><i class="fa-solid fa-pencil"></i> Modifier</x-buttons.success-button>
        </a>


    </div>

</div>
