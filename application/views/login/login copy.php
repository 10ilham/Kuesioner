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
</head>

<body>
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="<?php echo site_url('login_umum'); ?>" method="post">
        <h2 class="form-login-heading">
          <img src="<?php echo base_url(); ?>assets/login_user/img/ppnc.png" width="100px" class="pb-2">
          <!-- <font color='black' align="left">E-Kuesioner</font> -->
        </h2>

        <h5 style="line-height:20px; text-align:center">
          <font color='black'>Sistem Informasi Kuesioner Prodi <br> </font><br>


          <?php echo $this->session->flashdata('message'); ?>
          <div class="login-wrap">

            <input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Masukan Nama" autofocus>
            <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
            <br>
            <input type="text" id="institusi" name="institusi" class="form-control" placeholder="Masukan Institusi">
            <?php echo form_error('institusi', '<small class="text-danger pl-3">', '</small>') ?>
            <br>

            <tr align="center"></tr>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<td align="center"><input type="radio" name="bagian" value="ortu" required> Orang Tua Mahasiswa </td>&nbsp&nbsp
            <td align="center"><input type="radio" name="bagian" value="lainnya" required> Lainnya</td>
            </tr>
            <br>
            <br>
            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
            <hr>
            <button type="button" class="btn btn-theme btn-block" data-toggle="modal" data-target="#loginmahasiswa">Mahasiswa</button>
            <button type="button" class="btn btn-theme btn-block" data-toggle="modal" data-target="#loginuser">Dosen</button>
            <button type="button" class="btn btn-theme btn-block" data-toggle="modal" data-target="#loginkaprodi">Kaprodi</button>
            <button type="button" class="btn btn-theme btn-block" data-toggle="modal" data-target="#loginadmin">Administrator</button>
          </div>
      </form>
    </div>
  </div>

  <!-- Login Admin -->
  <div class="modal fade" id="loginadmin" tabindex="-1" role="dialog" aria-labelledby="modal-primary-label">
    <div class="modal-dialog" role="document">
      <form class="form-login" action="<?php echo site_url('login_admin'); ?>" method="post">
        <div class="modal-content">
          <div class="modal-header state modal-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modal-primary-label"><i class="fa fa-user"></i> Login Admin</h4>
          </div>
          <div class="modal-body">
            <div class="login-wrap">

              <input type="text" id="username" name="username" value="admin" class="form-control" placeholder="Masukan Username" required autofocus>
              <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
              <br>
              <input type="password" id="password" name="password" class="form-control" value="admin" required placeholder="Masukan Password">
              <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Login</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Login Kaprodi -->
  <div class="modal fade" id="loginkaprodi" tabindex="-1" role="dialog" aria-labelledby="modal-primary-label">
    <div class="modal-dialog" role="document">
      <form class="form-login" action="<?php echo site_url('login_kaprodi'); ?>" method="post">
        <div class="modal-content">
          <div class="modal-header state modal-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modal-primary-label"><i class="fa fa-user"></i> Login Kaprodi</h4>
          </div>
          <div class="modal-body">
            <div class="login-wrap">

              <input type="text" id="username" name="username" value="" class="form-control" placeholder="Masukan Username" required autofocus>
              <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
              <br>
              <input type="password" id="password" name="password" class="form-control" required placeholder="Masukan Password">
              <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Login</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Login Dosen_Staf -->
  <div class="modal fade" id="loginuser" tabindex="-1" role="dialog" aria-labelledby="modal-primary-label">
    <div class="modal-dialog" role="document">
      <form class="form-login" action="<?php echo site_url('login_user'); ?>" method="post">
        <div class="modal-content">
          <div class="modal-header state modal-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modal-primary-label"><i class="fa fa-user"></i> Login Dosen</h4>
          </div>
          <div class="modal-body">
            <div class="login-wrap">

              <input type="text" id="username" name="username" value="<?= set_value('username'); ?>" class="form-control" placeholder="Masukan Username" required autofocus>
              <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
              <br>
              <input type="password" id="password" name="password" class="form-control" required placeholder="Masukan Password">
              <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Login</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Login Mahasiswa -->
  <div class="modal fade" id="loginmahasiswa" tabindex="-1" role="dialog" aria-labelledby="modal-primary-label">
    <div class="modal-dialog" role="document">
      <form class="form-login" action="<?php echo site_url('login_mahasiswa'); ?>" method="post">
        <div class="modal-content">
          <div class="modal-header state modal-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="modal-primary-label"><i class="fa fa-user"></i> Sign In Mahasiswa</h4>
          </div>
          <div class="modal-body">
            <div class="login-wrap">

              <input type="text" id="username" name="username" value="<?= set_value('username'); ?>" class="form-control" placeholder="Masukan NIM" required autofocus>
              <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
              <br>
              <!-- Password hanya boleh angka -->
              <input type="password" id="password" name="password" class="form-control" required placeholder="Masukan Password">
              <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Sign In</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
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