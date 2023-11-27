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
        <!-- <?php if ($this->session->flashdata('message')) : ?>
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
        <?php endif; ?> -->


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
                                    <tr class="text-center bg-primary">
                                        <th>No</th>
                                        <th style="text-align: center;">Aspek Penilaian</th>
                                        <th style="text-align: center;">Skor Komponen</th>
                                        <th style="text-align: center;">Predikat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($aspek as $asp) :
                                        $query = $this->db->query("SELECT SUM(jawabanHarapan) as harapan, SUM(jawabanKenyataan) as nyata FROM respon where typeaspek='kelola' and id_aspek='$asp->id_aspek' GROUP BY id_kuesioner");
                                    ?>
                                        <tr>
                                            <td style="text-align: center;" width="20px"><?= $no++ ?></td>
                                            <td>
                                                <?= $asp->nama_aspek ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $mis = 0;
                                                $mss = 0;
                                                $wf = 0;
                                                $ws = 0;
                                                foreach ($query->result() as $q) :
                                                    $mis += $q->harapan / $responden['total'];
                                                    $mss += $q->nyata / $responden['total'];
                                                endforeach;
                                                foreach ($query->result() as $q) {
                                                    $wf += ($q->harapan / $responden['total'] / $mis * 100);
                                                    $ws += $q->nyata / $responden['total'] * ($q->harapan / $responden['total'] / $mis * 100) / 100;
                                                }
                                                // Ubah persentase jika melebihi 100%
                                                $percentage = $ws / 4 * 100;
                                                $percentage = min($percentage, 100); // Pastikan tidak melebihi 100%
                                                echo number_format($percentage, 2) . "%";
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                // Tentukan kategori berdasarkan rentang persentase
                                                if ($percentage <= 25) {
                                                    $ket = "Kurang";
                                                } elseif ($percentage <= 50) {
                                                    $ket = "Cukup";
                                                } elseif ($percentage <= 75) {
                                                    $ket = "Baik";
                                                } else {
                                                    $ket = "Sangat Baik";
                                                }
                                                echo $ket;
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                            <form method="post" action="<?= site_url('kinerja/kelola') ?>">
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