<?php $this->load->view('partials/header'); ?>
        <div class="container">
            <div class="text-center card shadow my-5 p-5">
                <h2 class="text-danger mb-5">Are you sure you want to delete?</h2>
                <h4 class="mb-5">Name: <span class="text-primary"><?= $result['name'] ?></span></h4>
                <h4 class="mb-5">Contact Number: <span class="text-primary"><?= $result['contact'] ?></span></h4>
                <form action="/contacts/delete/<?= $result['id']?>" method="post">
                    <button name="submit" value="no" class="btn btn-secondary mx-4">No</button>
                    <button name="submit" value="yes" class="btn btn-danger">Yes, I want to delete</button>
                </form>
            </div>
        </div>
<?php $this->load->view('partials/footer'); ?>