<div>
    <x-app-layout>

        <x-titres.titre :icone="$formation->icone">{{ $formation->name }} </x-titres.titre>
    
        <div class="my-2">
    
            <form action="{{ route('formations.update', $formation) }}" method="POST">
    
                @csrf
                
                <input type="text" name="name">
    
                <button class="bg-teal-800 text-white hover:bg-teal-600 hover:text-black my-1 p-2" type="submit">Enregistrer</button>
            </form>
    
        </div>
    
    </x-app-layout>
    
</div>
