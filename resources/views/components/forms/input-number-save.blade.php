<div class="my-2">

    <label class="block" for="{{$id}}">
        <span class="text-gray-700">{{ $name}}</span>
        
        <input id="{{ $id }}" type="number" wire:model="{{ $model }}" step="{{ $step ?? 1}}" max="{{$max ?? ''}}" min="{{$min ?? ''}}"
        class="block mt-1 w-full bg-gray-200 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 placeholder="{{ $placeholder ?? ''}}">
        @error( $model )
        <div class="text-xs text-red-900">{{ $message }}</div>
        @enderror
    </label>

</div>

