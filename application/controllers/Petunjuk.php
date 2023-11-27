<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petunjuk extends My_Controller
{
    public function index()
    {
        $data['session'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id')])->row_array();
        $data['title'] = "Petunjuk Aplikasi";
        $this->pagging('petunjuk/petunjuk_aplikasi', $data);
    }
}
