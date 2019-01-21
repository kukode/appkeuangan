<?php
ob_start();
		
?>
<h1 class="text-center">
	Laporan Realisasi Anggaran Setda
</h1>
<div class="row g-mt-100">
	<div class="col-md-6">
		<!-- Box Shadow -->
	<div class="u-shadow-v1-5 g-line-height-2 g-pa-40 g-mb-30 text-center" role="alert">
	  <h3 class="h2 g-font-weight-300 g-mb-20">Belanja Langsung</h3>
	 <a href="?page=lrasearchbl" class="btn btn-md u-btn-3d u-btn-blue g-mr-10 g-mb-15">Masuk</a>
	</div>
	<!-- End Box Shadow -->
	</div>
	<div class="col-md-6">
		<!-- Box Shadow -->
	<div class="u-shadow-v1-5 g-line-height-2 g-pa-40 g-mb-30 text-center" role="alert">
	  <h3 class="h2 g-font-weight-300 g-mb-20">Belanja Tidak Langsung</h3>
	 <a href="?page=lrasearchbtl" class="btn btn-md u-btn-3d u-btn-red g-mr-10 g-mb-15">Masuk</a>
	</div>
	<!-- End Box Shadow -->
	</div>
</div>

<?php

$lra = ob_get_clean();
?>