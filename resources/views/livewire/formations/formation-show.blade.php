<div>

    <x-formations.formation-nav :previousformation="$previousFormation" :nextformation="$nextFormation" routedetail="formations.show"
        routeliste="formations.index" />

    <x-formations.formation-show-detail :formation="$formation" :programme="$programme" />

    @hasrole('antikor')
        <div class="my-2">
            <x-buttons.route-success-button :route="route('formations.edit', $formation)" fa="pencil">Modifier</x-buttons.route-success-button>
        </div>
    @endhasrole

</div>
