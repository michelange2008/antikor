<a href="{{ $route }}" wire:navigate>
    @isset($couleur)
        @if ($couleur == 'vert')
            <button class = 'm-1 bg-vert-700 btn hover:bg-vert-500 focus:ring-vert active:bg-vert-900 active:ring-vert-900'>
                <i class="fa-solid fa-{{ $fa }} ?? fa-sliders "></i>{{ $libelle }}
            </button>
        @elseif ($couleur == 'brique')
            <button
                class = 'm-1 bg-brique-700 btn hover:bg-brique-500 focus:ring-brique active:bg-brique-900 active:ring-brique-900'>
                <i class="fa-solid fa-{{ $fa }} ?? fa-sliders "></i>{{ $libelle }}
            </button>
        @elseif ($couleur == 'bleu')
            <button class = 'm-1 bg-bleu-700 btn hover:bg-bleu-500 focus:ring-bleu active:bg-bleu-900 active:ring-bleu-900'>
                <i class="fa-solid fa-{{ $fa }} ?? fa-sliders "></i>{{ $libelle }}
            </button>
        @else
            <button class = 'm-1 bg-gray-500 btn hover:bg-gray-300 focus:ring-gray active:bg-gray-900 active:ring-gray-900'>
                <i class="fa-solid fa-{{ $fa }} ?? fa-sliders "></i>{{ $libelle }}
            </button>
        @endif
    @else
        <button class = 'm-1 bg-gray-500 btn hover:bg-gray-300 focus:ring-gray active:bg-gray-900 active:ring-gray-900'>
            <i class="fa-solid fa-{{ $fa }} ?? fa-sliders "></i>{{ $libelle }}
        </button>
    @endisset
</a>
