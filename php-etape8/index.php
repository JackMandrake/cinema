<?php

// Dans cette réorganisation
// 1 - On va d'abord préparer les données à afficher

// La template home.tpl.php a besoin de 2 variables : $age et $montant
// Je vais les préparer ici

// Age du capitaine
$age = 43;

// On veut calculer le tarif d'une place pour le capitaine
/*
TARIF PLEIN : 8,30 €
TARIF REDUIT : 6,80 € (pour +60ans et -16ans)
TARIF ENFANT : 4,50 € (pour -14ans)
*/
$tarifPlein = 8.3;
$tarifReduit = 6.8;
$tarifEnfant = 4.5;

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

// 2 - Et à la toute fin, on va inclure les templates permettant l'affichage
include 'templates/header.tpl.php';
include 'templates/home.tpl.php';
include 'templates/footer.tpl.php';