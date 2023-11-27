<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title ?>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Sweet Alert -->
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
        <?php endif; ?>


        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"><?= $boxtitle ?> <?= (isset($tampil)) ? " - Semester " . $semester . " TA " . $ta : "" ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <!-- <th style="text-align: center;">Harapan</th> -->
                                        <th style="text-align: center;">Masukan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($komentar as $k) : ?>
                                        <tr>
                                            <td style="text-align: center;" width="20px"><?php echo $no++; ?></td>
                                            <!-- <td><?php echo $k['harapan']; ?></td> -->
                                            <td><?php echo $k['masukan']; ?></td>
                                        </tr>
                                        </tfoot>
                                    <?php endforeach; ?>
                            </table>
                            <form method="post" action="<?= site_url('kinerja/akademik') ?>">
                                <input type="hidden" name="sem" value="<?= $semester ?>">
                                <input type="hidden" name="ta" value="<?= $ta ?>">
                                <button type="submit" name="tampil" class="btn btn-warning"><i class="fa fa-rotate-left"></i> Kembali</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>