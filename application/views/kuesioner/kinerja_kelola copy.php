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

                                <form method="post" action="<?php echo site_url('kinerja/kelola') ?>">
                                    <button type="submit" name="tampil" class="btn btn-success">
                                        <i class="fa fa-search"></i> FILTER</button>
                                    <input type="hidden" name="tampil" class="btn btn-success" value="1">
                                    <a class="btn btn-primary" href="<?= (!empty($semester) && !empty($ta)) ? site_url('kinerja/print_kelola?semester=' . $semester . '&ta=' . $ta) : '#' ?>" target='_blank'>
                                        <i class="fa fa-print"></i> PRINT</a>
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
                                        <font color=white>BAGIAN</font>
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
                                    $no = 1;
                                    foreach ($res->result() as $key) {
                                        $ta = $this->input->post('ta');
                                        $sem = $this->input->post('sem');
                                        $check = $this->db->query("SELECT * FROM periode where semester ='" . $sem . "' AND tahun_akademik ='" . $ta . "'")->row();
                                        $query = $this->db->query("SELECT SUM(jawabanHarapan) as harapan, SUM(jawabanKenyataan) as nyata FROM respon, periode, dosen_staf where dosen_staf.username = respon.username and respon.id_periode=periode.id_periode and respon.id_periode='" . $check->id_periode . "' AND typeaspek = '" . $this->uri->segment(2) . "' AND id_level = " . $key->id_level . " GROUP BY id_kuesioner, id_level")->result_array();
                                ?>

                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= $key->bagian ?></td>
                                            <td class="text-center"><?= $key->semester ?></td>
                                            <td class="text-center"><?= $key->ta ?></td>
                                            <td class="text-center">
                                                <?php
                                                $mis = 0;
                                                $mss = 0;
                                                $wf = 0;
                                                $ws = 0;
                                                foreach ($query as $q) {
                                                    $mis += $q['harapan'] / $key->total;
                                                    $mss += $q['nyata'] / $key->total;
                                                }
                                                foreach ($query as $q) {
                                                    $wf += ($q['harapan'] / $key->total / $mis * 100);
                                                    $ws += $q['nyata'] / $key->total * ($q['harapan'] / $key->total / $mis * 100) / 100;
                                                }
                                                echo number_format($ws / 4 * 100, 2) . "%";
                                                ?>

                                            </td>
                                            <td class="text-center"><?= $key->total ?></td>
                                            <td class="text-center">
                                                <?php if (number_format((($ws / 4 * 100)), 2) <= 25) {
                                                    $ket = "Kurang";
                                                } elseif (number_format((($ws / 4 * 100)), 2) >= 26 && number_format((($ws / 4 * 100)), 2) <= 50) {
                                                    $ket = "Cukup";
                                                } elseif (number_format((($ws / 4 * 100)), 2) >= 51 && number_format((($ws / 4 * 100)), 2) <= 75) {
                                                    $ket = "Baik";
                                                } else {
                                                    $ket = "Sangat Baik";
                                                }
                                                echo $ket;
                                                ?>

                                            </td>
                                            <td class="text-center">

                                                <form method="post" action="<?= site_url('kinerja/detail_kelola') ?>">
                                                    <input type="hidden" name="sem" value="<?= $semester ?>">
                                                    <input type="hidden" name="ta" value="<?= $key->ta ?>">
                                                    <input type="hidden" name="id_level" value="<?= $key->id_level ?>">
                                                    <input type="hidden" name="ta" value="<?= $ta ?>">
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-eye"></i> Detail</button>
                                                </form>
                                                <form method="post" action="<?= site_url('kinerja/komentar_kelola') ?>">
                                                    <input type="hidden" name="sem" value="<?= $semester ?>">
                                                    <input type="hidden" name="ta" value="<?= $key->ta ?>">
                                                    <input type="hidden" name="id_level" value="<?= $key->id_level ?>">
                                                    <input type="hidden" name="ta" value="<?= $ta ?>">
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-archive"></i> Lihat Saran</button>
                                                </form>
                                            </td>
                                        </tr>
                                <?php }
                                } else {
                                    echo "<td colspan='8' class='text-center'>--- Tidak Ada Data ---</td>";
                                }
                                ?>
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