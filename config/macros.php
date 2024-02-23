<?php
return [

    "troupeau" => [
        "atelier" => "cp",
        "poids" => 70,
        "production" => "lait",
        "stade" => "lactation",
        "quantite" => 2,
    ],

    "msi" => 2,

    "stades" => [
        "gestation",
        "lactation",
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