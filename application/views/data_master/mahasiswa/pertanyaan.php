<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Penilaian mahasiswa terhadap dosen
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Sweet Alert -->
        <?php if (isset($_SESSION['flashdata'])) : ?>
            <div class="flash-data" data-flashdata="<?php echo $_SESSION['flashdata']; ?>"></div>
        <?php endif; ?>


        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Data Dosen</h3>
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
                                        <th style="text-align: center;">Kelas</th>
                                        <th style="text-align: center;">Program Studi</th>
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
                                            <td><?php echo $u['kelas']; ?></td>
                                            <td><?php echo $u['program_studi']; ?></td>
                                            <td align="center">
                                                <a href="<?php echo site_url('pertanyaan/mahasiswa/' . $u['username'] . '/' . $u['id_dosen']); ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Penilaian</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>