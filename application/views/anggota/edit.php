<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Anggota</title>

    <!-- BOOTSTRAP 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- ICON -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
    /* BACKGROUND */
    body {
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
    }

    .bg-modern {
        background: radial-gradient(circle at top, #1e293b, #020617);
    }

    /* WRAPPER */
    .modern-wrapper {
        width: 380px;
        animation: fadeIn 0.6s ease;
    }

    /* HEADER */
    .modern-header {
        background: rgba(79, 70, 229, 0.9);
        backdrop-filter: blur(10px);
        color: white;
        padding: 20px;
        border-radius: 20px 20px 0 0;
        box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        text-align: center;
    }

    /* CARD */
    .modern-card {
        background: rgba(255,255,255,0.95);
        border-radius: 0 0 20px 20px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.25);
        padding: 25px;
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
        transition: 0.2s;
    }

    .input-box input:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.2);
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
        left: 30px;
        background: white;
        padding: 0 6px;
        font-size: 11px;
        color: #6366f1;
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
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.2);
    }

    /* LABEL */
    .label-title {
        font-size: 13px;
        color: #64748b;
        margin-bottom: 5px;
        display: block;
    }

    /* BUTTON */
    .btn-modern {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border: none;
        padding: 12px;
        border-radius: 12px;
        color: white;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(99,102,241,0.4);
    }

    /* CANCEL */
    .btn-cancel {
        display: block;
        text-align: center;
        padding: 12px;
        border-radius: 12px;
        background: #f1f5f9;
        color: #334155;
        text-decoration: none;
        margin-top: 10px;
    }

    .btn-cancel:hover {
        background: #e2e8f0;
    }

    /* ANIMATION */
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

<body class="bg-modern">

<div class="container-fluid vh-100 d-flex align-items-center justify-content-center">

    <div class="modern-wrapper">

        <!-- HEADER -->
        <div class="modern-header">
            <h4 class="fw-bold mb-1">Edit Anggota</h4>
            <small>Kelola data pengguna</small>
        </div>

        <!-- CARD -->
        <div class="modern-card">

            <form method="post">

                <!-- USERNAME -->
                <div class="input-box">
                    <i class="bi bi-person"></i>
                    <input type="text" name="username" value="<?= $a->username ?>" required>
                    <label>Username</label>
                </div>

                <!-- PASSWORD -->
                <div class="input-box">
                    <i class="bi bi-lock"></i>
                    <input type="password" name="password">
                    <label>Password (opsional)</label>
                </div>

                <!-- KELAS -->
                <label class="label-title">Kelas</label>
                <select name="kelas" class="modern-select">
                    <option <?= $a->kelas=='10'?'selected':'' ?>>10</option>
                    <option <?= $a->kelas=='11'?'selected':'' ?>>11</option>
                    <option <?= $a->kelas=='12'?'selected':'' ?>>12</option>
                </select>

                <!-- JURUSAN -->
                <label class="label-title">Jurusan</label>
                <select name="jurusan" class="modern-select">
                    <option <?= $a->jurusan=='PPLG'?'selected':'' ?>>PPLG</option>
                    <option <?= $a->jurusan=='TJKT'?'selected':'' ?>>TJKT</option>
                    <option <?= $a->jurusan=='AKL'?'selected':'' ?>>AKL</option>
                    <option <?= $a->jurusan=='MPLB'?'selected':'' ?>>MPLB</option>
                </select>

                <!-- BUTTON -->
                <button class="btn-modern w-100">💾 Simpan Perubahan</button>

                <a href="<?= site_url('anggota') ?>" class="btn-cancel w-100">Batal</a>

            </form>

        </div>

    </div>

</div>

</body>
</html>