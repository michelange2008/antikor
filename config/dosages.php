<?php
return [
    "substrats" => [
        'cobalt' => [
            "cobalt (sang)",
            "vitamine B12 (sang)",
        ],
        'cuivre' => [
            "cuivre (plasma)",
            "cuivre (foie)",
        ],
        'iode' => [
            "iode total (sang)",
            "IIP - iode inorganique plasmatique (sang) ",
            "T4 (sang)",
            "T3 (sang)",
            "iode (lait)",
            "iode (urine)",
        ],
        'manganese' => [
            "manganèse (sang)",
        ],
        'selenium' => [
            "sélénium (foie)",
            "sélénium (sang)",
            "sélénium (plasma)",
            "glutathion peroxydase - GPxe (sang)",
            "sélénium (lait)",
        ],
        'zinc' => [
            "zinc (sang)",
        ],
        'vitA' => [],
        'vitD3' => [],
        'vitE' => [],
    ],

    "cobalt (sang)" => [
        "unités" => "mg/L",
        "carence" => "0,09",
        "normal" => "0,15 à 0,50",
        "intoxication" => "1,5",
        "prelevement" => [
            "sec" => "tube_rouge.svg",
            "hep" => "tube_vert.svg"
        ],
    ],

    "vitamine B12 (sang)" => [
        "unités" => "µg/L",
        "carence" => "0,2",
        "normal" => "0,4 à 0,9",
        "intoxication" => "-",
        "prelevement" => [
            "hep" => "tube_vert.svg"
        ],
    ],
    "cuivre (plasma)" => [
        "unités" => "mg/L",
        "carence" => "0,5",
        "normal" => "0,8 à 1,5",
        "intoxication" => "4 à 10",
        "prelevement" => [
            "hep" => "tube_vert.svg"
        ],
    ],

    "cuivre (foie)" => [
        "unités" => "mg/kg",
        "carence" => "10",
        "normal" => "25 à 100",
        "intoxication" => "500 à 1000",
        "prelevement" => [
            "org" => "organe.svg"
        ],
    ],

    "iode total (sang)" => [
        "unités" => "µg/L",
        "carence" => "80",
        "normal" => "100 à 400 (ovins 50 à 120)",
        "intoxication" => "700",
        "prelevement" => [
            "hep" => "tube_vert.svg",
        ],
    ],

    "IIP - iode inorganique plasmatique (sang) " => [
        "unités" => "µg/L",
        "carence" => "51 ou 105",
        "normal" => "-",
        "intoxication" => "-",
        "prelevement" => [
            "hep" => "tube_vert.svg",
        ],
    ],

    "T4 (sang)" => [
        "unités" => "µg/L",
        "carence" => "20",
        "normal" => "20 à 50 (ovins 40 à 60)",
        "intoxication" => "100",
        "prelevement" => [
            "sec" => "tube_rouge.svg",
            "hep" => "tube_vert.svg",
            "EDTA" => "tube_violet.svg",
        ],
    ],

    "T3 (sang)" => [
        "unités" => "µg/L",
        "carence" => "1",
        "normal" => "1,3 à 1,6",
        "intoxication" => "-",
        "prelevement" => [
            "?" => "tube_inconnu.svg",
        ],
    ],

    "iode (lait)" => [
        "unités" => "µg/L",
        "carence" => "25 (ovins 50)",
        "normal" => "30 à 300 (ovins 80 à 100)",
        "intoxication" => "500",
        "prelevement" => [
            "lait" => "lait.svg",
        ],
    ],
    "iode (urine)" => [
        "unités" => "µg/L",
        "carence" => "80",
        "normal" => "100 à 250",
        "intoxication" => "400",
        "prelevement" => [
            "urine" => "urine.svg",
        ],
    ],
    "manganèse (sang)" => [
        "unités" => "µg/L",
        "carence" => "20",
        "normal" => "-",
        "intoxication" => "-",
        "prelevement" => [
            "sec" => "tube_rouge.svg",
            "hep" => "tube_vert.svg",
        ],
    ],
    "sélénium (foie)" => [
        "unités" => "mg/kg",
        "carence" => "0,15",
        "normal" => "0,25 à 0,5 (ovins 0,25 à 1,5)",
        "intoxication" => "1,25 (ovins ?)",
        "prelevement" => [
            "org" => "organe.svg",
        ],
    ],
    "sélénium (sang)" => [
        "unités" => "mg/L",
        "carence" => "0,1",
        "normal" => "0,2 à 1,2 (ovins 0,15 à 0,5)",
        "intoxication" => "10 (ovins ?)",
        "prelevement" => [
            "sec" => "tube_rouge.svg",
            "hep" => "tube_vert.svg",
        ],
    ],
    "sélénium (plasma)" => [
        "unités" => "mg/L",
        "carence" => "0,08",
        "normal" => "0,08 à 0,5",
        "intoxication" => "0,8 (ovins ?)",
        "prelevement" => [
            "hep" => "tube_vert.svg",
        ],
    ],
    "glutathion peroxydase - GPxe (sang)" => [
        "unités" => "mg/L",
        "carence" => "0,1",
        "normal" => "20 à 40 (ovins 60 à 180)",
        "intoxication" => "150 (ovins ?)",
        "prelevement" => [
            "hep" => "tube_vert.svg",
        ],
    ],
    "sélénium (lait)" => [
        "unités" => "mg/L",
        "carence" => "0,01",
        "normal" => "0,03 à 0,05 (ovins 0,03 à 0,25)",
        "intoxication" => "0,08 (ovins ND)",
        "prelevement" =>  [
            "lait" => "lait.svg",
        ],
    ],
    "zinc (sang)" => [
        "unités" => "mg/L",
        "carence" => "0,6",
        "normal" => "0,8 à 1,2",
        "intoxication" => "3",
        "prelevement" => [
            "hep" => "tube_vert.svg",
        ],
    ],
];
