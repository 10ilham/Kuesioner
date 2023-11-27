<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaprodi_model extends CI_Model
{
    public function getDataKaprodi()
    {
        $this->db->select('*');
        $this->db->from('kaprodi');
        $this->db->join('level', 'kaprodi.id_level = level.id_level');
        return $this->db->get()->result_array();
    }

    public function getDataKaprodiById($id)
    {
        $this->db->select('*');
        $this->db->from('kaprodi');
        $this->db->join('level', 'kaprodi.id_level = level.id_level');
        $this->db->where(['id_kaprodi' => $id]);
        return $this->db->get()->row_array();
    }

    // public function tambahDataKaprodi()
    // {
    //     $data = [
    //         "id" => null,
    //         "username" => $this->input->post('username', true),
    //         "nama" => $this->input->post('nama', true),
    //         "ttl" => $this->input->post('ttl', true),
    //         "jk" => $this->input->post('jk', true),
    //         "foto" => 'default.png',
    //         "id_level" => 3, // Sesuaikan dengan nilai id_level yang sesuai
    //         "level" => 'Kaprodi',
    //     ];

    //     $this->db->insert('kaprodi', $data);
    // }

    public function editDataKaprodi()
    {
        $data = [
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "nama" => $this->input->post('nama', true),
            "program_studi" => $this->input->post('program_studi', true),
            "ttl" => $this->input->post('ttl', true),
            "jk" => $this->input->post('jk', true),
            "email" => $this->input->post('email', true),
            "telp" => $this->input->post('telp', true),
            "alamat" => $this->input->post('alamat', true),
            "foto" => 'default.png',
            "id_level" => 3, // Sesuaikan dengan nilai id_level yang sesuai
            "level" => 'Kaprodi',
        ];
        $this->db->where('id_kaprodi', $this->input->post('id_kaprodi')); //Terhubung ke form datamaster/kaprodi/edit_kaprodi
        $this->db->update('kaprodi', $data);
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

    // public function hapusDataKaprodi($id)
    // {
    //     // $this->db->delete('mahasiswa', ['username' => $id]);
    //     $this->db->where('id', $id);
    //     $this->db->delete('kaprodi');
    // }
}
