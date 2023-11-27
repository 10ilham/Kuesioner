<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen_user extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    // ====================================================== //
    //            START ---->  INI UNTUK ADMIN                //
    //========================================================//


    // BAGIAN USER
    public function index()
    {
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'Manajemen User';
        $data['user'] = $this->user_model->getDataUser();
        $this->pagging('data_master/user/data_user', $data);
    }

    public function tambah_user()
    {
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'Tambah User';

        //form validasi set rules

        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[dosen_staf.username]|numeric', [
            'required' => 'NID/ NIP tidak boleh kosong',
            'is_unique' => 'NID/ NIP sudah dipakai',
            'numeric' => 'Harus di isi dengan format angka'
        ]);

        // Relasi ke mahasiwa untuk username
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[mahasiswa.username]|numeric', [
            'required' => 'NIDN tidak boleh kosong',
            'is_unique' => 'NIDN sudah dipakai sama dengan NIM pada Mahasiswa',
            'numeric' => 'Harus di isi dengan format angka'
        ]);

        // 'trim' menghilangkan spasi ekstra yang diinput oleh pengguna secara tidak sengaja.
        $this->form_validation->set_rules('password', 'Password', 'required|trim|numeric', [
            'required' => 'Password tidak boleh kosong',
            'numeric' => 'Harus di isi dengan format angka'
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('matkul', 'Matkul', 'required|trim', [
            'required' => 'Matkul tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[dosen_staf.email]', [
            'valid_email' => 'Harus di isi dengan format email',
            'is_unique' => 'Email sudah dipakai'
        ]);

        $this->form_validation->set_rules('telp', 'Telp', 'numeric', [
            'numeric' => 'Harus di isi dengan format angka'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->pagging('data_master/user/tambah_user', $data);

            //jika form validasi benar
        } else {
            $this->user_model->tambahDatauser();
            $this->session->set_flashdata('message', 'Data Berhasil Di Tambahkan');
            redirect('manajemen_user/index');
        }
    }

    public function edit_user($id)
    {
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'Edit User';
        $data['user'] = $this->user_model->getDatauser_id($id);

        //form validasi set rules
        // 'trim' menghilangkan spasi ekstra yang diinput oleh pengguna secara tidak sengaja.
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);

        // Untuk cek validasi email
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|callback_check_email[' . $id . ']', [
            'valid_email' => 'Harus di isi dengan format email',
            'check_email' => 'Email sudah dipakai'
        ]);

        $this->form_validation->set_rules('telp', 'Telp', 'numeric', [
            'numeric' => 'Harus di isi dengan format angka'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
            $this->pagging('data_master/user/edit_user', $data);

            //jika form validasi benar
        } else {
            $this->user_model->editDatauser();
            $this->session->set_flashdata('message', 'Data Berhasil Di Edit');
            redirect('manajemen_user');
        }
    }

    // Fungsi cek email yang terhubung ke User_model.php
    public function check_email($email, $id)
    {
        $existing_email = $this->user_model->check_email($email, $id);

        if ($existing_email) {
            $this->form_validation->set_message('check_email', 'Email sudah dipakai');
            return false;
        } else {
            return true;
        }
    }

    public function hapus_user($id)
    {
        $this->user_model->hapusDatauser($id);
        $this->session->set_flashdata('message', 'Data Berhasil Di Hapus');
        redirect('manajemen_user/index');
    }

    public function detail_user($id)
    {
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['title'] = 'Detail User';
        $data['user'] = $this->user_model->getDatauser_id($id);
        $this->pagging('data_master/user/detail_user', $data);
    }

    // ======================================================  //
    //            FINISH ---->  INI UNTUK ADMIN                //
    //========================================================//

}
