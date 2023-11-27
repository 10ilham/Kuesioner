<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manajemen Kuesioner
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Kuesioner</h3>
                    </div>

                    <!-- Form -->
                    <br />
                    <form action="<?php echo site_url('manajemen_kuesioner/kelola/tambah'); ?>" method="post" class="form-horizontal">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="bagian" class="col-sm-3 control-label">Bagian</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="bagian" name="bagian" value="<?php echo set_value('Dosen'); ?>" placeholder="Dosen" disabled>
                                    <?php echo form_error('bagian', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                            <!-- untuk bagian -->
                            <!-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Bagian</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="bagian" disabled>
                                        <option value="Dosen">Dosen</option>
                                        <option value="Tenaga Kependidikan">Tenaga Kependidikan</option>
                                    </select>
                                    <?php echo form_error('bagian', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Aspek Penilaian</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="nama_aspek">
                                        <?php foreach ($aspek as $asp) { ?>
                                            <option value="<?= $asp["id_aspek"] ?>">
                                                <?= $asp["nama_aspek"] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <?php echo form_error('nama_aspek', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pertanyaan" class="col-sm-3 control-label">Pertanyaan</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" value="<?php echo set_value('pertanyaan'); ?>" placeholder="Masukkan Pertanyaan *">
                                    <?php echo form_error('pertanyaan', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo site_url('manajemen_kuesioner/kelola'); ?>" button type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
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