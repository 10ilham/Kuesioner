<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuesioner_model extends CI_Model
{

    function getAspekByType($table, $field)
    {
        return $this->db->get_where($table, $field);
    }

    public function getDataKuesionerAkademik()
    {
        $this->db->select('*');
        $this->db->from('kuesioner');
        $this->db->join('aspek', 'aspek.id_aspek = kuesioner.id_aspek');
        $this->db->join('level', 'kuesioner.id_level = level.id_level');
        $this->db->where(['typeaspek' => "akademik"]);
        $this->db->group_by('pertanyaan');
        $this->db->order_by('kuesioner.id_level', "ASC");
        return $this->db->get()->result_array();
    }

    public function getDataKuesionerTatakelola()
    // public function getDataKuesionerTatakelola($field)
    {
        $this->db->select('*');
        $this->db->from('kuesioner');
        $this->db->join('aspek', 'aspek.id_aspek = kuesioner.id_aspek');
        $this->db->join('level', 'kuesioner.id_level = level.id_level');
        $this->db->where(['typeaspek' => "kelola"]);
        $this->db->group_by('pertanyaan');
        $this->db->order_by('kuesioner.id_level', "ASC");
        // $this->db->where($field);
        return $this->db->get()->result_array();
    }

    public function getDataKuesionerById($field1)
    {
        return $this->db->get_where('kuesioner', $field1);
    }

    // update data
    public function update($table, $data, $field)
    {
        $this->db->where($field);
        $this->db->update($table, $data);
    }
    // hapus data
    public function delete($table, $field)
    {
        $this->db->where($field);
        $this->db->delete($table);
    }
    // getter data by id
    public function getKuesionerById($table, $field1)
    {
        return $this->db->get_where($table, $field1);
    }
    public function getDataPeriode_id($id)
    {
        $this->db->select('*');
        $this->db->from('periode');
        $this->db->where(['id_periode' => $id]);
        return $this->db->get()->row_array();
    }

    public function tambahDataKuesionerAkademik()
    {
        $data = [
            "pertanyaan" => $this->input->post('pertanyaan', true),
            "id_level" => '4',
            "id_aspek" => $this->input->post('nama_aspek', true),
        ];
        $this->db->insert('kuesioner', $data);
    }
    public function tambahDataKuesionerPendidikan()
    {
        $data = [
            "pertanyaan" => $this->input->post('pertanyaan', true),
            "id_level" => '5',
            "id_aspek" => $this->input->post('nama_aspek', true),
        ];
        $this->db->insert('kuesioner', $data);
    }


    public function tambahDataKuesioner($table, $data)
    {

        $this->db->insert($table, $data);
    }

    public function editDataPeriode()
    {
        $data = [

            "semester" => $this->input->post('semester', true),
            "tahun_angkatan" => $this->input->post('tahun_angkatan', true),
            "keterangan" => $this->input->post('keterangan', true),

        ];

        $this->db->where('id_periode', $this->input->post('id'));
        $this->db->update('periode', $data);
    }

    public function hapusDataKuesionerAkademik($id)
    {
        $this->db->where('id_kuesioner', $id);
        $this->db->delete('kuesioner');
    }
}
