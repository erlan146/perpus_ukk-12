<!DOCTYPE html>
<html>
<head>
<title>Transaksi Saya</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
  background: #f6f7f9;
}
.card {
  border-radius: 12px;
  border: none;
}
</style>

</head>

<body>

<div class="container py-4">

<div class="card p-4 shadow-sm">

<h5 class="fw-bold mb-3">Transaksi Saya</h5>

<table class="table">

<thead>
<tr>
<th>Buku</th>
<th>Status</th>
<th>Denda</th>
</tr>
</thead>

<tbody>

<?php foreach($trx as $t): ?>
<tr>
<td><?= $t->judul ?></td>
<td><?= $t->status ?></td>
<td><?= $t->denda ?></td>
</tr>
<?php endforeach; ?>

</tbody>

</table>

<a href="<?= site_url('dashboard/user') ?>" class="btn btn-dark">
← Kembali
</a>

</div>

</div>

</body>
</html>