<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ICON -->
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
        }

        .badge-dipinjam {
            background: #e9ecef;
            color: #333;
            padding: 6px 10px;
            border-radius: 10px;
            font-size: 12px;
        }

        .badge-selesai {
            background: #d1e7dd;
            color: #0f5132;
            padding: 6px 10px;
            border-radius: 10px;
            font-size: 12px;
        }

        .btn-modern {
            border-radius: 10px;
            font-size: 13px;
        }

        tbody tr:hover {
            background: #f9fafb;
        }
    </style>
</head>

<body>

<div class="container py-5">
<div class="card-main">

<!-- HEADER -->
<div class="d-flex justify-content-between align-items-center mb-3">

    <h5 class="fw-bold">
        <?= ($this->session->userdata('role')=='admin') ? 'Semua Peminjaman' : 'Peminjaman Saya' ?>
    </h5>

    <div class="d-flex gap-2">

        <!-- 🔥 TOMBOL CETAK PDF -->
    <a href="<?= base_url('index.php/laporan/peminjaman') ?>" target="_blank" class="btn btn-danger btn-modern">
    <i class="bi bi-file-pdf"></i> Cetak PDF
</a>

        <!-- BACK -->
        <a href="<?= site_url($this->session->userdata('role')=='admin' ? 'dashboard/admin' : 'dashboard/user') ?>" 
           class="btn btn-outline-dark btn-modern">
            <i class="bi bi-arrow-left"></i> Dashboard
        </a>

    </div>

</div>

<!-- FILTER -->
<div class="row mb-3 g-2">

    <div class="col-md-4">
        <input type="text" id="search" class="form-control" placeholder="Cari judul / peminjam...">
    </div>

    <div class="col-md-3">
        <select id="filterStatus" class="form-select">
            <option value="">Semua Status</option>
            <option value="dipinjam">Dipinjam</option>
            <option value="kembali">Selesai</option>
        </select>
    </div>

    <div class="col-md-3">
        <input type="date" id="filterTanggal" class="form-control">
    </div>

</div>

<!-- TABLE -->
<div class="table-responsive">
<table class="table align-middle">

<thead class="text-muted">
<tr>
<th>No</th>
<th>Judul</th>
<th>Peminjam</th>
<th>Pinjam</th>
<th>Jatuh Tempo</th>
<th>Status</th>
<th>Denda</th>

<?php if ($this->session->userdata('role') == 'admin'): ?>
<th>Aksi</th>
<?php endif; ?>

</tr>
</thead>

<tbody>

<?php $no=1; foreach($peminjaman as $p): ?>
<tr class="data-row"
    data-text="<?= strtolower($p->judul.' '.$p->nama_peminjam) ?>"
    data-status="<?= $p->status ?>"
    data-tanggal="<?= $p->tanggal_pinjam ?>">

<td><?= $no++ ?></td>
<td><?= $p->judul ?></td>
<td><?= $p->nama_peminjam ?></td>
<td><?= $p->tanggal_pinjam ?></td>
<td><?= $p->tanggal_kembali ?></td>

<td>
<?php if($p->status == 'dipinjam'): ?>
    <span class="badge-dipinjam">Dipinjam</span>
<?php else: ?>
    <span class="badge-selesai">Selesai</span>
<?php endif; ?>
</td>

<td>
<?= $p->denda > 0 ? 'Rp '.number_format($p->denda) : '-' ?>
</td>

<?php if ($this->session->userdata('role') == 'admin'): ?>
<td class="d-flex gap-1">

<a href="<?= site_url('peminjaman/detail/'.$p->id) ?>" class="btn btn-outline-info btn-sm btn-modern">
<i class="bi bi-eye"></i>
</a>

<?php if ($p->status == 'dipinjam'): ?>
<a href="<?= site_url('peminjaman/kembali/'.$p->id.'/'.$p->id_buku) ?>" class="btn btn-outline-success btn-sm btn-modern">
<i class="bi bi-check-circle"></i>
</a>
<?php endif; ?>

<a href="<?= site_url('peminjaman/hapus/'.$p->id) ?>" class="btn btn-outline-danger btn-sm btn-modern"
onclick="return confirm('Yakin hapus data ini?')">
<i class="bi bi-trash"></i>
</a>

</td>
<?php endif; ?>

</tr>
<?php endforeach; ?>

</tbody>
</table>
</div>

<!-- BACK BAWAH -->
<div class="mt-3 text-end">
    <a href="<?= site_url($this->session->userdata('role')=='admin' ? 'dashboard/admin' : 'dashboard/user') ?>" 
       class="btn btn-outline-dark btn-modern">
        <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
    </a>
</div>

</div>
</div>

<!-- FILTER SCRIPT -->
<script>
const search = document.getElementById('search');
const status = document.getElementById('filterStatus');
const tanggal = document.getElementById('filterTanggal');

function filterData() {
    let keyword = search.value.toLowerCase();
    let s = status.value;
    let t = tanggal.value;

    document.querySelectorAll('.data-row').forEach(row => {

        let text = row.dataset.text;
        let stat = row.dataset.status;
        let tgl = row.dataset.tanggal;

        let show = true;

        if (keyword && !text.includes(keyword)) show = false;
        if (s && stat !== s) show = false;
        if (t && tgl !== t) show = false;

        row.style.display = show ? '' : 'none';
    });
}

search.addEventListener('keyup', filterData);
status.addEventListener('change', filterData);
tanggal.addEventListener('change', filterData);
</script>

</body>
</html>