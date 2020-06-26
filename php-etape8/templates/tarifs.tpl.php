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