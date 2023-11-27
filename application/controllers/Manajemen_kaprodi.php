<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen_kaprodi extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kaprodi_model');
    }

    // BAGIAN USER
    public function index()
    {
        $data['title'] = 'Manajemen Kaprodi';
        $data['kaprodi'] = $this->kaprodi_model->getDataKaprodi();
        $this->pagging('data_master/kaprodi/data_kaprodi', $data);
    }

    public function edit_kaprodi($id)
    {
        $data['title'] = 'Edit Kaprodi';
        $data['kaprodi'] = $this->kaprodi_model->getDataKaprodiById($id);

        //form validasi set rules

        $this->form_validation->set_rules('password', 'Password', 'required|trim|numeric', [
            'required' => 'Password tidak boleh kosong',
            'numeric' => 'Harus di isi dengan format angka'
        ]);

        // 'trim' menghilangkan spasi ekstra yang diinput oleh pengguna secara tidak sengaja.
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);

        // Program Studi yang diampu
        $this->form_validation->set_rules('program_studi', 'Program_studi', 'required', [
            'required' => 'Program studi tidak boleh kosong',
        ]);

        $this->form_validation->set_rules('ttl', 'Ttl', 'required', [
            'required' => 'Tanggal lahir tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('jk', 'Jk', 'required', [
            'required' => 'Jenis kelamin tidak boleh kosong',
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required', [
            'required' => 'Email tidak boleh kosong',
        ]);

        $this->form_validation->set_rules('telp', 'Telp', 'numeric', [
            'numeric' => 'Harus di isi dengan format angka'
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat tidak boleh kosong',
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
            $this->pagging('data_master/kaprodi/edit_kaprodi', $data);

            //jika form validasi benar
        } else {
            $this->kaprodi_model->editDataKaprodi();
            $this->session->set_flashdata('message', 'Data Berhasil Di Edit');
            redirect('manajemen_kaprodi/index');
        }
    }


    // public function hapus_kaprodi($id)
    // {
    //     $this->kaprodi_model->hapusDataKaprodi($id);
    //     $this->session->set_flashdata('message', ' Di Hapus');
    //     redirect('manajemen_kaprodi/index');
    // }

    public function detail_kaprodi($id)
    {
        $data['title'] = 'Detail Kaprodi';
        $data['kaprodi'] = $this->kaprodi_model->getDataKaprodiById($id);
        $this->pagging('data_master/kaprodi/detail_kaprodi', $data);
    }

    // ======================================================  //
    //            FINISH ---->  INI UNTUK ADMIN                //
    //========================================================//


}
