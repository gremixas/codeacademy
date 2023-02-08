<a href="../index.php">Į pradžią</a>
<section>
    <header>
        <h1>
            Žaidimai
        </h1>
    </header>

    <div class="game-cards">
        <?php foreach ($games as $game) { ?>
            <article class="game-card">
                <a href="./show.php?id=<?= $game['id']; ?>"></a>
                <img src="<?= $game['image']; ?>">
                <header>
                    <h2>
                        <?= $game['name']; ?>
                    </h2>
                </header>
                <div class="game-card-body">
                    <div class="game-card-details">
                        <div>
                            <span>Release date:</span>
                            <span><?= $game['release_date']; ?></span>
                        </div>
                        <div>
                            <span>Developer:</span>
                            <span><?= $game['developer']; ?></span>
                        </div>
                        <div>
                            <span>Genre:</span>
                            <span><?= $game['genre']; ?></span>
                        </div>
                    </div>
                    <div class="game-card-description">
                        <?= $game['description_short']; ?>
                    </div>
                </div>
            </article>

        <?php } ?>

    </div>
</section>
