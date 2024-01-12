{{-- Champs select avec submit au changement
    paramètres:
    - $label: string
    - $id: string
    - $name: nom du champs à modifier de la table
    - $model: nom du model sous forme model.champs
    - $options: Collection de la liste de option
    - $champ: intitulé du champ dans la table du modèle lié
    - $compareId: id du champs à comparer pour le select
     --}}
<div>

    <label for="duree" class="block">
        <span class="text-gray-700"><i class = "fa-solid {{ $fa ?? '' }}"></i> {{ $label }}</span>
        <select id="{{ $id }}" name="{{ $name }}" wire:model={{ $model }} wire:change="maj('{{$name}}')"
            class="input-form">
            @foreach ($options as $option)
                @if ($option->id == $compareId)
                    <option selected value="{{ $option->id }}">{{ $option->$champ }}</option>
                @else
                    <option value="{{ $option->id }}">{{ $option->$champ }}</option>
                @endif
            @endforeach
        </select>
    </label>

</div>
