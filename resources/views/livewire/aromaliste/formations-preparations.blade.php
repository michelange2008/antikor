<div>
    <x-titres.titre>Formations avec préparations</x-titres.titre>

    @foreach ($formations as $formation)
        @if ($formation->preparations->count() > 0)
            <p>{{ $formation->name}}</p>
            @foreach ($formation->preparations as $preparation)
                <p>{{ $preparation->name }}</p>
            @endforeach
        @endif
    @endforeach
</div>
