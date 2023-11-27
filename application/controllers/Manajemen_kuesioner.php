<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen_kuesioner extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kuesioner_model');
    }

    public function index()
    {
        $data['session'] = $this->db->get_where('kuesioner', ['id_kuesioner' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'Manajemen Kuesioner';
        $data['kuesioner'] = $this->kuesioner_model->getDataKuesionerAkademik();
        $data['aspek'] = $this->db->get('aspek')->result_array();
        $this->pagging('data_master/manajemen_kuesioner/data_kuesioner_akademik', $data);
    }
    public function akademik($p = null, $q = null, $id = null)
    {
        $p = $this->uri->segment('3');
        $q = $this->uri->segment('2');
        $id = $this->uri->segment('4');
        if (empty($p)) {
            $data['session'] = $this->db->get_where('kuesioner', ['id_kuesioner' => $this->session->userdata('id')])->row_array();
            $data['title'] = 'Manajemen Kuesioner';
            $data['kuesioner'] = $this->kuesioner_model->getDataKuesionerAkademik();
            $data['aspek'] = $this->db->get('aspek')->result_array();
            $this->pagging('data_master/manajemen_kuesioner/data_kuesioner_akademik', $data);
        } elseif ($p == "tambah") {
            $data['session'] = $this->db->get_where('kuesioner', ['id_kuesioner' => $this->session->userdata('id')])->row_array();
            $data['title'] = 'Tambah Kuesioner';

            //$data['aspek'] = $this->db->get('aspek')->result_array();
            $data['aspek'] = $this->kuesioner_model->getAspekByType('aspek', ['typeaspek' => $q])->result_array();
            //form validasi set rules

            $this->form_validation->set_rules('nama_aspek', 'Nama_aspek', 'required', [
                'required' => 'Aspek Penilaian tidak boleh kosong',
            ]);

            $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required', [
                'required' => 'Pertanyaan tidak boleh kosong',
            ]);

            //jika form validasi salah
            if ($this->form_validation->run() == false) {
                $this->pagging('data_master/manajemen_kuesioner/tambah_kuesioner_akademik', $data);

                //jika form validasi benar
            } else {
                $this->kuesioner_model->tambahDataKuesionerAkademik();
                $this->kuesioner_model->tambahDataKuesionerPendidikan();
                $this->session->set_flashdata('message', 'Data Berhasil Di Tambahkan');
                redirect('manajemen_kuesioner/akademik');
            }
        } elseif ($p == "edit") {
            $data['session'] = $this->db->get_where('kuesioner', ['id_kuesioner' => $this->session->userdata('id')])->row_array();
            $data['title'] = 'Tambah Kuesioner';
            $data['kuesioner'] = $this->kuesioner_model->getKuesionerById('kuesioner', ['id_kuesioner' => $id])->row_array();
            //$data['aspek'] = $this->db->get('aspek')->result_array();
            $data['aspek'] = $this->kuesioner_model->getAspekByType('aspek', ['typeaspek' => $q])->result_array();
            //form validasi set rules

            $this->form_validation->set_rules('nama_aspek', 'Nama_aspek', 'required', [
                'required' => 'Aspek Penilaian tidak boleh kosong',
            ]);

            $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required', [
                'required' => 'Pertanyaan tidak boleh kosong',
            ]);

            //jika form validasi salah
            if ($this->form_validation->run() == false) {
                $this->pagging('data_master/manajemen_kuesioner/edit_kuesioner_akademik', $data);

                //jika form validasi benar
            } else {
                $tanya = $this->input->post('tanyaa', true);
                $data = [
                    "pertanyaan" => $this->input->post('pertanyaan', true),
                    "id_aspek" => $this->input->post('nama_aspek', true),
                ];
                $this->kuesioner_model->update('kuesioner', $data, ['pertanyaan' => $tanya]);
                $this->session->set_flashdata('message', 'Data Berhasil Di Edit');
                redirect('manajemen_kuesioner/akademik');
            }
        } elseif ($p == "hapus") {
            $cek = $this->db->get_where('kuesioner', ['id_kuesioner' => $id])->row();
            $this->kuesioner_model->delete('kuesioner', ['pertanyaan' => $cek->pertanyaan]);
            $this->session->set_flashdata('message', 'Data Berhasil Di Hapus');
            redirect('manajemen_kuesioner/akademik');
        }
    }
    public function kelola($p = null, $q = null, $id = null)
    {
        $p = $this->uri->segment('3');
        $q = $this->uri->segment('2');
        $id = $this->uri->segment('4');
        if (empty($p)) {
            $data['session'] = $this->db->get_where('kuesioner', ['id_kuesioner' => $this->session->userdata('id')])->row_array();
            $data['title'] = 'Manajemen Kuesioner';
            $data['kuesioner'] = $this->kuesioner_model->getDataKuesionerTatakelola(['typeaspek' => $q]);
            $data['aspek'] = $this->db->get('aspek')->result_array();
            $this->pagging('data_master/manajemen_kuesioner/data_kuesioner_kelola', $data);
        } elseif ($p == "tambah") {
            $data['session'] = $this->db->get_where('kuesioner', ['id_kuesioner' => $this->session->userdata('id')])->row_array();
            $data['title'] = 'Tambah Kuesioner';
            $typeaspek = $this->uri->segment('2');

            //$data['aspek'] = $this->db->get('aspek')->result_array();
            $data['aspek'] = $this->kuesioner_model->getAspekByType('aspek', ['typeaspek' => $typeaspek])->result_array();
            //form validasi set rules

            // $this->form_validation->set_rules('bagian', 'Bagian', 'required', [
            //     'required' => 'Bagian tidak boleh kosong',
            // ]);

            $this->form_validation->set_rules('nama_aspek', 'Nama_aspek', 'required', [
                'required' => 'Aspek Penilaian tidak boleh kosong',
            ]);

            $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required', [
                'required' => 'Pertanyaan tidak boleh kosong',
            ]);

            //jika form validasi salah
            if ($this->form_validation->run() == false) {
                $this->pagging('data_master/manajemen_kuesioner/tambah_kuesioner_kelola', $data);

                //jika form validasi benar
            } else {
                $bag = $this->input->post('bagian', true);
                if ($bag == "Dosen") {
                    $lev = "2";
                } else {
                    $lev = "2";
                }
                $data = [
                    "pertanyaan" => $this->input->post('pertanyaan', true),
                    "id_level" => $lev,
                    "id_aspek" => $this->input->post('nama_aspek', true),
                ];
                $this->kuesioner_model->tambahDataKuesioner('kuesioner', $data);
                $this->session->set_flashdata('message', 'Data Berhasil Di Tambahkan');
                redirect('manajemen_kuesioner/kelola');
            }
        } elseif ($p == "edit") {
            $data['session'] = $this->db->get_where('kuesioner', ['id_kuesioner' => $this->session->userdata('id')])->row_array();
            $data['title'] = 'Manajemen Kuesioner';
            $data['kuesioner'] = $this->kuesioner_model->getDataKuesionerById(['id_kuesioner' => $id])->row_array();
            $data['aspek'] = $this->kuesioner_model->getAspekByType('aspek', ['typeaspek' => $q])->result_array();

            //form validasi set rules
            // $this->form_validation->set_rules('bagian', 'Bagian', 'required', [
            //     'required' => 'Bagian tidak boleh kosong',
            // ]);

            $this->form_validation->set_rules('nama_aspek', 'Nama_aspek', 'required', [
                'required' => 'Aspek Penilaian tidak boleh kosong',
            ]);

            $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required', [
                'required' => 'Pertanyaan tidak boleh kosong',
            ]);

            //jika form validasi salah
            if ($this->form_validation->run() == false) {
                $this->pagging('data_master/manajemen_kuesioner/edit_kuesioner_kelola', $data);
                //jika form validasi benar
            } else {
                $bag = $this->input->post('bagian', true);
                if ($bag == "Dosen") {
                    $lev = "2";
                } else {
                    $lev = "2";
                }
                $data = [
                    "pertanyaan" => $this->input->post('pertanyaan', true),
                    "id_level" => $lev,
                    "id_aspek" => $this->input->post('nama_aspek', true),
                ];
                $this->kuesioner_model->update('kuesioner', $data, ['id_kuesioner' => $id]);
                $this->session->set_flashdata('message', 'Data Berhasil Di Edit');
                redirect('manajemen_kuesioner/kelola');
            }
        } elseif ($p == "hapus") {
            $this->kuesioner_model->delete('kuesioner', ['id_kuesioner' => $id]);
            redirect('manajemen_kuesioner/kelola');
        }
    }
}
