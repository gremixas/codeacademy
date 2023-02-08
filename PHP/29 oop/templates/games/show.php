<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My page</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>
    <main>
        <a href="../index.php">Į pradžią</a>
        <section>
            <header>
                <h1>
                    Žaidimai
                </h1>
            </header>

            <div class="game-cards">
                <article class="game-card">
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
            </div>
        </section>
    </main>
</body>

</html>