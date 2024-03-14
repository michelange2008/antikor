<div x-data="{ showDetail: @entangle('showDetail'), showComposition: @entangle('showComposition') }" @click.outside="showDetail = false, editPrepId = 0"
    @keyup.escape.window="showDetail = false; showComposition = 0">
    <x-titres.titre :class="'my-5'" :icone="$icone_titre">{{ __('titres.' . $texte_titre) }}</x-titre>
        <x-flash></x-flash>

        @include('livewire.aromaliste.preparation-create')

        @foreach ($preparations as $prep)
            <li class="flex relative flex-row gap-3 items-center p-3 mb-1 border border-gray-300 cursor-pointer hover:bg-gray-300"
                wire:click="showDetails({{ $prep->id }})">
                <img class="w-8" src="{{ url('storage/img/icones/' . $prep->icone) }}"
                    alt="{{ ucfirst($prep->icone) }}">
                <p class="px-1 py-2 text-lg text-left">
                    {{ ucfirst($prep->name) }}
                    <span class="italic">({{ ucfirst($prep->officiel) }})</span>
                </p>
            </li>
        @endforeach

        <div class="fixed top-0 left-0 flex flex-col items-center w-screen justify-center h-screen bg-vert-700/50"
            x-show="showDetail != 0" x-cloak>
            @include('livewire.aromaliste.preparation-detail')
        </div>

</div>
