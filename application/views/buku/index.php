<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f6f7f9;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
        }

        .main {
            padding: 20px;
        }

        .card-main {
            background: #fff;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.05);
        }

        .table thead {
            background: #f1f3f5;
            color: #333;
        }

        .table tbody tr {
            transition: 0.2s;
        }

        .table tbody tr:hover {
            background: #fafafa;
        }

        .badge-soft-success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 5px 10px;
            border-radius: 10px;
            font-size: 12px;
        }

        .badge-soft-danger {
            background: #f8d7da;
            color: #842029;
            padding: 5px 10px;
            border-radius: 10px;
            font-size: 12px;
        }

        .btn-modern {
            border-radius: 10px;
            padding: 5px 10px;
            font-size: 13px;
        }

        .btn-modern:hover {
            transform: translateY(-1px);
        }

        .title {
            font-weight: 600;
        }
    </style>
</head>

<body>

<div class="container-fluid main">

<div class="card-main">

<!-- HEADER -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="title mb-1">Data Buku</h5>
        <small class="text-muted">Manajemen buku perpustakaan</small>
    </div>

    <?php if ($this->session->userdata('role') == 'admin'): ?>
    <a href="<?= site_url('buku/tambah') ?>" class="btn btn-dark btn-modern">
        + Tambah
    </a>
    <?php endif; ?>
</div>

<!-- TABLE -->
<div class="table-responsive">
<table class="table align-middle">

<thead>
<tr>
<th>No</th>
<th>Judul</th>
<th>Stok</th>
<th>Status</th>

<?php if ($this->session->userdata('role') == 'admin'): ?>
<th>Aksi</th>
<?php endif; ?>
</tr>
</thead>

<tbody>
<?php $no=1; foreach($buku as $b): ?>
<tr>

<td><?= $no++ ?></td>

<td class="fw-semibold"><?= $b->judul ?></td>

<td><?= $b->stok ?></td>

<td>
<?php if($b->stok > 0): ?>
<span class="badge-soft-success">Tersedia</span>
<?php else: ?>
<span class="badge-soft-danger">Habis</span>
<?php endif; ?>
</td>

<?php if ($this->session->userdata('role') == 'admin'): ?>
<td>

<a href="<?= site_url('buku/edit/'.$b->id) ?>" 
class="btn btn-outline-dark btn-sm btn-modern">
Edit
</a>

<a href="<?= site_url('buku/hapus/'.$b->id) ?>" 
class="btn btn-outline-dark btn-sm btn-modern"
onclick="return confirm('Yakin hapus?')">
Hapus
</a>

</td>
<?php endif; ?>

</tr>
<?php endforeach; ?>
</tbody>

</table>
</div>

<!-- BACK -->
<div class="mt-3">
<a href="<?= site_url('dashboard/admin') ?>" class="btn btn-outline-dark btn-sm">
← Kembali
</a>
</div>

</div>
</div>

</body>
</html>