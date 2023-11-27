<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title ?>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Box Comment -->
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= $boxtitle ?> <?= (isset($tampil)) ? " - Semester " . $semester . " TA " . $ta : "" ?></h3>
                        <!-- /.user-block -->
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div align="right" class="col-sm-12">
                            <form method="POST" role="form" action="" enctype="multipart/form-data">
                                <p>
                                    <label>Semester&nbsp;&nbsp;</label>
                                    <select name="sem" required oninvalid="this.setCustomValidity('SEMESTER Belum Diisi')" oninput="setCustomValidity('')">
                                        <option value="GANJIL" <?= ($semester == "GANJIL") ? "selected" : "" ?>>GANJIL</option>
                                        <option value="GENAP" <?= ($semester == "GENAP") ? "selected" : "" ?>>GENAP</option>
                                    </select>
                                    <label>&nbsp;&nbsp;&nbsp;&nbsp;Tahun Akademik&nbsp;&nbsp;</label>
                                    <select name="ta" required oninvalid="this.setCustomValidity('TAHUN AKADEMIK Belum Diisi')" oninput="setCustomValidity('')">

                                        <?php foreach ($tahun->result_array() as $th) : ?>
                                            <option value="<?= $th['tahun_akademik'] ?>" <?= ($ta == $th['tahun_akademik']) ? "selected" : "" ?>><?= $th['tahun_akademik'] ?></option>
                                        <?php endforeach; ?>

                                    </select>&nbsp;
                                <form method="post" action="<?php echo site_url('kinerja/akademik') ?>">
                                    <button type="submit" name="tampil" class="btn btn-success">
                                        <i class="fa fa-search"></i> FILTER</button>
                                    <input type="hidden" name="tampil" class="btn btn-success" value="1">
                                    <a class="btn btn-primary" href="<?= (!empty($semester) && !empty($ta)) ? site_url('kinerja/print_akademik?semester=' . $semester . '&ta=' . $ta) : '#' ?>" target='_blank'>
                                        <i class="fa fa-print"></i> PRINT</a>
                                </form>
                                </p>
                            </form>
                        </div>
                        <table class="table table-striped table-bordered bootstrap-datatable table-responsive">
                            <thead>
                                <tr class="text-center bg-primary">
                                    <th style="text-align: center;">
                                        <font color=white>NO.</font>
                                    </th>
                                    <!-- <th style="text-align: center;">
                                        <font color=white>Nama Dosen</font>
                                    </th> -->
                                    <th style="text-align: center;">
                                        <font color=white>SEMESTER</font>
                                    </th>
                                    <th style="text-align: center;">
                                        <font color=white>TAHUN AKADEMIK</font>
                                    </th>
                                    <th style="text-align: center;">
                                        <font color=white>SKOR KOMPONEN</font>
                                    </th>
                                    <th style="text-align: center;">
                                        <font color=white>JUMLAH RESPONDEN</font>
                                    </th>
                                    <th style="text-align: center;">
                                        <font color=white>PREDIKAT</font>
                                    </th>
                                    <th style="text-align: center;">
                                        <font color=white>ACTION</font>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($cek)) {
                                    $h = 0;
                                    $n = 0;
                                    $no = 1;
                                    foreach ($total as $tot) {
                                        $h += $tot['harapan'] / $responden['total'];
                                        $n += $tot['nyata'] / $responden['total']; ?>
                                    <?php } ?>
                                    <?php
                                    $no = 1;
                                    $na = 0;
                                    foreach ($total as $tot) {
                                        $na += (((($tot['harapan'] / $responden['total']) / $h))); ?>
                                    <?php } ?>
                                    <?php $ms = 0;
                                    $ws = 0;
                                    $no = 1;
                                    foreach ($total as $tot) {
                                        $ms += $tot['nyata'] / $responden['total'];
                                        $ws += (((($tot['harapan'] / $responden['total']) / $h))) * $tot['nyata'] / $responden['total'];
                                    ?>

                                    <?php } ?>
                                    <tr class="text-center">
                                        <td><?php echo $no++; ?></td>

                                        <!-- <td><?= $responden['nama'] ?></td> -->
                                        <td><?= $responden['semester'] ?></td>
                                        <td><?= $responden['tahun_akademik'] ?></td>
                                        <td><?= number_format((($ws / 4) * 100), 2) . "%" ?></td>
                                        <?php if (number_format((($ws / 4) * 100), 2) <= 25) {
                                            $ket = "Kurang";
                                        } elseif (number_format((($ws / 4) * 100), 2) >= 26 && number_format((($ws / 4) * 100), 2) <= 50) {
                                            $ket = "Cukup";
                                        } elseif (number_format((($ws / 4) * 100), 2) >= 51 && number_format((($ws / 4) * 100), 2) <= 75) {
                                            $ket = "Baik";
                                        } else {
                                            $ket = "Sangat Baik";
                                        } ?>
                                        <td><?= (isset($responden['total'])) ? $responden['total'] : '' ?></td>
                                        <td><?= $ket ?></td>

                                        <td>
                                            <form method="post" action="<?= site_url('kinerja/detail_akademik') ?>">
                                                <input type="hidden" name="sem" value="<?= $semester ?>">
                                                <input type="hidden" name="ta" value="<?= $ta ?>">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-eye"></i> Detail</button>
                                            </form>
                                            <form method="post" action="<?= site_url('kinerja/komentar_akademik') ?>">
                                                <input type="hidden" name="sem" value="<?= $semester ?>">
                                                <input type="hidden" name="ta" value="<?= $ta ?>">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-archive"></i> Lihat Saran</button>
                                            </form>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <tr>
                            <td colspan="7">
                                <p class="text-center">
                                    --- Tidak Ada Data ---
                                </p>
                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                    </table>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div>