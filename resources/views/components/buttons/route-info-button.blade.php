<a href="{{ $route }}">
    <button
    {{ $attributes->merge([
        'class' => ' btn bg-bleu hover:bg-bleu-300 focus:ring-bleu active:bg-bleu-900  active:ring-bleu-900',
        'type' => 'submit',
        ]) }}>
     <i class="fa-solid fa-{{ $fa ?? 'fa-arrow-up-right-from-square' }}"></i>{{ $slot }}
</button>
</a>
