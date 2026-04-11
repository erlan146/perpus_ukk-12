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
        background: radial-gradient(circle at top, #1e293b, #020617);
    }

    .wrapper {
        width: 380px;
        animation: fadeIn 0.6s ease;
    }

    .header {
        background: linear-gradient(135deg, #22c55e, #16a34a);
        color: white;
        padding: 20px;
        border-radius: 20px 20px 0 0;
        text-align: center;
        box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    }

    .card-box {
        background: white;
        padding: 25px;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.25);
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
        color: #94a3b8;
    }

    .input-box input {
        width: 100%;
        padding: 12px 12px 12px 38px;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        outline: none;
    }

    .input-box input:focus {
        border-color: #22c55e;
        box-shadow: 0 0 0 3px rgba(34,197,94,0.2);
    }

    .input-box label {
        position: absolute;
        left: 38px;
        top: 12px;
        font-size: 13px;
        color: #94a3b8;
        transition: 0.2s;
    }

    .input-box input:focus + label,
    .input-box input:valid + label {
        top: -8px;
        background: white;
        padding: 0 6px;
        font-size: 11px;
        color: #22c55e;
    }

    /* SELECT */
    .modern-select {
        width: 100%;
        padding: 12px;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        margin-bottom: 15px;
    }

    .modern-select:focus {
        border-color: #22c55e;
        box-shadow: 0 0 0 3px rgba(34,197,94,0.2);
    }

    .label-title {
        font-size: 13px;
        color: #64748b;
        margin-bottom: 5px;
    }

    /* BUTTON */
    .btn-modern {
        background: linear-gradient(135deg, #22c55e, #16a34a);
        border: none;
        padding: 12px;
        border-radius: 12px;
        color: white;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(34,197,94,0.4);
    }

    /* BACK */
    .btn-back {
        display: block;
        text-align: center;
        padding: 12px;
        border-radius: 12px;
        background: #f1f5f9;
        color: #334155;
        text-decoration: none;
        margin-top: 10px;
    }

    .btn-back:hover {
        background: #e2e8f0;
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

<div class="container-fluid vh-100 d-flex align-items-center justify-content-center">

    <div class="wrapper">

        <!-- HEADER -->
        <div class="header">
            <h4 class="fw-bold mb-1">Tambah Anggota</h4>
            <small>Tambahkan pengguna baru</small>
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
                <button class="btn-modern w-100">➕ Tambah Anggota</button>

                <a href="<?= site_url('anggota') ?>" class="btn-back w-100">Kembali</a>

            </form>

        </div>

    </div>

</div>

</body>
</html>