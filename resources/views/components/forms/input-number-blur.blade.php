<div>

    <label class="block" for="{{$id}}">
        <span>{{ $name}}</span>
        
        <input id="{{ $id }}" type="number" wire:model.blur="{{ $model }}" step="{{ $step ?? 1}}"
        class="block mt-1 w-full bg-gray-200 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 placeholder="{{ $placeholder ?? ''}}">
        @error( $model )
        <div class="text-xs text-red-900">{{ $message }}</div>
        @enderror
    </label>

</div>

