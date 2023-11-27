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

        <!-- alert edit gagal -->
        <?php if ($this->session->flashdata('message_gagal')) : ?>
            <div class="flash-data-gagal" data-flashdatagagal="<?= $this->session->flashdata('message_gagal'); ?>"></div>
            <?php $this->session->unset_userdata('message_gagal'); ?>
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
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#edit_profil" data-toggle="tab">Edit Profil</a></li>
                        <li><a href="#change_password" data-toggle="tab">Change Password</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="edit_profil">
                            <div class="box-body">
                                <form method="post" enctype="multipart/form-data" action="<?= site_url('profile/edit_admin/' . $admin['id_admin']) ?>" class="form-horizontal">
                                    <input type="hidden" name="id" value="<?php echo $admin['id_admin']; ?>">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label for="nama" class="col-sm-3 control-label">Username</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $admin['username_admin']; ?>">
                                                <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama" class="col-sm-3 control-label">Nama</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $admin['nama_admin']; ?>">
                                                <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="ttl" class="col-sm-3 control-label">Tanggal Lahir</label>
                                            <div class="col-sm-6">
                                                <input type="date" class="form-control" id="ttl" name="ttl" value="<?php echo $admin['ttl']; ?>">
                                                <?php echo form_error('ttl', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                                            <div class="col-md-6 col-sm-9 col-xs-12">
                                                <select class="form-control" name="jk">
                                                    <?php if ($admin['jk'] == 'laki-laki') {
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
                                            <label for="email" class="col-sm-3 control-label">Email</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $admin['email']; ?>">
                                                <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="telp" class="col-sm-3 control-label">No Telepon</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $admin['telp']; ?>">
                                                <?php echo form_error('telp', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $admin['alamat']; ?>">
                                                <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="foto" class="col-sm-3 control-label">Foto</label>
                                            <div class="col-sm-6">
                                                <input type="file" class="form-control" id="foto" name="foto">
                                                <input type="hidden" class="form-control" id="foto" name="old_image" value="<?php echo $admin['foto_admin']; ?>">
                                            </div>
                                        </div>

                                        <br>
                                        <div class="box-footer">
                                            <div class="pull-left">
                                                <a href="<?php echo site_url('profile'); ?>" type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="tab-pane" id="change_password">
                            <div class="box-body">
                                <form method="post" action="<?= site_url('profile/change_passwordAdmin/' . $admin['id_admin']) ?>" class="form-horizontal">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label for="nama" class="col-sm-3 control-label">Password Baru</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" id="pw_baru" name="pw_baru" placeholder="Masukkan Password Baru *" value="<?php echo set_value('pw_baru'); ?>">
                                                <?php echo form_error('pw_baru', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama" class="col-sm-3 control-label">Ulangi Password</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" id="pw_baru2" name="pw_baru2" placeholder="Ulangi Password Baru *">
                                                <?php echo form_error('pw_baru2', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="box-footer">
                                            <div class="pull-left">
                                                <a href="<?php echo site_url('profile'); ?>" type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Simpan</button>
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