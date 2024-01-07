{{-- Champs select avec submit au global
    paramètres:
    - $label: string
    - $id: string
    - $name: nom du champs à modifier de la table
    - $model: nom du model sous forme model.champs
    - $options: Collection de la liste de option
    - $champ: intitulé du champ dans la table du modèle lié
     --}}
<div>

    <label for="duree" class="block">
        <span class="text-gray-700"><i class = "fa-solid {{ $fa ?? '' }}"></i> {{ $label }}</span>
        <select id="{{ $id }}" name="{{ $name }}" wire:model={{ $model }}
            class="input-form">
            <option value="0" hidden>Choisir une option</option>
            @foreach ($options as $option)
                    <option value="{{ $option->id }}">{{ $option->$champ }}</option>
            @endforeach
        </select>
        @error($model)
        <div class="text-xs text-red-900">{{ $message }}</div>
        @enderror

    </label>

</div>
