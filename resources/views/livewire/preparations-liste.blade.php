<div x-data="{ detailItem: @entangle('item_id') }">
    <x-titre :texte="$texte" :icone="$icone"></x-titre>

    <table class=" table-auto border-collapse w-full p-2">
        <thead class="bg-gray-800 text-gray-100">

            @foreach ($cols as $col)
                @if ($col->type == 'textarea')

                @else
                <th class="py-3 px-2 text-{{$col->align}}">
                    {{ ucfirst($col->name) }}
                </th>
                @endif
            @endforeach
        </thead>

        <tbody>
            @foreach ($liste as $item)
                <tr class=" hover:bg-gray-300 cursor-pointer" x-on:click="open = ! open">
                    @foreach ($cols as $intitule => $col)
                        @if ($col->type == 'img')
                            <td class="px-1 py-2 border align-{{$col->align}} border-gray-300">
                                <img class="w-8 m-auto" src="{{ url('storage/img/icones/' . $item->$intitule) }}"
                                    alt="{{ $item->$intitule }}">
                            </td>
                        @elseif($col->type == 'textarea')
                        @else
                            <td class="px-1 py-2 border text-{{$col->align}} border-gray-300">
                                {{ $item->$intitule }}
                            </td>
                        @endif

                    @endforeach
                </tr>
                <tr x-show="item_id">

                    <td class="border p-3" colspan="3">
                        <p>{{ $item->detail }}</p>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>


</div>
