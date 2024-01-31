<div {{ $attributes->merge(['class' => 'titre bg-vert-900 my-2']) }}>

    @isset($icone)
        <img class="p-1 h-12 sm:w-12" src="{{ url('storage/img/icones/' . $icone) }}" alt="icone">
    @endisset

    <h1>
        {{ $slot }}
    </h1>

</div>
