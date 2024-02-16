<?php $this->load->view('partials/header'); ?>
        <div class="container">
<?php 
        if($this->session->flashdata('errors')) {
?>
            <div class="alert alert-danger col-lg-4 offset-lg-4 text-center mt-4 text-danger"><?= $this->session->flashdata('errors') ?></div>
<?php
        }
        if($this->session->flashdata('success')) {
?>
            <div class="alert alert-success col-lg-4 offset-lg-4 text-center mt-4 text-success"><?= $this->session->flashdata('success') ?></div>
<?php
        }
?>
            <div class="col-lg-4 mx-auto card shadow my-5 py-3 px-5">
                <h2 class="text-primary text-center pt-3 mb-1">Registration form</h2>
                <form action="/users/create/" method="post">
                    <div class="col-lg-12">
                        <label for="firstname" class="form-label"></label>
                        <input type="text" class="form-control form-control-lg" placeholder="First name" id="name" name="firstname" />
                    </div>
                    <div class="col-lg-12">
                        <label for="lastname" class="form-label"></label>
                        <input type="text" class="form-control form-control-lg" placeholder="Last name" id="name" name="lastname" />
                    </div>
                    <div class="col-lg-12">
                        <label for="email" class="form-label"></label>
                        <input type="text" class="form-control form-control-lg" placeholder="Email" id="name" name="email" />
                    </div>
                    <div class="col-lg-12">
                        <label for="contact" class="form-label"></label>
                        <input type="text" class="form-control form-control-lg" placeholder="Contact number" id="name" name="contact" />
                    </div>
                    <div class="col-lg-12">
                        <label for="password" class="form-label"></label>
                        <input type="password" class="form-control form-control-lg" placeholder="Password" id="name" name="password" />
                    </div>
                    <div class="col-lg-12">
                        <label for="confirm_password" class="form-label"></label>
                        <input type="password" class="form-control form-control-lg" placeholder="Confirm password" id="name" name="confirm_password" />
                    </div>
                    <div class="col-lg-12 mt-4">
                        <button name="submit" value="register" class="btn btn-primary form-control form-control-lg">Submit</button>
                    </div>
                    <p class="text-center my-4">Already have an account? <a href="/users">Login</a></p>
                </form>
            </div>
        </div>
<?php $this->load->view('partials/footer'); ?>