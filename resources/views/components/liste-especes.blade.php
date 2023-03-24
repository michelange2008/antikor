@props(['especes'])

<div class="flex flex-row">

    @foreach ($especes as $espece)
        <img class="w-8 sm:w-10 lg:w-12 sm:mx-1" src="{{ url('storage/img/formations/icones/' . $espece->icone) }}"
            alt="{{ $espece->nom }}">
    @endforeach

</div>