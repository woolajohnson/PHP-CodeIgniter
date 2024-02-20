<?php foreach($result as $joke): ?>
    <p><a href="<?= base_url('joke/' . $joke['id']) ?>"><?= $joke['title'] ?> (<?= $joke['date'] ?>)</a></p>
<?php endforeach; ?>
