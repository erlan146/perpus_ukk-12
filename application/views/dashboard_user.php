<!DOCTYPE html>
<html>
<head>
  <title>Dashboard User</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f6f7f9;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
    }

    .main { padding: 20px; }

    .card-main {
      background: #fff;
      border-radius: 12px;
      padding: 18px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
      margin-bottom: 15px;
    }

    .stat-card {
      background: #fff;
      border-radius: 10px;
      padding: 15px;
      border: 1px solid #eee;
    }

    .menu-btn {
      border-radius: 10px;
      padding: 10px 14px;
      font-size: 14px;
    }

    .book-card {
      border-radius: 10px;
      border: 1px solid #eee;
      padding: 14px;
      transition: 0.2s;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .book-card:hover {
      background: #fafafa;
    }

    .badge-soft {
      background: #f1f3f5;
      color: #333;
      font-size: 11px;
      padding: 5px 8px;
      border-radius: 8px;
    }

    .badge-danger {
      background: #f8d7da;
      color: #842029;
    }

    .btn-pinjam {
      margin-top: 10px;
      border-radius: 8px;
      font-size: 13px;
    }

    .book-cover {
  width: 100%;
  height: 180px;
  object-fit: cover;
  border-radius: 8px;
  margin-bottom: 10px;
}

.book-title {
  font-size: 14px;
  font-weight: 600;
  line-height: 1.2;
}

.book-author {
  font-size: 12px;
  color: #777;
}

.book-card {
  border-radius: 12px;
  border: 1px solid #eee;
  padding: 12px;
  transition: 0.2s;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.book-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.08);
  background: #fff;
}
  </style>
</head>

<body>

<div class="container-fluid main">

  <!-- HEADER -->
  <div class="mb-3">
    <h5 class="fw-bold mb-1">Dashboard</h5>
    <small class="text-muted">
      <?= $this->session->userdata('username') ?>
    </small>
  </div>

  <!-- STAT -->
  <div class="row g-2 mb-3">

    <div class="col-md-3">
      <div class="stat-card">
        <small class="text-muted">Dipinjam</small>
        <h5 class="fw-bold">
          <?= $this->db->where('nama_peminjam', $this->session->userdata('username'))
                       ->where('status','dipinjam')
                       ->count_all_results('peminjaman') ?>
        </h5>
      </div>
    </div>

    <div class="col-md-3">
      <div class="stat-card">
        <small class="text-muted">Denda</small>
        <h5 class="fw-bold text-danger">
          Rp <?= number_format(
            $this->db->select_sum('denda')
                     ->where('nama_peminjam', $this->session->userdata('username'))
                     ->get('peminjaman')->row()->denda ?? 0
          ) ?>
        </h5>
      </div>
    </div>

  </div>

  <!-- MENU -->
  <div class="card-main">
    <div class="d-flex gap-2 flex-wrap">

      <a href="<?= site_url('peminjaman/transaksi_user') ?>" 
         class="btn btn-outline-dark menu-btn">
        Transaksi
      </a>

      <!-- ❌ KARTU SAYA SUDAH DIHAPUS -->

      <a href="<?= site_url('auth/logout') ?>" 
         class="btn btn-dark menu-btn">
        Logout
      </a>

    </div>
  </div>

  <!-- LIST BUKU -->
  <div class="card-main">

    <h6 class="fw-semibold mb-3">Daftar Buku</h6>

    <input type="text" id="search" class="form-control mb-3" placeholder="Cari buku...">

    <div class="row g-2">

      <?php
      $buku = $this->db->get('buku')->result();
      foreach($buku as $b):

      $cekDipinjam = $this->db->where('id_buku', $b->id)
                              ->where('status', 'dipinjam')
                              ->get('peminjaman')
                              ->row();
      ?>

      <div class="col-6 col-md-3 col-lg-2 item-buku">
        <div class="book-card">

          <div>
<img src="<?= base_url('assets/cover/'.(!empty($b->cover)?$b->cover:'default.jpg')) ?>" class="book-cover">

<div class="book-title"><?= $b->judul ?></div>
<div class="book-author"><?= $b->penulis ?></div>

            <div class="mt-2">
              <span class="badge-soft"><?= $b->tahun ?></span>

              <?php if($cekDipinjam): ?>
                <span class="badge-soft badge-danger">Dipinjam</span>
              <?php else: ?>
                <span class="badge-soft">Tersedia</span>
              <?php endif; ?>

              <span class="badge-soft">Stok: <?= $b->stok ?></span>
            </div>
          </div>

          <?php if(!$cekDipinjam && $b->stok > 0): ?>
            <a href="<?= site_url('peminjaman/pinjam/'.$b->id) ?>" 
               class="btn btn-dark btn-sm btn-pinjam w-100">
               Pinjam
            </a>
          <?php else: ?>
            <button class="btn btn-outline-secondary btn-sm btn-pinjam w-100" disabled>
              Tidak Tersedia
            </button>
          <?php endif; ?>

        </div>
      </div>

      <?php endforeach; ?>

    </div>

  </div>

</div>

<!-- SEARCH -->
<script>
document.getElementById('search').addEventListener('keyup', function() {
  let val = this.value.toLowerCase();
  document.querySelectorAll('.item-buku').forEach(item => {
    item.style.display = item.innerText.toLowerCase().includes(val) ? 'block' : 'none';
  });
});
</script>

</body>
</html>