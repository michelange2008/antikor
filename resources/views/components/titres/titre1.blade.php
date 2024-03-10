<div {{ $attributes->merge([ 'class' => 'titre-1 bg-brique-700']) }}>

    @isset($icone)
        <img class="p-1 w-8" src="{{ url('storage/img/icones/' . $icone) }}" alt="icone">
    @endisset

    <h2 class="text-gray-100">{{ ucfirst($slot) }}</h2>

</div>
