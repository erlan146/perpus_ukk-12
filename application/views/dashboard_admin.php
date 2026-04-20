<!DOCTYPE html>
<html>
<head>
<title>Dashboard Admin</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>

<style>

body{
    background:#f1f5f9;
    font-family:'Segoe UI', sans-serif;
}

.sidebar{
    width:240px;
    height:100vh;
    position:fixed;
    background:#fff;
    padding:20px;
    border-right:1px solid #e5e7eb;
}

.sidebar h4{font-weight:700}

.menu{
    display:block;
    padding:10px;
    margin-bottom:8px;
    border-radius:10px;
    text-decoration:none;
    color:#374151;
}

.menu:hover{
    background:#f3f4f6;
}

.content{
    margin-left:240px;
    padding:30px;
}

.card-clean{
    background:#fff;
    border-radius:16px;
    padding:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
}

.stat{
    font-size:28px;
    font-weight:bold;
}

</style>
</head>

<body>

<div class="sidebar">
    <h4>📊 Admin</h4>

    <a href="<?= site_url('dashboard/admin') ?>" class="menu">🏠 Dashboard</a>
    <a href="<?= site_url('buku') ?>" class="menu">📚 Buku</a>
    <a href="<?= site_url('anggota') ?>" class="menu">👤 Anggota</a>
    <a href="<?= site_url('peminjaman') ?>" class="menu">📖 Peminjaman</a>
    <a href="<?= site_url('auth/logout') ?>" class="menu">🚪 Logout</a>
</div>

<div class="content">

<h3 class="mb-4">Dashboard Overview 📊</h3>

<div class="row g-3 mb-4">

    <div class="col-md-6">
        <div class="card-clean">
            <small>Total User</small>
            <div class="stat text-primary"><?= $total_user ?></div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card-clean">
            <small>Total Peminjaman</small>
            <div class="stat text-success"><?= $total_peminjaman ?></div>
        </div>
    </div>

</div>

<div class="row g-3">

    <div class="col-md-6">
        <div class="card-clean">
            <h6>User Per Bulan</h6>
            <div id="userChart" style="height:360px;"></div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card-clean">
            <h6>Peminjaman Per Bulan</h6>
            <div id="pinjamChart" style="height:360px;"></div>
        </div>
    </div>

</div>

</div>

<script>

let bulan = <?= $bulan ?>;
let userData = <?= $user_chart ?>;
let pinjamData = <?= $pinjam_chart ?>;

/* ================= FIX DATA ================= */
userData = userData.map(v => Number(v || 0));
pinjamData = pinjamData.map(v => Number(v || 0));

/* ================= USER CHART ================= */
Highcharts.chart('userChart', {
    chart: {
        type: 'column',
        backgroundColor: '#ffffff',
        options3d: {
            enabled: true,
            alpha: 20,
            beta: 20,
            depth: 80,
            viewDistance: 25
        }
    },
    title: { text: '' },

    xAxis: {
        categories: bulan,
        crosshair: true
    },

    yAxis: {
        min: 0,
        title: { text: '' }
    },

    plotOptions: {
        column: {
            depth: 40,
            borderRadius: 6,
            colorByPoint: true
        }
    },

    colors: ['#4f46e5','#06b6d4','#22c55e','#f59e0b','#ef4444','#8b5cf6','#14b8a6'],

    series: [{
        name: 'User',
        data: userData
    }],

    credits: { enabled: false }
});


/* ================= PEMINJAMAN CHART ================= */
Highcharts.chart('pinjamChart', {
    chart: {
        type: 'column',
        backgroundColor: '#ffffff',
        options3d: {
            enabled: true,
            alpha: 20,
            beta: 20,
            depth: 80,
            viewDistance: 25
        }
    },
    title: { text: '' },

    xAxis: {
        categories: bulan,
        crosshair: true
    },

    yAxis: {
        min: 0,
        title: { text: '' }
    },

    plotOptions: {
        column: {
            depth: 40,
            borderRadius: 6,
            colorByPoint: true
        }
    },

    colors: ['#22c55e','#16a34a','#84cc16','#f97316','#ef4444','#0ea5e9','#6366f1'],

    series: [{
        name: 'Peminjaman',
        data: pinjamData
    }],

    credits: { enabled: false }
});

</script>

</body>
</html>