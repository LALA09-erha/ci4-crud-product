<?= $this->extend('dashboard\template\temp') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <a href="/produk" class="btn btn-primary mb-3">Kembali</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>         
        </div>                               
        <div class="card-body">
            <div class="table-responsive">               
                <?= csrf_field() ?>
                <form action="/produk/update" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk" value="<?= $produk['nama_produk'] ?>" required>
                    </div>
                    <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                    <div class="form-group">
                        <label for="harga_produk">Harga</label>
                        <input type="number" class="form-control" id="harga_produk" name="harga_produk" placeholder="Masukkan Harga Produk" value="<?= $produk['harga'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori_produk">Kategori</label>
                        <select name="kategori_produk" id="kategori_produk" class="form-control"  required>
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($kategori as $row) : ?>
                                <option value="<?= $row['id_kategori'] ?>" <?= $row['id_kategori'] == $produk['id_kategori'] ? 'selected' : '' ?>><?= $row['nama_kategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status_produk">Status</label>
                        <select name="status_produk" id="status_produk" class="form-control" required>
                            <option value="">Pilih Status</option>
                            <?php foreach ($status as $row) : ?>
                                <option value="<?= $row['id_status'] ?>" <?= $row['id_status'] == $produk['id_status'] ? 'selected' : '' ?> ><?= $row['nama_status'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>                                
            </div>
        </div>
    </div>

</div>  

    <!-- /.container-fluid -->
<?= $this->endSection() ?>