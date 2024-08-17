<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$title?> <?=$alat['alat']?></title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="<?= base_url()?>'vendor/img/logoprodi.png'">
    <style>
        iframe{
            padding-left: auto !important;
            padding-right: auto !important;
            position: absolute;
            height: 100%;
            width: 100%;
        }
        [class*="col-"] {
            width: 100%;
        }
        @media only screen and (min-width: 600px) {
            /* For tablets: */
                .col-s-1 {width: 8.33%;}
                .col-s-2 {width: 16.66%;}
                .col-s-3 {width: 25%;}
                .col-s-4 {width: 33.33%;}
                .col-s-5 {width: 41.66%;}
                .col-s-6 {width: 50%;}
                .col-s-7 {width: 58.33%;}
                .col-s-8 {width: 66.66%;}
                .col-s-9 {width: 75%;}
                .col-s-10 {width: 83.33%;}
                .col-s-11 {width: 91.66%;}
                .col-s-12 {width: 100%;}
        }
        
        @media only screen and (min-width: 768px) {
            /* For desktop: */
                .col-1 {width: 8.33%;}
                .col-2 {width: 16.66%;}
                .col-3 {width: 25%;}
                .col-4 {width: 33.33%;}
                .col-5 {width: 41.66%;}
                .col-6 {width: 50%;}
                .col-7 {width: 58.33%;}
                .col-8 {width: 66.66%;}
                .col-9 {width: 75%;}
                .col-10 {width: 83.33%;}
                .col-11 {width: 91.66%;}
                .col-12 {width: 100%;}
        }
    </style>
</head>
<body>
    <embed type="application/pdf" class="col-12 col-s-12" src="<?= base_url()?>/path/to/<?=$alat['id_sop']?>.pdf" style="position: absolute; height:100%;"></embed>
</body>
</html>