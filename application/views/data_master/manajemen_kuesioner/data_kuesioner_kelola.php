<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manajemen Kuesioner
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Sweet Alert -->
        <!-- <?php if ($this->session->flashdata('message')) : ?>
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
        <?php endif; ?> -->

        <?php if ($this->session->flashdata('message')) : ?>
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
            <?php $this->session->unset_userdata('message'); ?>
        <?php endif; ?>


        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Data Pertanyaan Kuesioner Sistem Tata Pamong dan Tata Kelola</h3>
                        <ul class="nav pull-right">
                            <a href="<?php echo site_url('manajemen_kuesioner/kelola/tambah'); ?>" type="button" class="btn btn-primary"><i class="fa fa-edit"></i> Tambah Kuesioner</a>
                        </ul>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="text-align: center;">Aspek Penilaian</th>

                                        <th style="text-align: center;">Pertanyaan</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kuesioner as $k) : ?>
                                        <tr>
                                            <td style="text-align: center;" width="10px"><?php echo $no++; ?></td>
                                            <td style="text-align: center;"><?php echo $k['nama_aspek']; ?></td>
                                            <td><?php echo $k['pertanyaan']; ?></td>
                                            <td align="center">
                                                <a href="<?php echo site_url('manajemen_kuesioner/kelola/edit'); ?>/<?php echo $k['id_kuesioner']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Edit</a>
                                                <a href="<?php echo site_url('manajemen_kuesioner/kelola/hapus'); ?>/<?php echo $k['id_kuesioner']; ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fa fa-trash"></i> Delete</a>
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