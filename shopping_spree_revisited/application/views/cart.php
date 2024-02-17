<?php $this->load->view('partials/header'); ?>
        <nav class="navbar navbar-expand-lg bg-primary-subtle mb-5">
            <div class="container">
                <a class="navbar-brand text-primary" href="<?= base_url('products/') ?>">My Store</a>
                
                <?= form_open('/products', array('class' => 'd-flex')) ?>
                    <button class="btn btn-outline-primary" type="submit">Catalog</button>
                <?= form_close() ?>
                </div>
            </div>
        </nav>
        <div class="container">
<?php 
        if($this->session->flashdata('errors')) {
?>
            <div class="alert alert-danger col-lg-10 offset-lg-1 text-center mt-4 text-danger"><?= $this->session->flashdata('errors') ?></div>
<?php
        }
?>
            <section id="form" class="row mb-5">
                <div class="col-lg-10 offset-lg-1">
                    <h2 class="d-flex justify-content-start">Check Out</h2>
                </div>
                <div class="col-lg-10 offset-lg-1">
                    <h3 class="d-flex text-primary justify-content-end">Total $<?= $total_amount ?></h3>
                </div>
                <div class="col-lg-10 offset-lg-1">
                    <table class="table table-bordered mt-2 mb-5">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="col-4">Item name</th>
                                <th scope="col" class="col-3">Qty</th>
                                <th scope="col" class="col-1">Price</th>
                                <th scope="col" class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
                        foreach($result as $item) {                 
?>
                            <tr>
                                <td scope="col" class="col-5"><?= $item['product_name'] ?></td>
                                <td scope="col" class="col-3"><?= $item['quantity'] ?></td>
                                <td scope="col" class="col-2"><?= $item['price'] ?></td>
                                <td scope="col" class="col-2">
                                    <?= form_open('/products/delete/' . $item['product_id']) ?>
                                        <button class="btn btn-danger" type="submit" name="submit" value="remove">Remove</button>
                                    <?= form_close() ?>
                                </td>
                            </tr>
<?php
                        }
?>
                        </tbody>
                    </table>
                </div>
            </section>
<?php 
        if($this->session->flashdata('billing_errors')) {
?>
            <div class="alert alert-danger col-lg-6 offset-lg-3 text-center mt-4 text-danger"><?= $this->session->flashdata('billing_errors') ?></div>
<?php
        }
?>
            <div class="col-lg-6 mx-auto card shadow my-5 p-5">
                <h2 class="text-primary text-center mb-1">Billing Info</h2>
                <?= form_open('/products/billing') ?>
                    <input type="hidden" name="total_amount" value="<?=$total_amount?>" />
                    <div class="col-lg-12">
                        <label for="billing_name" class="form-label"></label>
                        <input type="text" class="form-control form-control-lg" placeholder="Name" id="billing_name" name="billing_name" />
                    </div>
                    <div class="col-lg-12">
                        <label for="billing_address" class="form-label"></label>
                        <input type="text" class="form-control form-control-lg" placeholder="Address" id="billing_address" name="billing_address" />
                    </div>
                    <div class="col-lg-12">
                        <label for="card_number" class="form-label"></label>
                        <input type="text" class="form-control form-control-lg" placeholder="Card number" id="card_number" name="card_number" />
                    </div>
                    <div class="col-lg-12 mt-4">
                        <button name="submit" value="billing" class="btn btn-primary form-control form-control-lg">Submit Order</button>
                    </div>
                <?= form_close() ?>
            </div>
        </div>
<?php $this->load->view('partials/footer'); ?>