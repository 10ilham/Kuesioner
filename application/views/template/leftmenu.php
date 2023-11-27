<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php
                $idlevel = $this->session->userdata('id_level');
                if ($idlevel == 1) {
                    $path_image = "assets/uploads/admin/";
                } elseif ($idlevel == 2) {
                    $path_image = "assets/uploads/user/";
                } elseif ($idlevel == 3) {
                    $path_image = "assets/uploads/user/";
                } elseif ($idlevel == 4) {
                    $path_image = "assets/uploads/user/";
                } else {
                    $path_image = "assets/uploads/user/";
                }
                ?>

                <img src="<?= base_url($path_image) . '' . $this->session->userdata('foto'); ?> " class="img-circle" alt="User Image">

            </div>
            <div class="pull-left info">

                <p><?= $this->session->userdata('nama'); ?>
                </p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

            </div>
        </div>
        <br>

        <!-- Bagian Admin -->

        <?php
        if ($this->session->userdata('id_level') == '1') {
        ?>
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">DASHBOARD</li>
                <li>
                    <a href="<?php echo site_url('dashboard'); ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="header">MAIN CONTENT</li>
                <li class="treeview">
                    <a>
                        <i class="fa fa-users"></i> <span>Data Master</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo site_url('manajemen_user'); ?>"></i> Dosen</a></li>
                        <li><a href="<?php echo site_url('manajemen_mahasiswa'); ?>"></i> Mahasiswa</a></li>
                        <li><a href="<?php echo site_url('manajemen_kaprodi'); ?>"></i> Kaprodi</a></li>
                        <li><a href="<?php echo site_url('manajemen_kuesioner/kelola'); ?>"></i> Pertanyaan Tata kelola</a></li>
                        <li><a href="<?php echo site_url('manajemen_kuesioner/akademik'); ?>"></i> Pertanyaan Layanan Akademik</a></li>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo site_url('manajemen_periode'); ?>">
                        <i class="fa fa-bell"></i> <span>Jadwal Kuesioner </span>
                    </a>
                </li>

                <li class="treeview">
                    <a>
                        <i class="fa fa-sticky-note"></i> <span>Laporan Hasil Kuesioner</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo site_url('kinerja/kelola'); ?>"></i>Kuesioner Tata kelola</a></li>
                        <li><a href="<?php echo site_url('kinerja/akademik'); ?>"></i>Kuesioner Layanan Akademik</a></li>
                    </ul>
                </li>

            </ul>


            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">UTILITIES</li>
                <!-- <li>
                    <a href="<?php echo site_url('profile'); ?>">
                        <i class="fa fa-user"></i> <span>Profile</span>
                    </a>
                </li> -->
                <li>
                    <a href="<?= site_url('login/logout'); ?>" class="tombol-logout"></i>
                        <i class="fa fa-sign-out"></i> <span> Logout</span>
                    </a>
                </li>
            </ul>

            <!-- Bagian Dosen -->

        <?php
        } elseif ($this->session->userdata('id_level') == '2') {
        ?>

            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="<?php echo site_url('dashboard/dosen'); ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('pengisian/dosen'); ?>">
                        <i class="fa fa-edit"></i> <span> Pengisian Kuesioner</span>
                    </a>
                </li>

            </ul>


            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">UTILITIES</li>
                <!-- <li>
                    <a href="<?php echo site_url('profile/user'); ?>">
                        <i class="fa fa-user"></i> <span>Profile</span>
                    </a>
                </li> -->
                <li>
                    <a href="<?= site_url('login/logout'); ?>" class="tombol-logout"></i>
                        <i class="fa fa-sign-out"></i> <span> Logout</span>
                    </a>
                </li>
            </ul>

            <!-- Bagian Kaprodi -->

        <?php
        } elseif ($this->session->userdata('id_level') == '3') {
        ?>

            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">DASHBOARD</li>
                <li>
                    <a href="<?php echo site_url('dashboard/kaprodi'); ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="header">MAIN CONTENT</li>
                <li>
                    <a href="<?php echo site_url('manajemen_periode'); ?>">
                        <i class="fa fa-bell"></i> <span>Jadwal Kuesioner </span>
                    </a>
                </li>

                <li class="treeview">
                    <a>
                        <i class="fa fa-sticky-note"></i> <span>Laporan Hasil Kuesioner</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo site_url('kinerja/kelola'); ?>"></i>Kuesioner Tata kelola</a></li>
                        <li><a href="<?php echo site_url('kinerja/akademik'); ?>"></i>Kuesioner Layanan Akademik</a></li>
                    </ul>
                </li>

            </ul>


            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">UTILITIES</li>
                <!-- <li>
                    <a href="<?php echo site_url('profile/kaprodi'); ?>">
                        <i class="fa fa-user"></i> <span>Profile</span>
                    </a>
                </li> -->
                <li>
                    <a href="<?= site_url('login/logout'); ?>" class="tombol-logout"></i>
                        <i class="fa fa-sign-out"></i> <span> Logout</span>
                    </a>
                </li>
            </ul>


            <!-- Bagian Mahasiswa -->

        <?php
        } elseif ($this->session->userdata('id_level') == '4') {
        ?>

            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="<?php echo site_url('dashboard/mahasiswa'); ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                <!-- <li>
                    <a href="<?php echo site_url('manajemen_mahasiswa/pertanyaan'); ?>">
                        <i class="fa fa-edit"></i> <span> Pengisian Kuesioner</span>

                    </a>
                </li> -->
                <li>
                    <a href="<?php echo site_url('pengisian/mahasiswa'); ?>">
                        <i class="fa fa-edit"></i> <span> Pengisian Kuesioner</span>

                    </a>
                </li>
            </ul>

            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">UTILITIES</li>
                <li>
                    <a href="<?= site_url('login/logout'); ?>" class="tombol-logout"></i>
                        <i class="fa fa-sign-out"></i> <span> Sign Out</span>
                    </a>
                </li>
            </ul>

            <!-- Bagian Umum -->
        <?php
        } elseif ($this->session->userdata('id_level') == '5') {
        ?>

            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="<?php echo site_url('dashboard/umum'); ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('pengisian/umum'); ?>">
                        <i class="fa fa-edit"></i> <span> Pengisian Kuesioner</span>

                    </a>
                </li>
            </ul>

            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">UTILITIES</li>
                <li>
                    <a href="<?= site_url('login/logout'); ?>" class="tombol-logout"></i>
                        <i class="fa fa-sign-out"></i> <span> Sign Out</span>
                    </a>
                </li>
            </ul>


        <?php
        } else {
            echo '';
        }
        ?>

    </section>
    <!-- /.sidebar -->
</aside>