<?php $this->load->view('partials/header'); ?>
        <div class="container">
<?php 
        if($this->session->flashdata('errors')) {
?>
            <div class="alert alert-danger col-lg-4 offset-lg-4 text-center mt-4 text-danger"><?= $this->session->flashdata('errors') ?></div>
<?php
        }
?>
            <div class="col-lg-4 mx-auto card shadow my-5 p-5">
                <h2 class="text-primary text-center mb-1">Login</h2>
                <form action="/users/login" method="post">
                    <div class="col-lg-12">
                        <label for="username" class="form-label"></label>
                        <input type="text" class="form-control form-control-lg" placeholder="Contact Number/Email" id="name" name="username" />
                    </div>
                    <div class="col-lg-12">
                        <label for="password" class="form-label"></label>
                        <input type="password" class="form-control form-control-lg" placeholder="Password" id="name" name="password" />
                    </div>
                    <div class="col-lg-12 mt-4">
                        <button name="submit" value="login" class="btn btn-primary form-control form-control-lg">Submit</button>
                    </div>
                    <p class="text-center my-4">Don't have an account? <a href="/users/register">Register here</a></p>
                </form>
            </div>
        </div>
<?php $this->load->view('partials/footer'); ?>