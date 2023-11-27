<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Detail Mahasiswa
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <br>
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/uploads/user/<?php echo $mahasiswa['foto']; ?>" alt="User profile picture">
                        <br>
                        <h3 class="profile-username text-center"><?php echo $mahasiswa['nama']; ?></h3>
                        <p class="text-muted text-center"><?php echo $mahasiswa['level']; ?></p>
                    </div>
                </div>

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Profile Mahasiswa</h3>
                    </div>

                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <td>NIM</td>
                                <td>: <?php echo $mahasiswa['username']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Mahasiswa</td>
                                <td>: <?php echo $mahasiswa['nama']; ?></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>: <?php echo $mahasiswa['kelas']; ?></td>
                            </tr>
                            <tr>
                                <td>Program Studi</td>
                                <td>: <?php echo $mahasiswa['program_studi']; ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>: <?php echo $mahasiswa['jk']; ?></td>
                            </tr>

                            <!-- Tambahkan kolom lain sesuai kebutuhan -->
                        </table>

                        <br>
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="<?php echo site_url('manajemen_mahasiswa'); ?>" type="submit" class="btn btn-primary"><i class="fa fa-rotate-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>