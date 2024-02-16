<?php $this->load->view('partials/header'); ?>
            <nav class="navbar navbar-expand-lg bg-primary-subtle mb-5">
                <div class="container">
                    <a class="navbar-brand text-primary" href="<?= base_url('products/') ?>">My Store</a>
                    
                    <form class="d-flex" action="<?= base_url('products/') ?>" method="post">
                        <button class="btn btn-outline-primary" type="submit">Catalog</button>
                    </form>
                    </div>
                </div>
            </nav>
        <div class="container">
<?php 
        if($this->session->flashdata('errors')) {
?>
            <div class="alert alert-danger col-md-4 offset-md-4 text-center mt-4 text-danger"><?= $this->session->flashdata('errors') ?></div>
<?php
        }
        if($this->session->flashdata('success')) {
?>
            <div class="alert alert-success col-md-4 offset-md-4 text-center mt-4 text-success"><?= $this->session->flashdata('success') ?></div>
<?php
        }
?>
            <section id="form" class="row mb-5">
                <div class="col-12">
                    <h2 class="d-flex justify-content-start">Check Out</h2>
                </div>
                <div class="col-12">
                    <h3 class="d-flex text-primary justify-content-end">Total $100</h3>
                </div>
                <table class="table table-bordered mt-2 mb-5">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="col-5">Item name</th>
                            <th scope="col" class="col-3">Qty</th>
                            <th scope="col" class="col-2">Price</th>
                            <th scope="col" class="col-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col" class="col-5">T-shirt</td>
                            <td scope="col" class="col-3">43</td>
                            <td scope="col" class="col-2">Price</td>
                            <td scope="col" class="col-2"><button class="btn btn-danger">Remove item</button></td>
                        </tr>
                    </tbody>
                </table>
            </section>
            <div class="col-lg-4 mx-auto card shadow my-5 p-5">
                <h2 class="text-primary text-center mb-1">Billing Info</h2>
                <form action="/products/billing" method="post">
                    <div class="col-lg-12">
                        <label for="name" class="form-label"></label>
                        <input type="text" class="form-control form-control-lg" placeholder="Name" id="name" name="name" />
                    </div>
                    <div class="col-lg-12">
                        <label for="address" class="form-label"></label>
                        <input type="text" class="form-control form-control-lg" placeholder="Address" id="address" name="address" />
                    </div>
                    <div class="col-lg-12">
                        <label for="card_number" class="form-label"></label>
                        <input type="text" class="form-control form-control-lg" placeholder="Card number" id="card_number" name="card_number" />
                    </div>
                    <div class="col-lg-12 mt-4">
                        <button name="submit" value="login" class="btn btn-primary form-control form-control-lg">Submit Order</button>
                    </div>
                </form>
            </div>
        </div>
<?php $this->load->view('partials/footer'); ?>
