<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Periode_model extends CI_Model
{



    public function getDataPeriode()
    {
        $this->db->select('*');
        $this->db->from('periode');
        return $this->db->get()->result_array();
    }

    public function getDataPeriode_id($id)
    {
        $this->db->select('*');
        $this->db->from('periode');
        $this->db->where(['id_periode' => $id]);
        return $this->db->get()->row_array();
    }

    public function tambahDataPeriode()
    {
        $data = [

            "semester" => $this->input->post('semester', true),
            "tahun_akademik" => $this->input->post('tahun_akademik', true),
            "keterangan" => $this->input->post('keterangan', true),
            "isaktif" => "false"

        ];
        $this->db->insert('periode', $data);
    }

    public function editDataPeriode()
    {
        $data = [

            "semester" => $this->input->post('semester', true),
            "tahun_akademik" => $this->input->post('tahun_akademik', true),
            "keterangan" => $this->input->post('keterangan', true),
            "isaktif" => $this->input->post('isaktif', true)

        ];

        $this->db->where('id_periode', $this->input->post('id'));
        $this->db->update('periode', $data);
    }

    public function hapusDataPeriode($id)
    {
        $this->db->where('id_periode', $id);
        $this->db->delete('periode');
    }
    function update_periode()
    {
        $aktif = $this->input->post('aktif');
        $this->db->set('isaktif', "false");
        $query = $this->db->update('periode');
        return $query;
    }
    function update($table, $data, $field)
    {
        $this->db->where($field);
        $this->db->update($table, $data);
    }
}
