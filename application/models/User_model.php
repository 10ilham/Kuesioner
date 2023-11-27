<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    // ====================================================== //
    //         START----> INI UNTUK DOSEN                     //
    //========================================================//

    // BAGIAN ADMIN

    public function getDataAdmin()
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->join('level', 'admin.id_level = level.id_level');
        return $this->db->get()->result_array();
    }

    public function getDataAdmin_id($id)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->join('level', 'admin.id_level = level.id_level');
        $this->db->where(['id_admin' => $id]);
        return $this->db->get()->row_array();
    }

    //BAGIAN USER

    public function getDataUser()
    {
        $this->db->select('*');
        $this->db->from('dosen_staf');
        $this->db->join('level', 'dosen_staf.id_level = level.id_level');
        return $this->db->get()->result_array();
    }

    public function getDataUser_id($id)
    {
        $this->db->select('*');
        $this->db->from('dosen_staf');
        $this->db->join('level', 'dosen_staf.id_level = level.id_level');
        $this->db->where(['id_dosen' => $id]);
        return $this->db->get()->row_array();
    }

    public function tambahDataUser()
    {
        // $bag = $this->input->post('bagian', true);
        // if ($bag == "Dosen") {
        //     $lev = "2";
        // } else {
        //     $lev = "2";
        // }

        $data = [
            // "id_dosen" => null,
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "nama" => $this->input->post('nama', true),
            "matkul" => $this->input->post('matkul', true),
            "program_studi" => $this->input->post('program_studi', true),
            // "bagian" => $bag,
            "ttl" => $this->input->post('ttl', true),
            "jk" => $this->input->post('jk', true),
            "email" => $this->input->post('email', true),
            "telp" => $this->input->post('telp', true),
            "alamat" => $this->input->post('alamat', true),
            "foto" => 'default.png',
            // "id_level" => $lev,
            "id_level" => 2,
            "level" => 'Dosen',

        ];
        $this->db->insert('dosen_staf', $data);
    }

    public function editDataUser()
    {
        // $bag = $this->input->post('bagian', true);
        // if ($bag == "Dosen") {
        //     $lev = "2";
        // } else {
        //     $lev = "2";
        // }

        $data = [

            // "password" => $this->input->post('password', true),
            "nama" => $this->input->post('nama', true),
            "matkul" => $this->input->post('matkul', true),
            "program_studi" => $this->input->post('program_studi', true),
            // "bagian" => $bag,
            "ttl" => $this->input->post('ttl', true),
            "jk" => $this->input->post('jk', true),
            "email" => $this->input->post('email', true),
            "telp" => $this->input->post('telp', true),
            "alamat" => $this->input->post('alamat', true),
            "foto" => 'default.png',
            "id_level" => 2, // Sesuaikan dengan nilai id_level yang sesuai
            "level" => 'Dosen',
            // "id_level" => $lev,
        ];

        $this->db->where('id_dosen', $this->input->post('id'));
        $this->db->update('dosen_staf', $data);
    }

    // Fungsi cek email yang terhubung ke Manajemen_user.php.php
    public function check_email($email, $id)
    {
        return $this->db->get_where('dosen_staf', ['email' => $email, 'id_dosen !=' => $id])->row_array();
    }

    public function hapusDataUser($id)
    {
        $this->db->where('id_dosen', $id);
        $this->db->delete('dosen_staf');
    }

    // ====================================================== //
    //         FINISH----> INI UNTUK DOSEN                     //
    //========================================================//

    public function update($table, $field, $data)
    {
        $this->db->where($field);
        $this->db->update($table, $data);
    }
    public function checkpass($table, $field, $field2)
    {
        $this->db->where($field);
        $this->db->where($field2);
        return $this->db->get($table);
    }

    public function getDataUmum()
    {
        $this->db->select('*');
        $this->db->from('umum');
        $this->db->join('level', 'umum.id_level = level.id_level');
        return $this->db->get()->result_array();
    }

    public function getDataUmum_id($id)
    {
        $this->db->select('*');
        $this->db->from('umum');
        $this->db->join('level', 'umum.id_level = level.id_level');
        $this->db->where(['username' => $id]);
        return $this->db->get()->row_array();
    }
}
