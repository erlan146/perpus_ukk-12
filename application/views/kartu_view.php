<!DOCTYPE html>
<html>
<head>
<title>Kartu Perpustakaan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg, #dbeafe, #f0f9ff);
}

.card-kartu{
    width: 420px;
    border-radius: 20px;
    background: linear-gradient(135deg, #4f46e5, #06b6d4);
    color: white;
    padding: 25px;
    margin:auto;
    box-shadow:0 15px 35px rgba(0,0,0,0.25);
    position: relative;
    overflow:hidden;
}

.card-kartu::before{
    content:"";
    position:absolute;
    width:200px;
    height:200px;
    background:rgba(255,255,255,0.1);
    border-radius:50%;
    top:-60px;
    right:-60px;
}

.avatar{
    width:65px;
    height:65px;
    border-radius:50%;
    background:white;
    color:#4f46e5;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:24px;
    font-weight:bold;
}

table{
    color:white;
    position:relative;
    z-index:2;
}
</style>
</head>

<body class="d-flex justify-content-center align-items-center" style="height:100vh;">

<div>

<div class="card-kartu">

    <h5 class="text-center">📚 KARTU PERPUSTAKAAN</h5>
    <hr style="border-color:rgba(255,255,255,0.3);">

    <div class="d-flex align-items-center mb-3">
        <div class="avatar">
            <?= strtoupper(substr($user->username,0,1)) ?>
        </div>

        <div class="ms-3">
            <h5 class="mb-0"><?= $user->username ?></h5>
            <small>ID: <?= $user->id ?></small>
        </div>
    </div>

    <table class="table table-borderless">
        <tr>
            <td>Nama</td>
            <td>: <?= $user->username ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>: <?= $user->kelas ?></td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td>: <?= $user->jurusan ?></td>
        </tr>
    </table>

</div>

<br>

<div class="text-center">
    <a href="<?= site_url('kartu/cetak') ?>" class="btn btn-primary">
        Cetak PDF
    </a>
</div>

</div>

</body>
</html>