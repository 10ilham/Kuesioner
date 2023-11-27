<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manajemen Jadwal Kuesioner
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Jadwal Kuesioner</h3>
                    </div>

                    <!-- Form -->
                    <br />
                    <form action="<?php echo site_url('manajemen_periode/tambah_periode'); ?>" method="post" class="form-horizontal">
                        <div class="box-body">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Semester</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="semester">
                                        <option value="">Pilih Semester !!</option>
                                        <option value="Genap">Genap</option>
                                        <option value="Ganjil">Ganjil</option>
                                    </select>
                                    <?php echo form_error('semester', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tahun Akademik</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="tahun_akademik">
                                        <option value="">Pilih Tahun Akademik !!</option>
                                        <?php for ($tahun = 2018; $tahun <= date('Y') + 1; $tahun++) { ?>
                                            <option value="<?php echo ($tahun - 1) . "/" . $tahun; ?>"> <?php echo ($tahun - 1) . "/" . $tahun; ?> </option>
                                        <?php }; ?>
                                    </select>
                                    <?php echo form_error('tahun_akademik', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo set_value('keterangan'); ?>" placeholder="Masukkan Keterangan *">
                                    <?php echo form_error('keterangan', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>



                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo site_url('manajemen_periode/index'); ?>" button type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
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