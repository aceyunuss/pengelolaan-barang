<?php 
	include "../koneksi.php";
	session_start();

	$no_penjualan = $_POST['no_penjualan'];
	$tgl_penjualan = $_POST['tanggal_pjl'];
	// $hari= substr($tgl_penjualan, 8, 2);
	// $bulan = substr($tgl_penjualan, 5, 2);
	// $tahun = substr($tgl_penjualan, 0, 4);
	// $tgl = $tahun.$bulan.$hari;
	// $carikode = mysqli_query($conn, "SELECT MAX(no_penjualan) FROM tbl_penjualan WHERE tgl_penjualan = '$tgl_penjualan'") or die (mysql_error());
	// $datakode = mysqli_fetch_array($carikode);
	// if($datakode) {
 //        $nilaikode = substr($datakode[0], 13);
 //        $kode = (int) $nilaikode;
 //        $kode = $kode + 1;
 //        $no_penjualan = "PJL/".$tgl."/".str_pad($kode, 2, "0", STR_PAD_LEFT);
 //    } else {
 //        $no_penjualan = "PJL/".$tgl."/01";
 //    }

	$tunai = $_POST['jml_uang'];
	$kembali = $_POST['jml_kembali'];
	$total_penjualan = $_POST['hidden_totalpenjualan'];
	// $tunai = $total_penjualan;
	// $kembali = 0;
	
	$id_pegawai =  $_SESSION['id_peg'];
	$query_pjl = "INSERT INTO tbl_penjualan VALUES('$no_penjualan', '$tgl_penjualan', '$total_penjualan', '$tunai', '$kembali', '$id_pegawai')";
	mysqli_query($conn, $query_pjl) or die ($conn->error);

		// $kd_barang = "tes";
		// $hrg_jual = 2000;
		// $jml_obat = 2;
		// $sat_jual = "Strip";
		// $subtotal = 4000;

		// $query_pjldtl = "INSERT INTO tbl_penjualandetail (no_penjualan, kd_barang, hrg_jual, jml_jual, sat_jual, subtotal) VALUES ('$no_penjualan', '$kd_barang', '$hrg_jual', '$jml_obat', '$sat_jual', '$subtotal')";
		// mysqli_query($conn, $query_pjldtl) or die ($conn->error);

	for($i = 0; $i < count($_POST['hidden_kdobat']); $i++) {
		$kd_barang = $_POST['hidden_kdobat'][$i];
		$hrg_jual = $_POST['hidden_hrgobat'][$i];
		$jml_obat = $_POST['hidden_jmlobat'][$i];
		$sat_jual = $_POST['hidden_satobat'][$i];
		$subtotal = $_POST['hidden_subtotal'][$i];
		$exp_barang = $_POST['hidden_expobat'][$i];

		$query_pjldtl = "INSERT INTO tbl_penjualandetail (no_penjualan, kd_barang, expired, hrg_jual, jml_jual, sat_jual, subtotal) VALUES('$no_penjualan', '$kd_barang', '$exp_barang', '$hrg_jual', '$jml_obat', '$sat_jual', '$subtotal')";
		mysqli_query($conn, $query_pjldtl) or die ($conn->error);

		$query_stok = "SELECT stk_barang FROM tbl_databarang WHERE kd_barang = '$kd_barang'";
		$sql_stok = mysqli_query($conn, $query_stok) or die ($conn->error);
		$data_stok = mysqli_fetch_array($sql_stok);
		$stok_lama = $data_stok['stk_barang'];
		$stok_baru = $stok_lama - $jml_obat;
		$query_estok = "UPDATE tbl_databarang SET stk_barang='$stok_baru' WHERE kd_barang='$kd_barang'";
		mysqli_query($conn, $query_estok) or die ($conn->error);

		$query_stokexp = "SELECT stok FROM tbl_stokexpbarang WHERE kd_barang = '$kd_barang' AND tgl_exp = '$exp_barang'";
		$sql_stokexp = mysqli_query($conn, $query_stokexp) or die ($conn->error);
		$data_stokexp = mysqli_fetch_array($sql_stokexp);
		$stok_lamaexp = $data_stokexp['stok'];
		$stok_baruexp = $stok_lamaexp - $jml_obat;
		$query_estokexp = "UPDATE tbl_stokexpbarang SET stok='$stok_baruexp' WHERE kd_barang='$kd_barang' AND tgl_exp = '$exp_barang'";
		mysqli_query($conn, $query_estokexp) or die ($conn->error);
	}
 ?>