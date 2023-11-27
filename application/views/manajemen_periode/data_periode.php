<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manajemen Jadwal Kuesioner
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Sweet Alert -->
        <!-- <?php if ($this->session->flashdata('message')) : ?>
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
        <?php endif; ?> -->


        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Data Jadwal Kuesioner</h3>
                        <ul class="nav pull-right">
                            <a href="<?php echo site_url('manajemen_periode/tambah_periode'); ?>" type="button" class="btn btn-primary"><i class="fa fa-calendar-times-o"></i> Tambah Periode</a>
                        </ul>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="text-align: center;">Semester</th>
                                        <th style="text-align: center;">Tahun Akademik</th>
                                        <th style="text-align: center;">Keterangan</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($periode as $p) : ?>
                                        <tr>
                                            <td style="text-align: center;" width="20px"><?php echo $no++; ?></td>
                                            <td style="text-align: center;"><?php echo $p['semester']; ?></td>
                                            <td style="text-align: center;"><?php echo $p['tahun_akademik']; ?></td>
                                            <td><?php echo $p['keterangan']; ?></td>
                                            <td>
                                                <div class="checkbox ">
                                                    <input <?= ($p['isaktif'] == "true") ? "disabled" : "" ?> type="checkbox" <?= ($p['isaktif'] == "true") ? "checked" : "" ?> class="btn-xs" id="aktif" data-toggle="toggle" onchange="window.location.href='<?= site_url() ?>manajemen_periode/update/<?= $p['id_periode'] ?>'">
                                                </div>
                                            </td>
                                            <td align="center">
                                                <a href="<?php echo site_url('manajemen_periode/edit_periode'); ?>/<?php echo $p['id_periode']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> </i> Edit</a>
                                                <a href="<?php echo site_url('manajemen_periode/hapus_periode'); ?>/<?php echo $p['id_periode']; ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    document.getElementById('aktif').onclick = function() {
        // access properties using this keyword
        if (this.checked) {
            // if checked ...
            alert(this.value);
        } else {
            // if not checked ...
        }
    };
</script>