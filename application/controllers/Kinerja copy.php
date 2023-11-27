<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kinerja extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('kinerja_model');
    }
    function index()
    {
        $this->pagging('kuesioner/kinerja');
    }
    function kelola($p = null)
    {
        if (empty($p)) {
            $data['tampil'] = $this->input->post('tampil');
            $data['semester'] = $this->input->post('sem');
            $data['ta'] = $this->input->post('ta');
            $data['tahun'] = $this->kinerja_model->getData('periode', ['tahun_akademik']);
            $data['title'] = "Kinerja Layanan Manajemen Sistem Tata Pamong dan Tata Kelola";
            $data['boxtitle'] = "Hasil Penilaian Tata Pamong dan Tata Kelola Berdasarkan Kuesioner";
            $tampil = $this->input->post('tampil');
            if (isset($tampil)) {
                $data['res'] = $this->db->get('v_total_kelola');
                $sem = $data['semester'];
                $ta = $data['ta'];
                $check = $this->kinerja_model->getPeriodeByST('periode', ['semester' => $sem, 'tahun_akademik' => $ta])->row_array();

                // Check if $check is not null before accessing its elements
                if ($check) {
                    $id = $check;
                    $data['cek'] = $this->db->get_where('respon', ['id_periode' => $id['id_periode'], 'typeaspek' => 'kelola'])->row();
                    $data['responden'] = $this->db->query("SELECT COUNT(distinct respon.username) as total, semester, tahun_akademik, id_level FROM respon, periode, dosen_staf where dosen_staf.username = respon.username and respon.id_periode=periode.id_periode and respon.id_periode='" . $check['id_periode'] . "' AND typeaspek = '" . $this->uri->segment(2) . "' GROUP BY id_level")->result_array();
                    $data['pertanyaan'] = $this->db->query("SELECT COUNT(distinct id_kuesioner) as total FROM respon, periode, dosen_staf where dosen_staf.username = respon.username and respon.id_periode=periode.id_periode and respon.id_periode='" . $check['id_periode'] . "' AND typeaspek = '" . $this->uri->segment(2) . "' GROUP BY id_level")->row_array();
                    $data['total'] = $this->db->query("SELECT SUM(jawabanHarapan) as harapan, SUM(jawabanKenyataan) as nyata FROM respon, periode, dosen_staf where dosen_staf.username = respon.username and respon.id_periode=periode.id_periode and respon.id_periode='" . $check['id_periode'] . "' AND typeaspek = '" . $this->uri->segment(2) . "' GROUP BY id_kuesioner, id_level")->result_array();
                } else {
                    // Handle jika $check null atau array kosong
                    // Misalnya: tampilkan pesan kesalahan atau lakukan tindakan lain
                    $data['error_message'] = "Data periode tidak ditemukan.";
                }
            }
            $this->pagging('kuesioner/kinerja_kelola', $data);
        }
    }

    function akademik($p = null)
    {
        if (empty($p)) {
            $data['tampil'] = $this->input->post('tampil');
            $data['semester'] = $this->input->post('sem');
            $data['ta'] = $this->input->post('ta');
            $data['tahun'] = $this->kinerja_model->getData('periode', ['tahun_akademik']);
            $data['title'] = "Kinerja Layanan Manajemen dalam Proses Pendidikan";
            $data['boxtitle'] = "Hasil Penilaian Proses Pendidikan Berdasarkan Kuesioner";
            $tampil = $this->input->post('tampil');

            if (isset($tampil)) {
                $sem = $data['semester'];
                $ta = $data['ta'];
                $check = $this->kinerja_model->getPeriodeByST('periode', ['semester' => $sem, 'tahun_akademik' => $ta])->row_array();

                if ($check) {
                    $data['cek'] = $check;
                    $data['responden'] = $this->db->query("SELECT COUNT(distinct username) as total, semester, tahun_akademik FROM respon, periode where respon.id_periode=periode.id_periode and respon.id_periode='" . $check['id_periode'] . "' AND typeaspek = '" . $this->uri->segment(2) . "'")->row_array();
                    $data['pertanyaan'] = $this->db->query("SELECT COUNT(distinct id_kuesioner) as total FROM respon, periode where respon.id_periode=periode.id_periode and respon.id_periode='" . $check['id_periode'] . "' AND typeaspek = '" . $this->uri->segment(2) . "'")->row_array();
                    $data['total'] = $this->db->query("SELECT SUM(jawabanHarapan) as harapan, SUM(jawabanKenyataan) as nyata FROM respon, periode where respon.id_periode=periode.id_periode and respon.id_periode='" . $check['id_periode'] . "' AND typeaspek = '" . $this->uri->segment(2) . "' GROUP BY id_kuesioner")->result_array();
                } else {
                    // Handle jika $check null atau array kosong
                    // Misalnya: tampilkan pesan kesalahan atau lakukan tindakan lain
                    $data['error_message'] = "Data periode tidak ditemukan.";
                }
            }

            $this->pagging('kuesioner/kinerja_akademik', $data);
        }
    }
    function komentar_kelola()

    {
        $data['id_level'] = $this->input->post('id_level');
        $data['ta'] = $this->input->post('ta');
        $data['semester'] = $this->input->post('sem');
        $ta = $this->db->get_where('periode', ['tahun_akademik' => $data['ta']])->row();
        $data['title'] = "Kinerja Layanan Manajemen Sistem Tata Kelola";
        $data['boxtitle'] = "Hasil Penilaian Tata Kelola Berdasarkan Kuesioner";
        // $data['komentar'] = $this->kinerja_model->getDataTP($data['id_level'], $ta->id_periode);
        $data['komentar'] = $this->kinerja_model->getDataTP($ta->id_periode);
        $this->pagging('kuesioner/komentar_kelola', $data);
    }

    function komentar_akademik()

    {
        $data['ta'] = $this->input->post('ta');
        $data['semester'] = $this->input->post('sem');
        $ta = $this->db->get_where('periode', ['tahun_akademik' => $data['ta']])->row();
        $data['title'] = "Kinerja Layanan Manajemen dalam Proses Pendidikan";
        $data['boxtitle'] = "Hasil Penilaian Proses Pendidikan Berdasarkan Kuesioner";
        $data['komentar'] = $this->kinerja_model->getDataAkademik($ta->id_periode);
        $this->pagging('kuesioner/komentar_akademik', $data);
    }
    function detail_kelola()
    {

        $data['title'] = "Kinerja Layanan Manajemen Sistem Tata Pamong dan Tata Kelola";
        $data['boxtitle'] = "Hasil Penilaian Tata Pamong dan Tata Kelola Berdasarkan Kuesioner";
        $data['id_level'] = $this->input->post('id_level');
        $data['ta'] = $this->input->post('ta');
        $data['semester'] = $this->input->post('sem');

        $data['aspek'] = $this->db->get_where('aspek', ['typeaspek' => "kelola"])->result();
        $this->pagging('kuesioner/detail_kelola', $data);
    }
    function detail_akademik()
    {

        $data['title'] = "Kinerja Layanan Manajemen dalam Proses Pendidikan";
        $data['boxtitle'] = "Hasil Penilaian Proses Pendidikan Berdasarkan Kuesioner";
        $data['id_level'] = $this->input->post('id_level');
        $data['ta'] = $this->input->post('ta');
        $data['semester'] = $this->input->post('sem');
        $sem = $data['semester'];
        $ta = $data['ta'];
        $check = $this->kinerja_model->getPeriodeByST('periode', ['semester' => $sem, 'tahun_akademik' => $ta])->row_array();
        $data['responden'] = $this->db->query("SELECT COUNT(distinct username) as total, semester, tahun_akademik FROM respon, periode where respon.id_periode=periode.id_periode and respon.id_periode='" . $check['id_periode'] . "' AND typeaspek = 'akademik'")->row_array();
        $data['aspek'] = $this->db->get_where('aspek', ['typeaspek' => "akademik"])->result();
        $this->pagging('kuesioner/detail_akademik', $data);
    }

    public function print_kelola()
    {
        $data['ta'] = $this->input->get('ta');
        $data['semester'] = $this->input->get('semester');
        $data['res'] = $this->db->get('v_total_kelola');
        $sem = $data['semester'];
        $ta = $data['ta'];
        $check = $this->kinerja_model->getPeriodeByST('periode', ['semester' => $sem, 'tahun_akademik' => $ta])->row_array();
        //$data['cek'] = $this->kinerja_model->getPeriodeByST('periode', ['semester' => $sem, 'tahun_akademik' => $ta])->result_array();
        $id = $this->kinerja_model->getPeriodeByST('periode', ['semester' => $sem, 'tahun_akademik' => $ta])->row_array();
        $data['cek'] = $this->db->get_where('respon', ['id_periode' => $id['id_periode'], 'typeaspek' => 'kelola'])->row();
        $data['responden'] = $this->db->query("SELECT COUNT(distinct respon.username) as total, semester, tahun_akademik, id_level FROM respon, periode, dosen_staf where dosen_staf.username = respon.username and respon.id_periode=periode.id_periode and respon.id_periode='" . $check['id_periode'] . "' AND typeaspek = 'kelola' GROUP BY id_level")->result_array();
        $data['pertanyaan'] = $this->db->query("SELECT COUNT(distinct id_kuesioner) as total FROM respon, periode, dosen_staf where dosen_staf.username = respon.username and respon.id_periode=periode.id_periode and respon.id_periode='" . $check['id_periode'] . "' AND typeaspek = 'kelola' GROUP BY id_level")->row_array();
        $data['total'] = $this->db->query("SELECT SUM(jawabanHarapan) as harapan, SUM(jawabanKenyataan) as nyata FROM respon, periode, dosen_staf where dosen_staf.username = respon.username and respon.id_periode=periode.id_periode and respon.id_periode='" . $check['id_periode'] . "' AND typeaspek = 'kelola' GROUP BY id_kuesioner, id_level")->result_array();

        $data['aspek'] = $this->db->get_where('aspek', ['typeaspek' => "kelola"])->result();
        $data['title'] = "Print Laporan";
        $data['boxtitle'] = "Hasil Penilaian Tata Pamong dan Tata Kelola Berdasarkan Kuesioner";

        $this->load->view('print/print_kelola', $data);
    }

    public function print_akademik()
    {
        $data['title'] = "Print Laporan";
        $data['boxtitle'] = "Hasil Penilaian Proses Pendidikan Berdasarkan Kuesioner";
        $data['ta'] = $this->input->get('ta');
        $data['semester'] = $this->input->get('semester');

        $sem = $data['semester'];
        $ta = $data['ta'];
        $check = $this->kinerja_model->getPeriodeByST('periode', ['semester' => $sem, 'tahun_akademik' => $ta])->row_array();
        $data['cek'] = $this->kinerja_model->getPeriodeByST('periode', ['semester' => $sem, 'tahun_akademik' => $ta])->row_array();
        $data['responden'] = $this->db->query("SELECT COUNT(distinct username) as total, semester, tahun_akademik FROM respon, periode where respon.id_periode=periode.id_periode and respon.id_periode='" . $check['id_periode'] . "' AND typeaspek = 'akademik'")->row_array();
        $data['pertanyaan'] = $this->db->query("SELECT COUNT(distinct id_kuesioner) as total FROM respon, periode where respon.id_periode=periode.id_periode and respon.id_periode='" . $check['id_periode'] . "' AND typeaspek = 'akademik'")->row_array();
        $data['total'] = $this->db->query("SELECT SUM(jawabanHarapan) as harapan, SUM(jawabanKenyataan) as nyata FROM respon, periode where respon.id_periode=periode.id_periode and respon.id_periode='" . $check['id_periode'] . "' AND typeaspek = 'akademik' GROUP BY id_kuesioner")->result_array();
        $data['aspek'] = $this->db->get_where('aspek', ['typeaspek' => "akademik"])->result();
        $this->load->view('print/print_akademik', $data);
    }
}
