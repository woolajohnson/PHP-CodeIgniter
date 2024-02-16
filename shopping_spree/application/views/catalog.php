<?php $this->load->view('partials/header'); ?>
            <nav class="navbar navbar-expand-lg bg-primary-subtle mb-5">
                <div class="container">
                    <a class="navbar-brand text-primary" href="<?= base_url('products/') ?>">My Store</a>
                    
                    <form class="d-flex" action="<?= base_url('products/cart') ?>" method="post">
                        <button class="btn btn-outline-primary" type="submit">
                            Cart(
<?php                   if(!empty($result)) {
                            echo count($result);
                        } else {
                            ?>
                            0
                            <?php
                        } 
?>
                        )
                        </button>
                    </form>
                    </div>
                </div>
            </nav>
        <div class="container">
<?php
        if($this->session->flashdata('success')) {
?>
            <div class="alert alert-success col-lg-10 offset-lg-1 text-center my-4 text-success"><?= $this->session->flashdata('success') ?></div>
<?php
        }
?>
            <section id="form" class="row p-2 mb-1">
                <div class="row grid column-gap-5 d-flex justify-content-center">
                    <div class="card shadow col-lg-3 p-2">
                        <img src="<?= base_url('assets/images/tshirt.jpg') ?>" class="card-img-top" alt="tshirt">
                    
                        <div class="card-body">
                            <form class="row card-body g-2 py-2 px-5" action="<?= base_url('products/add_cart') ?>" method="post">
                                <div class="col-6">
                                    <h4 class="d-flex justify-content-start">T-shirt</h4>
                                </div>
                                <div class="col-6">
                                    <h4 class="d-flex text-primary justify-content-end">$1</h4>
                                </div>

                                <label for="quantity"></label>
                                <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1">
                                <button type="submit" name="submit" value="tshirt" class="btn btn-primary">Buy</button>
                            </form>
                        </div>
                    </div>
                    <div class="card shadow col-lg-3 p-2">
                        <img src="<?= base_url('assets/images/cap.png') ?>" class="card-img-top" alt="...">
                    
                        <div class="card-body">
                            <form class="row card-body g-2 py-2 px-5" action="<?= base_url('products/add_cart') ?>" method="post">
                                <div class="col-6">
                                    <h4 class="d-flex justify-content-start">Cap</h4>
                                </div>
                                <div class="col-6">
                                    <h4 class="d-flex text-primary justify-content-end">$2</h4>
                                </div>

                                <label for="quantity"></label>
                                <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1">
                                <button type="submit" name="submit" value="cap" class="btn btn-primary">Buy</button>
                            </form>
                        </div>
                    </div>
                    <div class="card shadow col-lg-3 p-2">
                        <img src="<?= base_url('assets/images/shorts.jpg') ?>" class="card-img-top" alt="...">
                    
                        <div class="card-body">
                            <form class="row card-body g-2 py-2 px-5" action="<?= base_url('products/add_cart') ?>" method="post">
                                <div class="col-6">
                                    <h4 class="d-flex justify-content-start">Shorts</h4>
                                </div>
                                <div class="col-6">
                                    <h4 class="d-flex text-primary justify-content-end">$3</h4>
                                </div>

                                <label for="quantity"></label>
                                <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1">
                                <button type="submit" name="submit" value="shorts" class="btn btn-primary">Buy</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
<?php $this->load->view('partials/footer'); ?>
