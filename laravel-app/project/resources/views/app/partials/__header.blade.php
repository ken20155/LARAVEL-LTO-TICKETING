


<!DOCTYPE html>
<html  x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?= $title ?> | <?= env('PROJECTTITLE') ?></title>
    <link rel="icon" href="<?= env('APP_URL') ?>public/main/image/logo.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= env('APP_URL') ?>public/main/image/logo.jpg" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link
      href="<?= env('APP_URL') ?>public/plugins/assets/css/css2.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/assets/css/tailwind.output.css" />
    <link rel="stylesheet" href="<?= env('APP_URL') ?>public/main/css/main.css" />
    <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/css/select2.css" />
    {{-- <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defer
    ></script> --}}
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/charts-lines.js" defer></script>
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/charts-pie.js" defer></script>
    
    <link href="<?= env('APP_URL') ?>public/plugins/assets/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- jQuery CDN -->
    <script src="<?= env('APP_URL') ?>public/plugins/assets/css/jquery-3.7.0.min.js"></script>
    <!-- DataTables JS CDN -->
    <script src="<?= env('APP_URL') ?>public/plugins/assets/css/jquery.dataTables.min.js"></script>
    <script
    src="<?= env('APP_URL') ?>public/plugins/assets/css/alpine.min.js"
    defer
  ></script>
  <script src="<?= env('APP_URL') ?>public/plugins/assets/js/init-alpine.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/init-alpine.js"></script>
    <!-- You need focus-trap.js to make the modal accessible -->
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/focus-trap.js" defer></script>
  </head>
  <body>
{{-- 
    <div id="preloader">
        <div class="spinner-border text-secondary" style="width: 3rem; height: 3rem;"  role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div id="preloader-text">Loading...</div>
    </div> --}}