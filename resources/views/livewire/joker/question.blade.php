<div>
    <p>Ajouter une question</p>
    @foreach ($questions as $question)
        <p>{{ $question['texte'] }} : {{ $question['valeur'] }} </p>
    @endforeach
    <form wire:submit="creeQuestion">
        <textarea wire:model="texte" placeholder="question"></textarea>
        <input type="radio" wire:model="valeur" placeholder="vraifaux" value="vrai">Vrai
        <input type="radio" wire:model="valeur" placeholder="vraifaux" value="faux">Faux
        <button type="submit" class="btn btn-success">Valider</button>

    </form>
</div>
