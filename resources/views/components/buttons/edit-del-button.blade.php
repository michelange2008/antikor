{{-- Composant affichant un bouton modifier et un bouton supprimer qui appellent respectivement
    les fonctions edit et delete d'un composant livewire parent
    Quand on est en mode edit, le bouton "modifier" est remplacé par le bouton "annuler"
    permettant de revenir en mode create
    Variable à passer:
        - $item: objet du model à modifier ou créer
        - $updateMode: bool true si en mode edit, false en mode create
--}}

<div class="flex flex-row gap-2">
    @if ($updateMode)
        <div wire:click="cancel">
            <x-buttons.secondary-button><i class="fa-solid fa-pencil"></i>
                Annuler</x-buttons.secondary-button>
        </div>
    @else
        <div wire:click="edit({{ $item->id }})">
            <x-buttons.success-button><i class="fa-solid fa-pencil"></i> Modifier</x-buttons.success-button>
        </div>
    @endif

    <div wire:click="delete({{ $item->id }})" wire:confirm>
        <x-buttons.danger-button><i class="fa-solid fa-trash"></i> Supprimer</x-buttons.danger-button>
    </div>
</div>
