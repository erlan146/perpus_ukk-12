<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman</title>

    <style>
        body { font-family: Arial; font-size: 12px; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }

        th { background: #f2f2f2; }

        .filter-box {
            text-align: center;
            margin-bottom: 10px;
        }

        @media print {
            .filter-box { display: none; }
        }
    </style>
</head>

<body>

<h3 style="text-align:center;">Laporan Peminjaman</h3>

<div class="filter-box">

<form method="get" action="<?= site_url('laporan/peminjaman') ?>">

    <input type="date" name="tanggal" value="<?= $filter['tanggal'] ?? '' ?>">

    <select name="bulan">
        <option value="">Bulan</option>
        <?php for($i=1;$i<=12;$i++): ?>
            <option value="<?= $i ?>" <?= ($filter['bulan'] ?? '')==$i?'selected':'' ?>>
                <?= $i ?>
            </option>
        <?php endfor; ?>
    </select>

    <select name="tahun">
        <option value="">Tahun</option>
        <?php for($i=date('Y');$i>=2020;$i--): ?>
            <option value="<?= $i ?>" <?= ($filter['tahun'] ?? '')==$i?'selected':'' ?>>
                <?= $i ?>
            </option>
        <?php endfor; ?>
    </select>

    <button type="submit">Filter</button>

    <button type="button" onclick="window.print()">Print</button>

    <a href="<?= site_url('laporan/pdf_peminjaman?'.http_build_query($filter)) ?>"
       target="_blank">
       Export PDF
    </a>

</form>

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

    <?php $no=1; foreach($peminjaman as $p): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $p->judul_buku ?></td>
        <td><?= $p->nama_peminjam ?? '-' ?></td>
        <td><?= $p->tanggal_pinjam ?></td>
        <td><?= $p->tanggal_kembali ?></td>
        <td><?= $p->status ?></td>
        <td><?= $p->denda ?></td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>