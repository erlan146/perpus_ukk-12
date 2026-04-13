<!DOCTYPE html>
<html>
<head>
    <title>Laporan Anggota</title>
    <style>
        body { font-family: Arial; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>

<h3 style="text-align:center;">Laporan Data Anggota</h3>

<table>
    <tr>
        <th>No</th>
        <th>Username</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Status</th>
    </tr>

    <?php $no=1; foreach($anggota as $a): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $a->username ?></td>
        <td><?= $a->kelas ?></td>
        <td><?= $a->jurusan ?></td>
        <td><?= $a->status ?></td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>