<x-app-layout>

    <x-titres.titre icone="warning.svg">Outil d'évaluation d'un minéral: avertissement</x-titres.titres>

    <div class="p-8 my-4 text-teal-900 bg-gray-200 border shadow shadow-teal-900">
        <h2 class="h2">Oligoéléments et vitamines</h2>

        <h3 class="mt-2 ml-3 h3">Des éléments indispensables</h3>

        <p class="m-3">
            Les oligoéléments et les vitamines sont indispensables à la bonne santé des animaux d’élevage. Les
            carences fortes se traduisent par des symptômes graves (raide, myopathie, marasme, mortalité, etc.).
        </p>

        <h3 class="mt-2 ml-3 h3">Notamment pour la résistance aux infections</h3>

        <p class="m-3">
            Les subcarences, plus fréquentes, sont responsables d’une immunité plus faible des animaux et donc d’une
            plus grande sensibilité aux infections.
        </p>

        <p class="m-3">
            Oligoéléments comme vitamines ont de nombreuses fonctions dans l’organisme, mais participent souvent
            pour les plus importants au système antioxydant, moyen de défense indispensable contre les infections.
        </p>

        <h3 class="mt-2 ml-3 h3">Mais une toxicité possible</h3>

        <p class="m-3">
            Ces éléments ont aussi une toxicité à des doses plus ou moins élevées. En particulier, les ovins ne
            supportent pas plus de 15 mg/kg de MSI (matière sèche ingérée), alors que leurs besoins s’établissent
            aux alentours de 10 mg/kg de MSI. Plus généralement, des distributions excessives de sélénium, de zinc,
            de vitamines peuvent se traduire par une intoxication des animaux.
        </p>

    </div>
    
    <div class="p-8 my-4 text-amber-900 bg-gray-200 border shadow shadow-teal-900">

        <h2 class="h2">Besoins des animaux et apports de la ration : une estimation délicate</h2>
        <p class="m-3">
            Les besoins des animaux dépendent de leur stade physiologique. Ils sont particulièrement importants en
            fin de gestation et en début de lactation.
        </p>

        <p class="m-3">
            Les apports varient en fonction de l’alimentation. Au pâturage, les besoins en vitamines AD3E sont
            largement couverts tandis que les apports sont nuls avec une ration conservée (foin, ensilage,
            enrubannage, etc.).
        </p>

        <p class="m-3">
            Les apports d’oligo-éléments par l’alimentation dépendent de la nature des sols. Les carences seront,
            par
            exemple, plus marquées sur des sols acides. La carence en sélénium semble systématique en France, tandis
            que
            pour les autres oligoéléments, les niveaux de carence sont variables.
        </p>
    </div>
    
    <div class="p-8 my-4 text-red-900 bg-gray-200 border shadow shadow-red-900">
        <h2 class="h2">Une estimation à titre indicatif</h2>
        <p class="m-3">
            Du fait de cette variation (sols, alimentation, niveau de production), on ne peut qu’avoir des valeurs
            indicatives d’apports en oligoéléments et vitamines. Le présent outil est destiné à vérifier que le
            minéral utilisé répond à peu près aux besoins des animaux en fonction de leur espèce et de leur stade
            physiologique. Il ne prétend pas donner une indication définitive et l’observation des animaux associée
            à une analyse critique de la ration restent une démarche indispensable.
        </p>

        <p class="m-3 font-bold">
            De ce fait, le site ne saurait tenu responsables de problèmes causés sur un troupeau par une application
            aveugles des informations obtenues.
        </p>
    </div>
    
    <div class="p-8 my-4 text-gray-900 bg-gray-200 border shadow shadow-gray-900">
        <h2 class="h2">Unités et valeurs</h2>

        <p class="m-3">
            Les besoins en oligoéléments sont estimées en mg/kg de matière sèche ingérée ( mg/kg et ppm – parties
            par million – sont équivalents). Un femelle en fin de gestation à une capacité d’ingestion plus faible
            qu’une femelle en lactation. Les recommandations sont donc différentes.
        </p>

    </div>
    <a href="{{ route('oligos.outil') }}">
        <x-buttons.success-button><i class="mr-1 fa-solid fa-calculator"></i>Retour à l'outil</x-buttons.success-button>
    </a>
</x-app-layout>
