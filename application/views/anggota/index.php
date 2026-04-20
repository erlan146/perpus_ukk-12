<!DOCTYPE html>
<html>
<head>
    <title>Kelola Anggota</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .btn-modern {
            border-radius: 10px;
            font-size: 13px;
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
    <h5 class="fw-bold">Kelola Anggota</h5>

    <div class="d-flex gap-2">
        <a href="<?= site_url('dashboard/admin') ?>" class="btn btn-secondary btn-modern">
            <i class="bi bi-arrow-left"></i> Dashboard
        </a>

        <a href="<?= site_url('anggota/tambah') ?>" class="btn btn-dark btn-modern">
            + Tambah
        </a>
    </div>
</div>

<!-- FILTER -->
<div class="row mb-3 g-2">

    <div class="col-md-4">
        <input type="text" id="search" class="form-control" placeholder="Cari username...">
    </div>

    <div class="col-md-3">
        <select id="filterStatus" class="form-select">
            <option value="">Semua Status</option>
            <option value="aktif">Aktif</option>
            <option value="blacklist">Blacklist</option>
        </select>
    </div>

    <div class="col-md-3">
        <select id="filterKelas" class="form-select">
            <option value="">Semua Kelas</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>
    </div>

</div>

<!-- TABLE -->
<div class="table-responsive">
<table class="table align-middle">

<thead class="text-muted">
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

<tr class="data-row"
    data-username="<?= strtolower($a->username) ?>"
    data-status="<?= $status ?>"
    data-kelas="<?= $a->kelas ?>">

<td><?= $no++ ?></td>

<td class="fw-semibold"><?= $a->username ?></td>
<td><?= $a->kelas ?></td>
<td><?= $a->jurusan ?></td>

<td>
<?php if($status=='aktif'): ?>
    <span class="badge-soft-success">Aktif</span>
<?php else: ?>
    <span class="badge-soft-danger">Blacklist</span>
<?php endif; ?>
</td>

<td class="d-flex gap-1">

<!-- EDIT -->
<a href="<?= site_url('anggota/edit/'.$a->id) ?>" 
   class="btn btn-outline-dark btn-sm btn-modern">
   <i class="bi bi-pencil"></i>
</a>

<!-- HAPUS -->
<a href="<?= site_url('anggota/hapus/'.$a->id) ?>" 
   class="btn btn-outline-dark btn-sm btn-modern"
   onclick="return confirm('Yakin hapus?')">
   <i class="bi bi-trash"></i>
</a>

<!-- STATUS -->
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

<!-- 🔥 CETAK KARTU (FIX UTAMA) -->
<a href="<?= site_url('dashboard/cetak_kartu/'.$a->id) ?>" 
   class="btn btn-primary btn-sm btn-modern">
   <i class="bi bi-printer"></i>
</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>
</table>
</div>

</div>
</div>

<!-- FILTER SCRIPT -->
<script>
const search = document.getElementById('search');
const status = document.getElementById('filterStatus');
const kelas = document.getElementById('filterKelas');

function filterData() {
    let keyword = search.value.toLowerCase();
    let s = status.value;
    let k = kelas.value;

    document.querySelectorAll('.data-row').forEach(row => {

        let username = row.dataset.username;
        let stat = row.dataset.status;
        let kel = row.dataset.kelas;

        let show = true;

        if (keyword && !username.includes(keyword)) show = false;
        if (s && stat !== s) show = false;
        if (k && kel !== k) show = false;

        row.style.display = show ? '' : 'none';
    });
}

search.addEventListener('keyup', filterData);
status.addEventListener('change', filterData);
kelas.addEventListener('change', filterData);
</script>

</body>
</html>