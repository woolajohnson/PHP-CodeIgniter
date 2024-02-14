<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CI Money Button Game</title>
        <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    </head>
    <body>
        <main>
            <header>
                <h2>Your money: <span><?= $_SESSION['money'] ?></span></h2>
                <form action="/main/reset" method="post">
                    <input type="submit" name="reset" value="Reset Game">
                </form>
            </header>
            <section>
                <form action="/main/bet" method="post">
                    <h3>Low Risk</h3>
                    <input type="submit" name='low_risk' value="Bet">
                    <p>by -25 up to 100</p>
                </form>
                <form action="/main/bet" method="post">
                    <h3>Moderate Risk</h3>
                    <input type="submit" name='moderate_risk' value="Bet">
                    <p>by -100 up to 1000</p>
                </form>
                <form action="/main/bet" method="post">
                    <h3>High Risk</h3>
                    <input type="submit" name='high_risk' value="Bet">
                    <p>by -500 up to 2500</p>
                </form>
                <form action="/main/bet" method="post">
                    <h3>Severe Risk</h3>
                    <input type="submit" name='severe_risk' value="Bet">
                    <p>by -3000 up to 5000</p>
                </form>
            </section>
            <h3>Game Host:</h3>
            <div class="host_game">
                <?= $this->session->userdata('new_message'); ?>
            </div>
        </main>
    </body>
</html>