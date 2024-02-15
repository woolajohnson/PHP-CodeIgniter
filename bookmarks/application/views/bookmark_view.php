<?php $this->load->view('partials/header'); ?>
        <div class="container">
<?php 
        if($this->session->flashdata('errors')) {
?>
            <div class="alert alert-danger col-md-4 offset-md-4 text-center mt-4 text-danger"><?= $this->session->flashdata('errors') ?></div>
<?php
        }
        if($this->session->flashdata('success')) {
?>
            <div class="alert alert-success col-md-4 offset-md-4 text-center mt-4 text-success"><?= $this->session->flashdata('success') ?></div>
<?php
        }
?>
            <section id="form" class="row p-2 mb-1">
                <h2 class="text-center text-primary p-3">Add a Bookmark</h2>
                <div class="col-md-4 offset-md-4 card shadow">
                    <form class="row g-2 card-body p-5" action="<?= base_url('bookmarks/add') ?>" method="post">
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
                            <label for="url" class="form-label"
                                >URL</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="url"
                                name="url"
                            />
                        </div>
                        <div class="col-md-6">
                            <label for="folder_name" class="form-label"
                                >Folder</label
                            >
                            <select id="folder_name" name="folder_name" class="form-select">
                                <option selected>Favorites</option>
                                <option>Others</option>
                            </select>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" name="submit" value="form_add" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </section>
            <section class="row p-3 mb-3">
                <h2 class="text-center text-primary p-3">Bookmarks</h2>
                <div class="col-md-8 offset-md-2">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Folder</th>
                                <th scope="col">Name</th>
                                <th scope="col">URL</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
<?php 
                                foreach($result as $key => $value) {
?>
                                <tr>
                                    <th scope="row"><?= $value['folder_name'] ?></th>
                                    <td><?= $value['name'] ?></td>
                                    <td><?= $value['url'] ?></td>
                                    <td>
                                        <form action="/bookmarks/destroy/<?=$value['id']?>" method="post">
                                            <button type="submit" name="submit" value="destroy" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
<?php
                                }
?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
<?php $this->load->view('partials/footer'); ?>
