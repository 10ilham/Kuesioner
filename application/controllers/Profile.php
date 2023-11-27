<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('mahasiswa_model');
        $this->load->model('kaprodi_model');
    }


    // Admin

    public function index()
    {
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $id = $this->session->userdata('id');
        $data['admin'] = $this->user_model->getDataAdmin_id($id);
        $data['title'] = 'Profile';
        $this->pagging('profile/profile_admin', $data);
    }

    public function edit_admin()
    {
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $id = $this->session->userdata('id');
        $data['admin'] = $this->user_model->getDataAdmin_id($id);
        $data['title'] = 'Edit Profile';

        //form validasi set rules
        $this->form_validation->set_rules('nama', 'nama_admin', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('username', 'username_admin', 'required|trim', [
            'required' => 'Username tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('telp', 'telp', 'numeric|trim', [
            'numeric' => 'No Telepon diisi dengan format angka'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email', [
            'valid_email' => 'Harus di isi dengan format email'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
            $this->pagging('profile/edit_admin', $data);

            //jika form validasi benar
        } else {

            $config['allowed_types'] = 'gif|jpg|png';
            // $config['max_size']      = '2048';
            // $config['file_name']       = $this->input->post('id');
            $config['upload_path']   = './assets/uploads/admin/';
            $config['overwrite'] = TRUE;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                if (empty($_FILES['foto']['name'])) {
                    $image = $this->input->post('old_image');
                } else {
                    $image = $this->upload->data('file_name');
                }
            } else {
                $image = $this->input->post('old_image');
                echo $this->upload->display_errors();
            }

            $id = $this->input->post('id');
            $post = $this->input->post();
            $data = [
                'username_admin' => $post['username'],
                'nama_admin' => $post['nama'],
                'ttl' => $post['ttl'],
                'jk' => $post['jk'],
                'email' => $post['email'],
                'telp' => $post['telp'],
                'alamat' => $post['alamat'],
                'foto_admin' => $image
            ];
            $this->user_model->update('admin', ['id_admin' => $id], $data);
            $this->session->unset_userdata('foto');
            $this->session->unset_userdata('nama');
            $this->session->set_userdata(['foto' => $data['foto_admin'], 'nama' => $data['nama_admin']]);
            redirect('profile');
        }
    }

    public function change_passwordAdmin()
    {
        $data['title'] = 'Edit Profil';
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $id = $this->session->userdata('id');
        $data['admin'] = $this->user_model->getDataAdmin_id($id);

        //form validasi set rules
        $this->form_validation->set_rules('pw_baru', 'pw_baru', 'required|min_length[3]', [
            'required' => 'Password baru tidak boleh kosong',
            'min_length' => 'Harus di isi minimal 3 Karakter',
        ]);
        $this->form_validation->set_rules('pw_baru2', 'pw_baru2', 'required|min_length[3]|matches[pw_baru]', [
            'required' => 'Ulangi password tidak boleh kosong',
            'min_length' => 'Harus di isi minimal 3 Karakter',
            'matches' => 'Password tidak sama'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_gagal', 'Password Gagal Di Edit');
            $this->pagging('profile/edit_admin', $data);
        } else {
            $password_baru = $this->input->post('pw_baru');
            $password_sekarang = $password_baru;

            $this->db->set('password_admin', $password_sekarang);
            $this->db->where('id_admin', $this->session->userdata('id'));
            $this->db->update('admin');
            $this->session->set_flashdata('message', 'Password Berhasil Di Edit');
            redirect('profile');

            // if ($this->form_validation->run() == FALSE) {
            //     $this->session->set_flashdatagagal('message_gagal', 'Password Gagal Di Edit');
            //     $this->pagging('profile/edit_admin', $data);

            //     //jika form validasi benar
            // } else {
            //     $password_baru = $this->input->post('pw_baru');
            //     $password_sekarang = $password_baru;

            //     $this->db->set('password_admin', $password_sekarang);
            //     $this->db->where('id_admin', $this->session->userdata('id'));
            //     $this->db->update('admin');
            //     $this->session->set_flashdata('message', 'Password Berhasil Di Edit');
            //     redirect('profile');
            // }
        }
    }

    //Dosen dan Staff

    public function user($p = null, $q = null)
    {
        $p = $this->uri->segment('3');
        if (empty($p)) {
            $data['session'] = $this->db->get_where('dosen_staf', ['id_dosen' => $this->session->userdata('id_dosen')])->row_array();
            $id = $this->session->userdata('id_dosen');
            $data['user'] = $this->user_model->getDataUser_id($id);
            // $where = $this->session->userdata('id_dosen');
            $data['title'] = '';
            $this->pagging('profile/profile_user', $data);
        } elseif ($p == "edit") {
            $data['session'] = $this->db->get_where('dosen_staf', ['id_dosen' => $this->session->userdata('id_dosen')])->row_array();
            $id = $this->session->userdata('id_dosen');
            $data['user'] = $this->user_model->getDataUser_id($id);
            $data['title'] = 'Profile';

            //form validasi set rules
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
                'required' => 'Nama tidak boleh kosong'
            ]);

            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email', [
                'valid_email' => 'Harus di isi dengan format email'
            ]);

            $this->form_validation->set_rules('telp', 'Telp', 'numeric', [
                'numeric' => 'Harus di isi dengan format angka'
            ]);
            if ($this->form_validation->run() == FALSE) {
                $this->pagging('profile/edit_user', $data);
                //jika form validasi benar
            } else {

                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                // $config['file_name']       = $this->input->post('id');
                $config['upload_path']   = './assets/uploads/user/';
                $config['overwrite'] = TRUE;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {

                    if (empty($_FILES['foto']['name'])) {
                        $image = $this->input->post('old_image');
                    } else {
                        $image = $this->upload->data('file_name');
                    }
                } else {
                    $image = $this->input->post('old_image');
                    echo $this->upload->display_errors();
                }

                $id = $this->input->post('id');
                $post = $this->input->post();
                $data = [
                    'nama' => $post['nama'],
                    'ttl' => $post['ttl'],
                    'jk' => $post['jk'],
                    'email' => $post['email'],
                    'telp' => $post['telp'],
                    'alamat' => $post['alamat'],
                    'foto' => $image
                ];
                $this->user_model->update('dosen_staf', ['id_dosen' => $id], $data);
                $this->session->unset_userdata('foto');
                $this->session->unset_userdata('nama');
                $this->session->set_userdata(['foto' => $data['foto'], 'nama' => $data['nama']]);
                redirect('profile/user');
            }
        }
    }

    //Kaprodi

    public function kaprodi($p = null, $q = null)
    {
        $p = $this->uri->segment('3');
        if (empty($p)) {
            $data['session'] = $this->db->get_where('kaprodi', ['id_kaprodi' => $this->session->userdata('id_kaprodi')])->row_array();
            $id = $this->session->userdata('id_kaprodi');
            $data['kaprodi'] = $this->kaprodi_model->getDataKaprodiById($id);
            $where = $this->session->userdata('id_kaprodi');
            $data['title'] = 'Kuesioner | Profile';
            $this->pagging('profile/profile_kaprodi', $data);
        } elseif ($p == "edit") {
            $data['session'] = $this->db->get_where('kaprodi', ['id_kaprodi' => $this->session->userdata('id_kaprodi')])->row_array();
            $id = $this->session->userdata('id_kaprodi');
            $data['kaprodi'] = $this->kaprodi_model->getDataKaprodiById($id);
            $data['title'] = 'Kuesioner | Profile';

            //form validasi set rules
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
                'required' => 'Nama tidak boleh kosong'
            ]);
            $this->form_validation->set_rules('program_studi', 'Program_studi', 'required|trim', [
                'required' => 'Program Studi tidak boleh kosong'
            ]);
            $this->form_validation->set_rules('jk', 'Jk', 'required|trim', [
                'required' => 'Jenis kelamin tidak boleh kosong'
            ]);

            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email', [
                'valid_email' => 'Harus di isi dengan format email'
            ]);

            $this->form_validation->set_rules('telp', 'Telp', 'numeric', [
                'numeric' => 'Harus di isi dengan format angka'
            ]);

            $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
                'required' => 'Alamat tidak boleh kosong'
            ]);
            if ($this->form_validation->run() == FALSE) {
                $this->pagging('profile/edit_kaprodi', $data);
                //jika form validasi benar
            } else {

                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['file_name']       = $this->input->post('id');
                $config['upload_path']   = './assets/uploads/user/';
                $config['overwrite'] = TRUE;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {

                    if (empty($_FILES['foto']['name'])) {
                        $image = $this->input->post('old_image');
                    } else {
                        $image = $this->upload->data('file_name');
                    }
                } else {
                    $image = $this->input->post('old_image');
                    echo $this->upload->display_errors();
                }

                $id = $this->input->post('id');
                $post = $this->input->post();
                $data = [
                    'nama' => $post['nama'],
                    'program_studi' => $post['program_studi'],
                    'ttl' => $post['ttl'],
                    'jk' => $post['jk'],
                    'email' => $post['email'],
                    'telp' => $post['telp'],
                    'alamat' => $post['alamat'],
                    'foto' => $image
                ];
                $this->kaprodi_model->update('kaprodi', ['id_kaprodi' => $id], $data);
                $this->session->unset_userdata('foto');
                $this->session->unset_userdata('nama');
                $this->session->set_userdata(['foto' => $data['foto'], 'nama' => $data['nama']]);
                redirect('profile/kaprodi');
            }
        }
    }

    public function mahasiswa($p = null, $q = null)
    {
        $p = $this->uri->segment('3');
        if (empty($p)) {
            $data['session'] = $this->db->get_where('mahasiswa', ['id_mahasiswa' => $this->session->userdata('username')])->row_array();
            $id = $this->session->userdata('id_mahasiswa');
            $data['mahasiswa'] = $this->mahasiswa_model->getDataMahasiswaById($id);
            $data['title'] = 'Kuesioner | Profile';
            $this->pagging('profile/profile_mahasiswa', $data);
        } elseif ($p == "edit") {
            $data['session'] = $this->db->get_where('mahasiswa', ['id_mahasiswa' => $this->session->userdata('username')])->row_array();
            $id = $this->session->userdata('id_mahasiswa');
            $data['mahasiswa'] = $this->mahasiswa_model->getDataMahasiswaById($id);
            $data['title'] = 'Kuesioner | Profile';

            //form validasi set rules
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
                'required' => 'Nama tidak boleh kosong'
            ]);
            $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', [
                'required' => 'Program Studi tidak boleh kosong'
            ]);
            $this->form_validation->set_rules('program_studi', 'Program_studi', 'required|trim', [
                'required' => 'Program Studi tidak boleh kosong'
            ]);
            $this->form_validation->set_rules('jk', 'Jk', 'required|trim', [
                'required' => 'Jenis kelamin tidak boleh kosong'
            ]);
            if ($this->form_validation->run() == FALSE) {
                $this->pagging('profile/edit_mahasiswa', $data);
                //jika form validasi benar
            } else {

                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                // $config['file_name']       = $this->input->post('id');
                $config['upload_path']   = './assets/uploads/user/';
                $config['overwrite'] = TRUE;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {

                    if (empty($_FILES['foto']['name'])) {
                        $image = $this->input->post('old_image');
                    } else {
                        $image = $this->upload->data('file_name');
                    }
                } else {
                    $image = $this->input->post('old_image');
                    echo $this->upload->display_errors();
                }

                $id = $this->input->post('id');
                $post = $this->input->post();
                $data = [
                    'nama' => $post['nama'],
                    'kelas' => $post['kelas'],
                    'program_studi' => $post['program_studi'],
                    'jk' => $post['jk'],
                    'foto' => $image
                ];
                $this->mahasiswa_model->update('mahasiswa', ['id_mahasiswa' => $id], $data);
                $this->session->unset_userdata('foto');
                $this->session->unset_userdata('nama');
                $this->session->set_userdata(['foto' => $data['foto'], 'nama' => $data['nama']]);
                redirect('profile/mahasiswa');
            }
        }
    }
    // public function mahasiswa()
    // {
    //     $data['session'] = $this->db->get_where('mahasiswa', ['username' => $this->session->userdata('id')])->row_array();
    //     $id = $this->session->userdata('username');
    //     $data['mahasiswa'] = $this->user_model->getDataMahasiswa_id($id);
    //     $data['title'] = 'Profile';
    //     $this->pagging('profile/profile_mahasiswa', $data);
    // }


    public function umum()
    {
        $data['session'] = $this->db->get_where('umum', ['username' => $this->session->userdata('id')])->row_array();
        $id = $this->session->userdata('username');
        $data['umum'] = $this->user_model->getDataUmum_id($id);
        $data['title'] = 'Profile';
        $this->pagging('profile/profile_umum', $data);
    }
}
