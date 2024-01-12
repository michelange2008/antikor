<div x-data="{ alerte: false }" @click.window=" alerte = false">
    <div class="flex flex-row gap-2 items-center">
        <div class="flex-auto">
            <x-titres.titre :icone="$formation->icone">{{ $formation->name }}</x-titres.titre>
        </div>
        <div class="mr-2 w-10 h-10 bg-teal-900 rounded" :class="{ 'rotate-45': alerte }"
            x-on:formation_updated.window="alerte = !alerte"></div>
    </div>
    <div id="main" class="my-2">

        <livewire:formations.formation-main-edit :formation="$formation" />

    </div>
    <hr class="border-t-8">

    <div id="objectifs" class="my-3">
        <p class="text-xl font-bold">Objectifs pédagogiques</p>
        <div class="px-3 pb-2 my-3 border">

            @foreach ($objectifs_pedago as $objectif)
                <livewire:formations.formation-objectifs :objectif="$objectif" :wire:key="'objectif_'.$objectif->id" />
            @endforeach
            <livewire:formations.formation-objectif-create :formation_id="$formation->id" />

        </div>

    </div>

    <hr class="border-t-8">

    <div id="programme" class="my-3">
        <p class="text-xl font-bold">Programme</p>
        @foreach ($programmesoustitres as $programmesoustitre)
            <div class="px-3 my-2 border">

                <livewire:formations.programme-soustitre-edit id_item="{{ $programmesoustitre->id }}" :programmesoustitre="$programmesoustitre"
                    :formation_id="$formation->id" :wire:key="'soustitre_'.$programmesoustitre->id" />

                <div id="detail" class="ml-6">
                    @foreach ($programmedetails as $programmedetail)
                        @if ($programmedetail->programmesoustitre_id == $programmesoustitre->id)
                            <livewire:formations.programme-detail-edit id_item="{{ $programmedetail->id }}" :programmedetail="$programmedetail" :formation_id="$formation->id"
                                :wire:key="'detail_'.$programmedetail->id">
                        @endif
                    @endforeach

                    <livewire:formations.programme-detail-create id_item="{{ $programmedetail->id }}" :programmesoustitre_id="$programmesoustitre->id"
                        :wire:key="'detail_create'.time()">

                </div>
            </div>
        @endforeach

        <livewire:formations.programme-soustitre-create :id="'nouveau'" :programmesoustitre="$programmesoustitre" :formation_id="$formation->id" />

    </div>

    <hr class="border-t-8">
    <div class="my-5">
        <x-buttons.success-button>
            <a href="{{ route('formations.show', $formation) }}">
                <i class="fa-solid fa-angles-left"></i> Retour
            </a>
        </x-buttons.success-button>
    </div>
</div>
