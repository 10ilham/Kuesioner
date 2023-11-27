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
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/uploads/user/<?php echo $umum['foto']; ?>" alt="User profile picture">
                        <br>
                        <h3 class="profile-username text-center"><?php echo $umum['username']; ?></h3>
                        <p class="text-muted text-center"><?php echo $umum['level']; ?></p>
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
                                <td>Nama</td>
                                <td>: <?php echo $umum['username']; ?></td>
                            </tr>
                            <tr>
                                <td>Institusi</td>
                                <td>: <?php echo $umum['institusi']; ?></td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td>: <?php echo $umum['jabatan']; ?></td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>