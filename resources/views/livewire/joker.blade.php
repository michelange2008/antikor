<div>
    <form wire:submit="calculer">

        <label class="block">
            <span>2 + 2 = ?</span>
            <input required class="input-form" type="number" wire:model='input'>
        </label>
        <div>
            <input class="" type="checkbox" wire:model="choix.bleu" value="bleu">Bleu
            <input class="" type="checkbox" wire:model="choix.rouge" value="bleu">Rouge
        </div>
        <button class="btn btn-success">Valider</button>
    </form>
    @if ($fin)
        @if ($resultat['calcul'])
            <p class="text-green-700">Bravo</p>
        @else
            <p class="font-bold text-red-700">Tout faux</p>
        @endif
    @endif
</div>
