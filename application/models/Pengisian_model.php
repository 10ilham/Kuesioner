<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengisian_model extends CI_model
{
    function showIsActive($table, $field)
    {
        return $this->db->get_where($table, $field);
    }
    function getAspekByType($table, $field)
    {
        return $this->db->get_where($table, $field);
    }
    function getAspekByTypee($table, $field)
    {
        $this->db->where($field);
        return $this->db->get($table);
    }
    function getAnserById($table, $field)
    {
        return $this->db->get_where($table, $field);
    }
    function inputAnswer($table, $data)
    {
        return $this->db->insert_batch($table, $data);
    }
    function tambahSaran($table, $data)
    {
        return $this->db->insert($table, $data);
    }
}
