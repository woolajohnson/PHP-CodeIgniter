<?php $this->load->view('partials/header'); ?>
        <div class="container">
            <form class="mt-5 mb-3 d-flex justify-content-end" action="/users/logout" method="post">
                <button class="btn btn-danger" type="submit" name="logout" value="logout">Logout</button>
            </form>
            <div class="col-lg-4 mx-auto card shadow mb-5 p-5">
                <h2 class="text-primary text-center mb-4">Basic Information</h2>
                <p>First name: <span class="text-primary"><?= $this->session->userdata('firstname'); ?></span></p>
                <p>Last name: <span class="text-primary"><?= $this->session->userdata('lastname'); ?></span></p>
                <p>Contact number: <span class="text-primary"><?= $this->session->userdata('contact'); ?></span></p>
                <p>Last failed login: <span class="text-primary">
<?php 
            if ($this->session->userdata('last_failed') !== '0000-00-00 00:00:00' && !is_null($this->session->userdata('last_failed'))) {
                    echo date('d M Y g:iA', strtotime($this->session->userdata('last_failed')));
            } else {
                    echo 'None so far.';
            }
?>
                </span></p>
            </div>
        </div>
<?php $this->load->view('partials/footer'); ?>