{{-- -> form_show_detail
    multiple = 1 si plusieurs lignes (relation belonsTo ou belongsToMany) --}}
<div class="m-2 md:px-6">

    <p class="text-3xl font-bold text-teal-700">{{ $titre }}</p>

    <div class="pl-2 text-xl text-justify">
        @if ($type == 'multiple')
            <ul>
                @foreach ($texte as $ligne)
                    <li class="my-2">{{ $ligne->nom }}</li>
                @endforeach
            </ul>
        @elseif ($type == 'arbre')
            <ul>
                @foreach ($texte as $soustitre => $lignes)
                    <li class="mt-3 font-bold">{{ $soustitre }} </li>
                    <ul class="ml-3">
                        @foreach ($lignes as $ligne)
                            <li>{{ $ligne->detail }}</li>
                        @endforeach
                    </ul>
                @endforeach
            </ul>
        @else
            <p class="my-2">{{ $texte }}</p>

        @endif
    </div>

</div>
