<?= $this->extend('layout/main'); ?>
<?= $this->extend('layout/menu'); ?>

<?= $this->section('content'); ?>
<div class="col-sm-12">
    <div class="page-title-box">
        <h4 class="page-title">Selamat Datang</h4>
    </div>
</div>

<div class="col-sm-12">
    <div class="card m-b-30">
        <h4 class="card-header mt-0">Halo</h4>
        <div class="card-body">
            <p class="card-text"></p>
            <div class="alert alert-info">
                Ini latihan ane membuat CRUD CI4 dengan AJAX Jquery.
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>