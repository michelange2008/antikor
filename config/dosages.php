<?php
return [
    "substrats" => [
        'cobalt' => [
            "cobalt - sang",
            "vitamine B12 - sang",
        ],
        'cuivre' => [
            "cuivre - plasma",
            "cuivre - foie",
        ],
        'iode' => [
            "iode total - sang",
            "IIP (iode inorganique plasmatique) - sang ",
            "T4 - sang",
            "T3 - sang",
            "iode - lait",
            "iode - urine",
        ],
        'manganese' => [
            "manganèse - sang",
        ],
        'selenium' => [
            "sélénium - foie",
            "sélénium - sang",
            "sélénium - plasma",
            "glutathion peroxydase (GPxe) -sang",
            "sélénium - lait",
        ],
        'zinc' => [
            "zinc - sang",
        ],
        'vitA' => [],
        'vitD3' => [],
        'vitE' => [],
    ],
    "unités" => [
            "cobalt - sang" => "mg/L",
            "vitamine B12 - sang" => "µg/L",
            "cuivre - plasma" => "mg/L",
            "cuivre - foie" => "mg/kg",
            "iode total - sang" => "µg/L",
            "IIP (iode inorganique plasmatique) - sang " => "µg/L",
            "T4 - sang" => "µg/L",
            "T3 - sang" => "µg/L",
            "iode - lait" => "µg/L",
            "iode - urine" => "µg/L",
            "manganèse - sang" => "µg/L",
            "sélénium - foie" => "mg/kg",
            "sélénium - sang" => "mg/L",
            "sélénium - plasma" => "mg/L",
            "glutathion peroxydase (GPxe) -sang" => "mg/L",
            "sélénium - lait" => "mg/L",
            "zinc - sang" => "mg/L",
    ],

    "carence" => [
        "cobalt - sang" => "0,09",
        "vitamine B12 - sang" => "0,2",
        "cuivre - plasma" => "0,5",
        "cuivre - foie" => "10",
        "iode total - sang" => "80",
        "IIP (iode inorganique plasmatique) - sang " => "51 ou 105",
        "T4 - sang" => "20",
        "T3 - sang" => "1",
        "iode - lait" => "25 (ovins 50)",
        "iode - urine" => "80",
        "manganèse - sang" => "20",
        "sélénium - foie" => "0,15",
        "sélénium - sang" => "0,1",
        "sélénium - plasma" => "0,08",
        "glutathion peroxydase (GPxe) -sang" => "0,1",
        "sélénium - lait" => "0,01",
        "zinc - sang" => "0,6",
    ],
    "normal" => [
        "cobalt - sang" => "0,15 à 0,50",
        "vitamine B12 - sang" => "0,4 à 0,9",
        "cuivre - plasma" => "0,8 à 1,5",
        "cuivre - foie" => "25 à 100",
        "iode total - sang" => "100 à 400 (ovins 50 à 120)",
        "IIP (iode inorganique plasmatique) - sang " => "-",
        "T4 - sang" => "20 à 50 (ovins 40 à 60)",
        "T3 - sang" => "1,3 à 1,6",
        "iode - lait" => "30 à 300 (ovins 80 à 100)",
        "iode - urine" => "100 à 250",
        "manganèse - sang" => "-",
        "sélénium - foie" => "0,25 à 0,5 (ovins 0,25 à 1,5)",
        "sélénium - sang" => "0,2 à 1,2 (ovins 0,15 à 0,5)",
        "sélénium - plasma" => "0,08 à 0,5",
        "glutathion peroxydase (GPxe) -sang" => "20 à 40 (ovins 60 à 180)",
        "sélénium - lait" => "0,03 à 0,05 (ovins 0,03 à 0,25)",
        "zinc - sang" => "0,8 à 1,2",
    ],
    "intoxication" => [
        "cobalt - sang" => "1,5",
        "vitamine B12 - sang" => "-",
        "cuivre - plasma" => "4 à 10",
        "cuivre - foie" => "500 à 1000",
        "iode total - sang" => "700",
        "IIP (iode inorganique plasmatique) - sang " => "-",
        "T4 - sang" => "100",
        "T3 - sang" => "-",
        "iode - lait" => "500",
        "iode - urine" => "400",
        "manganèse - sang" => "-",
        "sélénium - foie" => "1,25 (ovins ?)",
        "sélénium - sang" => "10 (ovins ?)",
        "sélénium - plasma" => "0,8 (ovins ?)",
        "glutathion peroxydase (GPxe) -sang" => "150 (ovins ?)",
        "sélénium - lait" => "0,08 (ovins ND)",
        "zinc - sang" => "3",
    ],
    "prelevement" => [
        "cobalt - sang" => [
            "sec" => "tube_rouge.svg",
            "hep" => "tube_vert.svg"
        ],
        "vitamine B12 - sang" => [
            "hep" => "tube_vert.svg"
        ],
        "cuivre - plasma" => [
            "hep" => "tube_vert.svg"
        ],
        "cuivre - foie" => [
            "org" => "organe.svg"
        ],
        "iode total - sang" => [
            "hep" => "tube_vert.svg",
        ],
        "IIP (iode inorganique plasmatique) - sang " => [
            "hep" => "tube_vert.svg",
        ],
        "T4 - sang" => [
            "sec" => "tube_rouge.svg", 
            "hep" => "tube_vert.svg", 
            "EDTA" => "tube_violet.svg",
        ],
        "T3 - sang" => [
            "?" => "inconnu.svg",
        ],
        "iode - lait" => [
            "lait" => "lait.svg",
        ],
        "iode - urine" => [
            "urine" => "urine.svg",
        ],
        "manganèse - sang" => [
            "sec" => "tube_rouge.svg", 
            "hep" => "tube_vert.svg",
        ],
        "sélénium - foie" => [
            "org" => "organe.svg",
        ],
        "sélénium - sang" => [
            "sec" => "tube_rouge.svg", 
            "hep" => "tube_vert.svg",
        ],
        "sélénium - plasma" => [
            "hep" => "tube_vert.svg",
        ],
        "glutathion peroxydase (GPxe) -sang" => [
            "hep" => "tube_vert.svg",
        ],
        "sélénium - lait" =>  [
            "lait" => "lait.svg",
        ],
        "zinc - sang" => [
            "hep" => "tube_vert.svg",
        ],
    ]
];
