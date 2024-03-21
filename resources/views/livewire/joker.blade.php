<div>
    <form wire:submit="calculer">

        <label class="block">
            <span>2 + 2 = ?</span>
            <input class="input-form" type="number" wire:model='input'>
        </label>
        <button class="btn btn-success">Valider</button>
    </form>
    @if ($resultat)
        <p>Bravo</p>
    @endif
</div>
