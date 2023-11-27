<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manajemen Dosen
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Dosen</h3>
                    </div>

                    <!-- Form -->
                    <br />
                    <form action="<?php echo site_url('manajemen_user/tambah_user'); ?>" method="post" class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="username" class="col-sm-3 control-label">NID/ NIP</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>" placeholder="Masukkan Nomor Induk Dosen (NID) atau Nomor Induk Pegawai (NIP) *">
                                    <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Masukkan Password Dosen *">
                                    <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama" class="col-sm-3 control-label">Nama </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo set_value('nama'); ?>" placeholder="Masukkan Nama User *">
                                    <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="matkul" class="col-sm-3 control-label">Mata Kuliah </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="matkul" name="matkul" value="<?php echo set_value('matkul'); ?>" placeholder="Masukkan matkul yang diampu *">
                                    <p>*jika matkul lebih dari satu pisahkan dengan tanda koma (",")</p>
                                    <?php echo form_error('matkul', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Program Studi</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="program_studi">
                                        <option selected disabled value="">Pilih Prodi !!</option>
                                        <option value="D3-Teknik Indormatika">D3-Teknik Indormatika</option>
                                        <option value="D4-Multimedia">D4-Multimedia</option>
                                        <option value="D4-ALKS">D4-ALKS</option>
                                    </select>
                                    <?php echo form_error('program_studi', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ttl" class="col-sm-3 control-label">Tanggal Lahir</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="ttl" name="ttl" value="<?= date('Y-m-d') ?>" placeholder="Masukkan Tanggal Lahir User *">
                                    <?php echo form_error('ttl', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="jk">
                                        <option selected disabled value="">Pilih !!</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <?php echo form_error('jk', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Masukkan Email User *">
                                    <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="telp" class="col-sm-3 control-label">Telepon</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="telp" name="telp" value="<?php echo set_value('telp'); ?>" placeholder="Masukkan Nomor Telepon User *">
                                    <?php echo form_error('telp', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo set_value('alamat'); ?>" placeholder="Masukkan Alamat User *">
                                    <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo site_url('manajemen_user'); ?>" button type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>