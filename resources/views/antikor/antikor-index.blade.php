<x-app-layout>

    <div class="my-3 select-none">
        <div class="lg:hidden">
            @foreach ($datas as $data)
                <div class="flex flex-col gap-1 mb-3">
                    <div
                        class="flex flex-col justify-center p-2 text-xl font-bold text-center text-white border bg-vert-700 border-vert-700">
                        <p>{{ $data->titre }}</p>
                    </div>
                    <div class="col-span-2 p-3 bg-gray-200">
                        <p class="lg:pb-3">{{ $data->texte->p1 }}</p>
                        <p>{{ $data->texte->p2 }}</p>
                    </div>
                    <div class="col-span-3">
                        <img class="" src="{{ url('storage/img/antikor/' . $data->photo) }}" alt="">
                    </div>
                </div>
            @endforeach
        </div>
        <div class="hidden lg:grid lg:grid-cols-3 lg:gap-3">
            @foreach ($datas as $data)
                <div class="mb-3 lg:mb-0">
                    <img class="" src="{{ url('storage/img/antikor/' . $data->photo) }}" alt="">

                    <div class="col-span-2 text-justify">

                        <p class="lg:pb-3">{{ $data->texte->p1 }}</p>
                        <p>{{ $data->texte->p2 }}</p>
                    </div>
                </div>
                <div class="mb-1 rounded lg:relative">
                    <div class="hidden w-full h-full bg-orange-200 lg:block lg:absolute">
                        @includeIf('antikor.' . $data->plus)
                    </div>
                    <div
                        class="flex flex-col justify-center py-3 pr-3 pb-3 pl-5 h-full text-lg font-bold text-gray-100 opacity-100 lg:absolute lg:transition lg:duration-1000 lg:ease-in-out lg:hover:opacity-0 lg:text-3xl bg-vert-900">
                        <p>{{ $data->titre }}</p>
                    </div>

                </div>
            @endforeach

        </div>
    </div>

</x-app-layout>
