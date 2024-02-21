<div>
    <p class="p-3 text-2xl font-black text-center text-vert-900">Une équipe polyvalente</p>
    <div class="grid grid-cols-2 p-3">
        @foreach ($equipe as $membre)
            <div
                class="flex flex-col items-center py-3 text-center
                    @if ($loop->last) col-span-2 @endif">

                <img class="w-16" src="{{ url('storage/img/antikor/' . $membre['photo']) }}" alt="">
                <p class="font-bold text-vert-900">{{ $membre['nom'] }} </p>
                <p class="text-gray-700">{{ $membre['profession'] }}</p>
                <p class="text-gray-700 nowrap">{{ $membre['experience'] }}</p>

            </div>
        @endforeach
    </div>
</div>
