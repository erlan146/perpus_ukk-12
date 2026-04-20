<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f6f7f9; font-family: 'Segoe UI'; }

        .card-main {
            background:#fff;
            border-radius:14px;
            padding:20px;
            box-shadow:0 6px 20px rgba(0,0,0,0.05);
        }

        .badge-soft-success {
            background:#d1e7dd;
            color:#0f5132;
            padding:5px 10px;
            border-radius:10px;
            font-size:12px;
        }

        .badge-soft-danger {
            background:#f8d7da;
            color:#842029;
            padding:5px 10px;
            border-radius:10px;
            font-size:12px;
        }

        .cover-img {
            width:60px;
            height:80px;
            object-fit:cover;
            border-radius:6px;
        }
    </style>
</head>

<body>
<div class="container py-4">

<div class="card-main">

<div class="d-flex justify-content-between mb-3">
    <h5>Data Buku</h5>
    <a href="<?= base_url('index.php/buku/tambah') ?>" class="btn btn-dark btn-sm">+ Tambah</a>
</div>

<div class="table-responsive">
<table class="table align-middle">
<thead>
<tr>
<th>No</th>
<th>Cover</th>
<th>Judul</th>
<th>Penulis</th>
<th>Tahun</th>
<th>Stok</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>
<?php $no=1; foreach($buku as $b): ?>
<tr>
<td><?= $no++ ?></td>

<td>
<img src="<?= base_url('assets/cover/'.(!empty($b->cover)?$b->cover:'default.jpg')) ?>" class="cover-img">
</td>

<td><?= $b->judul ?></td>
<td><?= $b->penulis ?></td>
<td><?= $b->tahun ?></td>
<td><?= $b->stok ?></td>

<td>
<?php if($b->stok>0): ?>
<span class="badge-soft-success">Tersedia</span>
<?php else: ?>
<span class="badge-soft-danger">Habis</span>
<?php endif; ?>
</td>

<td>
<a href="<?= base_url('index.php/buku/edit/'.$b->id) ?>" 
   class="btn btn-sm btn-outline-dark">
   Edit
</a>

<a href="<?= base_url('index.php/buku/hapus/'.$b->id) ?>" 
   class="btn btn-sm btn-outline-danger"
   onclick="return confirm('Yakin hapus buku ini?')">
   Hapus
</a>
</td>

</tr>
<?php endforeach; ?>
</tbody>

</table>
</div>

<a href="<?= base_url('index.php/dashboard/admin') ?>" class="btn btn-outline-dark btn-sm mt-2">
    ← Dashboard
</a>

</div>
</div>
</body>
</html>