{{-- -> form_show_detail
    multiple = 1 si plusieurs lignes (relation belonsTo ou belongsToMany) --}}
<div class="px-2 py-2 mb-2 bg-gray-200 md:px-4 md:shadow md:shadow-slate-700 md:mb-6 md:py-4">

    <p class="text-lg font-bold text-teal-700 md:text-2xl">{{ $titre }}</p>

    <div class="pl-2 text-justify md:text-lg">
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
