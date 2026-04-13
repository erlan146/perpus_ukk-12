<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Anggota</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ICON -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
    body {
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
        background: #f1f5f9;
    }

    .wrapper {
        width: 380px;
        animation: fadeIn 0.5s ease;
    }

    .header {
        background: #1e293b;
        color: white;
        padding: 18px;
        border-radius: 16px 16px 0 0;
        text-align: center;
    }

    .card-box {
        background: white;
        padding: 25px;
        border-radius: 0 0 16px 16px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    /* INPUT */
    .input-box {
        position: relative;
        margin-bottom: 20px;
    }

    .input-box i {
        position: absolute;
        left: 12px;
        top: 12px;
        color: #64748b;
    }

    .input-box input {
        width: 100%;
        padding: 12px 12px 12px 38px;
        border-radius: 10px;
        border: 1px solid #cbd5e1;
        outline: none;
        background: #f8fafc;
    }

    .input-box input:focus {
        border-color: #334155;
        background: #fff;
    }

    .input-box label {
        position: absolute;
        left: 38px;
        top: 12px;
        font-size: 13px;
        color: #64748b;
        transition: 0.2s;
    }

    .input-box input:focus + label,
    .input-box input:valid + label {
        top: -8px;
        background: white;
        padding: 0 6px;
        font-size: 11px;
        color: #334155;
    }

    /* SELECT */
    .modern-select {
        width: 100%;
        padding: 12px;
        border-radius: 10px;
        border: 1px solid #cbd5e1;
        margin-bottom: 15px;
        background: #f8fafc;
    }

    .modern-select:focus {
        border-color: #334155;
        background: #fff;
    }

    .label-title {
        font-size: 13px;
        color: #475569;
        margin-bottom: 5px;
    }

    /* BUTTON */
    .btn-modern {
        background: #1e293b;
        border: none;
        padding: 12px;
        border-radius: 10px;
        color: white;
        font-weight: 500;
        transition: 0.2s;
    }

    .btn-modern:hover {
        background: #0f172a;
    }

    /* BACK */
    .btn-back {
        display: block;
        text-align: center;
        padding: 12px;
        border-radius: 10px;
        background: #e2e8f0;
        color: #334155;
        text-decoration: none;
        margin-top: 10px;
    }

    .btn-back:hover {
        background: #cbd5e1;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    </style>
</head>

<body>

<div class="container-fluid vh-100 d-flex align-items-center justify-content-center">

    <div class="wrapper">

        <!-- HEADER -->
        <div class="header">
            <h5 class="fw-semibold mb-1">Tambah Anggota</h5>
            <small class="text-light opacity-75">Form pengguna baru</small>
        </div>

        <!-- CARD -->
        <div class="card-box">

            <form method="post">

                <!-- USERNAME -->
                <div class="input-box">
                    <i class="bi bi-person"></i>
                    <input type="text" name="username" required>
                    <label>Username</label>
                </div>

                <!-- PASSWORD -->
                <div class="input-box">
                    <i class="bi bi-lock"></i>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>

                <!-- KELAS -->
                <label class="label-title">Kelas</label>
                <select name="kelas" class="modern-select">
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                </select>

                <!-- JURUSAN -->
                <label class="label-title">Jurusan</label>
                <select name="jurusan" class="modern-select">
                    <option>PPLG</option>
                    <option>TJKT</option>
                    <option>AKL</option>
                    <option>MPLB</option>
                </select>

                <!-- BUTTON -->
                <button class="btn-modern w-100">Tambah Anggota</button>

                <a href="<?= site_url('anggota') ?>" class="btn-back w-100">Kembali</a>

            </form>

        </div>

    </div>

</div>

</body>
</html>