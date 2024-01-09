<div class="my-3 p-2 border flex flex-row">

    <div class="w-100 md:w-11/12 xl:w-10/12">

        <img class="h-20" src="{{ url('storage/img/icones/' . $formation->icone) }}" alt="">
        <h1 class="h1">{{ $formation->name }}</h1>
        <h2 class="h2">{{ $formation->subname }}</h2>
    </div>
    
    <div class="invisible md:visible md:w-1/12 xl:w-2/12 flex flex-col items-end">
        
        @foreach ($formation->especes as $espece)
        <img class="md:w-100 lg:w-40 xl:w-20 my-1" src="{{ url('storage/img/icones/' . $espece->icone) }}" alt="">
        @endforeach
    </div>



</div>
