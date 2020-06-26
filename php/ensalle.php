<?php

// On ne veut plus répéter le code du header
// On a déplacé ce code dans un seul fichier templates/header.tpl.php
// On n'a plus qu'à "inclure" le contenu de ce fichier, ici
require 'templates/header.tpl.php';
// On peut considérer que PHP copie-colle le contenu du fichier inclu, ici
// Ici, on a choisi de mettre require, parce que Thibaut le voulait

?>

    <main>
        <section>
            <h2>Actuellement en salle</h2>
            <p>
                Le <?= date('d/m/Y') ?>
            </p>

            <p>
<?php
// créer un tableau (array) PHP contenant la liste de 5 films actuellement en salle
// On voit un nouveau type de donnée : tableau (array)
// Un tableau contient plusieurs données, nommées des éléments
// chaque élément est composé d'une clé, et d'une valeur
$films = [ // [] délimite le contenu d'un tableau lors d'une création
    'Ace Ventura', // chaque élément peut être de n'importe quel type
    'Le diner de cons', // chaque élément est séparé d'un autre pas un , (virgule)
    'La cité de la peur',
    'L\'Empire contre attaque',
    'Le cinquième élément'
];
// Debug
// var_dump($films);
// print_r($films); // + utile pour les tableaux
// On constate que PHP a généré des clés pour chaque élément
// Et la première est 0, puis PHP a ajouté/incrémenté de 1

// Je veux afficher "L'empire contre attaque"
// Dans un tableau, je dois "passer" par la clé, pour accéder à la valeur correspondante
echo $films[3].'<br>'; // j'affiche L\'Empire contre attaque

// On veut afficher le diner de cons
echo $films[1].'<br>';

// On a une erreur dans le titre, c'est dîner pas diner
// on modifie la valeur pour l'élément dont la clé est 1
$films[1] = 'Le dîner de cons';

// On veut afficher la nouvelle valeur
echo $films[1].'<br>';

// avant d'écrire une boucle, on va afficher chaque élément, 1 à 1
echo '<br>Liste : <br>';
// echo $films[0].'<br>';
// echo $films[1].'<br>';
// echo $films[2].'<br>';
// echo $films[3].'<br>';
// echo $films[4].'<br>';
// echo $films[5].'<br>'; non, 5 n'existe pas

// Etape 6
// on affiche le nombre d'éléments dans le tableau
// echo count($films).'<br>';
// On ajoute un 6e film dans le tableau
$films[] = 'Le sixième sens'; // index 5
// print_r($films);exit;
// on affiche le nombre d'éléments dans le tableau
// echo count($films).'<br>';

// On ajoute un 7eme film, et on voit si on doit modifier la boucle
$films[] = 'La 7e compagnie';

// Le code des lignes d'affichages sont les mêmes
// sauf la clé, qui démarre de 0, augmente de 1, et va jusqu'à 4 (5 après l'ajout)
// for (initialisation ; conditiion de sortie (tant que) ; incrémentation/itération) {}
// for ($cle = 0 ; $cle <  5 ; $cle += 1) { // Quand on avait 5 éléments
// for ($cle = 0 ; $cle <= 5 ; $cle++) { // Quand on avait 6 éléments
// On va stocker le nombre d'élements dans le tableau
$nbFilms = count($films);
// Puis, on fait notre boucle dynamique (peu importe le nombre d'éléments)
for ($cle = 0 ; $cle < $nbFilms ; $cle++) {
// for ($cle = 0 ; $cle < count($films) ; $cle++) { // ou sans passer pas une variable
    // donc la clé sera la partie "changeante" / "dynamique" du bout de code répété
    echo $films[$cle].'<br>';
    // Quand 0
    // echo $films[0].'<br>';
    // echo 'Ace Ventura' . '<br>';
    // echo 'Ace Ventura<br>';
}

// On peut appeler la fonction date fournie par PHP pour afficher la date du jour
// echo date('d/m/Y');

?>
            </p>
        </section>

        <section>
            <h2>Liste des salles</h2>
<?php

// Challenge E02
// On crée le tableau des salles de cinéma
$rooms = [
    'Athéna', // => index 0
    'Dyonisos', // => index 1
    'Hadès', // => index 2
    'Zeus' // => index 3
];
?>
            <!-- <ul>
                <li><?php echo $rooms[0]; ?></li>
                <li><?php echo $rooms[1]; ?></li>
                <?php echo '<li>' . $rooms[2] . '</li>'; ?>
                <?php echo "<li>{$rooms[3]}</li>"; ?>
            </ul> -->
            <!-- <ul>
<?php

// On essaie de trouver les différentes parties composant une boucle
// Pour cela, on crée et utilise une variable pour la partie "dynamique"
// Puis, manuellement, on change la valeur de cette variable

?>
                <li>
                    <?php
                        $cle = 0; // initialisation
                        echo $rooms[$cle]; // Bloc de code à répéter
                        $cle++; // Instruction d'itération / Incrémentation
                    ?>
                </li>
                <li>
                    <?php
                        echo $rooms[$cle];
                        $cle++
                    ?>
                </li>
                <li>
                    <?php
                        echo $rooms[$cle];
                        $cle++
                    ?>
                </li>
                <li>
                    <?php
                        echo $rooms[$cle];
                    ?>
                </li>
            </ul> -->
            <ul>
<?php

// On peut créer la boucle permettant de parcourir le tableau grâce à sa clé
// allant de 0 à 3 (inclus)

// version 1 - en ouvrant et fermant l'interpréteur PHP plusieurs fois
for ($cle = 0 ; $cle <= 3 ; $cle++) {
    ?><li><?php echo $rooms[$cle]; ?></li><?php
}

?>

<!--
    Version 1bis, en mode PHTML (plein de HTML et peu de PHP)
    ------------------
    chaque ouverture d'interpréteur PHP ne se fait que sur une ligne => c'est fermé en bout de ligne
    : remplace {
    endfor remplace }
    "< ? =" (sans espace) remplace "< ?php echo " (sans espace)
-->
<?php for ($cle = 0; $cle <= 3; $cle++) : ?>
    <li><?= $rooms[$cle] ?></li>
<?php endfor; ?>

<?php

// Version 2 - on concatène en PHP les balises et la variable
for ($cle = 0 ; $cle <= 3 ; $cle++) {
    echo "<li>{$rooms[$cle]}</li>".PHP_EOL;
    // echo '<li>' . $rooms[$cle] . '</li>' . PHP_EOL;
}
?>

            </ul>
        </section>
    </main>

<?php

// On ne veut plus répéter le code du footer
// On a déplacé ce code dans un seul fichier templates/footer.tpl.php
// On n'a plus qu'à "inclure" le contenu de ce fichier, ici
include 'templates/footer.tpl.php';
// On peut considérer que PHP copie-colle le contenu du fichier inclu, ici

?>