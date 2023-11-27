<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Detail Kaprodi
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
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/uploads/user/<?php echo $kaprodi['foto']; ?>" alt="User profile picture">
                        <br>
                        <h3 class="profile-username text-center"><?php echo $kaprodi['nama']; ?></h3>
                        <p class="text-muted text-center"><?php echo $kaprodi['level']; ?></p>
                    </div>
                </div>

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Profile Kaprodi</h3>
                    </div>

                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <td>NIDN</td>
                                <td>: <?php echo $kaprodi['username']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Kaprodi</td>
                                <td>: <?php echo $kaprodi['nama']; ?></td>
                            </tr>
                            <tr>
                                <td>Program Studi yang diampu</td>
                                <td>: <?php echo $kaprodi['program_studi']; ?></td>
                            </tr>
                            <tr>
                                <td>Tempat Tanggal Lahir</td>
                                <td>: <?php echo $kaprodi['ttl']; ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>: <?php echo $kaprodi['jk']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>: <?php echo $kaprodi['email']; ?></td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td>: <?php echo $kaprodi['telp']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: <?php echo $kaprodi['alamat']; ?></td>
                            </tr>

                            <!-- Tambahkan kolom lain sesuai kebutuhan -->
                        </table>

                        <br>
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="<?php echo site_url('manajemen_kaprodi'); ?>" type="submit" class="btn btn-primary"><i class="fa fa-rotate-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>