{{-- Composant qui permet d'afficher une liste à choix multiple (relation ManyToMany) avec validation immédiate
les parametres sont les suivants (obligatoires sauf précision):
    - $fa: fontawesome correspondant à l'élément (optionnel) 
    - $nom: nom de l'élément concerné
    - $choix: Collection de la liste des choix possibles
    - $choisis: Array avec les choix déjà sélectionnés
    - $table: Nom de la table du modèle en relation  ManyToMany
 --}}
<div>

    <p class="py-3 text-gray-700"><i class="fa-solid {{ $fa ?? '' }}"></i> {{ $nom }}</p>
    {{-- On passe en revue les choix les uns après les autres --}}
    @foreach ($choix as $choi)
        {{-- Cas où le choix est dans la liste des choisis --}}
        @if (in_array($choi->id, $choisis))
            <div class="flex flex-row justify-between p-3 my-1 font-bold bg-gray-200 cursor-pointer group hover:font-normal hover:ring-2 hover:ring-red-600 active:ring-0 active:bg-red-900 active:text-white"
                wire:click="toggle({{ $choi->id}}, '{{ $table}}', 'detach' )" title="Enlever cet élément">
                <p>
                    {{ $choi->nom }}
                </p>
                <p class="hidden text-red-800 group-hover:block">
                    <i class="fa-solid fa-square-minus"></i>
                </p>
            </div>
        {{-- Cas ou le choix n'est pas dans la liste des éléments choisis --}}
        @else
            <div class="flex flex-row justify-between p-3 my-1 border cursor-pointer group hover:font-bold hover:ring-2 hover:ring-teal-600 active:ring-0 active:bg-teal-900 active:text-white"
                wire:click="toggle({{ $choi->id}}, '{{ $table}}', 'attach' )" title="Ajouter cet élément">
                <p>
                    {{ $choi->nom }}
                </p>
                <p class="hidden text-teal-800 group-hover:block">
                    <i class="fa-solid fa-square-plus"></i>
                </p>
            </div>
        @endif
    @endforeach

</div>