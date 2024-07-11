<?php

return [
    'oligovitamines' => [
        'oligoelements' => [
            'zinc',
            'manganese',
            'cuivre',
            'iode',
            'cobalt',
            'selenium',
        ],
        'vitamines' => [
            'vitA',
            'vitD',
            'vitE',
        ],
    ],

    /**
     * Espèces, productions, ateliers, stades
     */

    'especes' => [
        'cp',
        'ov',
        'bv',
    ],
    'productions' => [
        'aucune' => 'aucune',
        'lait' => "lait",
        'all' => "allaitant",
        'crois' => "croissance",
    ],
    'ateliers' => [
        'cp' => [
            'cp_lait',
            'cp_crois',
        ],
        'ov' => [
            'ov_lait',
            'ov_all',
            'ov_crois',
        ],
        'bv' => [
            'bv_lait',
            'bv_all',
            'bv_crois',
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
        'atelier' => 'cp_lait',
        'stade' => 'gestation',
        'mineral' => [
            'zinc' => 7000,
            'cuivre' => 2000,
            'iode' => 100,
            'selenium' => 30,
            'cobalt' => 50,
            'manganese' => 7000,
            'vitA' => 1500000,
            'vitD' => 200000,
            'vitE' => 5000,
        ],
    ],

    /**
     * Matière sèche ingérée en fonction de l’espèce et du stade
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
     * ajr, seuils de carence et de toxicité des oligo-éléments
     * et vitamines
     */

    'valeurs' => [
        'zinc' => [
            'apports_alim' => '20',
            'carence' => '45',
            'ajr' => '55',
            'toxicite' => '250',
            'max_reglem' => '150',
        ],
        'manganese' => [
            'apports_alim' => '25',
            'carence' => '45',
            'ajr' => '50',
            'toxicite' => '1000',
            'max_reglem' => '',
        ],
        'cuivre' => [
            'apports_alim' => '5',
            'carence' => '7',
            'ajr' => [
                'bv' => '10',
                'ov' => '10',
                'cp' => '15',
            ],
            'toxicite' => [
                'bv' => '30',
                'ov' => '12',
                'cp' => '30',
            ],
            'max_reglem' => '-',
        ],
        'iode' => [
            'apports_alim' => '0.1',
            'carence' => '0.15',
            'ajr' => '0.5',
            'toxicite' => '8',
            'max_reglem' => '',
        ],
        'cobalt' => [
            'apports_alim' => '0.1',
            'carence' => '0.07',
            'ajr' => '0.3',
            'toxicite' => '10',
            'max_reglem' => '2',
        ],
        'selenium' => [
            'apports_alim' => '0',
            'carence' => '0.1',
            'ajr' => '0.1',
            'toxicite' => '0.5',
            'max_reglem' => '0.5',
        ],
        'vitA' => [
            'apports_alim' => '0',
            'carence' => '4200',
            'ajr' => [
                'gestation' => '7000',
                'lactation' => '5000',
            ],
            'toxicite' => '66000',
            'max_reglem' => '-',
        ],
        'vitD' => [
            'apports_alim' => '0',
            'carence' => '1000',
            'ajr' => '1000',
            'toxicite' => '10000',
            'max_reglem' => '-',
        ],
        'vitE' => [
            'apports_alim' => '0',
            'carence' => '15',
            'ajr' => [
                'gestation' => '25',
                'lactation' => '15',
            ],
            'toxicite' => '2000',
            'max_reglem' => '-',
        ],
    ],
];
