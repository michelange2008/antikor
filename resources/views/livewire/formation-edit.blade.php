<div>

    <x-titres.titre :icone="$formation->icone">{{ $formation->name }} </x-titres.titre>

    <div class="my-2">

        <form action="" wire:submit.prevent="update">

            <x-forms.input-text name="Nom" id="name" model="formation"></x-forms.input-text>
            <x-forms.input-text name="Sous-titre" id="subname" model="formation"></x-forms.input-text>
            <x-forms.textarea name="Contexte" id='contexte' model='formation'></x-forms.textarea>

            @foreach ($programmesoustitres as $programmesoustitre)
            
                @livewire('programme-soustitre-edit', ['programmesoustitre' => $programmesoustitre], key($programmesoustitre->id))

                @foreach ($programmedetails as $programmedetail)

                    @if ($programmedetail->programmesoustitre_id == $programmesoustitre->id)

                        @livewire('programme-detail-edit', ['programmedetail' => $programmedetail])

                    @endif

                @endforeach

            @endforeach

        </form>

    </div>


</div>
