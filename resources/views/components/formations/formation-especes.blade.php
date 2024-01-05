{{-- Composant pour la modification des espèces concernées par une formation
    les paramètres sont les suivants:
        - $nom: nom de l'élément concerné
        - $especes: Liste des espèces possibles
        - $form: Formation en cours de modification
La méthode toggle (de FormationMainEdit) permet d'attacher ou détacher de la table pivot
l'espèce à la formation en fonction du paramètre attach ou detach
    --}}
<div class="flex flex-row gap-3 justify-between p-3 my-3 border-2">
    @foreach ($especes as $espece)
        @if (in_array($espece->id, $form->formation_especes))
            <button class="p-2 rounded-3xl ring-2 ring-teal-600 hover:font-bold hover:bg-stone-300" title="Cliquer pour desélectionner"
                wire:click="toggle({{ $espece->id }}, 'especes', 'detach')">
                <img class="block m-auto h-20" src="{{ url('storage/img/formations/icones/' . $espece->icone) }}"
                    alt="">
                <p class="text-center">{{ $espece->name }}</p>
            </button>
        @else
            <button class="p-2 rounded-3xl hover:font-bold hover:bg-stone-300" title="Cliquer pour sélectionner"
                wire:click="toggle({{ $espece->id }}, 'especes', 'attach')">
                <img class="block p-1 m-auto h-20 grayscale"
                    src="{{ url('storage/img/formations/icones/' . $espece->icone) }}" alt="">
                <p class="text-center">{{ $espece->name }}</p>
            </button>
        @endif
    @endforeach

</div>
