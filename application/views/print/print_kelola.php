<html>

<head>
    <title>Laporan Layanan Manajemen</title>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/login_user/img/pnc.png">
</head>

<body>

    <div align='center' width='750px' style="float:center">
        <div style="float:left">
            <img src="<?php echo base_url(); ?>assets/login_user/img/pnc.png" width='150px' height='80px'>
        </div>
        <div style="float:center">
            <center style="line-height:8px">
                <h3> POLITEKNIK NEGERI CILACAP </h3>
                <p>Terakreditasi Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT)</p>
                <p> Jl. Dr. Soetomo No. 1 Cilacap - 53212. Telp (0282) 533329, 533457. Fax (0282) 537992</p>
                <p> Website : https://www.pnc.ac.id Email : sekretariat@pnc.ac.id</p>
            </center>
        </div>
    </div>
    <hr size="2" style="background-color:black">
    <br>
    <h3 class="box-title"><?= $boxtitle ?> <?= " - Semester " . $semester . " TA " . $ta ?></h3>
    <table border=1 cellspadding=0 cellspacing=0 style="width: 100%">
        <tr align="center">
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Penilaian</th>
            <th style="text-align: center;">Skor Komponen</th>
            <th style="text-align: center;">Jumlah Responden</th>
            <th style="text-align: center;">Predikat</th>
        </tr>
        <?php

        if (!empty($cek)) {
            $no = 1;
            foreach ($res->result() as $key) {
                $ta = $this->input->get('ta');
                $sem = $this->input->get('semester');
                $check = $this->db->query("SELECT * FROM periode where semester ='" . $sem . "' AND tahun_akademik ='" . $ta . "'")->row();
                $query = $this->db->query("SELECT SUM(jawabanHarapan) as harapan, SUM(jawabanKenyataan) as nyata FROM respon, periode, dosen_staf where dosen_staf.username = respon.username and respon.id_periode=periode.id_periode and respon.id_periode='" . $check->id_periode . "' AND typeaspek = 'kelola' AND id_level = " . $key->id_level . " GROUP BY id_kuesioner, id_level")->result_array();
        ?>
                <tr align="center">
                    <td><?= $no++; ?></td>
                    <td><?= $key->bagian ?></td>
                    <td>
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
                    <td><?= $key->total ?></td>
                    <td>
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
                </tr>
                <?php foreach ($aspek as $asp) :
                    $query_aspek = $this->db->query("SELECT SUM(jawabanHarapan) as harapan, SUM(jawabanKenyataan) as nyata FROM respon a JOIN dosen_staf b on b.username = a.username where typeaspek='kelola' and id_level='$key->id_level' and id_aspek='$asp->id_aspek' GROUP BY id_kuesioner");
                ?>
                    <tr>
                        <td style="text-align: center;" width="20px"><?= $no++ ?></td>
                        <td><?= $asp->nama_aspek ?></td>
                        <td align='center'>
                            <?php
                            $mis_aspek = 0;
                            $mss_aspek = 0;
                            $wf_aspek = 0;
                            $ws_aspek = 0;
                            foreach ($query_aspek->result() as $q_aspek) :
                                $total_res = $this->db->query("SELECT * FROM v_total_kelola where id_level ='$key->id_level'")->row();
                                $mis_aspek += $q_aspek->harapan / $total_res->total;
                                $mss_aspek += $q_aspek->nyata / $total_res->total;
                            endforeach;
                            foreach ($query_aspek->result() as $q_aspek) {
                                $wf_aspek += ($q_aspek->harapan / $total_res->total / $mis_aspek * 100);
                                $ws_aspek += $q_aspek->nyata / $total_res->total * ($q_aspek->harapan / $total_res->total / $mis_aspek * 100) / 100;
                            }
                            echo number_format($ws_aspek / 4 * 100, 2) . "%";
                            ?>
                        </td>
                        <td></td>
                        <td align='center'>
                            <?php if (number_format((($ws_aspek / 4 * 100)), 2) <= 25) {
                                $ket_aspek = "Kurang";
                            } elseif (number_format((($ws_aspek / 4 * 100)), 2) >= 26 && number_format((($ws_aspek / 4 * 100)), 2) <= 50) {
                                $ket_aspek = "Cukup";
                            } elseif (number_format((($ws_aspek / 4 * 100)), 2) >= 51 && number_format((($ws_aspek / 4 * 100)), 2) <= 75) {
                                $ket_aspek = "Baik";
                            } else {
                                $ket_aspek = "Sangat Baik";
                            }
                            echo $ket_aspek;
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
        <?php }
        } ?>
    </table>
    <br>
    <br>
    <br>
    <div align='right' style='padding-right: 100px;'>Cilacap, <?php echo date("d F Y") ?></div>
    <br>
    <br>
    <br>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;
    <div align='right' style='padding-right: 145px;'>Ilham Munawar
    </div>
    <script>
        window.print();
    </script>

</body>

</html>