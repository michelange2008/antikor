{{-- Champs input type texte avec soumission par bouton submit --}}
<div class="my-2">
    <label class="block" for="{{$id}}">
        <span class="text-gray-700"><i class = "fa-solid {{ $fa ?? '' }}"></i>{{ $name}}</span>
        
        <input id="{{ $id }}" type="text" wire:model="{{ $model }}"
        class="input-form" placeholder="{{ $placeholder ?? ''}}" @isset ($disabled) disabled @endisset">
        @error( $model )
        <div class="text-xs text-red-900">{{ $message }}</div>
        @enderror
        
    </label>
</div>

