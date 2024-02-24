<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/navbar'); ?>
        <div class="container">
            <div class="col-lg-10 mx-auto">
                <div class="d-flex justify-content-between mt-5">
                    <h3>Manage Products</h3>
                    <?= form_open('/products/new') ?>
                        <button class="btn btn-outline-success" type="submit" name="submit" value="edit">Add new</button>
                    <?= form_close() ?>
                </div>
                <table class="table table-bordered mt-3 mb-5">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="col-1">ID</th>
                            <th scope="col" class="col-4">Name</th>
                            <th scope="col" class="col-2">Inventory Count</th>
                            <th scope="col" class="col-2">Quantity Sold</th>
                            <th scope="col" class="col-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <td scope="col" class="col-1">1</td>
                            <td scope="col" class="col-4">V88 Cap</td>
                            <td scope="col" class="col-2">100</td>
                            <td scope="col" class="col-2">21</td>
                            <td scope="col" class="col-3">
                                <?= form_open('/products/delete') ?>
                                    <button class="btn btn-outline-info" type="submit" name="submit" value="edit">Edit</button>
                                    <button class="btn btn-outline-danger" type="submit" name="submit" value="remove">Remove</button>
                                <?= form_close() ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
<?php $this->load->view('partials/footer'); ?>