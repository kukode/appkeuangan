<?php 
ob_start();
?>

<!-- Promo Block -->
    <section class="g-pos-rel">
        <div class="slider g-mb-30">
          <div>
            <img src="assets/img/slide/1.jpg" class="img-fluid" style="width: 100%;">
          </div>
          <div>
            <img src="assets/img/slide/2.jpg" class="img-fluid" style="width: 100%;">
          </div>
          <div>
            <img src="assets/img/slide/3.jpg" class="img-fluid" style="width: 100%;">
          </div>
        
      </div>
    </section>
    <!-- End Promo Block -->

    <!-- Icon Blocks -->
    <section class="g-py-100">
      <div class="container">
        <div class="row no-gutters">
          <img src="assets/img/logokab.png" class="img-fluid" style="margin: 0 auto;">
          <p class="text-center">
              Laporan Realisasi Anggaran merupakan laporan yang menyajikan ikhtisar sumber, alokasi, dan pemakaian sumber daya keuangan yang dikelola oleh pemerintah pusat/daerah, yang menggambarkan perbandingan antara anggaran dan realisasinya dalam satu periode pelaporan. Namun pada kenyataannya sering terjadi realisasi anggaran tidak sesuai dengan anggaran kas (cash budget) yang telah direncanakan sebelumnya oleh satuan kerja atau instansi, dimana pada umumnya penyerapan anggaran akan terlihat tinggi di akhir tahun periode pelaporan. Apabila penyampaian informasi ini dilakukan secara akuntabel dan tepat waktu, maka akan membantu para stakeholder dalam mengevaluasi dan meningkatkan penyerapan anggarannya sesuai dengan jadwal yang telah ditetapkan.
          </p>
      </div>
    </section>
    <!-- End Icon Blocks -->

<?php 

$main = ob_get_clean();
?>