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
                        <h3 class="box-title">Edit Kaprodi</h3>
                    </div>

                    <!-- Form -->
                    <br />
                    <form method="post" action="" class="form-horizontal">
                        <input type="hidden" name="id_kaprodi" value="<?php echo $kaprodi['id_kaprodi']; ?>"> <!-- Terhubung ke file Kaprodi_model.php -->
                        <div class="box-body">
                            <!-- Tambahkan kolom lain sesuai kebutuhan -->

                            <div class="form-group">
                                <label for="username" class="col-sm-3 control-label">NIDN</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $kaprodi['username']; ?>" placeholder="Masukkan NIDN *">
                                    <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="password" name="password" value="<?php echo $kaprodi['password']; ?>" placeholder="Masukkan Password *">
                                    <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <!-- Nama -->
                            <div class="form-group">
                                <label for="nama" class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $kaprodi['nama']; ?>" placeholder="Masukkan Nama Kaprodi *">
                                    <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <!-- Program Studi yang diampu -->
                            <div class="form-group">
                                <label for="program_studi" class="col-sm-3 control-label">Program studi</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="program_studi" name="program_studi" value="<?php echo $kaprodi['program_studi']; ?>" placeholder="Masukkan Program Studi yang diampu *">
                                    <?php echo form_error('program_studi', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <!-- Versi Dropdown -->
                            <!-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Program Studi</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="program_studi">
                                        <option value="D3-Teknik Informatika" <?php echo ($kaprodi['program_studi'] == 'D3-Teknik Informatika') ? 'selected' : ''; ?>>D3-Teknik Informatika</option>
                                        <option value="D3-Teknik Multimedia" <?php echo ($kaprodi['program_studi'] == 'D3-Teknik Multimedia') ? 'selected' : ''; ?>>D3-Teknik Multimedia</option>
                                    </select>
                                </div>
                            </div> -->

                            <!-- Tanggal lahir -->
                            <div class="form-group">
                                <label for="ttl" class="col-sm-3 control-label">Tanggal Lahir</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="ttl" name="ttl" value="<?php echo $kaprodi['ttl']; ?>">
                                    <?php echo form_error('ttl', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <!-- Jenis kelamin -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="jk">
                                        <?php if ($kaprodi['jk'] == 'laki-laki') {
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

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $kaprodi['email']; ?>" placeholder="Masukkan Email Kaprodi *">
                                    <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <!-- Telepon -->
                            <div class="form-group">
                                <label for="telp" class="col-sm-3 control-label">Telepon</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $kaprodi['telp']; ?>" placeholder="Masukkan Nomor Telepon Kaprodi *">
                                    <?php echo form_error('telp', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <!-- Alamat -->
                            <div class="form-group">
                                <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $kaprodi['alamat']; ?>" placeholder="Masukkan alamat kaprodi *">
                                    <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo site_url('manajemen_kaprodi'); ?>" button type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Edit</button>
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