<?php

// On ne veut plus répéter le code du header
// On a déplacé ce code dans un seul fichier templates/header.tpl.php
// On n'a plus qu'à "inclure" le contenu de ce fichier, ici
include 'templates/header.tpl.php';
// On peut considérer que PHP copie-colle le contenu du fichier inclu, ici

?>

  <main>
    <section>
        <h2>Consommations</h2>

        <ul>
<?php

// Bonus challenge E02
$extras = [
    [
        'Popcorn',
        'L',
        2.9
    ],
    [
        'Popcorn',
        'XL',
        4
    ],
    [
        'Chips',
        '50g',
        2.5
    ],
    [
        'M&M\'s',
        '100g',
        4
    ],
    [
        'Soda',
        '33cl',
        3.2
    ],
    [
        'Evian',
        '33cl',
        3
    ]
];
// On debug
// print_r($extras);

// On essaie d'afficher Popcorn
// On passe par la première clé 0
// echo $extras[0].'<br>'; // sauf que on ne peut pas afficher un tableau avec echo
// On va debug ce tableau avec print_r
// print_r($extras[0]);
// echo '<br>';
// On veut accéder à la valeur Popcorn dans ce sous-tableau
// Donc on doit passer par la clé 0
// echo $extras[0][0].'<br>';

// On veut afficher "Chips"
// echo $extras[2][0].'<br>';

// On peut ajouter une 3e dimension, comme le demande Solène
// $extras[2][3] = [
//     'Solène',
//     'Livran'
// ];
// On debug pour visualiser cette 3e dimension
// print_r($extras);
// echo '<br><br>';
// on arrête le script
// exit;

// On veut afficher l'information pour la première conso
// echo "{$extras[0][0]} ({$extras[0][1]}) : {$extras[0][2]} &euro;<br>";
// echo "{$extras[1][0]} ({$extras[1][1]}) : {$extras[1][2]} &euro;<br>";
// echo "{$extras[2][0]} ({$extras[2][1]}) : {$extras[2][2]} &euro;<br>";

// On définit une boucle permettant d'aller de 0 à 5
// On utilisera la valeur "dynamique" pour la clé du premier niveau
for ($i = 0; $i <= 5 ; $i++) {
    // echo "{$extras[$i][0]} ({$extras[$i][1]}) : {$extras[$i][2]} &euro;<br>";
    echo '<li>';
    echo $extras[$i][0] . ' (' . $extras[$i][1] . ') : ' . $extras[$i][2] . ' &euro;';
    echo '</li>';
}

?>
        </ul>
    </section>
    <section id="tarifs">
        <h2>Tarifs</h2>
<?php

// On veut un tableau avec les noms de tarifs et leur prix dans chaque élément
// ça fait donc 2 données, pour chaque élément
// On peut faire comme pour le bonus "Consommations" et avoir un sous-tableau
$tarifs = [
    // tarif plein & 8.3
    [
        'Tarif Plein',
        8.3
    ],
    [
        'Tarif Réduit',
        6.8
    ],
    [
        'Tarif Enfant',
        4.5
    ],
    [
        'Supplément 3D',
        1
    ]
];
// On debug, on analyse
// print_r($tarifs);exit;

// On va progressivement comprendre comment stocker 2 infos dans un tableau à 1 seule dimension
$students = [
    'Alexia', // index non précisé => 0
    'Benjamin', // index non précisé => 0 + 1 => 1
    8 => 'Arnaud', // index précise => 8
    'David', // index non précisé => 8 + 1 => 9
    // Dans un tableau, on peut spécifier la clé/index de chaque élément
    // => ("Flèche double") permet de spécifier cet index/clé
    5 => 'Christopher' // index précise => 5
];
// print_r($students);

// Et si on ajoute un élément, sans spécifier la clé
// $students[] = 'Solene'; // index non précisé => 9 + 1 => 10
// print_r($students);

// Et si on ajoute un élément, sans spécifier la clé
// $students[] = 'Solene'; // index non précisé => 9 + 1 => 10
// print_r($students);

// On définit une valeur pour la clé 10
// $students[10] = 'Mathieu'; // => en fait c'est une modification
// print_r($students);

// On peut ajouter un élément à l'index qu'on souhaite !
// $students[25] = 'Tata';
// print_r($students);

// => On peut préciser l'index qu'on veut pour chaque élément
// cet index est de type numérique
// Mais, il pourrait être une chaîne de caractères
// => dans ce cas, on appelle cela un tableau associatif
$tarifs = [
    // key => value,
    'Tarif Plein' => 8.3, // index 'Tarif Plein'
    'Tarif Réduit' => 6.8,
    'Tarif Enfant' => 4.5,
    'Supplément 3D' => 1
    // 2.6 => 'toto' // par contre, pas de float en clé, ils sont convertis en entier
];
// On debug
// print_r($tarifs);

// On veut afficher 6.8
// echo $tarifs['Tarif Réduit'].'<br>';
// => comme avant, on passe par la clé pour accéder à la valeur
// mais cette clé, c'est une string

// Par contre, comment on peut désormais parcourir ce tableau associatif ?
// Avant, les clés étaient des entiers de 0 jusqu'à X
// Maintenant, les clés peuvent être tout entier, ou tout string
// PHP nous a créer une boucle pour ces tableaux associatifs (valable pour tous les tableaux)
// for each = pour chaque => pour chaque élément du tableau
// Le bloc de code sera exécuté pour chaque élément du tableau
// as cle=>valeur => PHP stocke dans ces 2 variables, la clé de l'élément, et la valeur de l'élément
// $key et $value changent de valeur à chaque élément
// foreach ($tarifs as $key => $value) {
//     echo $key. ' : ' . $value.'<br>';
// }

// On peut nommer $key et $value comme on veut
// foreach ($tarifs as $nomDuTarif => $montantDuTarif) {
//     echo $nomDuTarif. ' : ' . $montantDuTarif.'<br>';
// }

// On arrête le script
// exit;

// On doit aussi créer un tableau associatif pour les abonnements
$abonnements = [
    // clé => valeur
    'Abonnement 5 places' => 10,
    'Abonnement 5 places -25ans' => 20
];

?>

        <div class="flex">
          <ul>
            <!-- On peut aussi utilise la boucle foreach dans du "PHTML" -->
            <?php foreach ($tarifs as $name=>$price) : ?>
            <li><?php echo $name ?> : <?= $price ?> &euro;</li>
            <?php endforeach ?>
            <!-- La } est remplacée par endforeach  -->
          </ul>
          <ul>
            <?php foreach ($abonnements as $name=>$percent) : ?>
            <li><?= $name ?> : -<?php echo $percent ?>%</li>
            <?php endforeach ?>
          </ul>
        </div>
        <p>
          Tarif Réduit pour les personnes de + de 60 ans et de moins de 16 ans<br>
          Tarif Enfant pour les - de 14 ans
        </p>
      
      <h2>Selon votre âge</h2>
      <p>
<?php
// Etape 2

/*
TARIF PLEIN : 8,30 €
TARIF REDUIT : 6,80 € (pour +60ans et -16ans)
TARIF ENFANT : 4,50 € (pour -14ans)
*/
$tarifPlein = 8.3;
$tarifReduit = 6.8;
$tarifEnfant = 4.5;

// On crée la variable contenant l'âge
$age = 1;

// Si age < 14
if ($age < 14) {
    // alors tarif enfant
    $montant = $tarifEnfant;
}
// sinon, si age < 16 (age >= 14 implicite)
else if ($age < 16) {
    // alors tarif réduit
    $montant = $tarifReduit;
}
// sinon si age < 60 (age >= 16 implicite)
else if ($age < 60) {
    // alors tarif plein
    $montant = $tarifPlein;
}
// sinon (age >= 60 implicite)
else {
    // alors tarif réduit
    $montant = $tarifReduit;
}

// On affiche le tarif pour une personne d'1 an
echo "A {$age} an(s), le tarif est : {$montant}<br>";

// ---------------------------------------------------

// On ajoute 1 à la variable contenant l'âge
$age += 1;

// Si age < 14
if ($age < 14) {
    // alors tarif enfant
    $montant = $tarifEnfant;
}
// sinon, si age < 16 (age >= 14 implicite)
else if ($age < 16) {
    // alors tarif réduit
    $montant = $tarifReduit;
}
// sinon si age < 60 (age >= 16 implicite)
else if ($age < 60) {
    // alors tarif plein
    $montant = $tarifPlein;
}
// sinon (age >= 60 implicite)
else {
    // alors tarif réduit
    $montant = $tarifReduit;
}

// On affiche le tarif pour une personne d'1 an
echo "A {$age} an(s), le tarif est : {$montant}<br>";

// ---------------------------------------------------

// On ajoute 1 à la variable contenant l'âge
$age += 1;

// Si age < 14
if ($age < 14) {
    // alors tarif enfant
    $montant = $tarifEnfant;
}
// sinon, si age < 16 (age >= 14 implicite)
else if ($age < 16) {
    // alors tarif réduit
    $montant = $tarifReduit;
}
// sinon si age < 60 (age >= 16 implicite)
else if ($age < 60) {
    // alors tarif plein
    $montant = $tarifPlein;
}
// sinon (age >= 60 implicite)
else {
    // alors tarif réduit
    $montant = $tarifReduit;
}

// On affiche le tarif pour une personne d'1 an
echo "A {$age} an(s), le tarif est : {$montant}<br>";

// ---------------------------------------------------

// On ajoute 1 à la variable contenant l'âge
$age += 1;

// Si age < 14
if ($age < 14) {
    // alors tarif enfant
    $montant = $tarifEnfant;
}
// sinon, si age < 16 (age >= 14 implicite)
else if ($age < 16) {
    // alors tarif réduit
    $montant = $tarifReduit;
}
// sinon si age < 60 (age >= 16 implicite)
else if ($age < 60) {
    // alors tarif plein
    $montant = $tarifPlein;
}
// sinon (age >= 60 implicite)
else {
    // alors tarif réduit
    $montant = $tarifReduit;
}

// On affiche le tarif pour une personne d'1 an
echo "A {$age} an(s), le tarif est : {$montant}<br>";

// ---------------------------------------------------

// On ajoute 1 à la variable contenant l'âge
$age += 1;

// Si age < 14
if ($age < 14) {
    // alors tarif enfant
    $montant = $tarifEnfant;
}
// sinon, si age < 16 (age >= 14 implicite)
else if ($age < 16) {
    // alors tarif réduit
    $montant = $tarifReduit;
}
// sinon si age < 60 (age >= 16 implicite)
else if ($age < 60) {
    // alors tarif plein
    $montant = $tarifPlein;
}
// sinon (age >= 60 implicite)
else {
    // alors tarif réduit
    $montant = $tarifReduit;
}

// On affiche le tarif pour une personne d'1 an
echo "A {$age} an(s), le tarif est : {$montant}<br>";

// ---------------------------------------------------

// On ajoute 1 à la variable contenant l'âge
$age += 1;

// Si age < 14
if ($age < 14) {
    // alors tarif enfant
    $montant = $tarifEnfant;
}
// sinon, si age < 16 (age >= 14 implicite)
else if ($age < 16) {
    // alors tarif réduit
    $montant = $tarifReduit;
}
// sinon si age < 60 (age >= 16 implicite)
else if ($age < 60) {
    // alors tarif plein
    $montant = $tarifPlein;
}
// sinon (age >= 60 implicite)
else {
    // alors tarif réduit
    $montant = $tarifReduit;
}

// On affiche le tarif pour une personne d'1 an
echo "A {$age} an(s), le tarif est : {$montant}<br>";

// ---------------------------------------------------
echo '<br>----------------- WHILE ------------------------<br>';

// On ne va pas dupliquer bout de code jusqu'à 99
// On va demander à PHP de répéter un morceau/bout de code plusieurs fois

// 2 - j'initialise la variable
$age = 1;

// 1 - on isole le bout de code à répéter et on le met dans un bloc de code (entouré par {})
// 3 - on définit la condition de sortie (on répète TANT QUE la condition est VRAI)
while ($age <= 99) {
    // Si age < 14
    if ($age < 14) {
        // alors tarif enfant
        $montant = $tarifEnfant;
    }
    // sinon, si age < 16 (age >= 14 implicite)
    else if ($age < 16) {
        // alors tarif réduit
        $montant = $tarifReduit;
    }
    // sinon si age < 60 (age >= 16 implicite)
    else if ($age < 60) {
        // alors tarif plein
        $montant = $tarifPlein;
    }
    // sinon (age >= 60 implicite)
    else {
        // alors tarif réduit
        $montant = $tarifReduit;
    }

    // On affiche le tarif pour une personne
    echo "A {$age} an(s), le tarif est : {$montant}<br>";

    // On ajoute 1 à la variable contenant l'âge
    // 4 - faire attention à l'incrémentation (à la fin du bloc)
    // => on prépare la répétition suivante (l'itération suivante)
    $age += 1;
}

// On vient de faire une BOUCLE
// Une boucle consiste à répéter plusieurs un bloc de code
// Ici, c'est une boucle "while" => littéralement "tant que"

// -------------------------
echo '<br>------------------ FOR -----------------------<br>';

// Autre boucle pour afficher les tarifs de 1 à 99 ans

// La boucle for est un "résumé" des parties vues avec while
// for (initialisation ; conditiion de sortie (tant que) ; incrémentation/itération) {}
for ($age = 1 ; $age <= 99 ; $age += 1) {
    // Si age < 14
    if ($age < 14) {
        // alors tarif enfant
        $montant = $tarifEnfant;
    }
    // sinon, si age < 16 (age >= 14 implicite)
    else if ($age < 16) {
        // alors tarif réduit
        $montant = $tarifReduit;
    }
    // sinon si age < 60 (age >= 16 implicite)
    else if ($age < 60) {
        // alors tarif plein
        $montant = $tarifPlein;
    }
    // sinon (age >= 60 implicite)
    else {
        // alors tarif réduit
        $montant = $tarifReduit;
    }

    // On affiche le tarif pour une personne
    if ($age > 1) {
        echo "A {$age} ans, le tarif est : {$montant}<br>";
    }
    else {
        echo "A {$age} an, le tarif est : {$montant}<br>";
    }
}

?>
      </p>
    </section>
    <section>
        <h2>Tarif d'une place avec abonnement</h2>
        <p>

            <table class="prices">
                <thead>
                    <tr>
                        <th class="prices__headings">Âge</th>
                        <th class="prices__headings">Abonnement</th>
                        <th class="prices__headings">Place</th>
                    </tr>
                </thead>
                <tbody>

<?php

// Boucle de 1 à 99
for ($age = 1 ; $age <= 99 ; $age++) {
    // On calcule le tarif
    // Première phase, calculer le montant normal selon l'âge

    // Si age < 14
    if ($age < 14) {
        // alors tarif enfant
        $montant = $tarifEnfant;
    }
    // sinon, si age < 16 (age >= 14 implicite)
    else if ($age < 16) {
        // alors tarif réduit
        $montant = $tarifReduit;
    }
    // sinon si age < 60 (age >= 16 implicite)
    else if ($age < 60) {
        // alors tarif plein
        $montant = $tarifPlein;
    }
    // sinon (age >= 60 implicite)
    else {
        // alors tarif réduit
        $montant = $tarifReduit;
    }

    // Deuxième phase, appliquer la réduction selon l'âge
    // Si - de 25 ans
    if ($age < 25) {
        // Alors, on retire 20% du montant
        $montant = $montant * 0.8; // 80%
        // $montant *= 0.8;
    }
    // Sinon
    else {
        // Alors, on retire 10% du montant
        $montant = $montant * 0.9; // 90%
        // $montant *= 0.9;
    }

    // On calcule le montant de l'abonnement (montant d'une place x 5)
    $montantAbo = $montant * 5;

    // On affiche, l'age, le montant de l'abo, le montant d'une place
    // Comme il y a pas mal de code HTML, le mieux est de couper l'interpréteur PHP, pour afficher directement ce code HTML
    // Puis, ajouter, à l'intérieur, l'affichage de nos variables

    ?>
    <tr>
        <td class="prices__data"><?= $age ?></td>
        <td class="prices__data"><?= $montantAbo ?></td>
        <td class="prices__data"><?= $montant ?></td>
    </tr>
    <?php

} // end for ($age = 1 ; $age <= 99 ; $age++) 

?>
                </tbody>
            </table>
        </p>
    </section>
  </main>
  
<?php

// On ne veut plus répéter le code du footer
// On a déplacé ce code dans un seul fichier templates/footer.tpl.php
// On n'a plus qu'à "inclure" le contenu de ce fichier, ici
include 'templates/footer.tpl.php';
// On peut considérer que PHP copie-colle le contenu du fichier inclu, ici

?>