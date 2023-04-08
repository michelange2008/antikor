<div x-data="{ more: false }" @click.outside="more = false">
    <x-titre :texte="$texte" :icone="$icone"></x-titre>

    <table class=" table-auto border-collapse w-full p-2">
        <thead class="bg-gray-800 text-gray-100">
            <th class="py-3 px-2 text-center">Icone</th>
            <th class="py-3 px-2 text-left">Nom</th>
            <th class="py-3 px-2 text-left">Nom officiel</th>
        </thead>

        <tbody>
            @foreach ($preparations as $preparation)
                <tr class=" hover:bg-gray-200 border-gray-300 cursor-pointer"
                    :class="more == {{ $preparation->id }} ? 'bg-gray-200 border-t-8 border-gray-50' : ''"
                    x-on:click="more = more=={{ $preparation->id }} ? false : {{ $preparation->id }}">
                    <td class="px-1 py-2 border align-center ">
                        <img class="w-8 m-auto" src="{{ url('storage/img/icones/' . $preparation->icone) }}"
                            alt="{{ ucfirst($preparation->icone) }}">
                    </td>
                    <td class="px-1 py-2 border text-left " :class="more == {{ $preparation->id }} ? 'h2' : ''">
                        {{ ucfirst($preparation->name) }}
                    </td>

                    <td class="px-1 py-2 border text-left ">
                        {{ ucfirst($preparation->officiel) }}
                    </td>
                </tr>

                <tr class="bg-gray-200" x-show="more == {{ $preparation->id }}" x-transition>
                    <td class="border border-y-0 py-3 px-3 sm:px-5" colspan="3">
                        <div>
                            <h2 class="h2">Description</h2>
                            <p class="px-3">{{ ucfirst($preparation->detail) }}</p>
                        </div>
                        <div class="my-3">
                            <h2 class="h2">Composition et matériel</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1 md:gap-3 justify-start">
                                @foreach ($types as $type)
                                    @if ($preparation->produits->where('phytotype_id', $type->id)->count() > 0)
                                        <div class="bg-teal-100 w-auto p-3">
                                            <div class="flex flex-row justify-start gap-2 items-center">
                                                <img class="w-6"
                                                    src="{{ url('storage/img/produits/' . $type->icone) }}"
                                                    alt="">
                                                <h3 class="font-bold text-lg mb-1">{{ ucfirst($type->name) }}</h3>
                                            </div>
                                            @foreach ($preparation->produits as $produit)
                                                @if ($type->id === $produit->phytotype_id)
                                                    <div class="flex flex-row gap-2 justify-between">
                                                        <p>{{ ucfirst($produit->name) }}:</p>
                                                        <p>{{ $produit->pivot->quantite }}
                                                            {{ $produit->phytounite->abbreviation }} </p>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <h2 class="h2">Préparation</h2>

                        </div>
                    </td>
                </tr>

                <tr class="bg-gray-200 border-b-8 border-gray-100" x-cloak x-show="more == {{ $preparation->id }}"
                    x-transition>
                    <td class="border border-y-0 p-3 mb-5" colspan="3">
                        <livewire:preparations-edit-del :preparation="$preparation" :key="$preparation->id" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>
