<?php $this->load->view('partials/header'); ?>
        <div class="container">
            <div class="text-center card shadow my-5 p-5">
                <h2 class="text-danger mb-5">Are you sure you want to delete this joke?</h2>
                <?= form_open(base_url('jokes/destroy/' . $result['id'])) ?>
                    <button name="submit" value="yes" class="btn btn-outline-danger mx-3 px-5">Yes</button>
                    <button name="submit" value="no" class="btn btn-outline-primary px-5">No</button>
                <?= form_close() ?>
            </div>
        </div>
<?php $this->load->view('partials/footer'); ?>