<nav class="navbar navbar-expand-lg bg-primary-subtle mb-3 py-4">
    <div class="container d-flex">
        <a class="navbar-brand text-primary" href="<?= base_url('products/') ?>">V88 Merchandise</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= base_url('products') ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?= base_url('users/profile/' . $this->session->userdata('user_id')) ?>">Profile</a>
                </li>
            </ul>
            <?= form_open(base_url('users/logout'), array('class' => 'ms-auto')) ?>
                <button class="btn btn-danger" type="submit" name="logout" value="logout">Logout</button>
            <?= form_close() ?>
        </div>
    </div>
</nav>