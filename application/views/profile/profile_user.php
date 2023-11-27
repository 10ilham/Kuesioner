<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profile
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
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/uploads/user/<?php echo $user['foto']; ?>" alt="User profile picture">
                        <br>
                        <h3 class="profile-username text-center"><?php echo $user['nama']; ?></h3>
                        <p class="text-muted text-center"><?php echo $user['level']; ?></p>
                    </div>
                </div>

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Profile</h3>
                    </div>

                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <td>NID/ NIP</td>
                                <td>: <?php echo $user['username']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>: <?php echo $user['nama']; ?></td>
                            </tr>
                            <tr>
                                <td>Bagian</td>
                                <td>: <?php echo $user['bagian']; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>: <?php echo $user['ttl']; ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>: <?php echo $user['jk']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>: <?php echo $user['email']; ?></td>
                            </tr>
                            <tr>
                                <td>No Telepon</td>
                                <td>: <?php echo $user['telp']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: <?php echo $user['alamat']; ?></td>
                            </tr>
                        </table>

                        <br>
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="<?php echo site_url('profile/user/edit'); ?>" type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>