<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
        <div class="container">
<?php 
        if($this->session->flashdata('errors')) {
?>
            <div class="alert alert-danger col-md-8 offset-md-2 text-center mt-4 text-danger"><?= $this->session->flashdata('errors') ?></div>
<?php
        }
?>
            <section id="form" class="row p-2 mb-1">
                <h2 class="text-center text-info p-3">Edit Product #1</h2>
                <div class="col-md-8 offset-md-2 card shadow">
                    <?= form_open(base_url('/jokes/create'), array('class' => 'row g-2 card-body p-5')) ?>
                        <div class="col-lg-12">
                            <label for="title" class="form-label">Name</label>
                            <input type="text" class="form-control" id="title" name="title" />
                        </div>
                        <div class="col-lg-12">
                            <label for="content" class="form-label">Description</label>
                            <textarea name="content" class="form-control" id="content" cols="30" rows="4"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <label for="title" class="form-label">Price</label>
                            <input type="text" class="form-control" id="title" name="title" />
                        </div>
                        <div class="col-lg-2">
                            <label for="title" class="form-label">Inventory Count</label>
                            <input type="number" placeholder="0" class="form-control" name="" id="">
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" name="submit" value="insert" class="btn btn-outline-info px-4">Save</button>
                        </div>
                    <?= form_close() ?>
                </div>
            </section>
        </div>
<?php $this->load->view('partials/footer'); ?>