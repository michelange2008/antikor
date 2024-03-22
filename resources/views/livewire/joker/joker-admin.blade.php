<div>
    <p>Création d'un nouveau questionnaire</p>
    <p>Choisir le type</p>
    <div class="flex flex-col gap-3">
        @foreach ($types as $typ)
            <label class="flex items-center" for="{{ $typ['categorie'] }}">
                <input
                    class="text-gray-700 bg-gray-200 rounded border-transparent focus:border-transparent focus:bg-gray-200 focus:ring-1 focus:ring-offset-2 focus:ring-gray-500"
                    type="radio" id="{{ $typ['categorie'] }}" name="type" value="{{ $typ['categorie'] }}"
                    wire:model.live="type">
                <span class="ml-2">{{ $typ['intitule'] }} </span>
            </label>
        @endforeach
    </div>

    @foreach ($types as $typ)
        @if ($type == $typ['categorie'] && view()->exists('livewire.joker.'.$typ['categorie']))
            @include('livewire.joker.'.$typ['categorie'])
         @endif
    @endforeach
</div>
