<?php
include '../koneksi.php';

if (@$_GET['page'] == 'penjualan') {
	$no_pjl = @mysqli_real_escape_string($conn, $_GET['no_pjl']);
	$query_lihat = "SELECT tbl_databarang.nm_barang, tbl_penjualandetail.hrg_jual, tbl_penjualandetail.jml_jual, tbl_penjualandetail.sat_jual, tbl_penjualandetail.subtotal FROM tbl_penjualandetail INNER JOIN tbl_databarang ON tbl_penjualandetail.kd_barang = tbl_databarang.kd_barang WHERE tbl_penjualandetail.no_penjualan = '$no_pjl'";
	$sql_lihat = mysqli_query($conn, $query_lihat) or die($conn->error);
	$data = array();

	while ($detail = mysqli_fetch_array($sql_lihat)) {
		$data[] = $detail;
	}
	echo json_encode($data);
} else if (@$_GET['page'] == 'pembelian') {
	$no_faktur = @mysqli_real_escape_string($conn, $_GET['no_faktur']);
	$query_lihat = "SELECT tbl_databarang.nm_barang, tbl_pembeliandetail.hrg_beli, tbl_pembeliandetail.jml_beli, tbl_pembeliandetail.sat_beli, tbl_pembeliandetail.subtotal FROM tbl_pembeliandetail INNER JOIN tbl_databarang ON tbl_pembeliandetail.kd_barang = tbl_databarang.kd_barang WHERE tbl_pembeliandetail.no_faktur = '$no_faktur'";
	$sql_lihat = mysqli_query($conn, $query_lihat) or die($conn->error);
	$data = array();

	while ($detail = mysqli_fetch_array($sql_lihat)) {
		$data[] = $detail;
	}
	echo json_encode($data);
} else if (@$_GET['page'] == 'pelunasan_pembelian') {
	$no_faktur = @mysqli_real_escape_string($conn, $_POST['no_faktur']);
	// $no_faktur = "tesss";
	$tgl_lunas = date('Y-m-d');
	$query_lunas = "UPDATE tbl_pembelian SET status_byr = 'Lunas', tgl_lunas = '$tgl_lunas' WHERE no_faktur = '$no_faktur'";
	mysqli_query($conn, $query_lunas) or die($conn->error);
} else if (@$_GET['page'] == 'expstok_obat') {
	$kd_barang = @mysqli_real_escape_string($conn, $_GET['kd_barang']);
	$query_expstok = "SELECT * FROM tbl_stokexpbarang WHERE kd_barang = '$kd_barang'";
	$sql_expstok = mysqli_query($conn, $query_expstok) or die($conn->error);
	$data_expstok = array();

	while ($data = mysqli_fetch_array($sql_expstok)) {
		$data_expstok[] = $data;
	}

	echo json_encode($data_expstok);
} else if (@$_GET['page'] == 'update_status') {
	$status = $_POST['status'];
	$no_faktur = $_POST['no_faktur'];
	$upd = "UPDATE tbl_pembelian SET status_byr = '$status' WHERE no_faktur = '$no_faktur'";
	mysqli_query($conn, $upd) or die($conn->error);
}
