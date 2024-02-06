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
            'selenium' => '0.1',
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
            'selenium' => '0.1',
            'cobalt' => '0.3',
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
            'zinc' => '250',
            'cuivre' => '30',
            'iode' => '8',
            'selenium' => '0.5',
            'cobalt' => 10,
            'manganese' => 1000,
            'vitA' => 66000,
            'vitD3' => 10000,
            'vitE' => 2000,
        ],
    ],

    /**
     * Tolérance dans la carences ou l'excès
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
        'espece' => 'ov',
        'atelier' => 'ov_lait',
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
        'cr' => 'croissance'
    ],

    'ateliersActifs' => [
        'aucun' => true,
        'cp_lait' => true,
        'cp_crois' => true,
        'ov_lait' => true,
        'ov_all' => true,
        'ov_crois' => false,
        'bv_lait' => true,
        'bv_all' => true,
        'bv_crois' => false,
    ],
    'valeurs' => [
        'zinc' => [
            'carences' => '45',
            'besoins' => '50',
            'toxicites' => '250',
        ],
        'cuivre' => [
            'carences' => '7',
            'besoins' => [
                'bv' => '10',
                'ov' => '10',
                'cp' => '15'
            ],
            'toxicites' =>  [
                'bv' => '30',
                'ov' => '15',
                'cp' => '30'
            ],
        ],
        'iode' => [
            'carences' => '0.15',
            'besoins' => '0.7',
            'toxicites' => '8',
        ],
        'selenium' => [
            'carences' => '0,1',
            'besoins' => '0,1',
            'toxicites' => '0,5',
        ],
        'cobalt' => [
            'carences' => '0,07',
            'besoins' => '0,3',
            'toxicites' => '10',
        ],
        'manganese' => [
            'carences' => '45',
            'besoins' => '50',
            'toxicites' => '1000',
        ],
        'vitA' => [
            'carences' => '4200',
            'besoins' => [
                'ge' => '7000',
                'la' => '5000'
            ],
            'toxicites' => '66000',
        ],
        'vitD3' => [
            'carences' => '1000',
            'besoins' => '1000',
            'toxicites' => '10000',
        ],
        'vitE' => [
            'carences' => '45',
            'besoins' => [
                'ge' => '25',
                'la' => '15',
            ],
            'toxicites' => '2000',
        ],
    ],
];
