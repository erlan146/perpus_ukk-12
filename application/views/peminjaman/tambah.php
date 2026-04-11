<!DOCTYPE html>
<html>
<head>
    <title>Pinjam Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #00c9a7, #92fe9d);
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
        }

        .card-form {
            background: #eafff8;
            border-radius: 20px;
            padding: 25px;
            animation: fadeIn 0.5s ease;
        }

        .form-control, .form-select {
            border-radius: 10px;
        }

        .btn-modern {
            border-radius: 12px;
            padding: 10px;
            transition: 0.3s;
        }

        .btn-modern:hover {
            transform: scale(1.05);
        }

        @keyframes fadeIn {
            from {opacity:0; transform: translateY(20px);}
            to {opacity:1; transform: translateY(0);}
        }
    </style>
</head>

<body>

<div class="container py-5 d-flex justify-content-center">

<div class="card-form shadow" style="width: 420px;">

    <!-- HEADER -->
    <div class="text-center mb-3">
        <h3 class="fw-bold">📚 Pinjam Buku</h3>
        <p class="text-muted">Pilih buku & tentukan tanggal kembali</p>
    </div>

    <!-- FORM -->
    <form method="post">

        <!-- PILIH BUKU -->
        <div class="mb-3">
            <label class="form-label">Pilih Buku</label>
            <select name="id_buku" class="form-select" required>
                <option value="">-- Pilih Buku --</option>
                <?php foreach($buku as $b): ?>
                    <option value="<?= $b->id ?>">
                        <?= $b->judul ?> (Stok: <?= $b->stok ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- TANGGAL KEMBALI -->
        <div class="mb-3">
            <label class="form-label">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" class="form-control" required>
        </div>

        <!-- BUTTON -->
        <button class="btn btn-success w-100 btn-modern">
            <i class="bi bi-check-circle"></i> Pinjam Sekarang
        </button>

    </form>

    <!-- BACK -->
    <div class="text-center mt-3">
        <a href="<?= site_url('peminjaman') ?>" class="text-decoration-none fw-bold">
            ← Kembali ke Peminjaman
        </a>
    </div>

</div>

</div>

</body>
</html>