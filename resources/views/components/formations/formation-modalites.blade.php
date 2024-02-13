{{-- -> form-show-cartouche 
    Elément de description des modalités de la formation dans le cartouche (grand écran) ou l'encart' (petit écran) --}}
<div class="p-2 bg-gray-200 border md:py-3 md:px-2">
    <div class="flex items-center">
        <img class="w-10" src="{{ url('storage/img/icones/' . $icone) }}" alt="default.svg">
        <p class="mx-3 text-lg font-bold text-vert">{{ $titre }} </p>
    </div>

    <div class="mx-6 my-1 text-black md:my-3 md:font-bold">
        @if ($multiple)
            @foreach ($texte as $ligne)
                @if ($loop->first && $loop->last)
                    <span>{{ ucfirst($ligne->nom) }} </span>
                @elseif ($loop->last)
                    <span>{{ $ligne->nom }}.</span>
                @elseif($loop->first)
                    <span>{{ ucfirst($ligne->nom) }}, </span>
                @else
                    <span>{{ $ligne->nom }}, </span>
                @endif
            @endforeach
        @else
            <p>{{ ucfirst($texte) }}</p>

        @endif
    </div>
</div>
