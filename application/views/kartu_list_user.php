<!DOCTYPE html>
<html>
<head>
<title>Kelola Kartu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">

<h3>Kelola Kartu (ADMIN ONLY)</h3>

<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>Username</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($users as $u): ?>
        <tr>
            <td><?= $u->username ?></td>
            <td><?= $u->kelas ?></td>
            <td><?= $u->jurusan ?></td>
            <td>
                <a class="btn btn-primary btn-sm"
                   href="<?= site_url('kartu/cetak/'.$u->id) ?>">
                   Cetak Kartu
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>