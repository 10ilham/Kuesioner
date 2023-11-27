<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profile
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- alert edit berhasil -->
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
            <?php $this->session->unset_userdata('message'); ?>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <br>
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/uploads/admin/<?php echo $admin['foto_admin']; ?>" alt="User profile picture">
                        <br>
                        <h3 class="profile-username text-center"><?php echo $admin['nama_admin']; ?></h3>
                        <p class="text-muted text-center"><?php echo $admin['level']; ?></p>
                    </div>
                </div>

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Profile Administrator</h3>
                    </div>

                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <td>Username</td>
                                <td>: <?php echo $admin['username_admin']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>: <?php echo $admin['nama_admin']; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>: <?php echo $admin['ttl']; ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>: <?php echo $admin['jk']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>: <?php echo $admin['email']; ?></td>
                            </tr>
                            <tr>
                                <td>No Telepon</td>
                                <td>: <?php echo $admin['telp']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: <?php echo $admin['alamat']; ?></td>
                            </tr>
                        </table>

                        <br>
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="<?php echo site_url('profile/edit_admin'); ?>" type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>