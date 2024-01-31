<a href="{{ $route }}">
    <button
    {{ $attributes->merge([
        'class' => ' btn bg-brique hover:bg-brique-300 focus:ring-brique active:bg-brique-900  active:ring-brique-900',
        'type' => 'submit',
        ]) }}>
     <i class="fa-solid fa-{{ $fa ?? 'fa-arrow-up-right-from-square' }}"></i>{{ $slot }}
</button>
</a>
