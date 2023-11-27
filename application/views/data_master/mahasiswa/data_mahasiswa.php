<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manajemen Mahasiswa
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
                        <h3 class="box-title">Data Mahasiswa</h3>
                        <ul class="nav pull-right">
                            <a href="<?php echo site_url('manajemen_mahasiswa/tambah_mahasiswa'); ?>" type="button" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah Mahasiswa</a>
                        </ul>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="text-align: center;">NIM</th>
                                        <th style="text-align: center;">Nama</th>
                                        <th style="text-align: center;">Kelas</th>
                                        <th style="text-align: center;">Program Studi</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($mahasiswa as $mhs) : ?>
                                        <tr>
                                            <td style="text-align: center;" width="20px"><?php echo $no++; ?></td>
                                            <td><?php echo $mhs['username']; ?></td>
                                            <td><?php echo $mhs['nama']; ?></td>
                                            <td><?php echo $mhs['kelas']; ?></td>
                                            <td><?php echo $mhs['program_studi']; ?></td>
                                            <td align="center">
                                                <a href="<?php echo site_url('manajemen_mahasiswa/detail_mahasiswa'); ?>/<?php echo $mhs['id_mahasiswa']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Detail</a>
                                                <a href="<?php echo site_url('manajemen_mahasiswa/edit_mahasiswa'); ?>/<?php echo $mhs['id_mahasiswa']; ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                                <a href="<?php echo site_url('manajemen_mahasiswa/hapus_mahasiswa'); ?>/<?php echo $mhs['id_mahasiswa']; ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fa fa-trash"></i> Delete</a>
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