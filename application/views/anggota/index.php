<!DOCTYPE html>
<html>
<head>
    <title>Kelola Anggota</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f6f7f9;
            font-family: 'Segoe UI', sans-serif;
        }

        .card-main {
            background: #fff;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.05);
            animation: fadeIn 0.4s ease;
        }

        table {
            border-radius: 12px;
            overflow: hidden;
        }

        thead {
            background: #f1f3f5;
            color: #333;
        }

        tbody tr {
            transition: 0.2s;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        td, th {
            vertical-align: middle !important;
        }

        .btn-modern {
            border-radius: 10px;
            padding: 5px 10px;
            font-size: 13px;
        }

        .btn-modern:hover {
            transform: translateY(-1px);
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

        .title {
            font-weight: 600;
        }

        @keyframes fadeIn {
            from {opacity:0; transform: translateY(10px);}
            to {opacity:1; transform: translateY(0);}
        }
    </style>
</head>

<body>

<div class="container py-5">

<div class="card-main">

<!-- HEADER -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="title mb-1">Kelola Anggota</h5>
        <small class="text-muted">Manajemen data user</small>
    </div>

    <a href="<?= site_url('anggota/tambah') ?>" class="btn btn-dark btn-modern">
        + Tambah
    </a>
</div>

<!-- TABLE -->
<div class="table-responsive">
<table class="table align-middle">

<thead>
<tr>
<th>No</th>
<th>Username</th>
<th>Kelas</th>
<th>Jurusan</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

<?php $no=1; foreach($anggota as $a): 
$status = isset($a->status) ? $a->status : 'aktif';
?>

<tr>
<td><?= $no++ ?></td>

<td class="fw-semibold"><?= $a->username ?></td>
<td><?= $a->kelas ?? '-' ?></td>
<td><?= $a->jurusan ?? '-' ?></td>

<td>
<?php if($status=='aktif'): ?>
<span class="badge-soft-success">Aktif</span>
<?php else: ?>
<span class="badge-soft-danger">Blacklist</span>
<?php endif; ?>
</td>

<td>

<a href="<?= site_url('anggota/edit/'.$a->id) ?>" 
class="btn btn-outline-dark btn-sm btn-modern">
<i class="bi bi-pencil"></i>
</a>

<a href="<?= site_url('anggota/hapus/'.$a->id) ?>" 
class="btn btn-outline-dark btn-sm btn-modern"
onclick="return confirm('Yakin hapus?')">
<i class="bi bi-trash"></i>
</a>

<?php if($status=='aktif'): ?>
<a href="<?= site_url('anggota/blacklist/'.$a->id) ?>" 
class="btn btn-outline-dark btn-sm btn-modern">
<i class="bi bi-x-circle"></i>
</a>
<?php else: ?>
<a href="<?= site_url('anggota/aktif/'.$a->id) ?>" 
class="btn btn-outline-dark btn-sm btn-modern">
<i class="bi bi-check-circle"></i>
</a>
<?php endif; ?>

</td>

</tr>

<?php endforeach; ?>

</tbody>
</table>
</div>

<!-- BACK -->
<div class="mt-4 text-end">
<a href="<?= site_url('dashboard/admin') ?>" class="btn btn-outline-dark btn-modern">
← Kembali
</a>
</div>

</div>

</div>

</body>
</html>