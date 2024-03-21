<div>
    <p>Création d'un nouveau questionnaire</p>
    <p>Choisir le type</p>
    <form wire:submit="choixType">
        <div class="flex flex-col gap-3">
            <label class="flex items-center" for="nombre">
                <input
                    class="text-gray-700 bg-gray-200 rounded border-transparent focus:border-transparent focus:bg-gray-200 focus:ring-1 focus:ring-offset-2 focus:ring-gray-500"
                    type="radio" id="nombre" name="type" value="nombre" wire:model="type">
                <span class="ml-2">Nombre</span>
            </label>
            <label class="items-center" for="qcm">
                <input
                    class="text-gray-700 bg-gray-200 rounded border-transparent focus:border-transparent focus:bg-gray-200 focus:ring-1 focus:ring-offset-2 focus:ring-gray-500"
                    type="radio" id="qcm" name="type" value="qcm" wire:model="type">
                <span class="ml-2">QCM</span>
            </label>
            <label class="items-center" for="qcu">
                <input
                    class="text-gray-700 bg-gray-200 rounded border-transparent focus:border-transparent focus:bg-gray-200 focus:ring-1 focus:ring-offset-2 focus:ring-gray-500"
                    type="radio" id="qcu" name="type" value="qcu" wire:model="type">
                <span class="ml-2">QCU</span>
            </label>
        </div>

        <button type="submit" class="btn btn-success">Valider</button>
        <button type="reset" class="btn btn-neutre">Reset</button>
    </form>

    @if ($type == 'nombre')
        <div>
            <p>Type nombre</p>
            @foreach ($questions as $question)
                <p>{{ $question['texte'] }} : {{ $question['valeur'] }} </p>
            @endforeach
            <form wire:submit="creeNombre">
                <input type="text" wire:model="texte" placeholder="question">
                <input type="number" wire:model="valeur" placeholder="valeur">
                <button type="submit" class="btn btn-success">Valider</button>

            </form>
        </div>
    @endif
</div>
