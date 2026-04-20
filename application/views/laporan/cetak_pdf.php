<!DOCTYPE html>
<html>
<head>
    <title>Laporan Anggota</title>

    <style>
        body { font-family: Arial; font-size: 12px; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th { background: #f2f2f2; }

        .filter-box {
            text-align: center;
            margin-bottom: 10px;
        }

        select, button {
            padding: 6px;
            margin: 3px;
        }
    </style>
</head>

<body>

<h3 style="text-align:center;">Laporan Data Anggota</h3>

<!-- 🔥 FILTER -->
<div class="filter-box">
    <form method="get">

        <select name="bulan">
            <option value="">-- Bulan --</option>
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
            <option value="">-- Tahun --</option>
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
        <th>Username</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Status</th>
    </tr>

    <?php 
    $no = 1;
    foreach($anggota as $a):

        // kalau kamu punya created_at / tanggal daftar
        $tanggal = isset($a->created_at) ? $a->created_at : date('Y-m-d');

        $ok = true;

        if (!empty($_GET['bulan']) && !empty($_GET['tahun'])) {
            $ok = (date('Y-m', strtotime($tanggal)) == $_GET['tahun'].'-'.$_GET['bulan']);
        } elseif (!empty($_GET['bulan'])) {
            $ok = (date('m', strtotime($tanggal)) == $_GET['bulan']);
        } elseif (!empty($_GET['tahun'])) {
            $ok = (date('Y', strtotime($tanggal)) == $_GET['tahun']);
        }

        if (!$ok) continue;
    ?>

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