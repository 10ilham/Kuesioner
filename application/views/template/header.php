<header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>PNC</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Sistem Kuesioner</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">



                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                        $idlevel = $this->session->userdata('id_level');
                        if ($idlevel == 1) {
                            $path_image = "assets/uploads/admin/";
                        } elseif ($idlevel == 2) {
                            $path_image = "assets/uploads/user/";
                        } else if ($idlevel == 3) {
                            $path_image = "assets/uploads/user/";
                        } else if ($idlevel == 4) {
                            $path_image = "assets/uploads/user/";
                        } else {
                            $path_image = "assets/uploads/user/";
                        }
                        ?>
                        <img src="<?= base_url($path_image) . '' . $this->session->userdata('foto'); ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs">
                            <?= $this->session->userdata('nama') ?>
                        </span>
                    </a>

                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= base_url($path_image) . '' . $this->session->userdata('foto'); ?>" class="img-circle" alt="User Image">

                            <br>
                            <br>

                            <p>
                                <?= $this->session->userdata('level') ?>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php if ($this->session->userdata('id_level') == 1) {
                                                echo site_url('profile');
                                            } else if ($this->session->userdata('id_level') == 2) {
                                                echo site_url('profile/user');
                                            } else if ($this->session->userdata('id_level') == 3) {
                                                echo site_url('profile/kaprodi');
                                            } else if ($this->session->userdata('id_level') == 4) {
                                                echo site_url('profile/mahasiswa');
                                            } else {
                                                echo site_url('profile/umum');
                                            } ?>" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= site_url('petunjuk'); ?>" class="btn btn-default btn-flat">Petunjuk Aplikasi
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>