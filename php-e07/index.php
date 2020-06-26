<?php

// Dans cette réorganisation
// 1 - On va d'abord préparer les données à afficher

// 1bis - on aura surement besoin des fonctions => inclusion
include 'inc/functions.inc.php';

// La template home.tpl.php a besoin de 2 variables : $age et $montant
// Je vais les préparer ici

// Age du capitaine
$ageDuCapitaine = 43;

// On veut calculer le tarif d'une place pour le capitaine
// $montant = getCinemaTicketAmount(); // => erreur car $age obligatoire
$montant = getCinemaTicketAmount($ageDuCapitaine); // => sans 3D, sans Abo
$montantAvec3D = getCinemaTicketAmount($ageDuCapitaine, true, false); // => avec 3D, sans abo
$montantAvec3DAvecAbo = getCinemaTicketAmount($ageDuCapitaine, true, true); // => avec 3D, avec abo
$montantSans3DAvecAbo = getCinemaTicketAmount($ageDuCapitaine, false, true); // => avec 3D, avec abo
// var_dump(getCinemaTicketAmount(12)); // => param $age=12
// var_dump(getCinemaTicketAmount(15)); // => param $age=15
// var_dump(getCinemaTicketAmount(20)); // => param $age=20
// var_dump(getCinemaTicketAmount(60)); // => param $age=60
// var_dump(getCinemaTicketAmount(75)); // => param $age=75
// exit;

// 2 - Et à la toute fin, on va inclure les templates permettant l'affichage
include 'templates/header.tpl.php';
include 'templates/home.tpl.php';
include 'templates/footer.tpl.php';