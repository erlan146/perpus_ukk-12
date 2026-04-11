<!DOCTYPE html>
<html>
<head>
  <title>Daftar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f6f7f9;
      height: 100vh;
      font-family: 'Segoe UI', sans-serif;
    }

    .register-card {
      width: 380px;
      border-radius: 16px;
      padding: 25px;
      background: #fff;
      box-shadow: 0 10px 30px rgba(0,0,0,0.05);
      animation: fadeIn 0.4s ease;
    }

    .form-control,
    .form-select {
      border-radius: 10px;
      padding: 10px;
      font-size: 14px;
    }

    .form-control:focus,
    .form-select:focus {
      box-shadow: none;
      border-color: #333;
    }

    .btn-dark {
      border-radius: 10px;
      padding: 10px;
      font-size: 14px;
    }

    .title {
      font-weight: 600;
    }

    .link {
      font-size: 13px;
    }

    @keyframes fadeIn {
      from {opacity:0; transform: translateY(10px);}
      to {opacity:1; transform: translateY(0);}
    }
  </style>
</head>

<body class="d-flex align-items-center justify-content-center">

<div class="register-card">

  <h5 class="text-center mb-3 title">Daftar Akun</h5>

  <form method="post" action="<?= site_url('auth/register') ?>">

    <!-- Username -->
    <div class="mb-3">
      <input name="username" class="form-control" placeholder="Username" required>
    </div>

    <!-- Password -->
    <div class="mb-3">
      <input type="password" name="password" class="form-control" placeholder="Password" required>
    </div>

    <!-- Kelas -->
    <div class="mb-3">
      <select name="kelas" class="form-select" required>
        <option value="">Pilih Kelas</option>
        <option value="10">Kelas 10</option>
        <option value="11">Kelas 11</option>
        <option value="12">Kelas 12</option>
      </select>
    </div>

    <!-- Jurusan -->
    <div class="mb-3">
      <select name="jurusan" class="form-select" required>
        <option value="">Pilih Jurusan</option>
        <option value="PPLG">PPLG</option>
        <option value="TJKT">TJKT</option>
        <option value="AKL">AKL</option>
        <option value="MPLB">MPLB</option>
      </select>
    </div>

    <!-- Button -->
    <button type="submit" class="btn btn-dark w-100">
      Daftar
    </button>

  </form>

  <p class="text-center mt-3 mb-0 link">
    Sudah punya akun? 
    <a href="<?= site_url('auth') ?>" class="fw-semibold text-dark">
      Login
    </a>
  </p>

</div>

</body>
</html>