<?php $this->load->view('partials/header'); ?>
        <div class="container">
<?php 
        if($this->session->flashdata('errors')) {
?>
            <div class="alert alert-danger col-md-8 offset-md-2 text-center mt-4 text-danger"><?= $this->session->flashdata('errors') ?></div>
<?php
        }
?>
            <section id="form" class="row p-2 mb-1">
                <h2 class="text-center text-primary p-3">Add new contact</h2>
                <div class="col-md-4 offset-md-4 card shadow">
                    <form class="row g-2 card-body p-5" action="/contacts/create" method="post">
                        <div class="col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                            />
                        </div>
                        <div class="col-md-12">
                            <label for="contact" class="form-label"
                                >Contact Number</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="contact"
                                name="contact"
                            />
                        </div>
                        <div class="col-12 mt-4">
                            <button name="submit" value="back" class="btn btn-secondary mx-1">Go back</button>
                            <button type="submit" name="submit" value="insert" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
<?php $this->load->view('partials/footer'); ?>