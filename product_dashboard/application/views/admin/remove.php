<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
        <div class="container">
            <div class="text-center card shadow my-5 p-5">
                <h2 class="text-danger mb-5">Are you sure you want to delete Product #<?= $result['id'] ?>?</h2>
                <?= form_open(base_url('products/delete/' . $result['id'])) ?>
                    <button name="submit" value="yes" class="btn btn-outline-danger mx-3 px-5">Yes</button>
                    <button name="submit" value="no" class="btn btn-outline-primary px-5">No</button>
                <?= form_close() ?>
            </div>
        </div>
<?php $this->load->view('partials/footer'); ?>