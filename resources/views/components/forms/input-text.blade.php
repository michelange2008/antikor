<div {{ $attributes->merge(['class' => 'flex flex-col my-2']) }}>

    <label for="{{$id}}">{{ $name}}</label>

    <input id="{{ $id }}" type="text" wire:model="{{ $model.".".$id }}"
        class="rounded form-input border-1 focus:active:border-0" placeholder="{{ $placeholder ?? ''}}">
    @error( $model.".".$id )
        <div class="text-xs text-red-900">{{ $message }}</div>
    @enderror

</div>

