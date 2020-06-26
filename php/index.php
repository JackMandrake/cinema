<?php

// On ne veut plus répéter le code du header
// On a déplacé ce code dans un seul fichier templates/header.tpl.php
// On n'a plus qu'à "inclure" le contenu de ce fichier, ici
include 'templates/header.tpl.php';
// On peut considérer que PHP copie-colle le contenu du fichier inclu, ici

// On peut inclure un fichier qui n'existe pas
// include 'toto.php';
// Cela va générer une erreur, et le script PHP va continuer
// Mais si on utilise la "commande" require
// alors, si le fichier n'existe pas, une erreur sera affichée, et le script sera arrêté
// require 'toto.php';

?>

  <main>
<?php // On ouvre l'interpréteur PHP (on peut le faire autant de fois qu'on veut)

// On peut créer la variable $age avec l'âge du capitaine
$age = 43;

// Si on veut faire apparaitre une donnée dans le code source HTML
// on doit faire un "echo"
// echo "Age du capitaine : {$age}";
// Mais on ne veut pas faire apparaitre ce texte ici, mais dans la balise <p> plus bas

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

// puis on ferme cet interpréteur
// les varaibles créées restent disponibles
?>

    <section>
      <p>
        Age du capitaine : <?php echo $age; ?><br>
        Le montant d'une place pour le capitaine est de : <?php echo $montant; ?> &euro;
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