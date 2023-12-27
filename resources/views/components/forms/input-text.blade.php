<div {{ $attributes->merge(['class' => 'flex flex-col my-2']) }}>

    <label for="{{$id}}">{{ $name}}</label>

    <input id="{{ $id }}" type="text" wire:model.defer="{{ $model.".".$id }}"
        class="rounded form-input border-1 focus:active:border-0">
    @error( $model.".".$id )
        <div class="text-xs text-red-900">{{ $message }}</div>
    @enderror

</div>

