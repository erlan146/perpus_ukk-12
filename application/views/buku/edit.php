<!DOCTYPE html>
<html>
<head>
<title>Edit Buku</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

<div class="card p-4 shadow">
<h3>Edit Buku</h3>

<form method="post">

<input name="judul" value="<?= $buku->judul ?>" class="form-control mb-3">

<input type="number" name="stok" value="<?= $buku->stok ?>" class="form-control mb-3">

<button class="btn btn-primary">Update</button>

</form>

</div>
</div>

</body>
</html>