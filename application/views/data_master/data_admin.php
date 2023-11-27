<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manajemen User
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <?php echo $this->session->flashdata('message'); ?>

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Data Administrator</h3>
                        <ul class="nav pull-right">
                            <a href="<?php echo site_url('manajemen_user/tambah_admin'); ?>" type="button" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah Admin</a>
                        </ul>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Telepon</th>
                                        <th>Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($admin as $a) : ?>
                                        <tr>
                                            <td><?php echo $a['id_admin']; ?></td>
                                            <td><?php echo $a['nama_admin']; ?></td>
                                            <td><?php echo $a['email_admin']; ?></td>
                                            <td><?php echo $a['username_admin']; ?></td>
                                            <td><?php echo $a['telepon_admin']; ?></td>
                                            <td><?php echo $a['level']; ?></td>
                                            <td>
                                                <a href="<?php echo site_url('manajemen_user/detail_admin'); ?>/<?php echo $a['id_admin']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Detail</a>
                                                <a href="<?php echo site_url('manajemen_user/edit_admin'); ?>/<?php echo $a['id_admin']; ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                                <a href="<?php echo site_url('manajemen_user/hapus_admin'); ?>/<?php echo $a['id_admin']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah data ingin di hapus?')"><i class="fa fa-trash"></i> Delete</a>
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
    <!-- /.content -->
</div>