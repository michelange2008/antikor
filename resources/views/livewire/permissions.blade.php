<div>

    <x-titres.titre icone="formations_light.svg">Permissions</x-titres.titre>

    <div class="flex flex-col gap-2 md:gap-6 md:flex-row">

        <div class="basis-full">
            @foreach ($permissions as $permission)
                <div class="flex flex-col px-6 py-3 my-3 bg-gray-300 shadow shadow-gray-800">

                    <p class="md:text-xl">{{ $permission->name }}</p>
                    
                    <div class="flex flex-row gap-2 justify-start">

                        <div wire:click="edit({{ $permission->id }})">
                            <x-buttons.success-button><i class="fa-solid fa-pencil"></i>
                                Modifier</x-buttons.success-button>
                        </div>

                        <div wire:click = "delete({{ $permission->id }})" wire:confirm>
                            <x-buttons.danger-button><i class="fa-solid fa-trash"></i>
                                Supprimer</x-buttons.danger-button>
                        </div>

                    </div>
                    <p class="italic text-gray-700">Rôles associés:</p>
                    @foreach ($permission->roles as $role)
                        <div>
                            <p class="px-2 md:text-lg">{{ $role->name }} </p>
                        </div>
                    @endforeach

                </div>
            @endforeach
        </div>

        <div class="basis-full">
            @if ($updateMode)
                <x-roles.create-or-edit updateOrCreateTitre="Modification d'une permission"
                    placeholder="Modifier une permission" :items="$roles" :liste="$listeRoles" titre="Liste des rôles"
                    bouton="Mettre à jour" fa="fa-square-pen" updateOrCreateMethod="update" />
            @else
                <x-roles.create-or-edit updateOrCreateTitre="Ajout d'une nouvelle permission"
                    placeholder="Saisir un nouvelle permission" :items="$roles" :liste="$listeRoles"
                    titre="Liste des rôles" bouton="Créer" fa="fa-square-plus" updateOrCreateMethod="create" />
            @endif
        </div>

    </div>
</div>
