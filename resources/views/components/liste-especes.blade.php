@props(['especes'])

<div class="flex flex-row">

    @foreach ($especes as $espece)
        <img class="w-6 sm:w-8 lg:w-12 sm:mx-1" src="{{ url('storage/img/formations/icones/' . $espece->icone) }}"
            alt="{{ $espece->nom }}">
    @endforeach

</div>