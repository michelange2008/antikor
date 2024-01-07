<div>

    <label class="block" for="{{ $id }}">
        <span class="text-gray-700"><i class = "fa-solid {{ $fa ?? '' }}"></i> {{ $name }}</span>    
        <textarea id="{{ $id }}" wire:model="{{ $model }}" rows={{ $rows ?? 4}}
        class="input-form"></textarea>
        
        @error($model.".".$id)
        <div class="text-xs text-red-900">{{ $message }}</div>
        @enderror
    </label>

</div>
