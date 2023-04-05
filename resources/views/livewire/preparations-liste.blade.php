<div>
    <x-titre :texte="$texte" :icone="$icone"></x-titre>

    <table>
        <thead>
            @foreach ($cols as $col)
                <th>
                    {{ ucfirst($col->name) }}
                </th>
            @endforeach
        </thead>

        <tbody>
            @foreach ($liste as $item)
                <tr>
                    @foreach ($cols as $key => $col)
                    @if ($col->type = "img")
                    <td><img src="{{ url('storage/img/icones/'.$item->key)}}" alt="{{ $item->$key }}"></td>
                        
                    @else

                    <td>{{ $item->$key }} </td>
                    @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>


</div>
