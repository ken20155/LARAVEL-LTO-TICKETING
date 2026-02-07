<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="<?= env('APP_URL') ?>public/main/image/logo.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= env('APP_URL') ?>public/main/image/logo.jpg" type="image/x-icon">
    <title>Login - <?= env('PROJECTTITLE') ?></title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="<?= env('APP_URL') ?>public/plugins/assets/css/tailwind.output.css" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="<?= env('APP_URL') ?>public/plugins/assets/js/init-alpine.js"></script>
  </head>
  <body>

        <?= $content ?>

    <!-- JS -->
    <script>
        var baseUrl = "<?= env('APP_URL') ?>";
    </script>
    <script src="<?= env('APP_URL') ?>public/plugins/js/sweetalert.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/plugins/js/jquery.min.js"></script>
    <script src="<?= env('APP_URL') ?>public/main/js/main.js"></script>
    <script src="<?= env('APP_URL') ?>public/main/js/common.js"></script>
</body>
</html>
