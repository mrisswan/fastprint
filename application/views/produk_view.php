<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Produk - Test FastPrint</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Produk (Bisa Dijual)</h5>
                <a href="<?= site_url('produk/tambah'); ?>" class="btn btn-light btn-sm">Tambah Produk</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($produk as $p): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $p->nama_produk; ?></td>
                                <td><?= $p->nama_kategori; ?></td>
                                <td>Rp <?= number_format($p->harga, 0, ',', '.'); ?></td>
                                <td><span class="badge badge-success"><?= $p->nama_status; ?></span></td>
                                <td>
                                    <a href="<?= site_url('produk/edit/' . $p->id_produk); ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="<?= site_url('produk/delete/' . $p->id_produk); ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>