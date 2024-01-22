<div x-data="{ updateMode: @entangle('UupdateMode') }">

    <x-titres.titre icone="public.svg">Utilisateurs</x-titres.titre>

    <div class="flex flex-col gap-2 md:flex-row md:gap-4">

        <div class="flex-auto">
            @foreach ($users as $user)
                <div class="my-3 p-4 shadow shadow-gray-700 bg-gray-300">
                    <h1 class="h3">{{ $user->name }}</h1>
                    <p>{{ $user->email }}</p>
                    @foreach ($user->roles as $role)
                        <p class="italic">{{ $role->name }}</p>
                    @endforeach

                    <x-buttons.edit-del-button :item="$user" :updateMode="$updateMode" />
                </div>
            @endforeach
        </div>

        <div class="flex-auto">

            <div class="my-3 p-4 shadow shadow-gray-700 bg-gray-300">

                @if ($updateMode)
                    <h1 class="h3">Modification d'un utilisateur</h1>

                    <form wire:submit="update">
                        <x-forms.input-text-save :id="'id'" name="Nom" :model="'name'" />
                        <x-forms.input-text-save id="nouveau_email" name="Email (non modifiable)" :model="'email'" :disabled="true" />

                        <x-toggle-liste :items="$roles" :liste="$rolesUser" titre="Roles" />

                        <x-buttons.success-button><i class="fa-solid fa-square-pen"></i> Mettre à jour</x-buttons.success-button>
                    </form>
                @else
                    <h1 class="h3">Ajout d'un utilisateur</h1>

                    <form wire:submit="create">
                        <x-forms.input-text-save id="nouveau" name="Nom" :model="'name'" />
                        <x-forms.input-email-save id="nouveau_email" name="Email" :model="'email'"  />
                        <x-forms.input-password-save id="password" name="password" intitule="Mot de passe"
                            :model="'password'" />
                        <x-forms.input-password-save id="password_confirmation" name="password_confirmation"
                            intitule="Confirmation du mot de passe" :model="'password_confirmation'" />

                        <x-toggle-liste :items="$roles" :liste="$rolesUser" titre="Roles" />

                        <x-buttons.success-button><i class="fa-solid fa-square-plus"></i> Enregistrer</x-buttons.success-button>
                    </form>
                @endif

            </div>
        </div>
    </div>
</div>
