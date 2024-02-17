<x-app-layout>

    <x-titres.titre icone="fire.svg">Cycle ovarien de la vache</x-titres.titre>

    <div class="justify-between mt-3 bg-gray-300 lg:mt-6 lg:flex lg:flex-row">

        @include('repro.animation.organe')

        @include('repro.animation.moniteur')

    </div>

    <div class="mt-3 lg:mt-6">
        @include('repro.animation.time-line')
    </div>

    

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/Draggable.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/TextPlugin.min.js"></script>
        <script src="{{ url('repro/reproduction.js') }}"></script>
    @endpush

</x-app-layout>
