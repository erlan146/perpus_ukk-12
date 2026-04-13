<!DOCTYPE html>
<html>
<head>
<title>Edit Buku</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f6f7f9;
    height: 100vh;
    font-family: 'Segoe UI', sans-serif;
}

.card-form {
    width: 400px;
    border-radius: 16px;
    padding: 25px;
    background: #fff;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}

.form-control {
    border-radius: 10px;
    padding: 10px;
    font-size: 14px;
}

.form-control:focus {
    box-shadow: none;
    border-color: #333;
}

.btn-dark {
    border-radius: 10px;
    padding: 10px;
}

.title {
    font-weight: 600;
}
</style>
</head>

<body class="d-flex align-items-center justify-content-center">

<div class="card-form">

    <div class="mb-3">
        <h5 class="title mb-1">Edit Buku</h5>
        <small class="text-muted">Ubah data buku</small>
    </div>

    <form method="post">

        <!-- Judul -->
        <div class="mb-3">
            <label class="form-label">Judul Buku</label>
            <input name="judul" value="<?= $buku->judul ?>" class="form-control" required>
        </div>

        <!-- Penulis -->
        <div class="mb-3">
            <label class="form-label">Penulis</label>
            <input name="penulis" value="<?= $buku->penulis ?>" class="form-control" required>
        </div>

        <!-- Tahun -->
        <div class="mb-3">
            <label class="form-label">Tahun</label>
            <input type="number" name="tahun" value="<?= $buku->tahun ?>" class="form-control" required>
        </div>

        <!-- Stok -->
        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stok" value="<?= $buku->stok ?>" class="form-control" required>
        </div>

        <!-- Button -->
        <button class="btn btn-dark w-100">
            Update Buku
        </button>

    </form>

    <!-- BACK -->
    <div class="mt-3">
        <a href="<?= site_url('buku') ?>" class="text-decoration-none text-dark small">
            ← Kembali
        </a>
    </div>

</div>

</body>
</html>