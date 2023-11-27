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
                        <h3 class="box-title">Edit Dosen</h3>
                    </div>

                    <!-- Form -->
                    <br />
                    <form method="post" action="" class="form-horizontal">
                        <input type="hidden" name="id" value="<?php echo $user['id_dosen']; ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="username" class="col-sm-3 control-label">NID/ NIP</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>" disabled>
                                    <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama" class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $user['nama']; ?>" placeholder="Masukkan Nama User *">
                                    <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="matkul" class="col-sm-3 control-label">Mata Kuliah</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="matkul" name="matkul" value="<?php echo $user['matkul']; ?>" placeholder="Masukkan matkul yang diampu *">
                                    <p>*jika matkul lebih dari satu pisahkan dengan tanda koma (",")</p>
                                    <?php echo form_error('matkul', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Program Studi</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="program_studi">
                                        <?php
                                        $options = ['D3-Teknik Informatika', 'D4-Multimedia', 'D4-ALKS'];
                                        foreach ($options as $option) {
                                            $selected = ($user['program_studi'] == $option) ? 'selected' : '';
                                            echo "<option $selected value='$option'>$option</option>";
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('program_studi', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ttl" class="col-sm-3 control-label">Tanggal Lahir</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="ttl" name="ttl" value="<?php echo $user['ttl']; ?>">
                                    <?php echo form_error('ttl', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="jk">
                                        <?php
                                        $options = ['Laki-laki', 'Perempuan'];
                                        foreach ($options as $option) {
                                            $selected = ($user['jk'] == $option) ? 'selected' : '';
                                            echo "<option $selected value='$option'>$option</option>";
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('jk', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" placeholder="Masukkan Email User *">
                                    <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="telp" class="col-sm-3 control-label">Telepon</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $user['telp']; ?>" placeholder="Masukkan Nomor Telepon User *">
                                    <?php echo form_error('telp', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $user['alamat']; ?>" placeholder="Masukkan Alamat User *">
                                    <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo site_url('manajemen_user'); ?>" button type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
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