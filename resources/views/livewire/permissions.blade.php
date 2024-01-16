<div x-data="{ updateMode: @entangle('updateMode') }">

    <x-titres.titre icone="formations_light.svg">Roles</x-titres.titre>

    <div class="flex flex-col gap-3 md:gap-12 md:flex-row">

        <div class="basis-full">
            @foreach ($permissions as $permission)
                <div class="flex flex-col p-6 my-3 bg-gray-300 shadow shadow-gray-800">
                    <p>Nom: <span class="font-bold">{{ $permission->name }}</span></p>
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
                </div>
            @endforeach
        </div>

        <div class="basis-full">
            <div class="flex flex-col p-4 my-3 bg-gray-300 shadow shadow-gray-800">
                <p class="px-1 font-bold">Ajout ou modification d'un rôle</p>
                <div class="-mt-4">
                    <div x-show="updateMode" x-cloak>
                        <x-forms.input-text-save id="name" name="" placeholder="Modifier un rôle"
                            :model="'name'" />
                        <div wire:click.prevent = "update">
                            <x-buttons.success-button>
                                <i class="fa-solid fa-square-pen"></i> Mettre à jour
                            </x-buttons.success-button>
                        </div>

                    </div>
                    {{-- Créer un nouveau rôle avec updateMode = false --}}
                    <div x-show="!updateMode" x-cloak>
                        <x-forms.input-text-save id="name" name="" placeholder="Saisir un nouveau rôle"
                            :model="'name'" />
                        <div wire:click.prevent = "save">
                            <x-buttons.success-button>
                                <i class="fa-solid fa-square-plus"></i> Créer
                            </x-buttons.success-button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
