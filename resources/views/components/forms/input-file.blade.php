<div class="flex flex-col my-2">

    <label for="{{$name}}">{{ $name}}</label>

    <input id="{{ $name }}" type="file" wire:model.defer="{{ $model }}"
        class="form-input rounded border-1 focus:active:border-0">
    @error( $model )
        <div class="text-red-900 text-xs">{{ $message }}</div>
    @enderror

    @if ($id)

        <img src="{{ $model->tempraryUrl() }}" alt="">
        
    @endif

</div>

