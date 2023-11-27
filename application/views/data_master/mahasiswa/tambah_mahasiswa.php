<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manajemen Mahasiswa
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Mahasiswa</h3>
                    </div>

                    <!-- Form -->
                    <br />
                    <form action="<?php echo site_url('manajemen_mahasiswa/tambah_mahasiswa'); ?>" method="post" class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="username" class="col-sm-3 control-label">NIM</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>" placeholder="Masukkan NIM Mahasiswa *">
                                    <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Masukkan Password Mahasiswa *">
                                    <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama" class="col-sm-3 control-label">Nama Mahasiswa</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo set_value('nama'); ?>" placeholder="Masukkan Nama Mahasiswa *">
                                    <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="kelas" class="col-sm-3 control-label">Kelas Mahasiswa</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo set_value('kelas'); ?>" placeholder="Masukkan Kelas Mahasiswa *">
                                    <?php echo form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="jk">
                                        <option value="">Choose Your Option !!</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <?php echo form_error('jk', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <!-- Tambahkan kolom lain sesuai kebutuhan -->

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo site_url('manajemen_mahasiswa'); ?>" button type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
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