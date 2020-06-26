<?php

// Dans cette réorganisation
// 1 - On va d'abord préparer les données à afficher

// 1bis - on aura surement besoin des fonctions => inclusion
include 'inc/functions.inc.php';

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

    // On utilise la fonction getCinemaTicketAmount pour calculer le tarif de la place
    $montant = getCinemaTicketAmount($age);

    // On utilise la fonction getCinemaTicketAmount pour calculer le tarif de la place avec abonnement
    $montantAvecAbo = getCinemaTicketAmount($age, false, true);

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

// On a ajouté un formulaire permettant de calculer le tarif pour l'internaute
// Si on a des données en GET
if (!empty($_GET)) {
    // On récupère les données en GET
    $ageFromUrl = filter_input(INPUT_GET, 'age', FILTER_VALIDATE_INT);
    $avec3D = filter_input(INPUT_GET, '3D', FILTER_VALIDATE_BOOLEAN);
    // On vérifie qu'on a bien récupéré les données
    // var_dump($ageFromUrl, $avec3D);

    // On valide les données
    // On estime par défaut que les données saisies sont correctes
    $formOk = true;
    $errors = []; // initialisation du tableau d'erreurs

    // Ensuite, on cherche les erreurs
    if ($ageFromUrl < 0 || $ageFromUrl === false) {
        $errors[] = 'L\'age est incorrect';
        $formOk = false;
    }
    if ($ageFromUrl > 150) {
        $errors[] = 'L\'age renseigné dépasse l\'âge maximum';
        $formOk = false;
    }

    // Si les données sont correctes
    if ($formOk) {
        // Alors, je calcule le montant
        $formMontant = getCinemaTicketAmount($ageFromUrl, $avec3D);
        $formMontantAbo = getCinemaTicketAmount($ageFromUrl, $avec3D, true);
    }
}
else {
    // On crée la variable $ageFromUrl pour l'attr value de l'input
    $ageFromUrl = '';
}

// 2 - Et à la toute fin, on va inclure les templates permettant l'affichage
include 'templates/header.tpl.php';
include 'templates/tarifs.tpl.php';
include 'templates/footer.tpl.php';