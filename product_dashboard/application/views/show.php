<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
        <div class="container">
            <section id="form" class="row p-2 mb-1">
                <div class="col-md-8 offset-md-2 card p-5 shadow">
                    <h2 class="mb-3"><?= $result['name'] . ' ($' . $result['price'] . ')'?></h2>
                    <p class="text-info">Added since: <span class="text-dark"><?= $result['created_at'] ?></span></p>
                    <p class="text-info">Product ID: <span class="text-dark">#<?= $result['id'] ?></span></p>
                    <p class="text-info">Description: <span class="text-dark"><?= $result['description'] ?></span></p>
                    <p class="text-info">Total Sold: <span class="text-dark"><?= $result['quantity_sold'] ?></span></p>
                    <p class="text-info">Number of available stocks: <span class="text-dark"><?= $result['inventory_count'] ?></span></p>
                </div>
            </section>
        </div>
<?php $this->load->view('partials/footer'); ?>