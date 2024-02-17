<x-app-layout>

    <x-titres.titre icone="fire.svg">Cycle ovarien de la vache</x-titres.titre>
    <div class="hidden md:block">

        <div class="justify-between mt-3 bg-gray-300 lg:mt-6 md:flex md:flex-row">

            @include('repro.animation.organe')

            @include('repro.animation.moniteur')

        </div>

        <div class="mt-3 lg:mt-6">
            @include('repro.animation.time-line')
        </div>

    </div>

    <div class="md:hidden">
        <p>Désolé mais il faut tourner votre écran en mode paysage</p>
        <img class="absolute" src="{{url('storage/img/pelican.jpg')}}" alt="Pélican">
    </div>


    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/Draggable.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/TextPlugin.min.js"></script>
        <script src="{{ url('repro/reproduction.js') }}"></script>
    @endpush

</x-app-layout>
