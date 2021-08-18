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
    <br><br><br>
    <hr><br>
    <div class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-6">
            <h4>Data Pengajuan FR</h4>
          </div>
        </div>
        <style>
          ul.nav-pills {
            padding: 12px 15px;
            /*border-bottom: 1px solid #169BB0;*/
          }

          .kotak-data-tab .nav-item {
            font-size: 12px;
            font-weight: lighter;
            padding-bottom: 5px;
            border-bottom: 1px solid #D9DADB;
            margin-right: 15px;
          }

          .kotak-data-tab .nav-link {
            color: #000000;
          }

          .kotak-data-tab .nav-link.active {
            background-color: #169BB0;
          }

          .badge-status {
            padding: 5px;
          }
        </style>
        <div class="kotak-data-tab">
          <ul class="nav nav-pills" id="pills-tab" role="tablist">
            <?php
            $selesai = "SELECT * FROM tbl_pembelian INNER JOIN tbl_pegawai ON tbl_pembelian.id_peg = tbl_pegawai.id_peg INNER JOIN tbl_supplier ON tbl_pembelian.no_supplier = tbl_supplier.no_supp LEFT JOIN (SELECT no_faktur, GROUP_CONCAT( nm_barang SEPARATOR ', ' ) as nama_barang FROM tbl_pembeliandetail p	LEFT JOIN tbl_databarang b ON p.kd_barang = b.kd_barang GROUP BY p.no_faktur) x on x.no_faktur = tbl_pembelian.no_faktur WHERE tbl_pembelian.status_byr != 'Mengajukan' ORDER BY tbl_pembelian.tgl_pembelian ASC";
            $sql_selesai = mysqli_query($conn, $selesai) or die($conn->error);
            $jml_selesai = mysqli_num_rows($sql_selesai);
            ?>
            <li class="nav-item">
              <a class="nav-link active" id="dpembelian_selesai-tab" data-toggle="pill" href="#dpembelian_selesai" role="tab" aria-controls="dpembelian_selesai" aria-selected="false">Selesai <sup>( <?php echo $jml_selesai; ?> )</sup></a>
            </li>
          </ul>

          <div class="tab-pane faded show active" id="dpembelian_selesai" role="tabpanel" aria-labelledby="dpembelian_selesai-tab">
            <div class="table-container">
              <table id="example2" class="table table-striped display tabel-data">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No Faktur</th>
                    <th>Tanggal</th>
                    <th>Supplier</th>
                    <th>Nama Barang</th>
                    <th>Total</th>
                    <th>Status</th>
                    <!-- <th>Jth Tempo</th> -->
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  while ($dselesai = mysqli_fetch_array($sql_selesai)) {
                  ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $dselesai['no_faktur']; ?></td>
                      <td class="text-center"><?php echo $dselesai['tgl_pembelian']; ?></td>
                      <td><?php echo $dselesai['nama_supp']; ?></td>
                      <td><?php echo $dselesai['nama_barang']; ?></td>
                      <td class="text-right"><?php echo $dselesai['total_pembelian']; ?></td>
                      <td class="text-center"><span class="badge badge-pill badge-<?= $dselesai['status_byr'] == "Disetujui" ? "success" : "danger" ?> badge-status"><?php echo $dselesai['status_byr']; ?></span></td>
                      <!-- <td class="text-center"><?php echo $dselesai['jth_tempo']; ?></td> -->
                      <td class="td-opsi">
                        <button class="btn-transition btn btn-outline-primary btn-sm" title="detail obat" id="tombol_detail" name="tombol_detail" data-toggle="modal" data-target="#detail_pembelian" data-no_faktur="<?php echo $dselesai['no_faktur']; ?>" data-tgl_pembelian="<?php echo tgl_indo($dselesai['tgl_pembelian']); ?>" data-nama_supp="<?php echo $dselesai['nama_supp']; ?>" data-status_byr="<?php echo $dselesai['status_byr']; ?>">
                          <i class="fas fa-info-circle"></i>
                        </button>
                        <a href="laporan/?page=nota_pembelian&no_faktur=<?php echo $dselesai['no_faktur']; ?>" target="_blank">
                          <button class="btn-transition btn btn-outline-dark btn-sm" title="cetak" id="tombol_cetak" name="tombol_cetak">
                            <i class="fas fa-print"></i>
                          </button>
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


      <div class="modal fade" id="detail_pembelian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Data Detail Barang</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="tabel-profil">
                <tr>
                  <th>No Faktur</th>
                  <td id="no_fakturdetail">PJL00001</td>
                  <th>Tanggal</th>
                  <td id="tgl_pembeliandetail">20/11/19</td>
                </tr>
                <tr>
                  <th>Supplier</th>
                  <td id="nm_supplierdetail">Faizal Abidin</td>
                  <th>Status</th>
                  <td id="status_pembeliandetail">Lunas</td>
                </tr>
              </table>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody id="data_detailpembelian">
                  <!-- diisi dengan ajax jquery -->
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="4" class="text-right">Total :</th>
                    <th class="text-right">
                      <span id="total_pembeliandetail"></span>
                    </th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $("button[name='tombol_detail']").click(function() {
      var no_faktur = $(this).data("no_faktur");
      var tgl_pembelian = $(this).data("tgl_pembelian");
      var nama_supp = $(this).data("nama_supp");
      var status_byr = $(this).data("status_byr");
      $("#no_fakturdetail").html(no_faktur);
      $("#tgl_pembeliandetail").html(tgl_pembelian);
      $("#nm_supplierdetail").html(nama_supp);
      $("#status_pembeliandetail").html(status_byr);

      if (status_byr != "Mengajukan") {
        $(".aksi").hide();
      } else {
        $("#nf").val(no_faktur);
      }

      $("#data_detailpembelian").html("");
      $.ajax({
        type: "GET",
        url: "ajax/detail.php?page=pembelian",
        data: "no_faktur=" + no_faktur,
        success: function(data) {
          // console.log(data);
          var total_pembelian = 0;
          var objData = JSON.parse(data);
          $.each(objData, function(key, val) {
            // $("#data_detailpjl").append(val.nm_barang+"/"+val.hrg_jual+"/"+val.jml_jual+"/"+val.sat_jual+"/"+val.subtotal+"<br>");
            var baris_baru = '';
            baris_baru += '<tr>';
            baris_baru += '<td>' + val.nm_barang + '</td>';
            baris_baru += '<td class="text-right">' + val.hrg_beli + '</td>';
            baris_baru += '<td class="text-center">' + val.jml_beli + '</td>';
            baris_baru += '<td>' + val.sat_beli + '</td>';
            baris_baru += '<td class="text-right">' + val.subtotal + '</td>';
            baris_baru += '</tr>';

            total_pembelian = total_pembelian + Number(val.subtotal);
            $("#data_detailpembelian").append(baris_baru);
            $("#total_pembeliandetail").html(total_pembelian);
          })
        }
      });
    });

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