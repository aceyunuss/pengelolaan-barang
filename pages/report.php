<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-light">
    <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-chart-bar"></i> Report</li>
  </ol>
</nav>
<?php

$pr = date('Y', strtotime(date('Y') . " -1 year"));
$nn = date('Y');

$qprev = "SELECT status_byr, count( no_faktur ) as total FROM tbl_pembelian WHERE YEAR ( tgl_pembelian ) = $pr GROUP BY status_byr ORDER BY status_byr";
$sql_prev = mysqli_query($conn, $qprev) or die($conn->error);
while ($dtprev = mysqli_fetch_array($sql_prev)) {
  $lp[$dtprev['status_byr']] = '\'' . $dtprev['status_byr'] . '\', ';
  $vp[$dtprev['status_byr']] = $dtprev['total'];
  if ($dtprev['status_byr'] == "Disetujui") {
    $cp[$dtprev['status_byr']] = "'#50d982'";
  }
  if ($dtprev['status_byr'] == "Ditolak") {
    $cp[$dtprev['status_byr']] = "'#ff6384'";
  }
  if ($dtprev['status_byr'] == "Mengajukan") {
    $cp[$dtprev['status_byr']] = "'#36a2eb'";
  }
}


$qnow = "SELECT status_byr, count( no_faktur ) as total FROM tbl_pembelian WHERE YEAR ( tgl_pembelian ) = $nn GROUP BY status_byr ORDER BY status_byr";
$sql_now = mysqli_query($conn, $qnow) or die($conn->error);
while ($dtnow = mysqli_fetch_array($sql_now)) {
  $ln[$dtnow['status_byr']] = '\'' . $dtnow['status_byr'] . '\', ';
  $vn[$dtnow['status_byr']] = $dtnow['total'];
  if ($dtnow['status_byr'] == "Disetujui") {
    $cn[$dtnow['status_byr']] = "'#50d982'";
  }
  if ($dtnow['status_byr'] == "Ditolak") {
    $cn[$dtnow['status_byr']] = "'#ff6384'";
  }
  if ($dtnow['status_byr'] == "Mengajukan") {
    $cn[$dtnow['status_byr']] = "'#36a2eb'";
  }
}
?>
<div class="page-content">
  <div class="row">
    <div class="col-12">
      <h4>Report</h4>
    </div>
  </div>
  <div class="form-container">
    <div class="row">
      <div class="col-1">
      </div>
      <div class="col-4">
        <center>
          <h5>Data Tahun <?= $pr ?></h5><br>
        </center>
        <div>
          <canvas id="prev"></canvas>
        </div>
      </div>
      <div class="col-2">
      </div>
      <div class="col-4">
        <center>
          <h5>Data Tahun <?= $nn ?></h5><br>
        </center>
        <div>
          <canvas id="now"></canvas>
        </div>
      </div>
      <div class="col-1">
      </div>
    </div>
  </div>
</div>

<script>
  const data_prev = {
    labels: [<?= implode($lp), ", " ?>],
    datasets: [{
      label: 'My First Dataset',
      data: [<?= implode($vp, ", ") ?>],
      backgroundColor: [<?= implode($cp, ", ") ?>],
      hoverOffset: 4
    }]
  };

  const config_prev = {
    type: 'doughnut',
    data: data_prev,
  };

  var prev = new Chart(
    document.getElementById('prev'),
    config_prev
  );
</script>

<script>
  const data_now = {
    labels: [<?= implode($ln), ", " ?>],
    datasets: [{
      label: 'My First Dataset',
      data: [<?= implode($vn, ", ") ?>],
      backgroundColor: [<?= implode($cn, ", ") ?>],
      hoverOffset: 4
    }]
  };

  const config_now = {
    type: 'doughnut',
    data: data_now,
  };

  var now = new Chart(
    document.getElementById('now'),
    config_now
  );
</script>