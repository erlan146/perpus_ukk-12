<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .dashboard-box {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
            text-align: center;
            width: 350px;
            animation: fadeIn 0.8s ease-in-out;
        }

        .dashboard-box h2 {
            margin-bottom: 25px;
            color: #333;
        }

        .menu a {
            display: block;
            text-decoration: none;
            margin: 12px 0;
            padding: 12px;
            border-radius: 10px;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-buku {
            background: #4facfe;
            color: white;
        }

        .btn-peminjaman {
            background: #00c9a7;
            color: white;
        }

        .btn-logout {
            background: #ff4b5c;
            color: white;
        }

        .menu a:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            opacity: 0.9;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<div class="dashboard-box">
    <h2>📚 Dashboard Perpustakaan</h2>

    <div class="menu">
        <a class="btn-buku" href="<?= site_url('buku') ?>">Kelola Buku</a>
        <a class="btn-peminjaman" href="<?= site_url('peminjaman') ?>">Peminjaman</a>
        <a class="btn-logout" href="<?= site_url('auth/logout') ?>">Logout</a>
    </div>
</div>

</body>
</html>
