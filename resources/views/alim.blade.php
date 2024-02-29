<x-app-layout>
    <div class="flex flex-col gap-5 mt-3 md:my-32 md:justify-around md:gap-0 md:flex-row">
        <div class="m-auto w-2/3 shadow-lg md:w-1/3 lg:w-1/4 xl:1/5 shadow-gray-600 hover:shadow-gray-800 hover:bg-gray-300"
            title="Cliquer pour afficher la page">
            <a class="block" href="/macroéléments" wire:navigate>
                <img src="{{ url('storage/img/icones/CaP.svg') }}" alt="Calcium">
            </a>
        </div>

        <div class="m-auto w-2/3 shadow-lg md:w-1/3 lg:w-1/4 xl:1/5 shadow-gray-600 hover:shadow-gray-800 hover:bg-gray-300"
            title="Cliquer pour afficher la page">
            <a class="block" href="/oligovitamines">
                <img src="{{ url('storage/img/icones/oligos.svg') }}" alt="Calcium">
            </a>
        </div>
    </div>
</x-app-layout>
