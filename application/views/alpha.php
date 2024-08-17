<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- LINK  -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="vendor/css/style.css">
    <link rel="icon" href="vendor/img/logoprodi.png">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url()?>">
      <img src="vendor/img/logoprodi.png" alt="" width="16%" height="50" class="d-inline-block align-text-center judul">
      <img src="vendor/img/a.png" alt="" width="90%" height="30" class="d-inline-block align-text-center judul">
    </a>
    <div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="#layanan">Layanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#foot">Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#foot">Kontak</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="vendor/img/lab2.jpg" class="d-block w-100 img-fluid" style="margin-top:4.7rem;">
          <div class="carousel-caption fluid-text" style="padding-top:6rem;">
              <h5>INVENTARIS</h5>
              <p>LABORATORIUM FISIOTERAPI UMS</p>
          </div>
    </div>
  </div>
</div>
<br id="layanan">
<br>
<section class="team section-padding">
  <div class="container" style="margin-top:5rem; margin-bottom:10rem">
    <div class="row">
        <div class="col-md-12">
          <div class="section-header text-center pb-5" style="margin-top:-1rem;">
            <h2>LAYANAN INVENTARIS</h2>
            <h2>LABORATORIUM FISIOTERAPI UMS</h2>
          </div>
        </div>
        <div class="row text-dark" style="margin-top:2rem;">
          <div class="col-12 col-md-6 col-lg-4" data-aos="flip-up" data-aos-delay="100">
            <div class="text-center">
                <a href="<?= base_url()?>index.php/Home/beranda">
                  <img type="button" src="vendor/img/icon1.jpg" alt="" class="img-fluid rounded-circle">
                </a>
                <h3 class="card-title py-2">INFORMASI ALAT</h3>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4" data-aos="flip-up" data-aos-delay="100">
            <div class="text-center">
                <a href="<?= base_url()?>index.php/Home/loan">
                  <img type="button" src="vendor/img/icon2.jpg" alt="" class="img-fluid rounded-circle">
                </a>
                <h3 class="card-title py-2">LAYANAN PEMINJAMAN</h3>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-4" data-aos="flip-up" data-aos-delay="100">
            <div class="text-center">
                <a href="<?= base_url()?>index.php/Home/sop">
                  <img type="button" src="vendor/img/icon3.jpg" alt="" class="img-fluid rounded-circle">
                </a>
                <h3 class="card-title py-2">SOP PENGGUNAAN</h3>
            </div>
          </div>
        </div>
    </div>
  </div>
</section>
</body>
<footer>
  <br id="foot">
  <br>
  <br>
<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-3 mb-md-0 mb-4">
		  		<div class="block-23 mb-3">
            <img src="vendor/img/logoprodi.png" alt="" width="80" height="80" class="d-inline-block align-text-center judul">
            <h6 class="footer-heading d-flex align-items-center" style="margin-top: 1rem;">
              <span class="icon d-flex align-items-center justify-content-center">
            </span>PROGRAM STUDI FISIOTERAPI <br> UNIVERSITAS MUHAMMADIYAH SURAKARTA</h6>
	  			</div>
			</div>
			<div class="col-md-6 col-lg-3 mb-md-0 mb-4">
		  		<div class="block-23 mb-3"></div>
			</div>
			<div class="col-md-6 col-lg-3 mb-md-0 mb-4">
				<h2 class="footer-heading d-flex align-items-center">
          <span class="icon d-flex align-items-center justify-content-center">
          </span>Layanan</h2>
				<div class="block-21 mb-4 d-flex">
					<ul class="list-unstyled">
						<li><a href="" target="_blank">Informasi Alat</a></li>
						<li><a href="" target="_blank">Informasi Peminjaman</a></li>
						<li><a href="" target="_blank">SOP Penggunaan</a></li>
					</ul>
	  			</div>
			</div>
			<div class="col-md-6 col-lg-3 mb-md-0 mb-4">
				<h2 class="footer-heading d-flex align-items-center"><span class="icon d-flex align-items-center justify-content-center">
        </span>Kontak</h2>
				<ul class="list-unstyled">
					<li><i class='bx bx-map' style="margin: 3px;"></i>
							<span class="text">
								<a href="https://goo.gl/maps/cT6F7dJH8uyyZxLY6" target="_blank">Alamat</a>
							</span>
          </li>
					<li><i class='bx bx-globe' style="margin: 3px;"></i> 
              <span class="text"><a href="https://www.ums.ac.id/en" target="_blank">Website UMS</a></span>
          </li>
					<li><i class="bx bx-globe" style="margin:3px;"></i>
              <span class="text"><a href="https://fisioterapi.ums.ac.id/" target="_blank">Fisioterapi UMS</a></span></li>
					<li><i class="bx bx-phone" style="margin:3px;"></i>
              <span class="text">0271717417</span></li>
					<li><i class="bx bx-envelope" style="margin:3px;"></i>
              <span class="text"><a href="mailto:fisioterapi@ums.ac.id">fisioterapi@ums.ac.id</a></span></li>
				</ul>
			</div>
		  	<div class="row mt-5 pt-4 border-top">
          <div class="col-md-6 col-lg-8">
              <p class="copyright">Copyright &copy;<script>document.write(new Date().getFullYear());</script> 
                NotBranding
              </p>
          </div>
          <!-- <div class="col-md-6 col-lg-4 text-md-right">
            <p class="copyright">Made with <i class='bx bxs-heart' style='color:#ff91e6' aria-hidden="true"></i> by 
                <a target="_blank">NOT BRANDING</a>
              </p>
          </div> -->
  			</div>
		</div>
	</div>
</footer>
</html>