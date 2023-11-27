<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen_periode extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('periode_model');
    }

    public function index()
    {
        $data['session'] = $this->db->get_where('periode', ['id_periode' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'Manajemen Periode';
        $data['periode'] = $this->periode_model->getDataPeriode();
        $this->pagging('manajemen_periode/data_periode', $data);
    }

    public function tambah_periode()
    {
        $data['session'] = $this->db->get_where('periode', ['id_periode' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'Tambah Periode';

        //form validasi set rules

        $this->form_validation->set_rules('semester', 'Semester', 'required', [
            'required' => 'Semester tidak boleh kosong',
        ]);

        $this->form_validation->set_rules('tahun_akademik', 'Tahun_akademik', 'required|trim', [
            'required' => 'Tahun Akademik tidak boleh kosong'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->pagging('manajemen_periode/tambah_periode', $data);

            //jika form validasi benar
        } else {
            $this->periode_model->tambahDataPeriode();
            $this->session->set_flashdata('message', 'Data Berhasil Di Tambahkan');
            redirect('manajemen_periode/index');
        }
    }

    public function edit_periode($id)
    {
        $data['session'] = $this->db->get_where('periode', ['id_periode' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'Edit Periode';
        $data['periode'] = $this->periode_model->getDataPeriode_id($id);

        //form validasi set rules
        $this->form_validation->set_rules('semester', 'Semester', 'required', [
            'required' => 'Semester tidak boleh kosong',
        ]);

        $this->form_validation->set_rules('tahun_akademik', 'tahun_akademik', 'required|trim', [
            'required' => 'Tahun Akademik tidak boleh kosong'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
            $this->pagging('manajemen_periode/edit_periode', $data);

            //jika form validasi benar
        } else {
            $this->periode_model->editDataPeriode();
            $this->session->set_flashdata('message', 'Data Berhasil Di Edit');
            redirect('manajemen_periode/index');
        }
    }

    public function hapus_periode($id)
    {
        $this->periode_model->hapusDataPeriode($id);
        $this->session->set_flashdata('message', 'Data Berhasil Di Hapus');
        redirect('manajemen_periode/index');
    }
    function update($id)
    {
        $this->periode_model->update_periode();
        $this->periode_model->update('periode', ['isaktif' => "true"], ['id_periode' => $id]);
        redirect('manajemen_periode');
    }
}
