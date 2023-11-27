<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manajemen Dosen
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Sweet Alert -->
        <!-- Terletak pada assets/sweetalert -->
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
            <?php $this->session->unset_userdata('message'); ?>
        <?php endif; ?>


        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Data Dosen</h3>
                        <ul class="nav pull-right">
                            <a href="<?php echo site_url('manajemen_user/tambah_user'); ?>" type="button" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah User</a>
                        </ul>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="text-align: center;">NID/ NIP</th>
                                        <th style="text-align: center;">Nama</th>
                                        <th style="text-align: center;">Mata Kuliah</th>
                                        <th style="text-align: center;">Program Studi</th>
                                        <!-- <th style="text-align: center;">Bagian</th> -->
                                        <th style="text-align: center;">Email</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($user as $u) : ?>
                                        <tr>
                                            <td style="text-align: center;" width="20px"><?php echo $no++; ?></td>
                                            <td><?php echo $u['username']; ?></td>
                                            <td><?php echo $u['nama']; ?></td>
                                            <td><?php echo $u['matkul']; ?></td>
                                            <td><?php echo $u['program_studi']; ?></td>

                                            <td><?php echo $u['email']; ?></td>
                                            <td align="center">
                                                <a href="<?php echo site_url('manajemen_user/detail_user'); ?>/<?php echo $u['id_dosen']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Detail</a>
                                                <a href="<?php echo site_url('manajemen_user/edit_user'); ?>/<?php echo $u['id_dosen']; ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                                <a href="<?php echo site_url('manajemen_user/hapus_user'); ?>/<?php echo $u['id_dosen']; ?>" class="btn btn-danger btn-xs tombol-hapus"><i class="fa fa-trash"></i> Delete</a>
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