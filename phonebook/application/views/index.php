<?php $this->load->view('partials/header'); ?>
        <div class="container">
<?php 
        if($this->session->flashdata('errors')) {
?>
            <div class="alert alert-danger col-md-8 offset-md-2 text-center mt-4 text-danger"><?= $this->session->flashdata('errors') ?></div>
<?php
        }
        if($this->session->flashdata('success')) {
?>
            <div class="alert alert-success col-md-8 offset-md-2 text-center mt-4 text-success"><?= $this->session->flashdata('success') ?></div>
<?php
        }
?>
            <section class="row p-3 my-4">
                <div class="col-md-8 offset-md-2">
                    <h2 class="text-success mb-4">Contacts</h2>
                    <table class="table table-bordered mb-5 text-center">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Contact Number</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
<?php 
                                foreach($result as $key => $value) {
?>
                                <tr>
                                    <td scope="row"><?= $value['name'] ?></td>
                                    <td><?= $value['contact'] ?></td>
                                    <td>
                                        <form action="/contacts/show/<?= $value['id'] ?>" method="post">
                                            <button type="submit" name="submit" value="show" class="btn btn-sm btn-success">Show</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="/contacts/edit/<?= $value['id'] ?>" method="post">
                                            <button type="submit" name="submit" value="edit" class="btn btn-sm btn-primary">Edit</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="/contacts/destroy/<?= $value['id'] ?>" method="post">
                                            <button type="submit" name="submit" value="destroy" class="btn btn-sm btn-danger">Remove</button>
                                        </form>
                                    </td>
                                </tr>
<?php
                                }
?>
                        </tbody>
                    </table>
                    <form action="/contacts/new" method="post">
                        <button type="submit" name="submit" value="new" class="btn btn-success">Add new contact</button>
                    </form>
                </div>
            </section>
        </div>
<?php $this->load->view('partials/footer'); ?>
