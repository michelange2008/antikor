<?php
return [

    "troupeau" => [
        "atelier" => "cp",
        "stade" => "lactation",
        "parametres" => [],
    ],

    "msi" => 2,

    "stades" => [
        "gestation",
        "lactation",
    ],

    "default" => [
        "cp" => [
            "poids" => 70,
            "prolificite" => 1.5,
            "quantite" => 3,
        ],
        "oa" => [
            "poids" => 60,
            "prolificite" => 1.5,
            "quantite" => 0.8,
        ],
        "ol" => [
            "poids" => 65,
            "prolificite" => 1.5,
            "quantite" => 2,
        ],
    ],

    "ateliers" => [
        "cp" => [
            "nom" => "chèvres laitières",
            "production" => "lait",
            "icone" => "CP_tete.svg",
        ],
        "oa" => [
            "nom" => "brebis allaitantes",
            "production" => "viande",
            "icone" => "OA_tete.svg",
        ],
        "ol" => [
            "nom" => "brebis laitières",
            "production" => "lait",
            "icone" => "OL_tete.svg",
        ],
    ],
];