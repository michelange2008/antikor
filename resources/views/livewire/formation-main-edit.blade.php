<div>
    
    <div id="elements_principaux" class = "grid grid-cols-3 grid-rows-2 gap-2 mb-3">

        <div>
            <x-forms.input-text-blur name="Nom" :champs="$form->name" model='form.name'
                id="name"></x-forms.input-text-blur>
        </div>

        <div class="order-3">
            <x-forms.input-text-blur name="Sous-titre" :champs="$form->subname" model='form.subname'
                id='subname'></x-forms.input-text-blur>
        </div>

        <div class="col-span-2 row-span-2">
            <x-forms.textarea-blur name="Contexte" :champs="$form->contexte" model='form.contexte'
                id="contexte"></x-forms.textarea-blur>
        </div>

    </div>

    <div id="especes">
        <x-formations.formation-especes :especes="$especes" :listespeces="$listespeces"></x-formations.formation-especes>
    </div>

    <div id="duree-stag-interv" class="grid grid-cols-3 gap-1 my-3 lg:gap-2 xl:gap-5">

        <div id="duree_formation">

            <x-forms.select-change label="Durée de la formation" fa='fa-clock' id="duree" name="duree_id"
                model="form.duree_id" :options="$durees" champ="nom" :compareId="$form->duree_id">
            </x-forms.select-change>

        </div>
        <div id="stagiaire_formation">

            <x-forms.select-change label="Stagiaires" fa='fa-people-group' id="stagiaire" name="stagiaire_id"
                model="form.stagiaire_id" :options="$stagiaires" champ="nom" :compareId="$form->stagiaire_id">
            </x-forms.select-change>

        </div>
        <div id="intervenant_formation">

            <x-forms.select-change label="Intervenant" fa="fa-user" id="intervenant" name="intervenant_id"
                model="form.intervenant_id" :options="$intervenants" champ="nom" :compareId="$form->intervenant_id">
            </x-forms.select-change>

        </div>

    </div>
    <hr class="border-t-4">
    <div id="mod-pedago-doc" class="my-3">

        <div class="grid grid-cols-3 gap-1 lg:gap-2 xl:gap-5">

            <div id="modalites">
                <x-formations.formation-liste-choix fa="fa-warehouse" nom="Modalités" table="modalites"
                    :choix="$modalites" :choisis="$form->formation_modalites">
                </x-formations.formation-liste-choix>
            </div>

            <div id="pedagogies">
                <x-formations.formation-liste-choix fa="fa-graduation-cap" nom="Pédagogie" table="pedagogies"
                    :choix="$pedagogies" :choisis="$form->formation_pedagogies">
                </x-formations.formation-liste-choix>
            </div>

            <div id="documents">
                <x-formations.formation-liste-choix fa="fa-book-open" nom="Documents" table="documents"
                    :choix="$documents" :choisis="$form->formation_documents">
                </x-formations.formation-liste-choix>
            </div>

        </div>

    </div>

</div>
