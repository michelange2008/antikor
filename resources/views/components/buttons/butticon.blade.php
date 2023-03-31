@props(['icone', 'name'])

<div class="group flex flex-row justify-start items-center cursor-pointer rounded p-2 xl:p-3 bg-slate-300 hover:bg-slate-700 hover:text-stone-200">
    <img class="w-8 group-hover:brightness-200" src="{{ url($icone)}}" alt="{{$name}}">
    <p class="ml-1 md:ml-2 xl:ml-3">{{$name}}</p>
</div>
