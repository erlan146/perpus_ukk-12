<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f5f7fa;
        }

        .sidebar {
            width: 230px;
            height: 100vh;
            background: white;
            position: fixed;
            left: 0;
            top: 0;
            border-right: 1px solid #eee;
            padding: 20px;
        }

        .sidebar h5 {
            font-weight: bold;
            margin-bottom: 30px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 10px;
            color: #333;
            text-decoration: none;
            transition: 0.2s;
        }

        .menu-item:hover {
            background: #f1f3f5;
        }

        .menu-item i {
            margin-right: 10px;
            font-size: 18px;
        }

        .content {
            margin-left: 230px;
            padding: 30px;
        }

        .card-box {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <h5>📚 Admin</h5>

    <a href="<?= site_url('buku') ?>" class="menu-item">
        <i class="bi bi-book"></i> Buku
    </a>

        <a href="<?= site_url('anggota') ?>" class="menu-item">
        <i class="bi bi-people"></i> Anggota
    </a>

    <a href="<?= site_url('peminjaman') ?>" class="menu-item">
        <i class="bi bi-journal"></i> Kelola Peminjaman
    </a>

    <a href="<?= site_url('auth/logout') ?>" class="menu-item text-danger">
        <i class="bi bi-box-arrow-right"></i> Logout
    </a>

</div>

<!-- CONTENT -->
<div class="content">

    <div class="card-box">
        <h5>Pilih menu di sebelah kiri</h5>
        <p class="text-muted">Silakan kelola data buku, peminjaman, atau anggota.</p>
    </div>

</div>

</body>
</html>