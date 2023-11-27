<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manajemen Kaprodi
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Kaprodi</h3>
                    </div>

                    <!-- Form -->
                    <br />
                    <form action="<?php echo site_url('manajemen_kaprodi/tambah_kaprodi'); ?>" method="post" class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="username_kaprodi" class="col-sm-3 control-label">NIDN</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="username_kaprodi" name="username_kaprodi" value="<?php echo set_value('username_kaprodi'); ?>" placeholder="Masukkan NIDN *">
                                    <?php echo form_error('username_kaprodi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_kaprodi" class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nama_kaprodi" name="nama_kaprodi" value="<?php echo set_value('nama_kaprodi'); ?>" placeholder="Masukkan Nama *">
                                    <?php echo form_error('nama_kaprodi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <!-- Program Studi yang diampu -->
                            <div class="form-group">
                                <label for="program_studi" class="col-sm-3 control-label">Program Studi</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="program_studi" name="program_studi" value="<?php echo set_value('program_studi'); ?>" placeholder="Masukkan Program Studi yang diampu *">
                                    <?php echo form_error('program_studi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <!-- Versi Dropdown -->
                            <!-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Program Studi</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="program_studi">
                                        <option value="">Pilih Bagian !!</option>
                                        <option value="D3-Teknik Informatika">D3-Teknik Informatika</option>
                                        <option value="D3-Teknik Multimedia">D3-Teknik Multimedia</option>
                                    </select>
                                    <?php echo form_error('program_studi', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div> -->

                            <div class="form-group">
                                <label for="ttl" class="col-sm-3 control-label">Tanggal Lahir</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="ttl" name="ttl" value="<?= date('Y-m-d') ?>" placeholder="Masukkan Tanggal Lahir *">
                                    <?php echo form_error('ttl', '<small class="text-danger pl-3">', '</small>') ?>
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

                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Masukkan Email Kaprodi *">
                                    <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="telp" class="col-sm-3 control-label">Telepon</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="telp" name="telp" value="<?php echo set_value('telp'); ?>" placeholder="Masukkan Nomor Telepon Kaprodi *">
                                    <?php echo form_error('telp', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alamat" class="col-sm-3 control-label">Alamat </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo set_value('alamat'); ?>" placeholder="Masukkan alamat *">
                                    <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <!-- Tambahkan kolom lain sesuai kebutuhan -->

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo site_url('manajemen_kaprodi'); ?>" button type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
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