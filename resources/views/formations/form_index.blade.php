<x-app-layout>

    <x-titre :titre="ucfirst(__('titres.'.$titre->titre))" :icone="$titre->icone" ></x-titre>

    <div class=" py-2 mx-24 my-5">

                @foreach ($formations as $formation)
                    <div class="flex flex-row justify-between items-center py-3">
                        <div class="flex flex-row justify-start gap-5">
                            <img class="w-10 lg:w-12" src="{{ url('storage/img/formations/icones/'.$formation->icone)}}" alt="{{ $formation->icone }}"> 
                            <div class="flex flex-col">
                                <p class="text-lg lg:text-xl ">{{ $formation->name }}</p>
                                <p>{{ $formation->duree }} - {{ $formation->lieu }}</p>
                            </div>
                        </div>
                        <div class="flex flex-row justify-end">

                            @foreach ($formation->especes as $espece)
                            
                            <img class="w-10 lg:w-12 mx-1" src="{{ url('storage/img/formations/icones/'.$espece->icone)}}" alt="{{$espece->nom}}">
                            
                            @endforeach
                        </div>
                        
                        
                    </tr>
                </div>
                @endforeach

    </div>    

   
</x-app-layout>