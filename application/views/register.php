<!DOCTYPE html>
<html>
<head>
  <title>Register</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #e9f0ff, #f8f9fa);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card-form {
      width: 420px;
      border-radius: 18px;
      box-shadow: 0 12px 30px rgba(0,0,0,0.12);
      border: none;
      padding: 25px;
      background: #fff;
    }

    .title {
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;
      font-size: 22px;
    }

    .form-control, .form-select {
      border-radius: 10px;
      padding: 10px;
    }

    .btn-dark {
      border-radius: 10px;
      padding: 10px;
    }

    /* SUCCESS FULL SCREEN */
    .success-wrapper{
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, #0f172a, #1e293b);
      display: flex;
      align-items: center;
      justify-content: center;
      animation: fadeBg 0.5s ease-in-out;
    }

    .success-card{
      width: 360px;
      background: #fff;
      padding: 30px;
      border-radius: 18px;
      text-align: center;
      box-shadow: 0 20px 50px rgba(0,0,0,0.3);
      animation: pop 0.4s ease;
    }

    .success-card .icon{
      font-size: 55px;
      margin-bottom: 10px;
    }

    .success-card h3{
      margin-bottom: 10px;
      font-weight: bold;
    }

    .success-card p{
      color: #555;
      font-size: 14px;
    }

    @keyframes pop{
      from{transform: scale(0.8); opacity: 0;}
      to{transform: scale(1); opacity: 1;}
    }

    @keyframes fadeBg{
      from{opacity: 0;}
      to{opacity: 1;}
    }

  </style>
</head>

<body>

<?php if ($this->session->flashdata('success')) : ?>

  <!-- SUCCESS PAGE -->
  <div class="success-wrapper">
    <div class="success-card">

      <div class="icon">🎉</div>

      <h3>Berhasil!</h3>

      <p><?= $this->session->flashdata('success'); ?></p>

      <a href="<?= site_url('auth/login') ?>" class="btn btn-dark w-100 mt-3">
        Lanjut ke Login
      </a>

    </div>
  </div>

<?php else : ?>

  <!-- REGISTER FORM -->
  <div class="card card-form">

    <h4 class="title">Daftar Akun</h4>

    <form method="post" action="<?= site_url('auth/proses_register') ?>">

      <input name="username" class="form-control mb-3" placeholder="Username" required>

      <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

      <select name="kelas" class="form-select mb-3" required>
        <option value="">-- Pilih Kelas --</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
      </select>

      <select name="jurusan" class="form-select mb-3" required>
        <option value="">-- Pilih Jurusan --</option>
        <option value="PPLG">PPLG</option>
        <option value="AKL">AKL</option>
        <option value="TJKT">TJKT</option>
        <option value="MPLB">MPLB</option>
      </select>

      <button class="btn btn-dark w-100">Daftar</button>

    </form>

  </div>

<?php endif; ?>

</body>
</html>