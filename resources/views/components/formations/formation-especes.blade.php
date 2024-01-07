{{-- Composant pour la modification des espèces concernées par une formation
    les paramètres sont les suivants:
        - $especes: Liste des espèces possibles
        - $listespeces: Tableau contenant les id d'espèces déjà inclus dans la formation
La méthode toggle détermine l'action à mener en fonction du parametre true (espece déjà présente qu'il faut enlever)
ou false (espece non présent qu'il faut rajouter)
Ensuite, en fonction du composant Livewire d'orgine la méthode qui en découle diffère (attach/detach en cas de modif)

    --}}
<div class="flex flex-row gap-3 justify-between p-3 my-3 border-2">
    @foreach ($especes as $espece)
        @if (in_array($espece->id, $listespeces))
            <div class="p-2 rounded-3xl ring-2 ring-teal-600 hover:font-bold hover:bg-stone-300" title="Cliquer pour desélectionner"
                wire:click="toggle({{$espece->id}}, true, 'especes', 'listespeces')"
                >
                <img class="block m-auto h-20" src="{{ url('storage/img/formations/icones/' . $espece->icone) }}"
                    alt="">
                <p class="text-center">{{ $espece->name }}</p>
            </div>
        @else
            <div class="p-2 rounded-3xl hover:font-bold hover:bg-stone-300" title="Cliquer pour sélectionner"
                wire:click="toggle({{$espece->id}}, false, 'especes', 'listespeces')"
            >
                <img class="block p-1 m-auto h-20 grayscale"
                    src="{{ url('storage/img/formations/icones/' . $espece->icone) }}" alt="">
                <p class="text-center">{{ $espece->name }}</p>
            </div>
        @endif
    @endforeach

</div>
