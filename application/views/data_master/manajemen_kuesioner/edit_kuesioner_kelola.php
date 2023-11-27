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
                        <h3 class="box-title">Edit Pertanyaan Kuesioner Sistem Tata Pamong dan Tata Kelola</h3>
                    </div>

                    <!-- Form -->
                    <br />
                    <form action="" method="post" class="form-horizontal">
                        <div class="box-body">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Aspek Penilaian</label>
                                <div class="col-md-6 col-sm-9 col-xs-12">
                                    <select class="form-control" name="nama_aspek">
                                        <?php foreach ($aspek as $asp) { ?>
                                            <option value="<?= $asp["id_aspek"] ?>" <?= ($kuesioner['id_aspek'] == $asp['id_aspek']) ? "selected" : "" ?>>
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
                                    <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" value="<?php echo set_value('pertanyaan');
                                                                                                                        echo $kuesioner['pertanyaan'] ?>" placeholder="Masukkan Pertanyaan *">
                                    <?php echo form_error('pertanyaan', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo site_url('manajemen_kuesioner/kelola'); ?>" button type="submit" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</a>
                                <input type='hidden' name='tanyaa' value='<?= $kuesioner['pertanyaan'] ?>'>
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