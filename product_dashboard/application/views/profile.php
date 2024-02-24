<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
        <div class="container">
            <section id="form" class="row p-2 mb-1">
                <div class="col-md-8 offset-md-2 card p-5 shadow">
                    <h2 class="text-success mb-3"><?= $this->session->userdata('firstname') . ' ' . $this->session->userdata('lastname')?></h2>
                    <p class="text-success mb-4">Member since: <span class="text-dark"><?= $this->session->userdata('created_at') ?></span></p>
                    <?= form_open('/users/edit_profile/' . $this->session->userdata('user_id')) ?>
                        <button class="btn btn-outline-primary" type="submit" name="submit" value="edit_profile">Edit profile</button>
                    <?= form_close() ?>
                </div>
            </section>
        </div>
<?php $this->load->view('partials/footer'); ?>