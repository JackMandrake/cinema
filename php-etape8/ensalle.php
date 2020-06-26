<?php

// Dans cette réorganisation
// 1 - On va d'abord préparer les données à afficher

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

// On a une erreur dans le titre, c'est dîner pas diner
// on modifie la valeur pour l'élément dont la clé est 1
$films[1] = 'Le dîner de cons';

// Etape 6
// On ajoute un 6e film dans le tableau
$films[] = 'Le sixième sens'; // index 5
// On ajoute un 7eme film, et on voit si on doit modifier la boucle
$films[] = 'La 7e compagnie';

// Challenge E02
// On crée le tableau des salles de cinéma
$rooms = [
    'Athéna', // => index 0
    'Dyonisos', // => index 1
    'Hadès', // => index 2
    'Zeus' // => index 3
];

// 2 - Et à la toute fin, on va inclure les templates permettant l'affichage
include 'templates/header.tpl.php';
include 'templates/ensalle.tpl.php';
include 'templates/footer.tpl.php';