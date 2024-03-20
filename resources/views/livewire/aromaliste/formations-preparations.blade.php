<div x-data="{ formationId: @entangle('formationId') }">
    <x-titres.titre icone="sirop.svg">Formations et préparations</x-titres.titre>

    <div class="gap-3 justify-between lg:flex lg:flex-row">

        <div id="formations" class="basis-1/2">
            @foreach ($formations as $formation)
                <div x-show="formationId == {{ $formation->id }}"
                    class="flex flex-row gap-2 items-center p-3 my-2 shadow cursor-pointer shadow-gray-700 bg-vert-100 hover:font-bold hover:bg-vert-300 active:bg-vert-700 active:text-white">
                    <img class="h-10 active:brightness-20" src="{{ url('storage/img/icones/' . $formation->icone) }}"
                        alt="{{ $formation->name }}">
                    <p>{{ $formation->name }} ({{ $formation->subname }}) </p>
                </div>
                <div x-show=" formationId != {{ $formation->id }}" wire:click="choisitFormation({{ $formation->id }})"
                    class="flex flex-row gap-2 items-center p-3 my-2 bg-gray-200 cursor-pointer hover:font-bold hover:bg-gray-300 active:bg-gray-500 active:text-white active:brightness-150">
                    <img class="h-10" src="{{ url('storage/img/icones/' . $formation->icone) }}"
                        alt="{{ $formation->name }}">
                    <p>{{ $formation->name }} ({{ $formation->subname }}) </p>
                </div>
            @endforeach

        </div>

        <div id="preparations" class="basis-1/2">
            @foreach ($preparations as $preparation)
                @if ($formationPreparations->contains($preparation))
                    <div wire:click="enlevePreparation({{ $preparation->id }})"
                        class="flex flex-row gap-2 items-center p-3 my-2 bg-orange-200 shadow cursor-pointer shadow-gray-700 hover:font-bold hover:bg-orange-300 active:bg-orange-700 active:text-white">
                        <img class="h-10 active:brightness-20"
                            src="{{ url('storage/img/icones/' . $preparation->icone) }}" <p>{{ $preparation->name }}
                        </p>
                    </div>
                @else
                    <div wire:click="ajoutePreparation({{ $preparation->id }})"
                        class="flex flex-row gap-2 items-center p-3 my-2 text-gray-700 bg-gray-100 border border-gray-300 cursor-pointer hover:font-bold hover:bg-gray-300 active:bg-gray-700 active:text-white">
                        <img class="h-10 saturate-0 active:brightness-20"
                            src="{{ url('storage/img/icones/' . $preparation->icone) }}" <p>{{ $preparation->name }}
                        </p>
                    </div>
                @endif
            @endforeach
        </div>

    </div>
</div>
