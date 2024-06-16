<div>
    {{-- <p class="p-3">Choisir un type d'analyse</p> --}}
    <div class="my-3">
        @if ($element_choisi != null)
            @foreach ($dosages['substrats'][$element_choisi] as $substrat)
                @if ($substrat_choisi != null && $substrat == $substrat_choisi)
                    <div class="my-1">
                        <div class="flex flex-row gap-1 justify-between items-center p-3 text-white bg-bleu-900">
                            <div>
                                {{ ucfirst($substrat) }} 
                                <span class="sm:hidden">({{ $dosages['unités'][$substrat_choisi] }})</span>
                            </div>
                            <div>
                                @foreach ($dosages['prelevement'][$substrat] as $prelevement => $icone)
                                    <img class="inline-block h-8" src="{{ url('storage/img/icones/' . $icone) }}"
                                        alt="">
                                @endforeach
                            </div>
                        </div>
                        <div class="sm:hidden">
                            @include('components.oligos.valeurs_analyses_sm')
                        </div>
                    </div>
                @else
                    <div class="flex flex-row gap-1 justify-between items-center p-3 m-1 bg-gray-200 hover:cursor-pointer hover:bg-bleu-300 active:bg-bleu-900 active:text-white"
                        wire:click="choisi_substrat('{{ $substrat }}')">
                        {{ ucfirst($substrat) }}
                        <div>
                            @foreach ($dosages['prelevement'][$substrat] as $prelevement => $icone)
                                <img class="inline-block h-8" src="{{ url('storage/img/icones/' . $icone) }}"
                                    alt="">
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
</div>
