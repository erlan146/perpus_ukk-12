<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
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

        .badge-status {
            padding: 6px 10px;
            border-radius: 10px;
            font-size: 12px;
        }

        .badge-dipinjam {
            background: #e9ecef;
            color: #333;
        }

        .badge-selesai {
            background: #d1e7dd;
            color: #0f5132;
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
        <h5 class="title mb-1">
            <?= ($this->session->userdata('role')=='admin') ? 'Semua Peminjaman' : 'Peminjaman Saya' ?>
        </h5>
        <small class="text-muted">Data transaksi buku</small>
    </div>

    <?php if ($this->session->userdata('role') != 'admin'): ?>
        <a href="<?= site_url('peminjaman/tambah') ?>" class="btn btn-dark btn-modern">
            + Pinjam
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
<th>Peminjam</th>
<th>Pinjam</th>
<th>Jatuh Tempo</th>
<th>Status</th>
<th>Denda</th>
<th>Bayar</th>

<?php if ($this->session->userdata('role') == 'admin'): ?>
<th>Aksi</th>
<?php endif; ?>
</tr>
</thead>

<tbody>
<?php $no=1; foreach($peminjaman as $p): ?>
<tr>

<td><?= $no++ ?></td>
<td class="fw-semibold"><?= $p->judul ?></td>
<td><?= $p->nama_peminjam ?></td>
<td><?= $p->tanggal_pinjam ?></td>
<td><?= $p->tanggal_kembali ?></td>

<td>
<?php if($p->status == 'dipinjam'): ?>
<span class="badge badge-status badge-dipinjam">Dipinjam</span>
<?php else: ?>
<span class="badge badge-status badge-selesai">Selesai</span>
<?php endif; ?>
</td>

<td>
<span class="<?= $p->denda > 0 ? 'text-danger fw-semibold' : 'text-muted' ?>">
    Rp <?= number_format($p->denda) ?>
</span>
</td>

<td>
<?php 
$status_bayar = isset($p->status_bayar) ? $p->status_bayar : 'belum';
?>

<?php if ($p->denda > 0 && $this->session->userdata('role') == 'admin'): ?>
    <?php if ($status_bayar == 'belum'): ?>
        <a href="<?= site_url('peminjaman/bayar/'.$p->id) ?>" class="btn btn-dark btn-sm btn-modern">
            Bayar
        </a>
    <?php else: ?>
        <span class="badge bg-success">Lunas</span>
    <?php endif; ?>
<?php else: ?>
    <span class="text-muted">-</span>
<?php endif; ?>
</td>

<?php if ($this->session->userdata('role') == 'admin'): ?>
<td>

<?php if ($p->status == 'dipinjam'): ?>
<a href="<?= site_url('peminjaman/kembali/'.$p->id.'/'.$p->id_buku) ?>" 
class="btn btn-dark btn-sm btn-modern mb-1">
✔
</a>
<?php endif; ?>

<?php if ($p->status == 'kembali'): ?>
<a href="<?= site_url('peminjaman/hapus/'.$p->id) ?>" 
class="btn btn-outline-dark btn-sm btn-modern"
onclick="return confirm('Yakin hapus?')">
🗑
</a>
<?php endif; ?>

</td>
<?php endif; ?>

</tr>
<?php endforeach; ?>
</tbody>

</table>
</div>

<!-- BACK -->
<div class="mt-4 text-end">
<?php if ($this->session->userdata('role') == 'admin'): ?>
<a href="<?= site_url('dashboard/admin') ?>" class="btn btn-outline-dark btn-modern">
    ← Kembali
</a>
<?php else: ?>
<a href="<?= site_url('dashboard/user') ?>" class="btn btn-outline-dark btn-modern">
    ← Kembali
</a>
<?php endif; ?>
</div>

</div>
</div>

</body>
</html>