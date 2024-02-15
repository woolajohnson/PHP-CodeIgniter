<?php $this->load->view('partials/header'); ?>
        <div class="container">
            <div class="text-center">
                <h2 class="text-danger my-5">Are you sure you want to delete?</h2>
                <h4 class="mb-5"><?= $result['folder_name'] ?>/<?= $result['name'] ?> <span class="text-primary">(<?= $result['url'] ?>)</span></h4>
                <form action="/bookmarks/delete/<?= $result['id']?>" method="post">
                    <button name="submit" value="no" class="btn btn-secondary mx-4">No</button>
                    <button name="submit" value="yes" class="btn btn-danger">Yes, I want to delete</button>
                </form>
            </div>
        </div>
<?php $this->load->view('partials/footer'); ?>