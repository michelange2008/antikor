<div>
    <p class="p-3 text-2xl font-black text-center text-vert-900">Nous contacter</p>

    <div class="flex flex-col gap-4 p-5 mt-5">
        <p class="text-xl font-bold text-gray-800">ANTIKOR SCOP</p>
        <p class="font-bold text-vert-900">
            @foreach ($equipe as $membre)
                {{ $membre['nom'] }} 
                @if (!$loop->last) - @endif 
            @endforeach
        </p>
        <p>605&nbsp;Grande&nbsp;Rue - 26300&nbsp;BARBIERES</p>
        

        <p>04&nbsp;75&nbsp;47&nbsp;20&nbsp;35 - 06&nbsp;83&nbsp;47&nbsp;88&nbsp;25 - 06&nbsp;88&nbsp;23&nbsp;90&nbsp;98
        </p>
        <p>

            <a href="mailto:antikor@orange.fr" class="italic text-blue-700 underline cursor-pointer">antikor@orange.fr</a>
        </p>

        <p>n° organisme de formation: 84&nbsp;26&nbsp;02826&nbsp;26</p>
    </div>

</div>
