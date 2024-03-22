<div>
    <p>Type nombre</p>
    @foreach ($nombres as $nombre)
        <p>{{ $nombre['texte'] }} : {{ $nombre['valeur'] }} </p>
    @endforeach
    <form wire:submit="creeNombre">
        <input type="text" wire:model="texte" placeholder="nombre">
        <input type="number" wire:model="valeur" placeholder="valeur">
        <button type="submit" class="btn btn-success">Valider</button>

    </form>
</div>
