<div x-data="{ updateMode: @entangle('updateMode') }">

    <x-titres.titre icone="formations_light.svg">Roles</x-titres.titre>

    <div class="flex flex-col gap-3 md:gap-12 md:flex-row">

        <div class="basis-full">
            @foreach ($roles as $role)
                <div class="flex flex-col p-6 my-3 bg-gray-300 shadow shadow-gray-800">
                    <p class="md:text-xl">{{ $role->name }}</p>
                    <div class="flex flex-row gap-2 justify-start">

                        <div wire:click="edit({{ $role->id }})">
                            <x-buttons.success-button><i class="fa-solid fa-pencil"></i>
                                Modifier</x-buttons.success-button>
                        </div>

                        <div wire:click = "delete({{ $role->id }})" wire:confirm>
                            <x-buttons.danger-button><i class="fa-solid fa-trash"></i>
                                Supprimer</x-buttons.danger-button>
                        </div>

                    </div>

                    @foreach ($role->permissions as $permission)
                        <div>
                            <p>{{ $permission->name }} </p>
                        </div>
                    @endforeach

                </div>
            @endforeach
        </div>

        <div class="basis-full">
            <div x-show="updateMode" x-cloak>
                {{-- <div class="flex flex-col p-4 my-3 bg-gray-300 shadow shadow-gray-800">
                    <p class="px-1 font-bold"></p>
                    <div class="-mt-4">
                        <div>
                            <x-forms.input-text-save id="name" name="" placeholder="Modifier un rôle"
                                :model="'name'" />

                            <x-roles.toggle-perm-role :permissions="$permissions" :listePerms="$listePerms"
                                titre="Liste des permissions" />

                            <div wire:click.prevent = "update">
                                <x-buttons.success-button>
                                    <i class="fa-solid fa-square-pen"></i> Mettre à jour
                                </x-buttons.success-button>
                            </div>

                        </div>
                    </div>
                </div> --}}
                {{-- <x-roles.create-or-edit updateOrCreateTitre="Modification d'un rôle" placeholder="Modifier un rôle"
                    :permissions="$permissions" :listePerms="$listePerms" titre="Liste des permissions" bouton="Mettre à jour"
                    fa="fa-square-pen" updateOrCreateMethod="update" /> --}}
            </div>
            {{-- Créer un nouveau rôle avec updateMode = false --}}
            <div x-show="!updateMode" x-cloak>
                <x-roles.create-or-edit updateOrCreateTitre="Ajout d'un nouveau rôle"
                    placeholder="Saisir un nouveau rôle" :permissions="$permissions" :listePerms="$listePerms"
                    titre="Liste des permissions" bouton="Créer" fa="fa-square-plus" updateOrCreateMethod="create" />
            </div>
        </div>
    </div>
</div>