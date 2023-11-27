<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">


  <title><?php echo $title; ?></title>
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/login_user/img/pnc.png">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>assets/login_user/css/bootstrap.css" rel="stylesheet">
  <!--external css-->
  <link href="<?php echo base_url(); ?>assets/login_user/font-awesome/css/font-awesome.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url(); ?>assets/login_user/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/login_user/css/style-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script>
    function setAction(action) {
      document.getElementById('loginForm').action = action;
    }
  </script>
</head>

<body>
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="" method="post" id="loginForm">
        <h2 class="form-login-heading">
          <img src="<?php echo base_url(); ?>assets/login_user/img/ppnc.png" width="100px" class="pb-2">
          <!-- <font color='black' align="left">E-Kuesioner</font> -->
        </h2>

        <h5 style="line-height:20px; text-align:center">
          <font color='black'>Sistem Informasi Kuesioner Prodi <br> </font><br>

          <!-- Pesan kesalahan Login -->
          <?php echo $this->session->flashdata('error_message'); ?>
          <div class="login-wrap">

            <input type="text" id="username" name="username" value="<?= set_value('username'); ?>" class="form-control" placeholder="Masukan Username" required autofocus>
            <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
            <br>
            <input type="password" id="password" name="password" class="form-control" required placeholder="Masukan Password">
            <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>') ?>

            <br>
            <br>Pilih Login Sebagai
            <!-- <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button> -->
            <hr>

            <!-- Form untuk login Dosen -->
            <button type="submit" class="btn btn-theme btn-block" onclick="setAction('<?php echo site_url('login_mahasiswa'); ?>')">Mahasiswa</button>
            <!-- Form untuk login Dosen -->
            <button type="submit" class="btn btn-theme btn-block" onclick="setAction('<?php echo site_url('login_user'); ?>')">Dosen</button>
            <!-- Form untuk login Kaprodi -->
            <button type="submit" class="btn btn-theme btn-block" onclick="setAction('<?php echo site_url('login_kaprodi'); ?>')">Login Kaprodi</button>
            <!-- Form untuk login Admin -->
            <button type="submit" class="btn btn-theme btn-block" onclick="setAction('<?php echo site_url('login_admin'); ?>')">Administrator</button>

          </div>
      </form>
    </div>
  </div>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url(); ?>assets/login_user/js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>assets/login_user/js/bootstrap.min.js"></script>

  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/login_user/js/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("<?php echo base_url(); ?>assets/login_user/img/bg.jpg", {
      speed: 500
    });
  </script>


</body>

</html>