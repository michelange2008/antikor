<x-app-layout>

    <div class="px-12">
        @foreach ($datas as $data)
            <p class="p-3 pb-3 mt-4 mb-1 text-lg font-bold text-gray-100 rounded md:text-xl bg-vert-900">
                {{ $data->titre }}
            </p>
            <div class="gap-4 md:grid md:grid-rows-1 md:grid-cols-3">
                <img class="" src="{{ url('storage/img/antikor/' . $data->photo) }}" alt="">

                <div class="col-span-2 text-justify">

                    <p class="md:pb-3">{{ $data->texte->p1 }}</p>
                    <p>{{ $data->texte->p2 }}</p>
                </div>
            </div>
        @endforeach
    </div>

</x-app-layout>
