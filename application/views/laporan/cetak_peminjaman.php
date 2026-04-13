<!DOCTYPE html>
<html>
<head>
    <title>Cetak Peminjaman</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
    </style>
</head>

<body onload="window.print()">

<h2 style="text-align:center;">Laporan Peminjaman</h2>

<table>
    <tr>
        <th>No</th>
        <th>Nama Anggota</th>
        <th>Judul Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
    </tr>

    <?php $no=1; foreach($peminjaman as $p): ?>
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