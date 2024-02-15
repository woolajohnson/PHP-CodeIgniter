<?php $this->load->view('partials/header'); ?>
        <div class="container">
            <div class="text-center card shadow my-5 p-5">
                <h2 class="text-danger mb-5">Contact #<?= $result['id'] ?></h2>
                <h4 class="mb-5">Name: <span class="text-primary"><?= $result['name'] ?></span></h4>
                <h4 class="mb-5">Contact Number: <span class="text-primary"><?= $result['contact'] ?></span></h4>
                <form action="/contacts/edit/<?= $result['id']?>" method="post">
                    <button name="submit" value="back" class="btn btn-secondary mx-1">Go back</button>
                    <button name="submit" value="edit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
<?php $this->load->view('partials/footer'); ?>