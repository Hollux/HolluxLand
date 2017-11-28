<?php
namespace VetBundle\Component;

class AnabelArrays
{
    const All = ['Avortement' => self::avortement];
    const avortement =
        ['Base' => [
            'dateavortement' => [
                'key' => ['classType' => ['\Datetime'], 'date avortement']],
            'typedeprelevement' => [
                'key' => ['type de prelevement', 'choice' => self::typeprelevement]],
            'lesionsautopsie' => [
                'key' => ['lésions autopsie']]
        ],
        'Bacteriologie' => [
            'brucella' => [
                'key' => ['brucella', 'choice' =>self::NAP],
                'identification' => ['choice' =>self::identificationBrucella]],
            'listeria' => [
                'key' => ['listeria', 'choice' =>self::NAP],
                'identification' => ['choice' =>self::identificationListeria]],
            'salmonella' => [
                'key' => ['salmonella', 'choice' =>self::NAP],
                'identification' => ['choice' =>self::identificationSalmonella]],
            //TODO CHAMP AUTRE + NAP + identification
            'autrebacteriologie' => ['key' => ['autre']]
        ],
        'PCR' => [
            'brucella' => [
                'key' => ['brucella', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'identification' => ['choice' =>self::identificationPCRBrucella],
                'resultatquantitatif' => []],
            'BVD' => [
                'key' => ['BVD', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'resultatquantitatif' => []],
            'chlamydia' => [
                'key' => ['chlamydia', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'identification' => ['choice' =>self::identificationChlamydia],
                'resultatquantitatif' => []],
            'coxiellaburnetii' => [
                'key' => ['coxiella burnetii (Fièvre Q)', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'resultatquantitatif' => []],
            'IBR' => [
                'key' => ['IBR', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'resultatquantitatif' => []],
            'leptospira' => [
                'key' => ['leptospira', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'identification' => ['choice' =>self::identificationLeptospira],
                'resultatquantitatif' => []],
            'leucose' => [
                'key' => ['leucose', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'resultatquantitatif' => []],
            'neospora' => [
                'key' => ['neospora', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'resultatquantitatif' => []],
            //TODO CHAMP AUTRE + NAP + identification
            'autrepcr' => [
                'key' => ['autre']]

        ],
        'Mycologie' => [
            'mycologie' => [
                'key' => ['mycologie', 'choice' =>self::NAP],
                'identification' => ['choice' =>self::identificationMycologie],
                'resultatquantitatif' => []]
        ],
        'Serologie' => [
            'adenovirus' => [
                'key' => ['adénovirus', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'typage' => ['choice' =>self::typage],
                'resultatquantitatif' => []],
            'anaplasma' => [
                'key' => ['anaplasma', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'identification' => ['choice' =>self::identificationAnaplasma],
                'resultatquantitatif' => []],
            'besnoitiabesnoiti' => [
                'key' => ['besnoitia besnoiti', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'resultatquantitatif' => []],
            'brucella' => [
                'key' => ['brucella', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'identification' => ['choice' =>self::identificationPCRBrucella],
                'resultatquantitatif' => []],
            'BVD' => [
                'key' => ['BVD', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'resultatquantitatif' => []],
            'chlamydia' => [
                'key' => ['chlamydia', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'identification' => ['choice' =>self::identificationChlamydia],
                'resultatquantitatif' => []],
            'chlamydophila' => [
                'key' => ['chlamydophila', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'identification' => ['choice' =>self::identificationChlamydophila],
                'resultatquantitatif' => []],
            'coxiellaburnetii' => [
                'key' => ['coxiella burnetii (Fièvre Q)', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'resultatquantitatif' => []],
            'erlichia' => [
                'key' => ['erlichia', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'resultatquantitatif' => []],
            'FCO' => [
                'key' => ['FCO', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'detailFCO' => ['skip' => ['Détail FCO']],
                'typage1' => ['choice' =>self::typage1],
                'resultatquantitatif1' => [],
                'typage2' => ['choice' =>self::typage1],
                'resultatquantitatif2' => []],
            'IBR' => [
                'key' => ['IBR', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'resultatquantitatif' => []],
            'leptospira' => [
                'key' => ['leptospira', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'identification' => ['choice' =>self::identificationSerologieLeptospira],
                'resultatquantitatif' => []],
            'mycoplasma' => [
                'key' => ['mycoplasma', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'identification' => ['choice' =>self::identificationMycoplasma],
                'resultatquantitatif' => []],
            'neospora' => [
                'key' => ['neospora', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'resultatquantitatif' => []],
            'parainfluenzaPI3' => [
                'key' => ['parainfluenza PI3', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'resultatquantitatif' => []],
            'RSV' => [
                'key' => ['RSV', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'resultatquantitatif' => []],
            'visnamaedi' => [
                'key' => ['Visna maëdi', 'choice' =>self::tests],
                'methode' => ['choice' =>self::methode],
                'resultatquantitatif' => []],
            //TODO CHAMP AUTRE + NAP + identification
            'autrepcr' => ['key' => ['autre']]
        ]
    ];
    const bacteriologieAutresOrganes =
        ['gram-:Enterobacteries' => [
            'ecoli' => [
                'key' => ['e.coli', 'choice' =>self::NAP],
                'typage' => ['choice' =>self::ecoli]],
            'klebsiella' => [
                'key' => ['klebsiella', 'choice' =>self::NAP],
                'identification' => ['choice' =>self::klebsiella]],
            'salmonella' => [
                'key' => ['salmonella', 'choice' =>self::NAP],
                'identification' => ['choice' =>self::salmonella]],
            'autregramenterobacteries' => [
                'key' => ['autre']],
          ],
        'gram-:Non Enterobacteries' => [
            'bordetella' => [
                'key' => ['bordetella', 'choice' =>self::NAP],
                'identification' => ['choice' =>self::bordetella]
            ],
            'haemophilus' => [
                'key' => ['haemophilus', 'choice' =>self::NAP],
                'identification' => ['choice' =>self::haemophilus]
            ],
            'histophilus' => [
                'key' => ['histophilus', 'choice' =>self::NAP],
                'identification' => ['choice' =>self::histophilus]
            ],
            'pasteurella' => [
                'key' => ['pasteurella', 'choice' =>self::NAP],
                'identification' => ['choice' =>self::pasteurella]
            ],
            'pseudomonas' => [
                'key' => ['pseudomonas', 'choice' =>self::NAP],
                'identification' => ['choice' =>self::pseudomonas]
            ],
            'autregramnonenterobacteries' => [],
          ],
        'gram+' => [
            'actinomyces' => [
                'key' => ['actinomyces', 'choice' =>self::NAP],
                'identification' =>  ['choice' =>self::actinomyces]
            ],
            'clostridium' => [
                'key' => ['clostridium', 'choice' =>self::NAP],
                'identification' => ['choice' =>self::clostridium]
            ],
            'corynebacterium' => [
                'key' => ['corynebacterium', 'choice' =>self::NAP],
                'identification' => ['choice' =>self::corynebacterium]
            ],
            'enterococcus' => [
                'key' => ['enterococcus', 'choice' =>self::NAP],
                'identification' => ['choice' =>self::enterococcus]
            ],
            'listeria' => [
                'key' => ['listeria', 'choice' =>self::NAP],
                'identification' => ['choice' =>self::listeria]
            ],
            'staphylococcus' => [
                'key' => ['staphylococcus', 'choice' =>self::NAP],
                'identification' => ['choice' =>self::staphylococcus]
            ],
            'streptococcus' => [
                'key' => ['streptococcus', 'choice' =>self::NAP],
                'identification' => ['choice' =>self::streptococcus]
            ],
            'autregram+' => [],
          ],
        'autre(s)' => [
            'mycoplasma' => [
                'key' => ['mycoplasma', 'choice' =>self::NAP],
            ],
            'autreautre(s)' => [],
        ]
        ];

    const bacteriologieFeces =
        ['Base' => [
            'ecoli' => [
                'key' => ['E.coli', 'choice' =>self::NAP],
                'typage' => ['choice' =>self::ecolifeces],
                'resultatquantitatif' => []],
            'clostridium' => [
                'key' => ['clostridium', 'choice' =>self::NAP],
                'typage' => ['choice' =>self::clostridiumfeces],
                'resultatquantitatif' => []],
            'clostridiumtoxinealpha' => [
                'key' => ['clostridium(toxine alpha)', 'choice' =>self::NAP]],
            'paratuberculose' => [
                'key' => ['paratuberculose(recherche par la coloration de Ziehl)', 'choice' =>self::NAP],
            ],
            'salmonella' => [
                'key' => ['salmonella', 'choice' =>self::NAP],
            ],
            'autre' => []
        ]
        ];

    //bacteriologie:feces
    const clostridiumfeces = ['baratii', 'botulinum', 'colinum', 'difficile', 'perfringens',
        'piliforme', 'sp', 'spiroforme', 'tetani', 'autre'];

    const ecolifeces = ['abscence', 'CS 31A', 'F17(FY)', 'F41', 'F5(K99)', 'non agglutinable',
        'non typé', 'O78K80', 'sp', 'autre'];

    //bacteriologie:autres organes
    const mycoplasma = ['bovis', 'genitalium', 'hyopneumoniae', 'pneumoniae', 'sp', 'autre'];

    const streptococcus = ['bovis', 'sp', 'autre'];

    const staphylococcus = ['aureus', 'coagulase négative', 'coagluse positive', 'epidermidis',
        'intermedius', 'sp', 'autre'];

    const listeria = ['grayi', 'innocua', 'ivanovii', 'monocytogenes', 'murrayi', 'sp', 'autre'];

    const enterococcus = ['cecorum', 'dispar', 'durans', 'faecalis', 'sp', 'autre'];


    const corynebacterium = ['amycolatum', 'aquilae', 'arcanobacterium pyogenes', 'bovis',
        'camporealensis', 'caspium', 'kutscheri', 'mastitidis', 'minustissimum', 'pseudotuberculosis',
        'pyogenes', 'sp', 'spheniscorum', 'suicordis', 'testudinoris', 'ulceribovis', 'urealyticum',
        'autre'];

    const clostridium = ['baratii', 'botulinum', 'chauvei', 'colinum', 'difficile',
        'haemolyticum', 'noviy', 'oedematiens', 'perfringens', 'piliforme', 'septicum',
        ' sordelli', 'sp', 'spiroforme', 'tetani', 'autre'];

    const actinomyces = ['bovis', 'gerencseriae', 'israelii', 'pyogenes', 'sp', 'autre'];

    const pseudomonas = ['aeruginosa', 'fluorescens', 'sp', 'autre'];

    const pasteurella =  ['mannheima haemolytica', 'multocida', 'sp', 'autre'];

    const histophilus = ['somni', 'sp', 'autre'];

    const haemophilus = ['equigenitalis', 'felis', 'paragallinarum', 'parainfluenzae' , 'parasuis',
        'pleuropneumoniae', 'sp', 'autre'];

    const bordetella = ['avium', 'bronchiseptica', 'hinzi', 'sp', 'autre'];

    const salmonella = ['bredeney', 'choleraesuis', 'derby', 'dublin', 'enterica', 'enteritidis',
        'infantis', 'montevideo', 'newport', 'panama', 'paratyphi', 'senftenber', 'sp', 'typhimurium',
        'virchow', 'autre'];

    const klebsiella = ['oxytoca', 'pneumoniae', 'terrigena', 'sp', 'autre'];

    const ecoli = ['CS 31A', 'F17(FY)', 'F41', 'F5(K99)', 'Non agglutinable', 'Non typé',
        'O78K80', 'sp', 'autre'];

    const NAP = ['Non testé', "Absence", "Présence"];

    const tests = ['non testé', 'négatif', 'positif', 'positif+', 'positif++', 'positif+++', 'positif++++', 'douteux',];

    const methodeSerologie = ['elisa', 'FC: Fixation du complément', 'IF: Immunofuorescence', 'SN: Séroneutralisation', 'autre'];

    const typage = ['sérotype1', 'sérotype2', 'sérotype3', 'sérotype4', 'sérotype5', 'sérotype6', 'sérotype7',
        'sérotype8', 'sérotype9', 'sous-groupe I', 'sous-groupe II', 'non-typé', 'autre'];

    const typage1 = ['sérotype 1', 'sérotype 2', 'sérotype 3', 'sérotype 4', 'sérotype 5', 'sérotype 6', 'sérotype 7',
        'sérotype 8', 'sérotype 9', 'sérotype 10', 'sérotype 11', 'sérotype 12', 'sérotype 13', 'sérotype 14', 'sérotype 15',
        'sérotype 16', 'sérotype 17', 'sérotype 18', 'sérotype 19', 'sérotype 20', 'sérotype 21', 'sérotype 22', 'sérotype 23',
        'sérotype 24', 'autre'];

    const typeprelevement = ['avorton', 'ecouvillon', 'placenta', 'ecouvillon + prise de sang', 'autre'];

    const identificationBrucella = ['abortus', 'canis', 'melitensis', 'netomae', 'ovis', 'sp', 'suis', 'autre'];

    const identificationPCRBrucella = ['abortus', 'canis', 'melitensis', 'netomae', 'ovis', 'suis', 'autre'];

    const identificationListeria = ['grayi', 'innocua', 'ivanovii', 'monocytogenes', 'murrayi', 'sp', 'autre'];

    const identificationSalmonella = ['bredeney', 'choleraesuis', 'derby', 'dublin', 'entericia', 'enteritidis',
        'infantis', 'montevideo', 'newport', 'panama', 'paratyphi', 'senftenberg', 'sp', 'typhimurium',
        ' virchow', 'autre'];

    const methode = ['qualitative', 'quantitative', 'temps réel', 'autre'];

    const methodeBrucella = ['EAT : Epreuve Antigène Tamponné', 'Elisa', 'FC : Fixation du Complément', 'Rose Bengale',
        'S.A.W', 'autre'];

    const identificationChlamydia = ['agalactiae', 'bovis', 'dispar', 'muridarum', 'suis', 'sp', 'autre'];

    const identificationLeptospira = ['australis', 'autumnalis', 'ballum', 'bataviae', 'grippotyphosa',
        'hardjobovis', 'hebdomadis', 'icterohaemorrhagiae', 'panama', 'pomona', 'pyrogenes', 'tarassovi', 'autre'];

    const identificationSerologieLeptospira = ['australis', 'autumnalis', 'ballum', 'bataviae', 'grippotyphosa',
        'hardjobovis', 'hebdomadis', 'icterohaemorrhagiae', 'panama', 'pomona', 'pyrogenes', 'sp', 'tarassovi', 'autre'];

    const identificationMycologie = ['aspergillus fumigatus', 'aspergillus sp', 'candida albicans', 'candida sp',
        'cryptococcus sp', 'dermatophilus sp', 'microsporum sp', 'mucorales', 'trichophyton sp',
        'trichosporon sp', 'autre'];

    const identificationAnaplasma = ['bovis', 'phagocytophila', 'sp', 'autre'];

    const identificationChlamydophila = ['pecorum', 'pneumoniae', 'psittaci', 'sp', 'autre'];

    const identificationMycoplasma = ['agalactiae', 'bovis', 'dispar', 'autre'];

}