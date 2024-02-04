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
        'aucun' => [
            'zinc' => '0',
            'cuivre' => '0',
            'iode' => '0',
            'selenium' => '0',
            'cobalt' => '0',
            'manganese' => '0',
            'vitA' => '0',
            'vitD3' => '0',
            'vitE' => '0',
        ],
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
        'cp_crois' => [
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
        'bv_lait' => [
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
        'bv_all' => [
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
        'cp_crois' => [
            'cr' => '1',
        ],
        'ov_lait' => [
            'ge' => '2',
            'la' => '3',
        ],
        'ov_all' => [
            'ge' => '2',
            'la' => '3',
        ],
        'bv_lait' => [
            'ge' => '11',
            'la' => '15',
        ],
        'bv_all' => [
            'ge' => '10',
            'la' => '13',
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
        'bv' => [
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
        'espece' => 'cp',
        'atelier' => 'cp_lait',
        'stade' => 'ge',
        'mineral' => [
            'oligoelements' => [
                'zinc' => 9000,
                'cuivre' => 2500,
                'iode' => 150,
                'selenium' => 30,
                'cobalt' => 35,
                'manganese' => 9000,
            ],
            'vitamines' => [
                'vitA' => 1500000,
                'vitD3' => 200000,
                'vitE' => 5000,
            ],
        ],
    ],

    /**
     * Types d'ateliers disponibles
     */

    'especes' => [
        'cp' => "caprins",
        'ov' => "ovins",
        'bv' => "bovins",
    ],

    'productions' => [
        'lait' => "lait",
        'all' => "allaitant",
        'crois' => "croissance",
    ],

    'ateliers' => [
        'cp' => [
            'cp_lait' => "chèvres laitières",
            'cp_crois' => "chevrettes",
        ],
        'ov' => [
            'ov_lait' => "brebis laitières",
            'ov_all' => "brebis allaitantes",
            'ov_crois' => "agnelles",
        ],
        'bv' => [
            'bv_lait' => "vaches laitières",
            'bv_all' => "vaches allaitantes",
            'bv_crois' => "génisses",
        ],
    ],
    'stades' => [
        'ge' => 'gestation',
        'la' => 'lactation',
    ],

    'ateliersActifs' => [
        'aucun' => true,
        'cp_lait' => true,
        'cp_crois' => false,
        'ov_lait' => true,
        'ov_all' => true,
        'ov_crois' => false,
        'bv_lait' => true,
        'bv_all' => true,
        'bv_crois' => false,
    ],
];
