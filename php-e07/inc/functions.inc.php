<?php

// LE fichier pour toutes les fonctions de ce projet
// Entrée :
//      - l'âge du client
//      - (optionnel) film avec supplément 3D ? (vrai/faux, faux par défaut)
//      - (optionnel) avec ou sans abonnement 5 places ? (vrai/faux, faux par défaut)
// Sortie : le montant du ticket
// Ci dessous, la doc de la fonction au format DocBlock !

/**
 * Fonction permettant de calculer le montant d'une place, selon l'âge
 * 
 * @param int $age Age de la personne
 * @param bool $avec3D Avec ou sans supplément 3D (false par défaut)
 * @param bool $avecAbonnement Avec ou sans abonnement 5 places (false par défaut)
 * @return float montant de la place de cinéma
 */
function getCinemaTicketAmount($age, $avec3D=false, $avecAbonnement=false) {
    // var_dump($avec3D);
    // var_dump($avecAbonnement);
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

    // Si il y a un supplément 3D à 1€
    if ($avec3D) {
        $montant += 1;
    }

    // Deuxième phase, appliquer la réduction selon l'âge, pour l'abonnement
    if ($avecAbonnement) {
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
    }

    // On retourne le montant calculé
    return $montant;
}