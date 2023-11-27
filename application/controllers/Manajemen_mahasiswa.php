<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen_mahasiswa extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mahasiswa_model');
    }

    public function index()
    {
        $data['title'] = 'Manajemen Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswa_model->getDataMahasiswa();
        $this->pagging('data_master/mahasiswa/data_mahasiswa', $data);
    }

    public function tambah_mahasiswa()
    {
        $data['title'] = 'Tambah Mahasiswa';

        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[mahasiswa.username]|numeric', [
            'required' => 'NIM tidak boleh kosong',
            'is_unique' => 'NIM sudah dipakai',
            'numeric' => 'Harus di isi dengan format angka'
        ]);

        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[dosen_staf.username]|numeric', [
            'required' => 'NIM tidak boleh kosong',
            'is_unique' => 'NIM sudah dipakai sama dengan NIDN pada Dosen',
            'numeric' => 'Harus di isi dengan format angka'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|numeric', [
            'required' => 'Password tidak boleh kosong',
            'numeric' => 'Harus di isi dengan format angka'
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('program_studi', 'Program_studi', 'required|trim', [
            'required' => 'Prodi tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', [
            'required' => 'Kelas tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('jk', 'Jk', 'required|trim', [
            'required' => 'Jenis kelamin tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            echo validation_errors();
            $this->pagging('data_master/mahasiswa/tambah_mahasiswa', $data);
        } else {
            $this->mahasiswa_model->tambahDataMahasiswa();
            $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
            redirect('manajemen_mahasiswa/index');
        }
    }


    public function edit_mahasiswa($id)
    {
        $data['title'] = 'Edit Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswa_model->getDataMahasiswaById($id);

        // Change 'nama_user' to 'nama'
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('program_studi', 'Program_studi', 'required|trim', [
            'required' => 'Prodi tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', [
            'required' => 'Kelas tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('jk', 'Jk', 'required|trim', [
            'required' => 'Jenis kelamin tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->pagging('data_master/mahasiswa/edit_mahasiswa', $data);
        } else {
            $this->mahasiswa_model->editDataMahasiswa($id);
            $this->session->set_flashdata('message', 'Data Berhasil Di Edit');
            redirect('manajemen_mahasiswa/index');
        }
    }

    public function hapus_mahasiswa($id)
    {
        $this->mahasiswa_model->hapusDataMahasiswa($id);
        $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
        redirect('manajemen_mahasiswa/index');
    }

    public function detail_mahasiswa($id)
    {
        $data['title'] = 'Detail Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswa_model->getDataMahasiswaById($id);
        $this->pagging('data_master/mahasiswa/detail_mahasiswa', $data);
    }
}
