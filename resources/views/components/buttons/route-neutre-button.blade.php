<a href="{{ $route }}">
    <button
    {{ $attributes->merge([
        'class' => ' btn bg-gray-500 hover:bg-gray-300 focus:ring-gray active:bg-gray-900  active:ring-gray-900',
        'type' => 'submit',
        ]) }}>
     <i class="fa-solid fa-{{ $fa ?? 'fa-arrow-up-right-from-square' }}"></i>{{ $slot }}
</button>
</a>
