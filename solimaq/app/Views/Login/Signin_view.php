<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title><?=$title?></title>

    <!-- vendor css -->
    <link href="<?=base_url()?>/../../assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?=base_url()?>/../../assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="<?=base_url()?>/../../assets/css/starlight.css">
    <!--favicon -->
    <link rel="icon" href="<?=base_url()?>/../../assets/img/solimaq.png" type="image">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
        <form method="POST" action="<?php echo base_url().'/Login/verify_login'?>">
      <div class="login-wrapper wd-300 wd-xs-450 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse"><img src="<?=base_url()?>/../../assets/img/logo_b.jpg" height="100%" width="100%"></div>
        <div class="tx-center mg-b-60"><?php if(isset($error)){echo $error;}?></div>

        <div class="form-group">
          <input type="text" class="form-control" name="email" placeholder="Ingrese correo electronico">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Ingrese contraseña">
          <a href="" class="tx-info tx-12 d-block mg-t-10">Recuperar contraseña</a>
        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">ENTRAR</button>
        <br>
        <br>

        <!--<div class="mg-t-60 tx-center"><a href="page-signup.html" class="tx-info">Crear cuenta</a></div>-->
      </div><!-- login-wrapper -->
  </form>
    </div><!-- d-flex -->

    <script src="<?=base_url()?>/../lib/jquery/jquery.js"></script>
    <script src="<?=base_url()?>/../lib/popper.js/popper.js"></script>
    <script src="<?=base_url()?>/../lib/bootstrap/bootstrap.js"></script>

  </body>
</html>

