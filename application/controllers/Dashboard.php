<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends My_Controller
{
    public function index()
    {
        $data['title'] = "Kuesioner";
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $this->pagging('dashboard/admin', $data);
    }

    public function kaprodi()
    {
        $data['title'] = "Kuesioner";
        $data['session'] = $this->db->get_where('kaprodi', ['id_kaprodi' => $this->session->userdata('id_kaprodi')])->row_array();
        $this->pagging('dashboard/kaprodi', $data);
    }

    public function dosen()
    {
        $data['title'] = "Kuesioner";
        $data['session'] = $this->db->get_where('dosen_staf', ['id_dosen' => $this->session->userdata('id_dosen')])->row_array();
        $this->pagging('dashboard/dosen', $data);
    }

    public function staff()
    {
        $data['title'] = "Kuesioner";
        $data['session'] = $this->db->get_where('dosen_staf', ['username' => $this->session->userdata('username')])->row_array();
        $this->pagging('dashboard/staff', $data);
    }

    public function mahasiswa()
    {
        $data['title'] = "Kuesioner";
        $data['session'] = $this->db->get_where('mahasiswa', ['id_mahasiswa' => $this->session->userdata('username')])->row_array();
        $this->pagging('dashboard/mahasiswa', $data);
    }

    public function umum()
    {
        $data['title'] = "Kuesioner";
        $data['session'] = $this->db->get_where('umum', ['username' => $this->session->userdata('username')])->row_array();
        $this->pagging('dashboard/umum', $data);
    }
}
