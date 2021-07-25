<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-light">
    <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item"><a href="?page=dataobat"><i class="fas fa-capsules"></i> Data Fasilitas</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-align-left"></i> Form Tambah Data Fasilitas</li>
  </ol>
</nav>

<div class="page-content">
	<div class="row">
		<div class="col-6"><h4>Form Tambah Data Fasilitas</h4></div>
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
				<form action="javascrip:void" autocomplete="off">
				  <div class="form-group row pt-3">
				    <label for="ip_kdobat" class="col-sm-3 col-form-label">Kode Barang</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control form-control-sm" id="ip_kdobat" placeholder="masukkan kode barang" autofocus>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="ip_nmobat" class="col-sm-3 col-form-label">Nama Barang</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control form-control-sm" id="ip_nmobat" placeholder="masukkan nama barang">
				    </div>
				  </div>
				  
				  <div class="form-group row">
				    <label for="ip_ktgobat" class="col-sm-3 col-form-label">Kategori</label>
				    <div class="col-sm-9">
				      <div class="form-check">
				      	<label class="form-check-label" style="font-weight: normal;">
				      		<input name="ip_ktgobat" id="ktg_gen" type="radio" class="form-check-input" value="New" checked=""> 
				      		New
				      	</label>
				      </div>
                      <div class="form-check">
                    	<label class="form-check-label" style="font-weight: normal;">
                    		<input name="ip_ktgobat" id="ktg_paten" type="radio" class="form-check-input" value="Part Pendukung">
                    		Part Pendukung
                    	</label>
                	  </div>
                	  <div class="form-check">
                    	<label class="form-check-label" style="font-weight: normal;">
                    		<input name="ip_ktgobat" id="ktg_hv" type="radio" class="form-check-input" value="Heavy">
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
				      	<option value="Besar">Besar</option>
				      	<option value="Kecil">Kecil</option>
				      </select>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="ip_stobat" class="col-sm-3 col-form-label">Satuan Beli</label>
				    <div class="col-sm-9">
				      <select name="ip_stobat" id="ip_stobat" class="form-control form-control-sm">
				      	<option value="0">pilih satuan barang</option>
				      	
				      	<option value="PCS">Pcs</option>
				      	<option value="Unit">Unit</option>
				      	<option value="TUBE">Tube</option>
				      	
				      	<option value="BATANG">Batang</option>
				      </select>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="ip_hrgobat" class="col-sm-3 col-form-label">Harga <span class="u_satuan" id="u_satuan">Satuan</span></label>
				    <div class="col-sm-9">
				      <div class="input-group input-group-sm">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="inputGroup-sizing-sm">Rp</span>
						  </div>
						  <input type="number" class="form-control" id="ip_hrgobat" name="ip_hrgobat" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="masukkan harga barang">
					  </div>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="ip_minstok" class="col-sm-3 col-form-label">Stok Minimal</label>
				    <div class="col-sm-9">
				    	<div class="input-group input-group-sm">
						    <input type="number" class="form-control form-control-sm" id="ip_minstok" name="ip_minstok" placeholder="masukkan jumlah minimal stok">
						    <div class="input-group-append">
							    <span class="input-group-text u_satuan" id="inputGroup-sizing-sm">Satuan</span>
							</div>
						</div>
					</div>
				  </div>
				  
				  <div class="form-group row">
				    <label for="ip_stokobat" class="col-sm-3 col-form-label">Stok</label>
				    <div class="col-sm-9">
				    	<div class="input-group input-group-sm">
						    <input type="number" class="form-control form-control-sm" id="ip_stokobat" name="ip_stokobat" placeholder="masukkan jumlah stok barang">
						    <div class="input-group-append">
							    <span class="input-group-text u_satuan" id="inputGroup-sizing-sm">Satuan</span>
							</div>
						</div>
					</div>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-12 text-right">
				      <button class="btn btn-info btn-sm" id="simpan_obat" name="simpan_obat" >Simpan</button>
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
		$(".u_satuan").text(satuan);
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

		if(kode=="") {
			document.getElementById("ip_kdobat").focus();
			Swal.fire(
			  'Data Belum Lengkap',
			  'maaf, tolong isi kode barang',
			  'warning'
			)
		} else if (nama=="") {
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
			  'maaf, tolong isi tanggal kadaluarsa barang',
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
			  'maaf, tolong pilih satuan pengajuan barang',
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
			  'maaf, tolong isi jumlah minimal stok barang',
			  'warning'
			)
		} else {
			$.ajax({
				type: "POST",
				url: "ajax/simpan_obat.php",
				data: "nama="+nama+"&kode="+kode+"&exp="+exp+"&ktg="+ktg+"&bentuk="+bentuk+"&satuan="+satuan+"&harga="+harga+"&stok="+stok+"&min_stok="+min_stok,
				success: function(hasil) {
					if(hasil=="tersimpan") {
						Swal.fire({
				          title: 'Berhasil',
				          text: 'Data Berhasil Disimpan',
				          type: 'success',
				          confirmButtonColor: '#3085d6',
				          confirmButtonText: 'OK'
				        }).then((ok) => {
				          if (ok.value) {
				            window.location='?page=tambah_dataobat' ;
				          }
				        })
					} else if(hasil=="gagal") {
						Swal.fire(
						  'Gagal',
						  'Data Gagal Disimpan',
						  'error'
						)
					}
				}
			});
		}
	})
</script>