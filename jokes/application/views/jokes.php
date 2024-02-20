<?php $this->load->view('partials/header'); ?>
        <div class="container p-5">
<?php
        if($this->session->flashdata('success')) {
?>
            <div class="alert alert-success col-lg-12 text-center my-4 text-success"><?= $this->session->flashdata('success') ?></div>
<?php
        }
?>
            <section id="form" class="flex-row card shadow d-flex justify-content-between py-3 px-5 mb-1">
                <div class="col-lg-6 p-2 mx-5">
                    <h1 id="jokesCount" class="mb-4">Jokes List (<?= count($result) ?>)</h1>
                    <?= form_open(base_url('jokes/filter_jokes/'), array('class' => 'my-4')) ?>
                        <input type="radio" id="male" name="filter" value="recent">
                        <label for="male">Recent</label>
                        <input class="ms-3" type="radio" id="female" name="filter" value="old">
                        <label for="female">Old</label>
                    <?= form_close() ?>
                    <div id="jokesContainer">
<?php
                    foreach($result as $joke) {
?>
                        <p><a href="<?= base_url('joke/' . $joke['id']) ?>"><?= $joke['title'] ?> (<?= $joke['date'] ?>)</a></p>
<?php
                        }
?>
                    </div>
                </div>
                <div class="col-lg-3 p-2 mx-5 text-end align-self-top">
                    <a class="btn btn-outline-primary" href="<?= base_url('jokes/new') ?>">Add new joke</a>
                </div>
            </section>
        </div>
<?php $this->load->view('partials/footer'); ?>