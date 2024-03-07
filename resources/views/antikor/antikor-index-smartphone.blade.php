@foreach ($datas as $data)
    <div class="flex flex-col gap-1 mb-3">
        <div
            class="flex flex-col justify-center p-2 text-xl font-bold text-center text-white border bg-vert-700 border-vert-700">
            <p>{{ $data->titre }}</p>
        </div>
        <div class="col-span-2 px-3 py-2 bg-gray-200">
            <p class="lg:pb-3">{{ $data->texte->p1 }}</p>
            <p>{{ $data->texte->p2 }}</p>
        </div>
        <div class="col-span-3">
            <img class="" src="{{ url('storage/img/antikor/' . $data->photo) }}" alt="">
        </div>
    </div>
@endforeach

@include('antikor.equipe')

@include('antikor.formations')

@include('antikor.partenaires')
