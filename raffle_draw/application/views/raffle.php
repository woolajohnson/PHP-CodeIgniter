<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Raffle Draw</title>
        <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    </head>
    <body>
        <main>
            <h2>There are <span><?= $this->session->userdata('winner') ?></span> lucky winners selected</h2>
            <h1><?= $this->session->userdata('ticket') ?></h1>
            <form action="/main/draw" method="post">
                <input type="submit" name="submit" id="submit" value="Pick more">
            </form>
        </main>
    </body>
</html>