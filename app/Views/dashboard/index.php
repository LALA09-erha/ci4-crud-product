<?= $this->extend('dashboard\template\temp') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <!-- <p class="mb-4">The data here is data about student absentee.</p> -->

   
    <div class="row">
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <!-- <a href="/absent"> -->
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">

                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Kategori</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_kategori ?> Kategori</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>

                                    </div>
                                </div>
                            </div>
                        <!-- </a> -->
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <!-- <a href="/user"> -->
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Jumlah Produk Tidak Bisa Dijual</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $produk_tidak_dijual ?> Produk</div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        <!-- </a> -->
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <!-- <a href="/user"> -->
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Jumlah Produk Bisa Dijual</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $produk_dijual ?> Produk</div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        <!-- </a> -->
                    </div>
                </div>
                <!-- Buatkan kotak satunya Berisikan List penjelasan dan Satunya Gambar Sekolah SMKN 3 Bangkalan -->
                <div class="col-xl-12 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                       <!-- List Kalimat -->
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">

                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Penjelasan Terkait Website Ini</div>
                                    <p class="mb-0 font-weight-bold text-gray-800">
                                        Website Ini menggunakan codeigniter 4 dan bootstrap 4.0 Karena PHP yang digunakan adalah PHP 8.2 sehingga tidak memungkin menggunakan codeigniter 3</p>
                                        <p>Terdapat Fungsi CRUD pada website ini, pada halaman <a href="/produk">produk</a></p>
                                    <p class="mb-0 font-weight-bold text-gray-800">Dibuat Oleh : <b>Fikri Ainun najib</b></p>
                                    <p class="mb-0 font-weight-bold text-gray-800">linkedin : <a target="_blank" href="https://www.linkedin.com/in/fikriainunnajib/">Fikri Ainun Najib</a></p>
                                    <p class="mb-0 font-weight-bold text-gray-800">Portofolio : <a target="_blank" href="https://fikrierha.rf.gd/?i=1">Fikri Ainun Najib</a></p>

                                </div>                                                            
                            </div>
                        </div>
                        
                    </div>
                </div>            
                
                
</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>