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
  <link rel="stylesheet" href="<?= base_url() ?>vendor/css/styleM.css">
  <link rel="icon" href="<?= base_url() ?>vendor/img/logoprodi.png">
  <!-- JS Jquery -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
  <link rel='stylesheet' href='https://unpkg.com/boxicons@latest/css/boxicons.min.css'>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css'>
</head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i>
        <a href="<?= base_url() ?>">
          <img src="<?= base_url() ?>vendor/img/logoprodi.png" alt="" width="50" height="50">
        </a>
      </i>
    </div>
    <ul class="nav-link">
      <!-- 1 -->
      <li>
        <a href="<?= base_url() ?>index.php/Home/beranda">
          <i>
            <img src="<?= base_url() ?>vendor/img/icon1NB.png" alt="" class="img-fluid rounded-circle border">
          </i>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="<?= base_url() ?>index.php/Home/beranda">Informasi Alat</a></li>
        </ul>
      </li>
      <!-- 3 -->
      <li>
        <a href="<?= base_url() ?>index.php/Home/loan">
          <i>
            <img src="<?= base_url() ?>vendor/img/icon2NB.png" alt="" class="img-fluid rounded-circle border">
          </i>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="<?= base_url() ?>index.php/Home/loan">Layanan Peminjaman</a></li>
        </ul>
      </li>
      <!-- 4 -->
      <li>
        <a href="<?= base_url() ?>index.php/Home/sop">
          <i>
            <img src="<?= base_url() ?>vendor/img/icon3NB.png" alt="" class="img-fluid rounded-circle border">
          </i>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="<?= base_url() ?>index.php/Home/sop">SOP Penggunaan</a></li>
        </ul>
      </li>
      <!-- 5 -->
      <li>
        <a href="<?= base_url() ?>index.php/Home/dtInventaris">
          <i>
            <img src="<?= base_url() ?>vendor/img/approval.png" alt="" class="img-fluid rounded-circle border">
          </i>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="<?= base_url() ?>index.php/Home/dtInventaris">Data Peminjaman</a></li>
        </ul>
      </li>
    </ul>
  </div>
</body>

</html>