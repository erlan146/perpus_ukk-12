<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Peminjaman</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            font-size: 18px;
            letter-spacing: 1px;
        }

        .header p {
            margin: 3px 0;
            font-size: 11px;
            color: #666;
        }

        .info {
            margin-bottom: 10px;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background: #2563eb;
            color: white;
            padding: 8px;
            font-size: 11px;
        }

        td {
            border: 1px solid #ddd;
            padding: 7px;
            font-size: 11px;
        }

        tr:nth-child(even) {
            background: #f9fafb;
        }

        .status {
            padding: 3px 6px;
            border-radius: 4px;
            font-size: 10px;
            color: white;
        }

        .dipinjam {
            background: #f59e0b;
        }

        .kembali {
            background: #22c55e;
        }

        .footer {
            margin-top: 20px;
            text-align: right;
            font-size: 11px;
            color: #666;
        }
    </style>
</head>

<body>

<div class="header">
    <h2>LAPORAN PEMINJAMAN BUKU</h2>
    <p>Sistem Perpustakaan Sekolah</p>
</div>

<div class="info">
    <b>Tanggal Cetak:</b> <?= date('d-m-Y') ?>
</div>

<table>
    <tr>
        <th>No</th>
        <th>Judul Buku</th>
        <th>Peminjam</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Status</th>
        <th>Denda</th>
    </tr>

    <?php $no = 1; foreach($peminjaman as $p): ?>

    <tr>
        <td><?= $no++ ?></td>
        <td><?= $p->judul_buku ?? '-' ?></td>
        <td><?= $p->nama_peminjam ?? '-' ?></td>
        <td><?= $p->tanggal_pinjam ?></td>
        <td><?= $p->tanggal_kembali ?></td>

        <td>
            <?php if($p->status == 'dipinjam'): ?>
                <span class="status dipinjam">Dipinjam</span>
            <?php else: ?>
                <span class="status kembali">Kembali</span>
            <?php endif; ?>
        </td>

        <td>Rp <?= number_format($p->denda ?? 0,0,',','.') ?></td>
    </tr>

    <?php endforeach; ?>

</table>

<div class="footer">
    Dicetak otomatis oleh sistem perpustakaan
</div>

</body>
</html>