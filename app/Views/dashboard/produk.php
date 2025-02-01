<?= $this->extend('dashboard\template\temp') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6> 
            <a href="/produk/create" class="btn btn-primary float-right mb-2">Tambah Produk</a>
            <select name="filter" id="filter" class="form-control" onchange="filterData()">
                <option value="semua" <?= $filter == 'semua' ? 'selected' : '' ?>>Semua</option>
                <option value="dapat di jual" <?= $filter == 'dapat di jual' ? 'selected' : '' ?>>Dapat di jual</option>
                <option value="tidak dapat di jual" <?= $filter == 'tidak dapat di jual' ? 'selected' : '' ?>>Tidak dapat di jual</option>
            </select>
        </div>                               
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($produk as $row) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama_produk'] ?></td>
                                <td><?= $row['harga'] ?></td>
                                <td><?= $row['nama_kategori'] ?></td>
                                <td><?= $row['nama_status'] ?></td>
                                <td>
                                    <a href="/produk/edit/<?= $row['id_produk'] ?>" class="btn btn-warning mt-2">🛠</a>
                                    <form action="/produk/delete" method="post" >
                                        <input type="hidden" name="id_produk" value=<?= $row['id_produk'] ?>>
                                        <button type="submit" class="btn btn-danger mt-2" onclick="return confirm('Yakin ingin menghapus data?');">🗑</button>
                                    </form>                                
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- Pagination -->
                <div class="pagination">
                    <?= $pager->links() ?>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    function filterData() {
        var filter = document.getElementById('filter').value;
        // direct page to filtered data
        window.location.href = '/produk?filter=' + filter;
    }
</script> 
     

    <!-- /.container-fluid -->
<?= $this->endSection() ?>