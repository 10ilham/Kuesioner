<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{

    public function getDataMahasiswa()
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('level', 'mahasiswa.id_level = level.id_level');
        return $this->db->get()->result_array();
    }

    public function getDataMahasiswaById($id)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('level', 'mahasiswa.id_level = level.id_level');
        $this->db->where(['id_mahasiswa' => $id]);
        return $this->db->get()->row_array();
    }

    public function tambahDataMahasiswa()
    {
        $data = [
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "nama" => $this->input->post('nama', true),
            "kelas" => $this->input->post('kelas', true),
            "program_studi" => $this->input->post('program_studi', true),
            "jk" => $this->input->post('jk', true),
            "foto" => 'default.png',
            "id_level" => 4, // Sesuaikan dengan nilai id_level yang sesuai
            "level" => 'Mahasiswa',
        ];

        $this->db->insert('mahasiswa', $data);
    }

    public function editDataMahasiswa()
    {
        $data = [
            // "id" => null,
            // "username" => $this->input->post('username', true),
            // "password" => $this->input->post('password', true),
            "nama" => $this->input->post('nama', true),
            "kelas" => $this->input->post('kelas', true),
            "program_studi" => $this->input->post('program_studi', true),
            "jk" => $this->input->post('jk', true),
            "foto" => 'default.png',
            "id_level" => 4, // Sesuaikan dengan nilai id_level yang sesuai
            "level" => 'Mahasiswa',
        ];
        $this->db->where('id_mahasiswa', $this->input->post('id')); //Terhubung ke form datamaster/mahasiswa/edit_mahasiswa
        $this->db->update('mahasiswa', $data);
    }

    public function hapusDataMahasiswa($id)
    {
        $this->db->where('id_mahasiswa', $id);
        $this->db->delete('mahasiswa');
    }

    // Terhubung ke Profile.php pada setiap model user
    public function update($table, $field, $data)
    {
        $this->db->where($field);
        $this->db->update($table, $data);
    }

    //Terhubung ke Profile.php 
    public function checkpass($table, $field, $field2)
    {
        $this->db->where($field);
        $this->db->where($field2);
        return $this->db->get($table);
    }
}
