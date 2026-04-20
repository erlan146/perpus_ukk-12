<!DOCTYPE html>
<html>
<head>
    <title>Cetak Peminjaman</title>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        .filter-box {
            text-align: center;
            margin-bottom: 15px;
        }

        select, button {
            padding: 6px;
            margin: 3px;
        }
    </style>
</head>

<body>

<h2 style="text-align:center;">Laporan Peminjaman</h2>

<!-- 🔥 FILTER TANGGAL -->
<div class="filter-box">
    <form method="get">

        <select name="bulan">
            <option value="">-- Pilih Bulan --</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select>

        <select name="tahun">
            <option value="">-- Pilih Tahun --</option>
            <?php for($i=date('Y'); $i>=2020; $i--): ?>
                <option value="<?= $i ?>"><?= $i ?></option>
            <?php endfor; ?>
        </select>

        <button type="submit">Filter</button>
        <button type="button" onclick="window.print()">Print</button>

    </form>
</div>

<table>
    <tr>
        <th>No</th>
        <th>Nama Anggota</th>
        <th>Judul Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
    </tr>

    <?php 
    $no = 1;
    foreach($peminjaman as $p):

        $tgl = date('Y-m', strtotime($p->tanggal_pinjam));

        $filter_ok = true;

        if (!empty($_GET['bulan']) && !empty($_GET['tahun'])) {
            $filter_ok = ($tgl == $_GET['tahun'].'-'.$_GET['bulan']);
        } elseif (!empty($_GET['bulan'])) {
            $filter_ok = (date('m', strtotime($p->tanggal_pinjam)) == $_GET['bulan']);
        } elseif (!empty($_GET['tahun'])) {
            $filter_ok = (date('Y', strtotime($p->tanggal_pinjam)) == $_GET['tahun']);
        }

        if (!$filter_ok) continue;
    ?>

    <tr>
        <td><?= $no++; ?></td>
        <td><?= $p->nama_anggota; ?></td>
        <td><?= $p->judul_buku; ?></td>
        <td><?= $p->tanggal_pinjam; ?></td>
        <td><?= $p->tanggal_kembali; ?></td>
    </tr>

    <?php endforeach; ?>

</table>

</body>
</html>