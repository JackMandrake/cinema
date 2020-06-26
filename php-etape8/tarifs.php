<?php

// Dans cette réorganisation
// 1 - On va d'abord préparer les données à afficher

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
];

// On doit aussi créer un tableau associatif pour les abonnements
$abonnements = [
    // clé => valeur
    'Abonnement 5 places' => 10,
    'Abonnement 5 places -25ans' => 20
];

// Initialisation
$amountsByAge = [];

// Boucle de 1 à 99
for ($age = 1 ; $age <= 99 ; $age++) {
    // On calcule le tarif
    // Première phase, calculer le montant normal selon l'âge

    // Si age < 14
    if ($age < 14) {
        // alors tarif enfant
        $montant = $tarifs['Tarif Enfant'];
    }
    // sinon, si age < 16 (age >= 14 implicite)
    else if ($age < 16) {
        // alors tarif réduit
        $montant = $tarifs['Tarif Réduit'];
    }
    // sinon si age < 60 (age >= 16 implicite)
    else if ($age < 60) {
        // alors tarif plein
        $montant = $tarifs['Tarif Plein'];
    }
    // sinon (age >= 60 implicite)
    else {
        // alors tarif réduit
        $montant = $tarifs['Tarif Réduit'];
    }

    // Deuxième phase, appliquer la réduction selon l'âge
    // Si - de 25 ans
    if ($age < 25) {
        // Alors, on retire 20% du montant
        $montantAvecAbo = $montant * 0.8; // 80%
        // $montant *= 0.8;
    }
    // Sinon
    else {
        // Alors, on retire 10% du montant
        $montantAvecAbo = $montant * 0.9; // 90%
        // $montant *= 0.9;
    }

    // On calcule le montant de l'abonnement (montant d'une place x 5)
    $montantAbo = $montantAvecAbo * 5;

    // Cette fois, on ne peut pas afficher directement
    // Par contre, on peut stocker les données dans un tableau
    // et la template va parcourir ce tableau pour afficher les données
    $amountsByAge[$age] = [
        'place' => $montant,
        'placeAvecAbo' => $montantAvecAbo,
        'abo' => $montantAbo
    ];

} // end for ($age = 1 ; $age <= 99 ; $age++) 

// 2 - Et à la toute fin, on va inclure les templates permettant l'affichage
include 'templates/header.tpl.php';
include 'templates/tarifs.tpl.php';
include 'templates/footer.tpl.php';