{{-- Fiche descriptive d'une formation: partie gauche sous forme de cartouche vertical qui s'affiche en grand écran --}}

<div class="flex">
    @foreach ($formation->especes as $espece)
        <img class="w-16 md:w-4/12 lg:w-3/12" src="{{ url('storage/img/icones/' . $espece->icone) }}"
            alt="{{ $espece->name }}" title="{{ $espece->name }}">
    @endforeach
</div>

{{-- l'attribut multiple renvoie au fait qu'il y a plusieurs éléments à lister (relation belongsToMany) --}}
<div class="grid grid-cols-2 gap-1 mt-1 md:grid-flow-col md:flex md:flex-col md:gap-3">
    <x-formations.formation-modalites icone="duree.svg" titre="Durée" :texte="$formation->duree->nom" multiple="0" />
    <x-formations.formation-modalites icone="public.svg" titre="Public" :texte="$formation->stagiaire->nom" multiple="0" />
    <x-formations.formation-modalites icone="intervenant.svg" titre="Intervenant" :texte="$formation->intervenant->nom" multiple="0" />
    <x-formations.formation-modalites icone="modalites.svg" titre="Modalités" :texte="$formation->modalites" multiple="1" />
    <x-formations.formation-modalites icone="pedagogie.svg" titre="Pédagogie" :texte="$formation->pedagogies" multiple="1" />
    <x-formations.formation-modalites icone="documents.svg" titre="Documents remis au stagiaires" :texte="$formation->documents"
        multiple="1" />
</div>
