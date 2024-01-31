<a href="{{ $route }}">
    <button
    {{ $attributes->merge([
        'class' => ' btn bg-vert hover:bg-vert-300 focus:ring-vert active:bg-vert-900  active:ring-vert-900',
        'type' => 'submit',
        ]) }}>
     <i class="fa-solid fa-{{ $fa ?? 'fa-arrow-up-right-from-square' }}"></i>{{ $slot }}
</button>
</a>
