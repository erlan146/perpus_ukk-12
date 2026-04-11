<!DOCTYPE html>
<html>
<head>
  <title>Dashboard User</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f6f7f9;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
    }

    .main {
      padding: 20px;
    }

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

    .btn-pinjam {
      margin-top: 10px;
      border-radius: 8px;
      font-size: 13px;
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

    <div class="col-md-3">
      <div class="stat-card">
        <small class="text-muted">Buku Tersedia</small>
        <h5 class="fw-bold">
          <?= $this->db->where('status','tersedia')->count_all_results('buku') ?>
        </h5>
      </div>
    </div>

  </div>

  <!-- MENU -->
  <div class="card-main">
    <div class="d-flex gap-2">

      <a href="<?= site_url('peminjaman/transaksi_user') ?>" 
         class="btn btn-outline-dark menu-btn">
        Transaksi
      </a>

      <a href="<?= site_url('auth/logout') ?>" 
         class="btn btn-dark menu-btn">
        Logout
      </a>

    </div>
  </div>

  <!-- INFO BUKU DIPINJAM -->
  <div class="card-main">

    <small class="text-muted">Sedang dipinjam</small>

    <?php
    $this->db->select('p.*, b.judul');
    $this->db->from('peminjaman p');
    $this->db->join('buku b','b.id=p.id_buku');
    $this->db->where('p.nama_peminjam', $this->session->userdata('username'));
    $this->db->where('p.status','dipinjam');
    $aktif = $this->db->get()->row();
    ?>

    <?php if($aktif): ?>
      <div class="fw-semibold"><?= $aktif->judul ?></div>
      <small class="text-danger">
        Jatuh tempo: <?= $aktif->tanggal_kembali ?>
      </small>
    <?php else: ?>
      <div class="text-muted">Tidak ada buku dipinjam</div>
    <?php endif; ?>

  </div>

  <!-- LIST BUKU -->
  <div class="card-main">

    <h6 class="fw-semibold mb-3">Daftar Buku</h6>

    <!-- SEARCH -->
    <input type="text" id="search" class="form-control mb-3" placeholder="Cari buku...">

    <div class="row g-2">

      <?php
      $buku = $this->db->get('buku')->result();
      foreach($buku as $b):
      ?>

      <div class="col-md-3 item-buku">
        <div class="book-card">

          <div>
            <div class="fw-semibold"><?= $b->judul ?></div>
            <small class="text-muted"><?= $b->penulis ?></small>

            <div class="mt-2">
              <span class="badge-soft"><?= $b->tahun ?></span>
              <span class="badge-soft"><?= $b->status ?></span>
              <span class="badge-soft">Stok: <?= $b->stok ?></span>
            </div>
          </div>

          <!-- TOMBOL PINJAM -->
          <?php if($b->status == 'tersedia'): ?>
          <a href="<?= site_url('peminjaman/pinjam/'.$b->id) ?>" 
   class="btn btn-dark btn-sm btn-pinjam w-100">
   Pinjam
</a>
          <?php else: ?>
            <button class="btn btn-outline-secondary btn-sm btn-pinjam w-100" disabled>
              Tidak tersedia
            </button>
          <?php endif; ?>

        </div>
      </div>

      <?php endforeach; ?>

    </div>

  </div>

</div>

<!-- SEARCH SCRIPT -->
<script>
document.getElementById('search').addEventListener('keyup', function() {
  let val = this.value.toLowerCase();
  let items = document.querySelectorAll('.item-buku');

  items.forEach(item => {
    let text = item.innerText.toLowerCase();
    item.style.display = text.includes(val) ? 'block' : 'none';
  });
});
</script>

</body>
</html>