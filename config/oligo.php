<?php

return [
    'oligovitamines' => [
        'oligoelements' => [
            'zinc' => 'zinc',
            'cuivre' => 'cuivre',
            'iode' => 'iode',
            'selenium' => 'sélénium',
            'cobalt' => 'cobalt',
            'manganese' => 'manganèse',
        ],
        'vitamines' => [
            'vitA' => 'vitamine A',
            'vitD3' => 'vitamine D3',
            'vitE' => 'vitamine E',
        ],
    ],

    /**
     * Besoins de animaux en mg/km MSI ou ppm
     */

    'besoins' => [
        'cp_lait' => [
            'zinc' => '50',
            'cuivre' => '15',
            'iode' => '0.7',
            'selenium' => '0.15',
            'cobalt' => '0.2',
            'manganese' => '50',
            'vitA' => '7500',
            'vitD3' => '1000',
            'vitE' => '30',
        ],
        'ov_lait' => [
            'zinc' => '50',
            'cuivre' => '10',
            'iode' => '0.7',
            'selenium' => '0.15',
            'cobalt' => '0.2',
            'manganese' => '50',
            'vitA' => '7500',
            'vitD3' => '1000',
            'vitE' => '30',
        ],
        'ov_all' => [
            'zinc' => '50',
            'cuivre' => '10',
            'iode' => '0.7',
            'selenium' => '0.15',
            'cobalt' => '0.2',
            'manganese' => '50',
            'vitA' => '6000',
            'vitD3' => '1000',
            'vitE' => '25',
        ],
    ],

    /**
     * Matière sèche ingérée en fonction de l'espece et du stade
     */

    'msi' => [
        'cp_lait' => [
            'ge' => '2',
            'la' => '3',
        ],
        'ov_lait' => [
            'ge' => '2',
            'la' => '3',
        ],
        'ov_all' => [
            'ge' => '2',
            'la' => '3',
        ],
    ],

    /**
     * Seuils de toxicité
     */

    'toxicites' => [
        'ov' => [
            'zinc' => 10000,
            'cuivre' => '13',
            'iode' => 10000,
            'selenium' => 10000,
            'cobalt' => 10000,
            'manganese' => 10000,
            'vitA' => 66000,
            'vitD3' => 10000,
            'vitE' => 2000,
        ],
        'cp' => [
            'zinc' => '10000',
            'cuivre' => '10000',
            'iode' => 10000,
            'selenium' => 10000,
            'cobalt' => 10000,
            'manganese' => 10000,
            'vitA' => 66000,
            'vitD3' => 10000,
            'vitE' => 2000,
        ],
    ],

    /**
     * Tolérance dans la carence ou l'excès
     */

    'tolerance' => '0.2',

    /**
     * Valeurs au démarrage de l'appli
     *  quantite: quantite de minéral distribuée par g/animal/jour
     *  atelier: cp_lait = chèvres laitières (options ov_lait, ov_all)
     *  stade: ge = gestation (options ge, la <=> lactation)
     *  mineral: on démarre avec des valeurs à 0 pour l'affichage des couleurs
     */

    'init' => [
        'quantite' => '10',
        'atelier' => 'cp_lait',
        'stade' => 'ge',
        'mineral' => [
            'zinc' => 0,
            'cuivre' => 0,
            'iode' => 0,
            'selenium' => 0,
            'cobalt' => 0,
            'manganese' => 0,
            'vitA' => 0,
            'vitD3' => 0,
            'vitE' => 0,
        ],
    ],

    /**
     * Types d'ateliers disponibles
     */

    'ateliers' => [
        'cp_lait' => "chèvres laitières",
        'ov_lait' => "brebis laitières",
        'ov_all' => "brebis allaitantes",
    ],
    'stades' => [
        'ge' => 'gestation',
        'la' => 'lactation',
    ],
    'especes' => [
        'cp' => "caprins",
        'ov' => "ovins",
    ],
];
