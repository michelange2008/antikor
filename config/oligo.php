<?php

return [

    'listeOligos' => [
        'zinc'      =>  "zinc",
        'cuivre'    =>  "cuivre",
        'iode'      =>  "iode",
        'selenium'  =>  "sélénium",
        'cobalt'    =>  "cobalt",
        'manganese' =>  "manganèse",
        'vitA'      =>  "vitamine A",
        'vitD3'     =>  "vitamine D3",
        'vitE'      =>  "vitamine E",
    ],
    /**
     * Besoins de animaux en mg/km MSI ou ppm
     */
    'besoins' => [
        'cp_lait' => [
            'zinc'      =>  50,
            'cuivre'    =>  15,
            'iode'      =>  0.7,
            'selenium'  =>  0.15,
            'cobalt'    =>  0.2,
            'manganese' =>  50,
            'vitA'      =>  5000,
            'vitD3'     =>  2500,
            'vitE'      =>  250,
    
        ],
        'ov_lait' => [
            'zinc'      =>  50,
            'cuivre'    =>  10,
            'iode'      =>  0.7,
            'selenium'  =>  0.15,
            'cobalt'    =>  0.2,
            'manganese' =>  50,
            'vitA'      =>  5000,
            'vitD3'     =>  2500,
            'vitE'      =>  250,
        ],
        'ov_all' => [
            'zinc'      =>  50,
            'cuivre'    =>  10,
            'iode'      =>  0.7,
            'selenium'  =>  0.15,
            'cobalt'    =>  0.2,
            'manganese' =>  50,
            'vitA'      =>  5000,
            'vitD3'     =>  2500,
            'vitE'      =>  250,
        ],
    ],
    /**
     * Matière sèche ingérée en fonction de l'espece et du stade
     */
    'msi' => [
        'cp_lait' => [
            'ge' => 2,
            'la' => 3
        ],
        'ov_lait' => [
            'ge' => 2,
            'la' => 3
        ],
        'ov_all' => [
            'ge' => 2,
            'la' => 3
        ],
    ],
    /**
     * Seuils de toxicité
     */
    'tox' => [
        
        'ov' => [
            'zinc' => 10000,
            'cuivre' => 12,
            'iode' => 10000,
            'selenium' => 10000,
            'cobalt' => 10000,
            'manganese' => 10000,
            'vitA' => 20000000,
            'vitD3' => 20000000,
            'vitE' => 20000000,
        ],
        'cp' => [
            'zinc' => 10000,
            'cuivre' => 10000,
            'iode' => 10000,
            'selenium' => 10000,
            'cobalt' => 10000,
            'manganese' => 10000,
            'vitA' => 20000000,
            'vitD3' => 20000000,
            'vitE' => 20000000,
        ],
    ],
    /**
     * Tolérance dans la carence ou l'excès
     */
    'tolerance' => 0.2, 
    /**
     * Valeurs au démarrage de l'appli
     */
    'init' => [
        /**
         * Quantité de minéral distribue en g
         */
        'quantite' => 10,
        /**
         * chèvres laitières = cp_lait
         * brebis laitières = ov_lait
         * brebis allaitantes = ov_all
         */
        'atelier' => 'cp_lait',
        /**
         * gestation = ge
         * lactation = la
         */
        'stade' => 'ge',
        /**
         * Minéral initialisé avec des valeurs à 0
         */
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
];
