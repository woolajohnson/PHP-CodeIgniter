<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Exercises</title>
</head>
<body>
    <main>
<?php 
    if($ninja_count == 0) {
        $ninja_count = 5;
    }
    for($i = 1; $i <= $ninja_count; $i++) {
        $images_count = ($i % 5) + 1;
?>
        <img src="<?= base_url('assets/images/ninja' . $images_count . '.jpg') ?>" alt="ninja<?= $images_count ?>">
<?php
    }
?>
    </main>
</body>
</html>