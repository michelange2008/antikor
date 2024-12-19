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
        "vl" => [
            "poids" => 750,
            "prolificite" => 1,
            "quantite" => 20,
        ],
        "va" => [
            "poids" => 650,
            "prolificite" => 1,
            "quantite" => 10,
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
        "vl" => [
            "nom" => "vaches laitières",
            "production" => "lait",
            "icone" => "VL_tete.svg",
        ],
        "va" => [
            "nom" => "vaches allaitantes",
            "production" => "viande",
            "icone" => "VA_tete.svg",
        ],
    ],

    "besoins_initiaux" => [
        "P" => 0,
        "Ca" => 0,
    ],

    "apports_initiaux" => [
        "P" => 0,
        "Ca" => 0,
    ],

    "car" => [
        'P' => 0.68,
        'Ca' => 0.45,
    ],
];