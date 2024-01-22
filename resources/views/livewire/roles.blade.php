<div>

    <x-titres.titre icone="formations_light.svg">Roles</x-titres.titre>

    <div class="flex flex-col gap-2 md:gap-6 md:flex-row">

        <div class="basis-full">
            @foreach ($roles as $role)
                <div class="flex flex-col p-6 my-3 bg-gray-300 shadow shadow-gray-800">

                    <p class="md:text-xl">{{ $role->name }}</p>

                    @if ($role->permissions->count() == 0)
                    <p class="italic text-gray-700">Aucune permission</p>
                        
                    @else
                        <p class="italic text-gray-700">Permissions: 
                            @foreach ($role->permissions as $permission)
                                <span class="px-2 not-italic md:text-lg">{{ $permission->name }}</span>
                            @endforeach
                        </p>
                        
                    @endif

                    <p class="italic text-gray-700">Utilisateurs:
                        @foreach ($role->users as $user)
                            <span class="px-2 not-italic md:text-lg">{{ $user->name }}</span>
                        @endforeach
                    </p>

                    <div class="flex flex-row gap-2 justify-start">
                        @if (!$updateMode)
                            <div wire:click="edit({{ $role->id }})">
                                <x-buttons.success-button><i class="fa-solid fa-pencil"></i>
                                    Modifier</x-buttons.success-button>
                            </div>
                        @else
                            <div wire:click="cancel">
                                <x-buttons.secondary-button><i class="fa-solid fa-pencil"></i>
                                    Annuler</x-buttons.secondary-button>
                            </div>
                        @endif

                        <div wire:click = "delete({{ $role->id }})" wire:confirm>
                            <x-buttons.danger-button><i class="fa-solid fa-trash"></i>
                                Supprimer</x-buttons.danger-button>
                        </div>

                    </div>

                </div>
            @endforeach

        </div>

        <div class="basis-full">
            @if ($updateMode)
                <x-roles.create-or-edit updateOrCreateTitre="Modification d'un rôle" placeholder="Modifier un rôle"
                    :items="$permissions" :liste="$listePerms" titre="Liste des permissions" bouton="Mettre à jour"
                    fa="fa-square-pen" updateOrCreateMethod="update" />
            @else
                <x-roles.create-or-edit updateOrCreateTitre="Ajout d'un nouveau rôle"
                    placeholder="Saisir un nouveau rôle" :items="$permissions" :liste="$listePerms"
                    titre="Liste des permissions" bouton="Créer" fa="fa-square-plus" updateOrCreateMethod="create" />
            @endif
        </div>
    </div>
</div>
