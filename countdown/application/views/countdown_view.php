<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countdown</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <main>
        <h1>Countdown before day ends!</h1>
        <section>
            <h3><?= $countdown['seconds'] ?> seconds</h3>
            <p><?= $countdown['date'] ?></p>
        </section>
    </main>
</body>
</html>