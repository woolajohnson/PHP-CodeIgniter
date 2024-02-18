<?php $this->load->view('partials/header'); ?>
        <div class="container">
<?php 
        if($this->session->flashdata('errors')) {
?>
            <div class="alert alert-danger col-lg-10 offset-lg-1 text-center mt-4 text-danger"><?= $this->session->flashdata('errors') ?></div>
<?php
        }
?>
            <div class="row grid column-gap-5 d-flex justify-content-center">
                <!-- Search form here -->
                <div class="search_card card shadow col-lg-3 p-2 my-4">
                    <div class="card-body">
                            <?= form_open(base_url('sports/display'), array('class' => 'row card-body g-2 py-2 px-5')) ?>
                            <h3 class="d-flex justify-content-start">Search Users</h3>
                            <div class="col-12">
                                <label for="name"></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="name">
                            </div>
                            <div class="col-12 mt-4">
                                <div class="d-block">
                                    <input  type="checkbox" name="gender[]" value="male">
                                    <label for="male">Male</label>
                                </div>
                                <div class="d-block">
                                    <input type="checkbox" name="gender[]" value="female">
                                    <label for="female">Female</label>
                                </div>
                            </div>
                            
                            <div class="col-12 my-5">
                                <h4>Sports</h4>
                                <div class="d-block">
                                    <input type="checkbox" name="sport[]" value="basketball">
                                    <label for="basketball">Basketball</label>
                                </div>
                                <div class="d-block">
                                    <input type="checkbox" name="sport[]" value="volleyball">
                                    <label for="volleyball">Volleyball</label>
                                </div>
                                <div class="d-block">
                                    <input type="checkbox" name="sport[]" value="baseball">
                                    <label for="baseball">Baseball</label>
                                </div>
                                <div class="d-block">
                                    <input type="checkbox" name="sport[]" value="soccer">
                                    <label for="soccer">Soccer</label>
                                </div>
                                <div class="d-block">
                                    <input type="checkbox" name="sport[]" value="football">
                                    <label for="football">Football</label>
                                </div>
                            </div>
                            <button type="submit" name="submit" value="search" class="btn btn-primary">Search</button>
                        <?= form_close() ?>
                    </div>
                </div>
                <section class="col-lg-7 p-2 my-4">
                    <!-- Receive the data from $result and iterate -->
                    <div class="row column-gap-2 mb-2 d-flex justify-content-center">
                        <?php 
                        foreach($result as $person){
                        ?>
                        <div class="card card_image shadow col-lg-3 p-2 mb-2">
                            <img src="<?= base_url('assets/images/' . $person['id'] . '.jpg') ?>" class="card-img-top mb-1" alt="...">
                            <h6><?= $person['name'] ?></h6>
                            <h6>Sports: <span class="text-primary d-block"><?= $person['sports'] ?></span></h6>
                        </div>
                        <?php 
                        }
                        ?>
                    </div>
                </section>
            </div>
        </div>
<?php $this->load->view('partials/footer'); ?>