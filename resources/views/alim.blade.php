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
    <div class="flex flex-row justify-end">
        <div 
        class="px-2 py-2 my-2 text-sm text-center text-white rounded shadow cursor-pointer md:py-3 md:px-4 hover:bg-brique-900 active:bg-brique-100 active:text-brique-900 md:text-base bg-brique-700 shadow-brique-900"
        title="Cliquer pour afficher la page des dosages"
        >
        <a href="{{ route('oligos.dosages')}}">
            <i class="fa-solid fa-droplet"></i>&nbsp;
            Dosage des oligo-éléments
        </a>
        </div>
    </div>
</x-app-layout>
