<!-- breadcrumb -->
<div class="content-wrapper">
    <section class="wrapper bg-soft-grape">
        <div class="container py-3 py-md-5">
            <nav class="d-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-decoration-none"><?= !empty($this->lang->line('home')) ? $this->lang->line('home') : 'Home' ?></a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('my-account') ?>"><?= !empty($this->lang->line('my_account')) ? $this->lang->line('my_account') : 'My Account' ?></a></li>
                </ol>
            </nav>
            <!-- /nav -->
        </div>
        <!-- /.container -->
    </section>
</div>
<!-- end breadcrumb -->

<section class="my-account-section">
    <div class="container mb-15">
        <div class="col-md-12 mt-5 mb-3">
            
        </div>
        <div class="row mb-5">
            <div class="col-md-4">
                <?php $this->load->view('front-end/' . THEME . '/pages/my-account-sidebar') ?>
            </div>
            <div class="col-md-8 col-12 row">
                <div class='col-md-3 card text-center border-0 mr-3 mb-3'>
                    <a href='<?= base_url('my-account/profile') ?>' class="link-color text-decoration-none">
                        <div class='card-header bg-transparent'>
                            <?= !empty($this->lang->line('profile')) ? $this->lang->line('profile') : 'PROFILE' ?>
                        </div>
                        <div class='card-body'>
                            <i class="uil uil-user-circle fs-22 dashboard-icon link-color"></i>
                        </div>
                    </a>
                </div>
                <div class='col-md-3 card text-center border-0 mr-3 mb-3'>
                    <a href='<?= base_url('my-account/orders') ?>' class="link-color text-decoration-none">
                        <div class='card-header bg-transparent'>
                            <?= !empty($this->lang->line('orders')) ? $this->lang->line('orders') : 'ORDERS' ?>
                        </div>
                        <div class='card-body'>
                            <i class="uil uil-history fs-22 dashboard-icon link-color"></i>
                        </div>
                    </a>
                </div>
                <div class='col-md-3 card text-center border-0 mr-3 mb-3'>
                    <a href='<?= base_url('my-account/notifications') ?>' class="link-color text-decoration-none">
                        <div class='card-header bg-transparent'>
                            <?= !empty($this->lang->line('notification')) ? $this->lang->line('notification') : 'NOTIFICATION' ?>
                        </div>
                        <div class='card-body'>
                            <i class="uil uil-bell fs-22 dashboard-icon link-color"></i>
                        </div>
                    </a>
                </div>
                <div class='col-md-3 card text-center border-0 mr-3 mb-3'>
                    <a href='<?= base_url('my-account/Favorite') ?>' class="link-color text-decoration-none">
                        <div class='card-header bg-transparent'>
                            <?= !empty($this->lang->line('favorite')) ? $this->lang->line('favorite') : 'Favorite' ?>
                        </div>
                        <div class='card-body'>
                            <i class="uil uil-heart-alt fs-22 dashboard-icon link-color"></i>
                        </div>
                    </a>
                </div>
                <div class='col-md-3 card text-center border-0 mr-3 mb-3'>
                    <a href='<?= base_url('my-account/manage-address') ?>' class="link-color text-decoration-none">
                        <div class='card-header bg-transparent'>
                            <?= !empty($this->lang->line('address')) ? $this->lang->line('address') : 'ADDRESS' ?>
                        </div>
                        <div class='card-body'>
                            <i class="uil uil-map fs-22 dashboard-icon link-color"></i>
                        </div>
                    </a>
                </div>
                <div class='col-md-3 card text-center border-0 mr-3 mb-3'>
                    <a href='<?= base_url('my-account/wallet') ?>' class="link-color text-decoration-none">
                        <div class='card-header bg-transparent'>
                            <?= !empty($this->lang->line('wallet')) ? $this->lang->line('wallet') : 'WALLET' ?>
                        </div>
                        <div class='card-body'>
                            <i class="uil uil-wallet fs-22 dashboard-icon link-color"></i>
                        </div>
                    </a>
                </div>
                <div class='col-md-3 card text-center border-0 mr-3 mb-3'>
                    <a href='<?= base_url('my-account/transactions') ?>' class="link-color text-decoration-none">
                        <div class='card-header bg-transparent'>
                            <?= !empty($this->lang->line('transaction')) ? $this->lang->line('transaction') : 'TRANSACTION' ?>
                        </div>
                        <div class='card-body'>
                            <i class="uil uil-money-bill fs-22 dashboard-icon link-color"></i>
                        </div>
                    </a>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>