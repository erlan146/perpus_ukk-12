<!DOCTYPE html>
<html>
<head>
<title>Kartu Perpustakaan</title>

<style>
body{
    margin:0;
    padding:0;
    font-family: Arial;
}

/* 🔥 JANGAN PAKAI HEIGHT 100% / TABLE PAGE LAGI */
.wrapper{
    width:100%;
    text-align:center;
    padding-top:30px;
}

/* 🔥 KARTU FIX */
.card{
    width:320px;
    border:2px solid #4f46e5;
    border-radius:12px;
    margin:0 auto;
    overflow:hidden;
}

/* HEADER */
.header{
    background:#4f46e5;
    color:#fff;
    padding:10px;
    font-size:14px;
    font-weight:bold;
    text-align:center;
}

/* CONTENT */
.content{
    padding:12px;
    font-size:13px;
}

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
}

td{
    padding:4px 0;
}

.label{
    font-weight:bold;
    width:80px;
}

/* FOOTER */
.footer{
    text-align:center;
    font-size:11px;
    padding:8px;
    border-top:1px solid #eee;
    color:#666;
}
</style>

</head>

<body>

<div class="wrapper">

    <div class="card">

        <div class="header">
            KARTU PERPUSTAKAAN
        </div>

        <div class="content">
            <table>
                <tr>
                    <td class="label">Nama</td>
                    <td><?= $user->username ?></td>
                </tr>
                <tr>
                    <td class="label">Kelas</td>
                    <td><?= $user->kelas ?></td>
                </tr>
                <tr>
                    <td class="label">Jurusan</td>
                    <td><?= $user->jurusan ?></td>
                </tr>
            </table>
        </div>

        <div class="footer">
            Kartu Anggota Perpustakaan
        </div>

    </div>

</div>

</body>
</html>