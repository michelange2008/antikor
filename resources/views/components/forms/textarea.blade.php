<div class="flex flex-col my-2">

    <label for="{{ $id }}">{{ $name }}</label>

    <textarea id="{{ $id }}" wire:model="{{ $model.".".$id }}" rows={{ $rows ?? 5}}
        class="rounded form-input border-1 focus:active:border-0"></textarea>

    @error($model.".".$id)
        <div class="text-xs text-red-900">{{ $message }}</div>
    @enderror

</div>
