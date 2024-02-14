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
    if($this->session->flashdata('error_message')) {
        ?>
        <p><?= $this->session->flashdata('error_message') ?></p>
        <?php
    } else if($any['count_words'] == 0) {
?>
        <p><?= $any['words'] ?></p>
<?php
        } else {
        for($i = 0; $i < $any['count_words']; $i++) {
?>
        <p><?= $any['words'] ?></p>
<?php
        }
    }
?>
    </main>
</body>
</html>