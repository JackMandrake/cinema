<main>
    <section>
        <h2>Consommations</h2>

        <ul>
        </ul>
    </section>
    <section id="tarifs">
        <h2>Tarifs</h2>

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

        <!-- Si on a détecté des erreurs -->
        <?php if (!empty($errors)) : ?>

          <p style="background-color:#f0f;padding:1rem;">
            <?php foreach ($errors as $currentError) : ?>
            <?= $currentError ?><br>
            <?php endforeach ?>
          </p>

        <?php endif ?>

        <!-- Emmet: form[action="" method="get"]>label+input+label+select+label+select+button -->
        <form action="" method="get">
          <label for="input_age">Votre âge</label>
          <input type="number" id="input_age" name="age" value="<?= $ageFromUrl ?>">

          <label for="select_3D">Film en 3D ?</label>
          <select name="3D" id="select_3D">
              <option value="0">non</option>
              <option value="1">oui</option>
          </select>

          <button>Valider</button>
        </form>

        <!-- Si on a calculé un montant, on l'affiche -->
        <?php if (!empty($formMontant)) : ?>
          <p>
            Votre tarif est : <?= number_format($formMontant, 2, ',', ' ') ?> &euro;<br>
            Avec l'abonnement 5 places, le tarif serait de <?= number_format($formMontantAbo, 2, ',', ' ') ?> &euro;<br>
          </p>
        <?php endif ?>

        <h2>Selon votre âge</h2>

        <p>
            <table class="prices">
            <thead>
                <tr>
                    <th class="prices__headings">Âge</th>
                    <th class="prices__headings">Place</th>
                    <th class="prices__headings">Place avec abonnement</th>
                    <th class="prices__headings">Abonnement 5 places</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($amountsByAge as $currentAge=>$currentAmounts) : ?>
                <tr class="prices__row">
                    <td class="prices__data"><?= $currentAge ?></td>
                    <td class="prices__data"><?= number_format($currentAmounts['place'], 2, ',', ' ') ?> &euro;</td>
                    <td class="prices__data"><?= number_format($currentAmounts['placeAvecAbo'], 2, ',', ' ') ?> &euro;</td>
                    <td class="prices__data"><?= number_format($currentAmounts['abo'], 2, ',', ' ') ?> &euro;</td>
                </tr>
                <?php endforeach ?>
            </tbody>
            </table>
        </p>
    </section>
</main>