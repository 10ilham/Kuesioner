<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Profile
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- <?php echo $this->session->flashdata('message'); ?> -->
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
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#edit_profil" data-toggle="tab">Edit Profil</a></li>
                        <!-- <li><a href="#change_password" data-toggle="tab">Change Password</a></li> -->
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="edit_profil">
                            <div class="box-body">
                                <form method="post" enctype="multipart/form-data" action="<?= site_url('profile/mahasiswa/edit') ?>" class="form-horizontal">
                                    <input type="hidden" name="id" value="<?php echo $mahasiswa['id_mahasiswa']; ?>">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label for="nama" class="col-sm-3 control-label">Nama</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $mahasiswa['nama']; ?>">
                                                <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="kelas" class="col-sm-3 control-label">Kelas</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $mahasiswa['kelas']; ?>">
                                                <?php echo form_error('kelas', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="program_studi" class="col-sm-3 control-label">Program Studi</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="program_studi" name="program_studi" value="<?php echo $mahasiswa['program_studi']; ?>">
                                                <?php echo form_error('program_studi', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                                            <div class="col-md-6 col-sm-9 col-xs-12">
                                                <select class="form-control" name="jk">
                                                    <?php if ($mahasiswa['jk'] == 'laki-laki') {
                                                        $lakilaki = "selected";
                                                        $perempuan = "";
                                                    } else {
                                                        $lakilaki = "";
                                                        $perempuan = "selected";
                                                    }; ?>
                                                    <option <?php echo $lakilaki; ?> value="laki-laki"> Laki-Laki</option>
                                                    <option <?php echo $perempuan; ?> value="perempuan"> Perempuan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="foto" class="col-sm-3 control-label">Foto</label>
                                            <div class="col-sm-6">
                                                <input type="file" class="form-control" id="foto" name="foto">
                                                <input type="hidden" class="form-control" id="foto" name="old_image" value="<?= $mahasiswa['foto'] ?>">
                                            </div>
                                        </div>

                                        <br>
                                        <div class="box-footer">
                                            <div class="pull-left">
                                                <a href="<?php echo site_url('profile/mahasiswa'); ?>" type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Update</button>
                                                <input type="hidden" name="submitted" value="update" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>