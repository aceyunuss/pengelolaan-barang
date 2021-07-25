<?php 
	include "../koneksi.php";
	$kd_obat = $_GET['obat'];
	$jml_obat = count($kd_obat);
	$prd_ramalan = $_GET['ip_periode'];
	if($prd_ramalan=="per_hari") {
		$interval = $_GET['jml_hari'];
		$interval_sql = $interval-1;
	}

	$bulan_ini = date('m');
	$tahun_ini = date('Y');

	

	$arraykode = array();
	$nama_obat = array();
	for($x=0; $x<$jml_obat; $x++) {
		$jml_data = 0;

		if($prd_ramalan=="bulan_depan") {
			if($bulan_ini=="12") {
		  		$bulan_ini = 1;
		  		$tahun_ini = $tahun_ini+1;
		  	} else {
		  		$bulan_ini = $bulan_ini+1;
		  	}
		  	$tanggal_akhir = $tahun_ini."-".$bulan_ini."-01";
		} else if($prd_ramalan=="bulan_ini"){
			$tanggal_akhir = date('Y-m-01');
		} else if($prd_ramalan=="per_hari"){
			$tanggal_akhir = date('Y-m-d');
		}
		for($i=10; $i>=0; $i--) {
			if($prd_ramalan=="per_hari") {
				$query_tjl = "SELECT tbl_dataobat.nm_obat AS nama, DATE_SUB('$tanggal_akhir', INTERVAL '$interval_sql' DAY) AS tgl_awal, DATE_SUB('$tanggal_akhir', INTERVAL '$interval' DAY) AS tgl_akhir_baru, IFNULL(SUM(tbl_pembeliandetail.jml_beli), 0) AS jumlah_terbeli FROM tbl_pembelian INNER JOIN tbl_pembeliandetail ON tbl_pembelian.no_faktur = tbl_pembeliandetail.no_faktur INNER JOIN tbl_dataobat ON tbl_pembeliandetail.kd_obat = tbl_dataobat.kd_obat WHERE tbl_pembeliandetail.kd_obat = '$kd_obat[$x]' AND tbl_pembelian.tgl_pembelian BETWEEN (DATE_SUB('$tanggal_akhir', INTERVAL '$interval_sql' DAY)) AND '$tanggal_akhir'";
				$sql_tjl = mysqli_query($conn, $query_tjl) or die ($conn->error);
				$dpenjualan = mysqli_fetch_array($sql_tjl);
				$jml_data = $jml_data + $dpenjualan['jumlah_terbeli'];
				$nama_obat[$x] = $dpenjualan['nama'];

				$tanggal_akhir = $dpenjualan['tgl_akhir_baru'];
			} else {
				$query_tjl = "SELECT tbl_dataobat.nm_obat AS nama, YEAR(DATE_SUB('$tanggal_akhir', INTERVAL 1 MONTH)) AS dua, MONTH(DATE_SUB('$tanggal_akhir', INTERVAL 1 MONTH)) AS satu, DATE_SUB('$tanggal_akhir', INTERVAL 1 MONTH) AS tgl_awal, IFNULL(SUM(tbl_pembeliandetail.jml_beli), 0) AS jumlah_terbeli FROM tbl_pembelian INNER JOIN tbl_pembeliandetail ON tbl_pembelian.no_faktur = tbl_pembeliandetail.no_faktur INNER JOIN tbl_dataobat ON tbl_pembeliandetail.kd_obat = tbl_dataobat.kd_obat WHERE tbl_pembeliandetail.kd_obat = '$kd_obat[$x]' AND (tbl_pembelian.tgl_pembelian >= DATE_SUB('$tanggal_akhir', INTERVAL 1 MONTH) AND tbl_pembelian.tgl_pembelian < '$tanggal_akhir')";
				$sql_tjl = mysqli_query($conn, $query_tjl) or die ($conn->error);
				$dpenjualan = mysqli_fetch_array($sql_tjl);
				$jml_data = $jml_data + $dpenjualan['jumlah_terbeli'];
				$nama_obat[$x] = $dpenjualan['nama'];

				$tanggal_akhir = $dpenjualan['tgl_awal'];
			}
		}
		if($jml_data==0) {
			$arraykode[] = $nama_obat[$x];
		}
	}

	$kode[] = $arraykode;
	echo json_encode($kode);
 ?>