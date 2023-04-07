<div x-data="{ more: false }" @click.outside="more = false" x-init="$watch('more', value => console.log(value))">
    <x-titre :texte="$texte" :icone="$icone"></x-titre>

    <table class=" table-auto border-collapse w-full p-2">
        <thead class="bg-gray-800 text-gray-100">

            @foreach ($cols->champs as $col)
                @if ($col->type == 'textarea')
                @else
                    <th class="py-3 px-2 text-{{ $col->align }}">
                        {{ ucfirst($col->name) }}
                    </th>
                @endif
            @endforeach
        </thead>

        <tbody>
            @foreach ($liste as $item)
                <tr class=" hover:bg-gray-200 border-gray-300 cursor-pointer"
                    :class="more == {{$item->id}}   ? 'bg-gray-200 border-0 border-t-8 border-gray-50' : '' "
                    x-on:click="more = more=={{ $item->id }} ? false : {{ $item->id }}">
                    @foreach ($cols->champs as $intitule => $col)
                        @if (!$col->hidden)
                            @if ($col->type == 'img')
                                <td class="px-1 py-2 border align-{{ $col->align }} ">
                                    <img class="w-8 m-auto" src="{{ url('storage/img/icones/' . $item->$intitule) }}"
                                        alt="{{ ucfirst($item->$intitule) }}">
                                </td>
                            @elseif($col->type == 'textarea')

                            @else
                                <td class="px-1 py-2 border text-{{ $col->align }} "
                                    :class="more == {{$item->id}}   ? 'font-bold' : '' ">
                                    {{ ucfirst($item->$intitule) }}
                                </td>
                            @endif
                        @endif
                    @endforeach
                </tr>
                @foreach ($cols->champs as $col)
                    @if ($col->hidden)
                        <tr class="bg-gray-200" x-show="more == {{ $item->id }}" x-transition>
                            <td class="border border-y-0 p-3" colspan="3">
                                <p>{{ ucfirst($item->$intitule) }}</p>
                            </td>
                        </tr>
                    @endif
                @endforeach

                <tr class="bg-gray-200 border-b-8 border-gray-100" x-cloak x-show="more == {{ $item->id }}" x-transition>
                    <td class="border border-y-0 p-3 mb-5" colspan="3">
                            @livewire('item-edit-del', ['item' => $item], key($item->id))
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>


</div>
