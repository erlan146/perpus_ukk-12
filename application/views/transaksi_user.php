<!DOCTYPE html>
<html>
<head>
<title>Transaksi User</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

<h4>Transaksi Peminjaman</h4>

<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>Denda</th>
        </tr>
    </thead>

    <tbody>
        <?php if(empty($trx)): ?>
            <tr>
                <td colspan="7" class="text-center">Belum ada transaksi</td>
            </tr>
        <?php else: ?>
            <?php foreach($trx as $t): ?>
            <tr>
                <td><?= $t->judul ?></td>
                <td><?= $t->penulis ?></td>
                <td><?= $t->tahun ?></td>
                <td><?= $t->tanggal_pinjam ?></td>
                <td><?= $t->tanggal_kembali ?></td>
                <td><?= $t->status ?></td>
                <td><?= $t->denda ?></td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>

</table>

<a href="<?= site_url('dashboard/user') ?>" class="btn btn-dark">Kembali</a>

</div>

</body>
</html>