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
            'zinc' => 7000,
            'cuivre' => 2000,
            'iode' => 120,
            'selenium' => 30,
            'cobalt' => 35,
            'manganese' => 7000,
            'vitA' => 1500000,
            'vitD3' => 200000,
            'vitE' => 5000,
        ],
    ],


    /**
     * Matière sèche ingérée en fonction de l’espèce et du stade
     */

    'msi' => [
        'cp' => [
            'cp_lait' => [
                'gestation' => '2',
                'lactation' => '3',
            ],
            'cp_crois' => [
                'croissance' => '1',
            ],
        ],
        'ov' => [
            'ov_lait' => [
                'gestation' => '1.8',
                'lactation' => '2.5',
            ],
            'ov_all' => [
                'gestation' => '1.5',
                'lactation' => '2',
            ]
        ],
        'bv' => [
            'bv_lait' => [
                'gestation' => '12',
                'lactation' => '16',
            ],
            'bv_all' => [
                'gestation' => '11',
                'lactation' => '13.5',
            ]
        ],
    ],

    /**
     * Besoins, seuils de carence et de toxicité des oligo-éléments
     * et vitamines
     */
    'valeurs' => [
        'zinc' => [
            'apports_alim' => '20',
            'carences' => '45',
            'besoins' => '35',
            'toxicite' => '250',
            'max_reglem' => '150',
        ],
        'cuivre' => [
            'apports_alim' => '4',
            'carences' => '7',
            'besoins' => [
                'bv' => '6',
                'ov' => '6',
                'cp' => '11'
            ],
            'toxicite' =>  [
                'bv' => '30',
                'ov' => '15',
                'cp' => '30'
            ],
            'max_reglem' => '-',
        ],
        'iode' => [
            'apports_alim' => '0.1',
            'carences' => '0.15',
            'besoins' => '0.5',
            'toxicite' => '8',
            'max_reglem' => '-',
        ],
        'selenium' => [
            'apports_alim' => '0',
            'carences' => '0.1',
            'besoins' => '0.2',
            'toxicite' => '0.5',
            'max_reglem' => '0,5',
        ],
        'cobalt' => [
            'apports_alim' => '0.1',
            'carences' => '0.07',
            'besoins' => '0.2',
            'toxicite' => '10',
            'max_reglem' => '2',
        ],
        'manganese' => [
            'apports_alim' => '25',
            'carences' => '45',
            'besoins' => '30',
            'toxicite' => '1000',
            'max_reglem' => '-',
        ],
        'vitA' => [
            'apports_alim' => '0',
            'carences' => '4200',
            'besoins' => [
                'gestation' => '7000',
                'lactation' => '5000'
            ],
            'toxicite' => '66000',
            'max_reglem' => '-',
        ],
        'vitD3' => [
            'apports_alim' => '0',
            'carences' => '1000',
            'besoins' => '1000',
            'toxicite' => '10000',
            'max_reglem' => '-',
        ],
        'vitE' => [
            'apports_alim' => '0',
            'carences' => '15',
            'besoins' => [
                'gestation' => '25',
                'lactation' => '15',
            ],
            'toxicite' => '2000',
            'max_reglem' => '-',
        ],
    ],
];
