<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Exercises</title>
</head>
<body>
    <main>
        <h1>User Name: <?= $all_data['name'] ?></h1>
        <h2>User Age: <?= $all_data['age'] ?>, Location: <?= $all_data['location'] ?></h2>
        <h3><?= count($all_data['hobbies']) . " Hobbies" ?></h3>
        <ul>
<?php 
        foreach($all_data['hobbies'] as $hobby) {
?>
            <li><?= $hobby ?></li>
<?php
        }
?>
        </ul> 
    </main>
</body>
</html>