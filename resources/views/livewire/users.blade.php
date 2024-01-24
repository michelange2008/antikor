<div x-data="{ updateMode: @entangle('updateMode'), el: -1 }">

    <x-titres.titre icone="public.svg">Utilisateurs</x-titres.titre>

    <div class="flex flex-col gap-2 md:flex-row md:gap-4">

        <div class="flex-auto">
            @foreach ($users as $user)
                <div x-show="el == -1 || el == {{ $loop->index }}" class="my-3 p-4 shadow shadow-gray-700 bg-gray-300">
                    <h1 class="h3">{{ $user->name }}</h1>
                    <p>{{ $user->email }}</p>
                    @foreach ($user->roles as $role)
                        <p class="italic">{{ $role->name }}</p>
                    @endforeach

                    <div class="flex flex-row gap-2">

                        <div x-cloak x-show = " el == {{ $loop->index }}" wire:click="cancel"
                            x-on:click="el = -1">
                            <x-buttons.secondary-button><i class="fa-solid fa-pencil"></i>
                                Annuler</x-buttons.secondary-button>
                        </div>

                        <div x-cloak x-show = " el != {{ $loop->index }}" wire:click="edit({{ $user->id }})"
                            x-on:click="el = {{ $loop->index }}">
                            <x-buttons.success-button><i class="fa-solid fa-pencil"></i>
                                Modifier</x-buttons.success-button>
                        </div>

                        <div wire:click="delete({{ $user->id }})" wire:confirm>
                            <x-buttons.danger-button><i class="fa-solid fa-trash"></i>
                                Supprimer</x-buttons.danger-button>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

        <div class="flex-auto">

            <div class="my-3 p-4 shadow shadow-gray-700 bg-gray-300">

                @if ($updateMode)
                    <h1 class="h3">Modification d'un utilisateur</h1>

                    <form wire:submit="update">
                        <x-forms.input-text-save :id="'id'" name="Nom" :model="'name'" />
                        <x-forms.input-text-save id="nouveau_email" name="Email (non modifiable)" :model="'email'"
                            :disabled="true" />

                        <x-toggle-liste :items="$roles" :liste="$rolesUser" titre="Roles" />

                        <div x-on:click = " el = -1 ">
                            <x-buttons.success-button><i class="fa-solid fa-square-pen"></i> Mettre à
                                jour</x-buttons.success-button>
                        </div>
                    </form>
                @else
                    <h1 class="h3">Ajout d'un utilisateur</h1>

                    <form wire:submit="create">
                        <x-forms.input-text-save id="nouveau" name="Nom" :model="'name'" />
                        <x-forms.input-email-save id="nouveau_email" name="Email" :model="'email'" />
                        <x-forms.input-password-save id="password" name="password" intitule="Mot de passe"
                            :model="'password'" />
                        <x-forms.input-password-save id="password_confirmation" name="password_confirmation"
                            intitule="Confirmation du mot de passe" :model="'password_confirmation'" />

                        <x-toggle-liste :items="$roles" :liste="$rolesUser" titre="Roles" />

                        <x-buttons.success-button><i class="fa-solid fa-square-plus"></i>
                            Enregistrer</x-buttons.success-button>
                    </form>
                @endif

            </div>
        </div>
    </div>
</div>
