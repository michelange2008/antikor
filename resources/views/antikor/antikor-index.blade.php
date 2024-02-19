<x-app-layout>

    <div class="px-12">
        <div class="md:grid md:grid-cols-3 md:gap-3">
            @foreach ($datas as $data)
                <div
                    class="flex flex-col justify-center p-3 pb-3 mb-1 text-lg font-bold text-gray-100 rounded md:text-3xl bg-vert-900">
                    <p>
                        {{ $data->titre }}
                    </p>
                </div>
                <div class="mb-3 md:mb-0">
                    <img class="" src="{{ url('storage/img/antikor/' . $data->photo) }}" alt="">

                    <div class="col-span-2 text-justify">

                        <p class="md:pb-3">{{ $data->texte->p1 }}</p>
                        <p>{{ $data->texte->p2 }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
