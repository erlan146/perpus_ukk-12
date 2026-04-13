<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Peminjaman</title>
</head>
<body>

<h3 style="text-align:center;">LAPORAN PEMINJAMAN</h3>

<table border="1" width="100%" cellpadding="8" cellspacing="0">

<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Peminjam</th>
    <th>Tanggal Pinjam</th>
    <th>Tanggal Kembali</th>
    <th>Status</th>
    <th>Denda</th>
</tr>

<?php $no=1; foreach($peminjaman as $p): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= isset($p->judul_buku) ? $p->judul_buku : '-' ?></td>
    <td><?= $p->nama_peminjam ?></td>
    <td><?= $p->tanggal_pinjam ?></td>
    <td><?= $p->tanggal_kembali ?></td>
    <td><?= $p->status ?></td>
    <td><?= $p->denda ?></td>
</tr>
<?php endforeach; ?>

</table>

</body>
</html>