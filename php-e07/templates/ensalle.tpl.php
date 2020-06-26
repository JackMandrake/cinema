    <main>
        <section>
            <h2>Actuellement en salle</h2>
            <p>
                Le <?= date('d/m/Y') ?>
            </p>

            <ul>
            <?php for ($cle = 0 ; $cle < count($films) ; $cle++) : ?>
                <li><?= $films[$cle] ?></li>
            <?php endfor ?>
            </ul>
        </section>

        <section>
            <h2>Liste des salles</h2>

            <ul>
            <?php for ($cle = 0; $cle < count($rooms); $cle++) : ?>
                <li><?= $rooms[$cle] ?></li>
            <?php endfor; ?>
            </ul>
        </section>
    </main>