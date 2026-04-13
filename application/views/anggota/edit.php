<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Anggota</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ICON -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
    body {
        background: #f6f7f9;
        font-family: 'Segoe UI', sans-serif;
    }

    .card-box {
        width: 400px;
        background: #fff;
        padding: 25px;
        border-radius: 14px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.05);
    }

    .form-control, .form-select {
        border-radius: 10px;
        font-size: 14px;
    }

    .form-control:focus, .form-select:focus {
        box-shadow: none;
        border-color: #333;
    }

    .btn-dark {
        border-radius: 10px;
        padding: 10px;
        font-size: 14px;
    }

    .btn-outline-dark {
        border-radius: 10px;
        padding: 10px;
        font-size: 14px;
    }

    .title {
        font-weight: 600;
    }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center vh-100">

<div class="card-box">

    <div class="mb-3">
        <h5 class="title mb-1">Edit Anggota</h5>
        <small class="text-muted">Perbarui data pengguna</small>
    </div>

    <form method="post">

        <!-- USERNAME -->
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" value="<?= $a->username ?>" class="form-control" required>
        </div>

        <!-- PASSWORD -->
        <div class="mb-3">
            <label class="form-label">Password (opsional)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <!-- KELAS -->
        <div class="mb-3">
            <label class="form-label">Kelas</label>
            <select name="kelas" class="form-select">
                <option <?= $a->kelas=='10'?'selected':'' ?>>10</option>
                <option <?= $a->kelas=='11'?'selected':'' ?>>11</option>
                <option <?= $a->kelas=='12'?'selected':'' ?>>12</option>
            </select>
        </div>

        <!-- JURUSAN -->
        <div class="mb-3">
            <label class="form-label">Jurusan</label>
            <select name="jurusan" class="form-select">
                <option <?= $a->jurusan=='PPLG'?'selected':'' ?>>PPLG</option>
                <option <?= $a->jurusan=='TJKT'?'selected':'' ?>>TJKT</option>
                <option <?= $a->jurusan=='AKL'?'selected':'' ?>>AKL</option>
                <option <?= $a->jurusan=='MPLB'?'selected':'' ?>>MPLB</option>
            </select>
        </div>

        <!-- BUTTON -->
        <button class="btn btn-dark w-100 mb-2">Simpan Perubahan</button>

        <a href="<?= site_url('anggota') ?>" class="btn btn-outline-dark w-100">
            Batal
        </a>

    </form>

</div>

</body>
</html>