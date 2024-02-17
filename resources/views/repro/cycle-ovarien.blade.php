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

    <div class="relative -mt-3 md:hidden">
        <img class="absolute z-0" src="{{url('storage/img/highland.jpg')}}" alt="Pélican">
        <p class="absolute z-10 py-3 w-full text-xl text-center text-white bg-brique-900 text-bold">Merci de mettre votre écran en mode paysage</p>
    </div>


    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/Draggable.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/TextPlugin.min.js"></script>
        <script src="{{ url('repro/reproduction.js') }}"></script>
    @endpush

</x-app-layout>
