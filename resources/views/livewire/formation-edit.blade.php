<div x-data="{ alerte: false }" @click.window=" alerte = false">
    <div class="flex flex-row gap-2 items-center">
        <div class="flex-auto">
            <x-titres.titre :icone="$formation->icone">{{ $formation->name }}</x-titres.titre>
        </div>
        <div class="mr-2 w-10 h-10 bg-teal-900 rounded" :class="{ 'rotate-45': alerte }" 
            x-on:formation_updated.window="alerte = !alerte"></div>
    </div>
    <div id="main" class="my-2">

        <livewire:formation-main-edit :formation="$formation" />

    </div>
    <hr class="border-t-8">

    <div id="objectifs" class="my-3">
        <p class="font-bold">Objectifs pédagogiques</p>
        
        @foreach ($objectifs_pedago as $objectif)
            <p>{{ $objectif->nom }}</p>
        @endforeach
    </div>

    <hr class="border-t-8">
    <div id="programme" class="my-3">
        <p class="font-bold">Programme</p>
        @foreach ($programmesoustitres as $programmesoustitre)
            <div class="px-3 my-2 border">

                <livewire:programme-soustitre-edit :programmesoustitre="$programmesoustitre" :formation_id="$formation->id"
                    :wire:key="time().$programmesoustitre->id" />

                <div id="detail" class="ml-6">
                    @foreach ($programmedetails as $programmedetail)
                        @if ($programmedetail->programmesoustitre_id == $programmesoustitre->id)
                            <livewire:programme-detail-edit :programmedetail="$programmedetail" :formation_id="$formation->id"
                                :wire:key="$programmedetail->id">
                        @endif
                    @endforeach

                    <livewire:programme-detail-create :programmesoustitre_id="$programmesoustitre->id">

                </div>
            </div>
        @endforeach

        <livewire:programme-soustitre-create :programmesoustitre="$programmesoustitre" :formation_id="$formation->id" />

    </div>

</div>
