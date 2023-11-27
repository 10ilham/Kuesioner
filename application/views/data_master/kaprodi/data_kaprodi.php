<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manajemen Kaprodi
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
                        <h3 class="box-title">Data Kaprodi</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="text-align: center;">NIDN</th>
                                        <th style="text-align: center;">Nama</th>
                                        <th style="text-align: center;">Program Studi</th>
                                        <th style="text-align: center;">Email</th>
                                        <th style="text-align: center;">Telepon</th>
                                        <!-- <th style="text-align: center;">Alamat</th> -->
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kaprodi as $kpd) : ?>
                                        <tr>
                                            <td style="text-align: center;" width="20px"><?php echo $no++; ?></td>
                                            <td><?php echo $kpd['username']; ?></td>
                                            <td><?php echo $kpd['nama']; ?></td>
                                            <td><?php echo $kpd['program_studi']; ?></td>
                                            <td><?php echo $kpd['email']; ?></td>
                                            <td><?php echo $kpd['telp']; ?></td>

                                            <td align="center">
                                                <a href="<?php echo site_url('manajemen_kaprodi/detail_kaprodi'); ?>/<?php echo $kpd['id_kaprodi']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Detail</a>
                                                <a href="<?php echo site_url('manajemen_kaprodi/edit_kaprodi'); ?>/<?php echo $kpd['id_kaprodi']; ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>