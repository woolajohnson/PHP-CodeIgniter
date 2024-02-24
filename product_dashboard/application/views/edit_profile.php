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
                <h2 class="text-center text-warning p-3">Edit Profile</h2>
                <div class="d-flex justify-content-around">
                    <div class="col-md-4 card shadow">
                        <?= form_open(base_url('/products/update/' . $result['id']), array('class' => 'row g-2 card-body p-5')) ?>
                            <div class="col-lg-12">
                                <h4 class="text-primary mb-3">Edit Information</h4>
                            </div>
                            <div class="col-lg-12">
                                <label for="firstname" class="form-label">First name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $result['firstname'] ?>" />
                            </div>
                            <div class="col-lg-12">
                                <label for="lastname" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="lastname" value="<?= $result['lastname'] ?>" name="lastname" />
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" name="submit" value="update" class="btn btn-outline-info px-4">Save</button>
                            </div>
                        <?= form_close() ?>
                    </div>
                    <div class="col-md-4 card shadow">
                        <?= form_open(base_url('/products/update/' . $result['id']), array('class' => 'row g-2 card-body p-5')) ?>
                        <div class="col-lg-12">
                                <h4 class="text-primary mb-3">Change password</h4>
                            </div>
                            <div class="col-lg-12">
                                <label for="firstname" class="form-label">Old Passsword</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $result['firstname'] ?>" />
                            </div>
                            <div class="col-lg-12">
                                <label for="lastname" class="form-label">New Password</label>
                                <input type="text" class="form-control" id="lastname" value="<?= $result['lastname'] ?>" name="lastname" />
                            </div>
                            <div class="col-lg-12">
                                <label for="lastname" class="form-label">Confirm Password</label>
                                <input type="text" class="form-control" id="lastname" value="<?= $result['lastname'] ?>" name="lastname" />
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" name="submit" value="update" class="btn btn-outline-info px-4">Save</button>
                            </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </section>
        </div>
<?php $this->load->view('partials/footer'); ?>