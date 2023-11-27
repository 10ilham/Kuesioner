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
                        <h3 class="box-title">Edit Mahasiswa</h3>
                    </div>

                    <!-- Form -->
                    <br />
                    <form method="post" action="" class="form-horizontal">
                        <!-- name="id_mahasiswa" ngambil Mahasiswa_model -> editDataMahasiswa() -> $this->db->where('id_mahasiswa', $this->input->post('id_mahasiswa'));-->
                        <input type="hidden" name="id" value="<?php echo $mahasiswa['id_mahasiswa']; ?>">
                        <div class="box-body">
                            <!-- Tambahkan kolom lain sesuai kebutuhan -->

                            <div class="form-group">
                                <label for="username" class="col-sm-3 control-label">NIM</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $mahasiswa['username']; ?>" disabled>
                                    <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <!-- Password -->

                            <div class="form-group">
                                <label for="nama" class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $mahasiswa['nama']; ?>" placeholder="Masukkan Nama Mahasiswa *">
                                    <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="kelas" class="col-sm-3 control-label">Kelas</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $mahasiswa['kelas']; ?>" placeholder="Masukkan Kelas Mahasiswa *">
                                    <?php echo form_error('kelas', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Program Studi</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="program_studi">
                                        <?php
                                        $options = ['D3-Teknik Informatika', 'D4-Multimedia', 'D4-ALKS'];
                                        foreach ($options as $option) {
                                            $selected = ($mahasiswa['program_studi'] == $option) ? 'selected' : '';
                                            echo "<option $selected value='$option'>$option</option>";
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('program_studi', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="jk">
                                        <?php
                                        $options = ['Laki-laki', 'Perempuan'];
                                        foreach ($options as $option) {
                                            $selected = ($mahasiswa['jk'] == $option) ? 'selected' : '';
                                            echo "<option $selected value='$option'>$option</option>";
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('jk', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo site_url('manajemen_mahasiswa'); ?>" button type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
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