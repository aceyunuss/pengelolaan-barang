<nav aria-label="breadcrumb">
	<ol class="breadcrumb bg-light">
		<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-home"></i> Home</li>
	</ol>
</nav>
<div class="page-content">
	<div>
		<div class="col-12">
			<h5>Selamat datang <?php echo $_SESSION['nama_peg']; ?></h5>
		</div>
	</div>
	<style>
		h6 {
			font-size: 14px;
		}
	</style>
	<div class="konten-home" style="margin-top: 25px;">
		<div class="row" style="margin-bottom: 18px;">
			<div class="col-lg-2">
				<div class="card">
					<img class="card-img-top" src="asset/img/asset.png" alt="Card image cap" style="padding: 15px;">
					<div class="card-body">
						<a href="?page=databarang" class="btn btn-sm btn-block btn-secondary">
							Aset Fasilitas
						</a>
					</div>
				</div>
			</div>
			<div class="col-lg-2">
				<div class="card">
					<img class="card-img-top" src="asset/img/usr.png" alt="Card image cap" style="padding: 15px;">
					<div class="card-body">
						<a href="?page=datapegawai" class="btn btn-sm btn-block  btn-secondary">
							Pegawai
						</a>
					</div>
				</div>
			</div>
			<div class="col-lg-2">
				<div class="card">
					<img class="card-img-top" src="asset/img/supp.png" alt="Card image cap" style="padding: 15px;">
					<div class="card-body">
						<a href="?page=datasupplier" class="btn btn-sm btn-block  btn-secondary">
							Supplier
						</a>
					</div>
				</div>
			</div>
			<?php if ($_SESSION['posisi_peg'] == 'Admin' || $_SESSION['posisi_peg'] == 'Manager' || $_SESSION['posisi_peg'] == 'Staff') { ?>
				<div class="col-lg-2">
					<div class="card">
						<img class="card-img-top" src="asset/img/req.png" alt="Card image cap" style="padding: 15px;">
						<div class="card-body">
							<a href="?page=entry_datapembelian" class="btn btn-sm btn-block  btn-secondary">
								Facility Request
							</a>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php if ($_SESSION['posisi_peg'] == 'Admin' || $_SESSION['posisi_peg'] == 'Manager') { ?>
				<div class="col-lg-2">
					<div class="card">
						<img class="card-img-top" src="asset/img/report.png" alt="Card image cap">
						<div class="card-body">
							<a href="?page=report" class="btn btn-sm btn-block  btn-secondary">
								Report
							</a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>

	<!-- <div class="konten-home" style="margin-top: 25px;">
		<div class="row" style="margin-bottom: 18px;">
			<div class="col-lg-6">
				<?php
				$tgl_ini = date('Y-m-d');
				$query_tpenjualan = "SELECT SUM(total_penjualan) AS total FROM tbl_penjualan WHERE tgl_penjualan = '$tgl_ini'";
				$sql_tpenjualan = mysqli_query($conn, $query_tpenjualan) or die($conn->error);
				$dpenjualan = mysqli_fetch_array($sql_tpenjualan);
				$tpenjualan = $dpenjualan['total'];
				?>
				<div class="card text-white" style="background-color: #58898c;">
					<div class="card-body" style="padding: 10px 20px;">
						<h6 class="card-title">Total Pengajuan Fasilitas Hari ini</h6>
						<div class="card-text" align="right" style="font-size: 34px; font-weight: lighter;">
							Rp<?php echo number_format($tpenjualan); ?>
						</div>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<?php
				$query_tpembelian = "SELECT SUM(total_pembelian) AS total_pbl FROM tbl_pembelian WHERE tgl_pembelian = '$tgl_ini'";
				$sql_tpembelian = mysqli_query($conn, $query_tpembelian) or die($conn->error);
				$dpembelian = mysqli_fetch_array($sql_tpembelian);
				$tpembelian = $dpembelian['total_pbl'];
				?>
				<div class="card text-white" style="background-color: #877652;">
					<div class="card-body" style="padding: 10px 20px;">
						<h6 class="card-title">Total Stok Keluar Hari ini</h6>
						<div class="card-text" align="right" style="font-size: 34px; font-weight: lighter;">
							Rp<?php echo number_format($tpembelian); ?>
						</div>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row" style="margin-bottom: 18px;">
			<div class="col-lg-6">
				<?php
				$query_jpenjualan = "SELECT no_penjualan FROM tbl_penjualan WHERE tgl_penjualan='$tgl_ini'";
				$sql_jpenjualan = mysqli_query($conn, $query_jpenjualan) or die($conn->error);
				$jpenjualan = mysqli_num_rows($sql_jpenjualan);
				?>
				<div class="card text-white" style="background-color: #527b87;">
					<div class="card-body" style="padding: 10px 20px;">
						<h6 class="card-title">Transaksi Perencanaan Fasilitas Hari ini</h6>
						<div class="card-text" align="right" style="font-size: 34px; font-weight: lighter;">
							<?php echo $jpenjualan; ?>
						</div>
						<a href="#" class="btn btn-primary">Go somewhere</a>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<?php
				$query_pblutang = "SELECT no_faktur FROM tbl_pembelian WHERE status_byr='Belum Lunas'";
				$sql_pblutang = mysqli_query($conn, $query_pblutang) or die($conn->error);
				$jpblutang = mysqli_num_rows($sql_pblutang);
				?>
			</div>
		</div>
	</div> -->
	<br><br><br>
	<?php include('dashboard_datapembelian.php') ?>