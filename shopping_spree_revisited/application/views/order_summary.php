<?php $this->load->view('partials/header'); ?>
            <nav class="navbar navbar-expand-lg bg-primary-subtle mb-5">
                <div class="container">
                    <a class="navbar-brand text-primary" href="<?= base_url('products/') ?>">My Store</a>
                    
                    <?= form_open('/products', array('class' => 'd-flex')) ?>
                        <button class="btn btn-outline-primary" type="submit">Catalog</button>
                    <?= form_close() ?>
                </div>
            </nav>
        <div class="container">
<?php
        if($this->session->flashdata('summary_success')) {
?>
            <div class="alert alert-success col-lg-8 offset-lg-2 text-center mt-4 text-success"><?= $this->session->flashdata('summary_success') ?></div>
<?php
        }
?>
            <div class="col-lg-8 mx-auto card shadow my-5 p-5">
                <div class="card-body">
                    <h2 class="card-title text-center text-success mb-5">Order Summary</h2>
                    <p><strong>Billing Name: </strong><?=$this->session->flashdata('billing_name');?></p>
                    <p><strong>Billing Address: </strong><?=$this->session->flashdata('billing_address');?></p>
                    <p><strong>Card number: ending in </strong><?=$this->session->flashdata('ending_number');?></p>
                    <p><strong>Total Amount: </strong> $<?=$this->session->flashdata('total_amount');?></p>
                </div>
            </div>
        </div>
<?php $this->load->view('partials/footer'); ?>