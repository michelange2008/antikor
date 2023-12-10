<div class="my-3">
    <div class="flex items-center">
        <img class="w-10" src="{{ url('storage/img/formations/icones/' . $icone) }}" alt="{{ $icone }}">
        <p class="mx-3 text-lg font-bold text-teal-700">{{ $titre }} </p>
    </div>

    <div class="mx-6 my-3 font-bold text-black">
        @if ($multiple)
            @foreach ($texte as $ligne)
                <p>{{ ucfirst($ligne->nom) }}</p>
            @endforeach
        @else
            <p>{{ ucfirst($texte) }}</p>

        @endif
    </div>
</div>
