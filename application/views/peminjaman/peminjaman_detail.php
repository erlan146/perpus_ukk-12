<!DOCTYPE html>
<html>
<head>
    <title>Detail Peminjaman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f6f7f9;
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .section-title {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body>

<div class="container py-5">

<div class="card p-4">

<h4 class="mb-4">Detail Peminjaman</h4>

<!-- ===================== -->
<!-- INFO BUKU -->
<!-- ===================== -->
<div class="mb-4">
    <div class="section-title">📚 Informasi Buku</div>

    <table class="table">
        <tr>
            <th width="200">Judul Buku</th>
            <td>
                <?= $p->judul ?? '-' ?><br>
                <small class="text-muted">
                    <?= $p->penulis ?? '-' ?>
                </small>
            </td>
        </tr>

        <tr>
            <th>Tahun</th>
            <td><?= $p->tahun ?? '-' ?></td>
        </tr>
    </table>
</div>

<!-- ===================== -->
<!-- INFO PEMINJAM -->
<!-- ===================== -->
<div class="mb-4">
    <div class="section-title">👤 Informasi Peminjam</div>

    <table class="table">
        <tr>
            <th width="200">Nama</th>
            <td><?= $p->nama_peminjam ?></td>
        </tr>

        <tr>
            <th>Kelas</th>
            <td><?= $p->kelas ?? '-' ?></td>
        </tr>

        <tr>
            <th>Jurusan</th>
            <td><?= $p->jurusan ?? '-' ?></td>
        </tr>
    </table>
</div>

<!-- ===================== -->
<!-- INFO PEMINJAMAN -->
<!-- ===================== -->
<div class="mb-4">
    <div class="section-title">📅 Informasi Peminjaman</div>

    <table class="table">
        <tr>
            <th width="200">Tanggal Pinjam</th>
            <td><?= $p->tanggal_pinjam ?></td>
        </tr>

        <tr>
            <th>Batas Pengembalian</th>
            <td><?= $p->tanggal_kembali ?></td>
        </tr>

        <tr>
            <th>Status</th>
            <td>
                <?= $p->status == 'dipinjam' ? 'Dipinjam' : 'Selesai' ?>
            </td>
        </tr>

        <tr>
            <th>Denda</th>
            <td>
                <?= $p->denda > 0 ? 'Rp '.number_format($p->denda) : '-' ?>
            </td>
        </tr>
    </table>
</div>

<!-- BACK -->
<a href="<?= site_url('peminjaman') ?>" class="btn btn-dark">
    ← Kembali
</a>

</div>

</div>

</body>
</html>