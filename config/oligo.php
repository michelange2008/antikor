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
     * Espèces, productions, ateliers, stades
     */

    'especes' => [
        'cp' => "caprins",
        'ov' => "ovins",
        'bv' => "bovins",
    ],

    'productions' => [
        'aucune' => 'aucune',
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
        'gestation',
        'lactation',
        'croissance',
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

    /**
     * Valeurs au démarrage de l'appli
     *  quantite: quantite de minéral distribuée par g/animal/jour
     *  atelier: cp_lait = chèvres laitières (options ov_lait, ov_all)
     *  stade: ge = gestation (options ge, la <=> lactation)
     *  mineral: on démarre avec des valeurs moyennes d'un minéral caprin
     */

    'init' => [
        'quantite' => '10',
        'espece' => 'cp',
        'atelier' => 'cp_lait',
        'stade' => 'gestation',
        'mineral' => [
            'zinc' => 9000,
            'cuivre' => 2500,
            'iode' => 150,
            'selenium' => 30,
            'cobalt' => 35,
            'manganese' => 9000,
            'vitA' => 1500000,
            'vitD3' => 200000,
            'vitE' => 5000,
        ],
    ],


    /**
     * Matière sèche ingérée en fonction de l'espece et du stade
     */

    'msi' => [
        'cp_lait' => [
            'gestation' => '2',
            'lactation' => '3',
        ],
        'cp_crois' => [
            'croissance' => '1',
        ],
        'ov_lait' => [
            'gestation' => '1.8',
            'lactation' => '2.5',
        ],
        'ov_all' => [
            'gestation' => '1.5',
            'lactation' => '2',
        ],
        'bv_lait' => [
            'gestation' => '12',
            'lactation' => '16',
        ],
        'bv_all' => [
            'gestation' => '11',
            'lactation' => '13.5',
        ],

    ],

    /**
     * Besoins, seuils de carence et de toxicité des oligo-éléments
     * et vitamines
     */
    'valeurs' => [
        'zinc' => [
            'carences' => '45',
            'besoins' => '50',
            'toxicites' => '250',
            'max_reglem' => '150',
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
            'max_reglem' => '-',
        ],
        'iode' => [
            'carences' => '0.15',
            'besoins' => '0.7',
            'toxicites' => '8',
            'max_reglem' => '-',
        ],
        'selenium' => [
            'carences' => '0.1',
            'besoins' => '0.1',
            'toxicites' => '0.5',
            'max_reglem' => '0,5',
        ],
        'cobalt' => [
            'carences' => '0.07',
            'besoins' => '0.3',
            'toxicites' => '10',
            'max_reglem' => '2',
        ],
        'manganese' => [
            'carences' => '45',
            'besoins' => '50',
            'toxicites' => '1000',
            'max_reglem' => '-',
        ],
        'vitA' => [
            'carences' => '4200',
            'besoins' => [
                'gestation' => '7000',
                'lactation' => '5000'
            ],
            'toxicites' => '66000',
            'max_reglem' => '-',
        ],
        'vitD3' => [
            'carences' => '1000',
            'besoins' => '1000',
            'toxicites' => '10000',
            'max_reglem' => '-',
        ],
        'vitE' => [
            'carences' => '15',
            'besoins' => [
                'gestation' => '25',
                'lactation' => '15',
            ],
            'toxicites' => '2000',
            'max_reglem' => '-',
        ],
    ],
];
