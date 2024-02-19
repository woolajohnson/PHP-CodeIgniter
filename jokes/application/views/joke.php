<?php $this->load->view('partials/header'); ?>
        <div class="container p-5">
            <section id="form" class="flex-row card d-flex justify-content-between align-items-center p-5 mb-1">
                <div class="col-lg-8 p-2 mx-5">
                    <h1 class="mb-4"><?= $result['title'] ?></h1>
                    <h5 class="text-primary"><?= $result['content'] ?></h5>
                </div>
                <div class="col-lg-3 p-2 text-end">
                    <a class="btn btn-outline-primary" href="<?= base_url('jokes/new') ?>">Add new joke</a>
                    <a class="btn btn-outline-danger" href="<?= base_url('jokes/delete/'. $result['id']) ?>">Delete joke</a>
                </div>
            </section>
        </div>
<?php $this->load->view('partials/footer'); ?>