<?php 
	$kd_barang = @$_GET['kode'];
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-light">
    <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a href="?page=dataobat"><i class="fas fa-capsules"></i> Data Fasilitas</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-edit"></i> Form Edit Data Fasilitas</li>
  </ol>
</nav>

<div class="page-content">
	<div class="row">
		<div class="col-6"><h4>Form Tambah Data Barang</h4></div>
		<div class="col-6 text-right">
			<a href="?page=dataobat">
				<button class="btn btn-sm btn-info">Daftar Data Fasilitas</button>
			</a>
		</div>
	</div>
	<div class="form-container">
		<div class="row">
			<div class="col-md-6 offset-md-3 offset-form">
				<h6><i class="fas fa-list-alt"></i> Lengkapi form ini untuk menambah data barang baru</h6>
				<?php 
				  	$query_tampil = "SELECT * FROM tbl_databarang WHERE kd_barang='$kd_barang'";
					$sql_tampil = mysqli_query($conn, $query_tampil) or die ($conn->error);
					$data = mysqli_fetch_array($sql_tampil);
				?>
				<form action="javascrip:void" autocomplete="off" id="form_editobat">
				  <div class="form-group row pt-3">
				    <label for="ip_kdobat" class="col-sm-3 col-form-label">Kode</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control form-control-sm" id="ip_kdobat" name="ip_kdobat" value="<?php echo $kd_barang;?>" readonly="">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="ip_nmobat" class="col-sm-3 col-form-label">Nama Barang</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control form-control-sm" name="ip_nmobat" id="ip_nmobat" autofocus="" value="<?php echo $data['nm_obat']; ?>" style="text-transform: uppercase;">
				    </div>
				  </div>
				  
				  <div class="form-group row">
				    <label for="ip_ktgobat" class="col-sm-3 col-form-label">Kategori</label>
				    <div class="col-sm-9">
				      <div class="form-check">
				      	<label class="form-check-label" style="font-weight: normal;">
				      		<input name="ip_ktgobat" id="ktg_gen" type="radio" class="form-check-input" value="New" <?php if($data['ktg_obat'] == "New") {echo "checked";} ?>> 
				      		New
				      	</label>
				      </div>
                      <div class="form-check">
                    	<label class="form-check-label" style="font-weight: normal;">
                    		<input name="ip_ktgobat" id="ktg_paten" type="radio" class="form-check-input" value="Part Pendukung" <?php if($data['ktg_obat'] == "Part Pendukung") {echo "checked";} ?>>
                    		Part Pendukung
                    	</label>
                	  </div>
                	  <div class="form-check">
                    	<label class="form-check-label" style="font-weight: normal;">
                    		<input name="ip_ktgobat" id="ktg_hv" type="radio" class="form-check-input" value="Heavy" <?php if($data['ktg_obat'] == "Heavy") {echo "checked";} ?>>
                    		Heavy
                    	</label>
                	  </div>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="ip_bntobat" class="col-sm-3 col-form-label">Bentuk Barang</label>
				    <div class="col-sm-9">
				      <select name="ip_bntobat" id="ip_bntobat" class="form-control form-control-sm">
				      	<option value="0">pilih bentuk</option>
				      	<option value="Besar" <?php if($data['bnt_obat']=="Besar") {echo "selected";} ?> >Besar</option>
				      	<option value="Kecil" <?php if($data['bnt_obat']=="Kecil") {echo "selected";} ?>>Kecil</option>
				      	
				      	<option value="BATANG" <?php if($data['bnt_obat']=="BATANG") {echo "selected";} ?>>Batang</option>
				      </select>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="ip_stobat" class="col-sm-3 col-form-label">Satuan</label>
				    <div class="col-sm-9">
				      <select name="ip_stobat" id="ip_stobat" class="form-control form-control-sm">
				      	<option value="0">pilih satuan barang</option>
				      	<option value="PCS" <?php if($data['sat_obat']=="PCS") {echo "selected";} ?> >Pcs</option>
				      	
				      	<option value="TUBE" <?php if($data['sat_obat']=="TUBE") {echo "selected";} ?> >Tube</option>
				      	<option value="BOTOL" <?php if($data['sat_obat']=="BOTOL") {echo "selected";} ?> >Botol</option>
				      	<option value="BATANG" <?php if($data['sat_obat']=="BATANG") {echo "selected";} ?> >Batang</option>
				      </select>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="ip_hrgobat" class="col-sm-3 col-form-label">Harga per <span id="u_satuan"><?php echo $data['sat_obat']; ?></span></label>
				    <div class="col-sm-9">
				      <div class="input-group input-group-sm">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="inputGroup-sizing-sm">Rp</span>
						  </div>
						  <input type="number" class="form-control" id="ip_hrgobat" name="ip_hrgobat" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="<?php echo $data['hrgbeli_obat']; ?>">
					  </div>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="ip_minstok" class="col-sm-3 col-form-label">Stok Minimal</label>
				    <div class="col-sm-9">
					    <input type="number" class="form-control form-control-sm" id="ip_minstok" name="ip_minstok" value="<?php echo $data['minstk_obat']; ?>">
					</div>
				  </div>
				  
				  <?php 
				  	$query_stok = "SELECT * FROM tbl_stokexpbarang WHERE kd_barang = '$kd_barang'";
				  	$sql_stok = mysqli_query($conn, $query_stok) or die ($conn->error);
				  	$no=1;
				  	while($data_stok = mysqli_fetch_array($sql_stok)) {
				   ?>
				  <div class="form-group row">
				    <label for="ip_kadaluarsa<?php echo $no; ?>" class="col-sm-3 col-form-label">Kadaluarsa</label>
				    <div class="col-sm-4">
					    <input type="date" class="form-control form-control-sm" id="ip_kadaluarsa<?php echo $no; ?>" name="ip_kadaluarsa[]" value="<?php echo $data_stok['tgl_exp'] ?>">
					    <input type="hidden" id="ip_nmrstok<?php echo $no; ?>" name="ip_nmrstok[]" value="<?php echo $data_stok['no_stok'] ?>">
					</div>
					<label for="ip_stok<?php echo $no; ?>" class="col-sm-1 col-form-label" style="text-align: right;">Stok</label>
				    <div class="col-sm-4">
					    <input type="number" class="form-control form-control-sm" id="ip_stok<?php echo $no; ?>" name="ip_stok[]" value="<?php echo $data_stok['stok'] ?>">
					</div>
				  </div>
				  <?php $no++; } ?>
				  <div class="form-group row">
				    <div class="col-sm-12 text-right">
				      <button class="btn btn-info btn-sm" id="simpan_obat" name="simpan_obat" >Simpan Perubahan</button>
				    </div>
				  </div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$("#ip_stobat").change(function() {
		var satuan = $("#ip_stobat").val();
		if(satuan=="0")
		{
			satuan = "Satuan";
		}
		$("#u_satuan").text(satuan);
	});

	$("#simpan_obat").click(function(){
		var kode = $("#ip_kdobat").val();
		var nama = $("#ip_nmobat").val();
		var exp = $("#ip_expobat").val();
		var ktg = document.querySelector('input[name="ip_ktgobat"]:checked').value;
		var bentuk = $("#ip_bntobat").val();
		var satuan = $("#ip_stobat").val();
		var harga = $("#ip_hrgobat").val();
		var stok = $("#ip_stokobat").val();
		var min_stok = $("#ip_minstok").val();

		if (nama=="") {
			document.getElementById("ip_nmobat").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong isi nama barang',
			  'warning'
			)
		} else if (exp=="") {
			document.getElementById("ip_expobat").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong isi tanggal rusak barang',
			  'warning'
			)
		} else if (ktg=="") {
			document.getElementById("ip_ktgobat").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong pilih kategori barang',
			  'warning'
			)
		} else if (bentuk=="0") {
			document.getElementById("ip_bntobat").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong pilih bentuk barang',
			  'warning'
			)
		} else if (satuan=="0") {
			document.getElementById("ip_stobat").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong pilih satuan barang',
			  'warning'
			)
		} else if (harga=="" || harga<=0) {
			document.getElementById("ip_hrgobat").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong isi harga barang',
			  'warning'
			)
		} else if (stok=="" || stok<=0) {
			document.getElementById("ip_stokobat").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong isi jumlah stok barang',
			  'warning'
			)
		} else if (min_stok=="" || min_stok<=0) {
			document.getElementById("ip_minstok").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong isi jumlah minimal stok',
			  'warning'
			)
		} else {
			Swal.fire({
	          title: 'Apakah Anda Yakin?',
	          text: 'anda akan merubah data fasilitas',
	          type: 'warning',
	          showCancelButton: true,
	          confirmButtonColor: '#3085d6',
	          cancelButtonColor: '#d33',
	          confirmButtonText: 'Ya'
	        }).then((ya) => {
	          if (ya.value) {
	          	var data_form = $("#form_editobat").serialize();
	            $.ajax({
	              type: "POST",
	              url: "ajax/edit_dataobat.php",
	              data: data_form,
	              success: function(hasil) {
	              	if(hasil=="berhasil") {
						Swal.fire({
				          title: 'Berhasil',
				          text: 'Data Berhasil Diubah',
				          type: 'success',
				          confirmButtonColor: '#3085d6',
				          confirmButtonText: 'OK'
				        }).then((ok) => {
				          if (ok.value) {
				            window.location='?page=dataobat' ;
				          }
				        })
					}else if(hasil=="gagal") {
						Swal.fire(
						  'Gagal',
						  'Data Gagal Diubah',
						  'error'
						)
					}
	              }
	            })  
	    		// console.log(data_form);
	          }
	        })
		}
	})

	// data: "nama="+nama+"&kode="+kode+"&exp="+exp+"&ktg="+ktg+"&satuan="+satuan+"&harga="+harga+"&stok="+stok+"&bentuk="+bentuk+"&min_stok="+min_stok+"&kode="+kode,
</script>