<?php $this->load->view('partials/header'); ?>
        <div class="container">
<?php 
        if($this->session->flashdata('errors')) {
?>
            <div class="alert alert-danger col-md-8 offset-md-2 text-center mt-4 text-danger"><?= $this->session->flashdata('errors') ?></div>
<?php
        }
?>
            <section id="form" class="row p-2 mb-1">
                <h2 class="text-center text-primary p-3">Add your own hilarious joke</h2>
                <div class="col-md-8 offset-md-2 card shadow">
                    <?= form_open(base_url('/jokes/create'), array('class' => 'row g-2 card-body p-5')) ?>
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input
                                type="text"
                                class="form-control"
                                id="title"
                                name="title"
                            />
                        </div>
                        <div class="col-md-12">
                            <label for="content" class="form-label"
                                >Content</label
                            >
                            <textarea name="content" class="form-control" id="content" cols="30" rows="7"></textarea>
                        </div>
                        <div class="col-12 mt-4">
                            <a class="btn btn-outline-secondary mx-1" href="<?= base_url('/jokes') ?>">Go back</a>
                            <button type="submit" name="submit" value="insert" class="btn btn-outline-primary">Add joke</button>
                        </div>
                    <?= form_close() ?>
                </div>
            </section>
        </div>
<?php $this->load->view('partials/footer'); ?>