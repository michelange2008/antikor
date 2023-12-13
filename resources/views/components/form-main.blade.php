{{-- -> form_show_detail
    multiple = 1 si plusieurs lignes (relation belonsTo ou belongsToMany) --}}
<div class="m-2 md:px-6">

    <p class="text-2xl font-bold text-teal-700">{{ $titre }}</p>

    <div class="pl-2 text-lg text-justify">
        @if ($multiple)
            <ul>
                @foreach ($texte as $ligne)
                    <li class="my-1">{{ $ligne->nom }}</li>
                @endforeach
            </ul>
        @else
            <p class="my-1">{{ $texte }}</p>

        @endif
    </div>

</div>
