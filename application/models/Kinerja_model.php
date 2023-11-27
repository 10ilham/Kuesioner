<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kinerja_model extends CI_model
{
    function getData($table, $field)
    {
        $query = $this->db->select($field)->distinct($field)->from($table)->get();
        return $query;
    }
    function getPeriodeByST($table, $field)
    {
        return $this->db->get_where($table, $field);
    }
    public function getDataTP($id_periode)
    {
        $this->db->select('*');
        $this->db->from('komentar');
        // $this->db->where(['typeaspek' => 'kelola']);
        $this->db->where('typeaspek', 'kelola');
        // $this->db->where('id_level', $id_level);
        $this->db->where('id_periode', $id_periode);
        return $this->db->get()->result_array();
    }

    public function getDataAkademik($id_periode)
    {
        $this->db->select('*');
        $this->db->from('komentar');
        $this->db->where(['typeaspek' => 'akademik']);
        $this->db->where('id_periode', $id_periode);
        return $this->db->get()->result_array();
    }
}
