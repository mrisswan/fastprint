<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Produk - FastPrint</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Form Tambah Produk</h5>
                    </div>
                    <div class="card-body">

                        <?php if (validation_errors()): ?>
                            <div class="alert alert-danger pb-0">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?= site_url('produk/tambah'); ?>" method="post">

                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control" value="<?= set_value('nama_produk'); ?>" placeholder="Masukkan nama produk">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="number" name="harga" class="form-control" value="<?= set_value('harga'); ?>" placeholder="Contoh: 15000">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="kategori_id" class="form-control">
                                            <?php foreach ($kategori as $k): ?>
                                                <option value="<?= $k->id_kategori; ?>"><?= $k->nama_kategori; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status_id" class="form-control">
                                    <?php foreach ($status as $s): ?>
                                        <option value="<?= $s->id_status; ?>"><?= $s->nama_status; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <hr>
                            <div class="d-flex justify-content-between">
                                <a href="<?= site_url('produk'); ?>" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan Produk</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>