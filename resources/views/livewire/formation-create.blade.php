<div>

    <x-titres.titre icone="formations_light.svg">Nouvelle formation</x-titres.titre>

    <form wire:submit="create"">

        <x-forms.input-file name="Icone" :model="'formation.icone'" />
        <x-forms.input-text-save id="nom" name="Nom" :model="'formation.name'" />
        <x-forms.input-text-save id="soustitre_nom" name="Sous-titre" :model="'formation.subname'" />
        <x-forms.textarea-save id="contexte" name="Contexte" :model="'formation.contexte'" />

        <x-formations.formation-especes :especes="$especes" :listespeces="$listespeces" />

        <div id="duree-stag-interv" class="grid grid-cols-3 gap-1 my-3 lg:gap-2 xl:gap-5">

            <div id="duree_formation">

                <x-forms.select-save label="Durée de la formation" fa='fa-clock' id="duree" name="duree_id"
                    model="formation.duree_id" :options="$durees" champ="nom">
                </x-forms.select-save>

            </div>
            <div id="stagiaire_formation">

                <x-forms.select-save label="Stagiaires" fa='fa-people-group' id="stagiaire" name="stagiaire_id"
                    model="formation.stagiaire_id" :options="$stagiaires" champ="nom">
                </x-forms.select-save>

            </div>
            <div id="intervenant_formation">

                <x-forms.select-save label="Intervenant" fa="fa-user" id="intervenant" name="intervenant_id"
                    model="formation.intervenant_id" :options="$intervenants" champ="nom">
                </x-forms.select-save>

            </div>
        </div>

        <hr class="border-t-4">
        <div id="mod-pedago-doc" class="my-3">

            <div class="grid grid-cols-3 gap-1 lg:gap-2 xl:gap-5">

                <x-formations.mod-pedago-doc table="modalites" nom="Modalites" fa="fa-warehouse" :choix="$modalites"
                    :liste="$listeModalites" nomListe="listeModalites" />

                <x-formations.mod-pedago-doc table="pedagogies" nom="Pedagogies" fa="fa-warehouse" :choix="$pedagogies"
                    :liste="$listePedagogies" nomListe="listePedagogies" />

                <x-formations.mod-pedago-doc table="documents" nom="Documents" fa="fa-warehouse" :choix="$documents"
                    :liste="$listeDocuments" nomListe="listeDocuments" />


            </div>

        </div>

        <x-buttons.success-button>Enregistrer et continuer</x-buttons.success-button>
        <a href="{{ route('formations.index') }}">
            <x-buttons.secondary-button>Retour</x-buttons.secondary-button>
        </a>
    </form>

</div>
