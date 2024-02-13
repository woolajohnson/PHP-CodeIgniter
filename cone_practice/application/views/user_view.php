<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        foreach($user_data as $data) {
            ?>
                <p><?= $data ?></p>
            <?php
        }
    ?>
</body>
</html>
