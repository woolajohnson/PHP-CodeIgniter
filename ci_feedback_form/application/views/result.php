<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CI Feedback Form</title>
        <link rel="stylesheet" href="<?= base_url('assets/css/result.css') ?>">
    </head>
    <body>
        <main>
            <h1>Submitted Entry</h1>
            <p>Your Name (optional): <?= $result['name'] ?></p>
            <p>Course Title: <?= $result['course_title'] ?></p>
            <p>Given Score (1-10): <?= $result['score'] ?></p>
            <p id="reason">Reason: <?= $result['reason'] ?></p>
            <form action="/main/return" method="post">
                <button type="submit" name="return" id="return">Return</button>
            </form>
        </main>
    </body>
</html>