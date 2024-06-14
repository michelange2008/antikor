<div>
    <x-titres.titre icone="dosages.svg">Dosages des oligos-éléments et des vitamines</x-titres.titre>

    <div>
        @foreach ($oligovitamines as $type => $elements)
        <div>
            {{ ucfirst($type) }}
            @foreach ($elements as $element)
                <div>
                    {{ ucfirst(__("oligos.".$element))}}
                </div>
            @endforeach
        </div>
        @endforeach
    </div>

    <div>
        @foreach ($dosages['substrats'][$element_choisi] as $substrat)
        
            <p>{{ $substrat }}</p>
            <p>{{ $dosages['carence'][$substrat]}} </p>
            
        @endforeach
    </div>
</div>
