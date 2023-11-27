<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        $data['title'] = 'Login User';

        //SESSION
        if ($this->session->userdata('username')) {
            redirect('dashboard');
        }

        //form validasi set rules
        $this->form_validation->set_rules('username', 'username', 'required|trim|numeric', [
            'required' => 'Username tidak boleh kosong',
            'numeric' => 'Format NIDN harus berupa angka'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim|numeric', [
            'required' => 'Password tidak boleh kosong',
            'numeric' => 'Format NIDN harus berupa angka'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->load->view('login/login', $data);

            //jika form validasi benar
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->db->get_where('dosen_staf', ['username' => $username])->row_array();
            $level = $this->db->get_where('level', ['id_level' => $user['id_level']])->row_array();
            //jika user  ada
            if ($user) {
                //cek password
                if ($password == $user['password']) {
                    // if ($user['id_level'] == 2) {
                    // $userdosen = $this->db->get_where('dosen_staf', ['username' => $username])->row_array();
                    // $data = [
                    //     'id_dosen' => $userdosen['id_dosen'],
                    //     'username' => $username,
                    //     'password' => $password,
                    //     'id_level' => $user['id_level'],
                    //     'nama_user' => $userdosen['nama_user'],
                    //     'foto' => $userdosen['foto'],
                    //     'level' => $level['level']
                    // ];
                    $data = [
                        'id_dosen' => $user['id_dosen'],
                        'username' => $username,
                        'password' => $password,
                        'id_level' => $user['id_level'],
                        'nama' => $user['nama'], //Ketampilan login dosen disidebar mempengaruhi
                        'foto' => $user['foto'],
                        'level' => $level['level']
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard/dosen');
                    // } else {
                    //     $userstaff = $this->db->get_where('dosen_staf', ['username' => $username])->row_array();
                    //     $data = [
                    //         'username' => $user['username'],
                    //         'id_level' => $user['id_level'],
                    //         'nama' => $userstaff['nama_user'],
                    //         'foto' => $userstaff['foto'],
                    //         'level' => $level['level']
                    //     ];
                    //     $this->session->set_userdata($data);
                    //     redirect('dashboard/staff');
                    // }
                    //password salah
                } else {
                    $this->session->set_flashdata('error_message', '<div class="alert alert-danger" align="center" role="alert">Password salah!</div>');
                    redirect('login');
                }
                //User tidak ada
            } else {
                $this->session->set_flashdata('error_message', '<div class="alert alert-danger" align="center" role="alert">Akun ini tidak ada di database</div>');
                redirect('login');
            }
        }
    }

    function admin()
    {
        $data['title'] = 'Login User';
        // SESSION
        if ($this->session->userdata('username')) {
            redirect('dashboard');
        }
        // Form validasi set rules
        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Username tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required', [
            'required' => 'Password tidak boleh kosong'
        ]);

        // Jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->load->view('login/login', $data);

            // Jika form validasi benar
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $admin = $this->db->get_where('admin', ['username_admin' => $username])->row_array();
            //cek level
            $level = $this->db->get_where('level', ['id_level' => $admin['id_level']])->row_array();

            // Jika user ada
            if ($admin) {
                //cek password
                if ($password == $admin['password_admin']) {
                    $data = [
                        'id' => $admin['id_admin'],
                        'username' => $admin['username_admin'],
                        'nama' => $admin['nama_admin'],
                        'jk' => $admin['jk'],
                        'foto' => $admin['foto_admin'],
                        'id_level' => $admin['id_level'],
                        'level' => $level['level'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    // Tampilkan pesan kesalahan jika password salah, Terhubung ke login/login.php
                    $this->session->set_flashdata('error_message', '<div class="alert alert-danger" align="center" role="alert">Password salah!</div>');
                    redirect('login');
                }
            } else {
                // Tampilkan pesan kesalahan jika akun tidak ditemukan di database
                $this->session->set_flashdata('error_message',  '<div class="alert alert-danger" align="center" role="alert">Akun ini tidak ada di database</div>');
                redirect('login');
            }
        }
    }

    function kaprodi()
    {
        $data['title'] = 'Login User';

        //SESSION id_kaprodi terhubung ke file Profile.php dan ke Dashboard.php
        if ($this->session->userdata('username')) {
            redirect('dashboard');
        }

        // Form validasi set rules
        $this->form_validation->set_rules('username', 'username', 'required|trim|numeric', [
            'required' => 'Username tidak boleh kosong',
            'numeric' => 'Format NIDN harus berupa angka'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim|numeric', [
            'required' => 'Password tidak boleh kosong',
            'numeric' => 'Format NIDN harus berupa angka'
        ]);

        // Jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->load->view('login/login', $data);
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $kaprodi = $this->db->get_where('kaprodi', ['username' => $username])->row_array();

            // Jika user ada
            if ($kaprodi) {
                //cek password
                if ($password == $kaprodi['password']) {
                    $data = [
                        'id_kaprodi' => $kaprodi['id_kaprodi'],
                        'username' => $username,
                        'password' => $password,
                        'nama' => $kaprodi['nama'],
                        'foto' => $kaprodi['foto'],
                        'id_level' => '3',
                        'level' => 'Kaprodi',
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard/kaprodi');
                } else {
                    $this->session->set_flashdata('error_message', '<div class="alert alert-danger" align="center" role="alert">Password salah!</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('error_message', '<div class="alert alert-danger" align="center" role="alert">User tidak ditemukan!</div>');
                redirect('login');
            }
        }
    }



    function mahasiswa()
    {
        $data['title'] = 'Login User';

        // SESSION
        if ($this->session->userdata('id_mahasiswa')) {
            redirect('dashboard');
        }

        // form validasi set rules
        $this->form_validation->set_rules('username', 'username', 'required|trim|numeric', [
            'required' => 'NIDN tidak boleh kosong',
            'numeric' => 'Format NIM harus berupa angka'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim|numeric', [
            'required' => 'NIDN tidak boleh kosong',
            'numeric' => 'Format NIM harus berupa angka'
        ]);

        // jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->load->view('login/login', $data);
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $mahasiswa = $this->db->get_where('mahasiswa', ['username' => $username])->row_array();
            // Anda dapat memeriksa lebih banyak aturan atau skenario di sini sesuai kebutuhan
            // Misalnya, memeriksa panjang NIM, atau menggunakan pola tertentu untuk memeriksa format NIM.

            // Jika user ada
            if ($mahasiswa) {
                if ($password == $mahasiswa['password']) {
                    $session_data = [
                        'id_mahasiswa' => $mahasiswa['id_mahasiswa'],
                        'username' => $username, //untuk login
                        'password' => $password,
                        'nama' => $mahasiswa['nama'],
                        'foto' => $mahasiswa['foto'],
                        'id_level' => '4',
                        'level' => 'Mahasiswa',
                    ];
                    $this->session->set_userdata($session_data);
                    redirect('dashboard/mahasiswa');
                } else {
                    $this->session->set_flashdata('error_message', '<div class="alert alert-danger" align="center" role="alert">Password salah!</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('error_message', '<div class="alert alert-danger" align="center" role="alert">User tidak ditemukan!</div>');
                redirect('login');
            }
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">
        Logout Berhasil!</div>');
        redirect('login');
    }
}
