@props(['titre', 'icone'])


<div class="bg-teal-900 flex flex-row items-center gap-3 px-5 py-2 rounded mx-20 my-5">

    <img class="w-16" src="{{ url('storage/img/icones/'.$icone) }}" alt="icone">
    
    <h1 class="text-4xl text-gray-100">
    
        {{ $titre }}
    
    </h1>

</div>