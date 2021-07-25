<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-light">
    <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i> Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="?page=dataobat"><i class="fas fa-capsules"></i> Data Barang </a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-calendar-times"></i> Keluar Masuk Aset</li>
  </ol>
</nav>
<div class="page-content">
	<div class="row">
		<div class="col-6">
            <h4>Keluar Masuk Aset</h4>
            <input type="hidden" id="pos_pgw" value="<?php echo $_SESSION['posisi_peg']; ?>">
        </div>
		<div class="col-6 text-right">
			<a href="?page=dataobat">
				<button class="btn btn-sm btn-info">Daftar Data Fasilitas</button>
			</a>
		</div>
	</div>
	<style>
        ul.nav-pills{
            padding: 12px 15px;
            /*border-bottom: 1px solid #169BB0;*/
        }
        .kotak-data-tab .nav-item{
            font-size: 12px;
            font-weight: lighter;
            padding-bottom: 5px;
            border-bottom: 1px solid #D9DADB;
            margin-right: 15px;
        }
        .kotak-data-tab .nav-link{
            color: #000000;
        }
        .kotak-data-tab .nav-link.active{
            background-color: #169BB0;
        }
        .badge-status {
            padding: 5px;
        }
    