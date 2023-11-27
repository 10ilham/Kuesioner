<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengisian extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('pengisian_model');
    }
    function mahasiswa()
    {
        $data['title'] = "Pengisian Kuesioner";
        $data['a'] = "Layanan Akademik";
        $data['periode'] = $this->pengisian_model->showIsActive('periode', ['isaktif' => true])->row_array();
        $periode = $data['periode'];
        $data['aspek'] = $this->pengisian_model->getAspekByType('aspek', ['typeaspek' => 'akademik'])->result_array();
        $data['answer'] = $this->pengisian_model->getAnserById('respon', ['username' => $this->session->userdata('username'), 'id_periode' => $periode['id_periode']])->row_array();
        $data['total'] = $this->db->query('SELECT jawabanHarapan as harapan, jawabanKenyataan as nyata from respon where username = "' . $this->session->userdata('username') . '" AND id_periode = "' . $periode['id_periode'] . '"');

        $this->form_validation->set_rules('harapan', 'harapan', 'required', [
            'required' => 'Harapan tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('masukan', 'masukan', 'required', [
            'required' => 'Masukan tidak boleh kosong'
        ]);
        if ($this->form_validation->run() == false) {
            $this->pagging('kuesioner/kuesioner', $data);
        }

        //jika form validasi benar
        if (!empty($this->input->post('submitted'))) {

            $aspek = $this->pengisian_model->getAspekByTypee('aspek', ['typeaspek' => 'akademik'])->result_array();

            $id_periode = $this->input->post('id_periode');
            $id_kuesioner = $this->input->post('id_kuesioner');
            $id_aspek = $this->input->post('id_aspek');
            $typeaspek = $this->input->post('typeaspek');
            $username = $this->input->post('username');
            $harapan = $this->input->post('harapan');
            $nyata = $this->input->post('nyata');
            $tharapan = $this->input->post('textharapan');
            $tmasukan = $this->input->post('textmasukan');
            $dataarray = [];
            foreach ($aspek as $asp) {
                $asked = $this->db->query("SELECT * FROM kuesioner where id_aspek = '" . $asp['id_aspek'] . "' AND id_level = '" . $this->session->userdata('id_level') . "'");
                foreach ($asked->result_array() as $ask) {
                    if ($harapan[$ask['id_kuesioner']] == 1) {
                        $k = 1;
                        $c = 0;
                        $b = 0;
                        $sb = 0;
                    } elseif ($harapan[$ask['id_kuesioner']] == 2) {
                        $k = 0;
                        $c = 1;
                        $b = 0;
                        $sb = 0;
                    } elseif ($harapan[$ask['id_kuesioner']] == 3) {
                        $k = 0;
                        $c = 0;
                        $b = 1;
                        $sb = 0;
                    } else {
                        $k = 0;
                        $c = 0;
                        $b = 0;
                        $sb = 1;
                    }
                    if ($nyata[$ask['id_kuesioner']] == 1) {
                        $nk = 1;
                        $nc = 0;
                        $nb = 0;
                        $nsb = 0;
                    } elseif ($nyata[$ask['id_kuesioner']] == 2) {
                        $nk = 0;
                        $nc = 1;
                        $nb = 0;
                        $nsb = 0;
                    } elseif ($nyata[$ask['id_kuesioner']] == 3) {
                        $nk = 0;
                        $nc = 0;
                        $nb = 1;
                        $nsb = 0;
                    } else {
                        $nk = 0;
                        $nc = 0;
                        $nb = 0;
                        $nsb = 1;
                    }
                    array_push($dataarray, [
                        'id_periode' => $id_periode[$ask['id_kuesioner']],
                        'id_kuesioner' => $id_kuesioner[$ask['id_kuesioner']],
                        'id_aspek' => $id_aspek[$ask['id_kuesioner']],
                        'typeaspek' => $typeaspek[$ask['id_kuesioner']],
                        'username' => $username[$ask['id_kuesioner']],
                        'jawabanHarapan' => $harapan[$ask['id_kuesioner']],
                        'harapanK' => $k,
                        'harapanC' => $c,
                        'harapanB' => $b,
                        'harapanSB' => $sb,
                        'jawabanKenyataan' => $nyata[$ask['id_kuesioner']],
                        'kenyataanK' => $nk,
                        'kenyataanC' => $nc,
                        'kenyataanB' => $nb,
                        'kenyataanSB' => $nsb,
                    ]);
                }
            }
            $data = [
                'id_periode' => $periode['id_periode'],
                'typeaspek' => "akademik",
                'masukan' => $tmasukan,
                'harapan' => $tharapan,
                'id_level' => $this->session->userdata('id_level'),
            ];
            $this->pengisian_model->inputAnswer('respon', $dataarray);
            $this->pengisian_model->tambahSaran('komentar', $data);
            $this->session->set_flashdata('message', ' Di Kirim');
            redirect('pengisian/mahasiswa');
        }
    }
    function dosen()
    {
        $data['title'] = "Pengisian Kuesioner";
        $data['a'] = "Tata Kelola";
        $data['periode'] = $this->pengisian_model->showIsActive('periode', ['isaktif' => true])->row_array();
        $periode = $data['periode'];
        $data['aspek'] = $this->pengisian_model->getAspekByType('aspek', ['typeaspek' => 'kelola'])->result_array();
        $data['answer'] = $this->pengisian_model->getAnserById('respon', ['username' => $this->session->userdata('username'), 'id_periode' => $periode['id_periode']])->row_array();


        //menghitung kepuasan pribadi priode sekarang
        $n = $this->db->query("SELECT COUNT(*) as n from kuesioner where id_level = 2")->row_array();
        $data['total'] = $this->db->query('SELECT jawabanHarapan as harapan, jawabanKenyataan as nyata from respon where username = "' . $this->session->userdata('username') . '" AND id_periode = "' . $periode['id_periode'] . '"');
        // $mis = $total['harapan'];
        // $mss = $total['nyata'];
        // $wf = $mis/;        

        $this->form_validation->set_rules('harapan', 'harapan', 'required', [
            'required' => 'Harapan tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('masukan', 'masukan', 'required', [
            'required' => 'Masukan tidak boleh kosong'
        ]);
        if ($this->form_validation->run() == false) {
            $this->pagging('kuesioner/kuesioner', $data);
        }
        if (!empty($this->input->post('submitted'))) {

            $aspek = $this->pengisian_model->getAspekByTypee('aspek', ['typeaspek' => 'kelola'])->result_array();

            $id_periode = $this->input->post('id_periode');
            $id_kuesioner = $this->input->post('id_kuesioner');
            $id_aspek = $this->input->post('id_aspek');
            $typeaspek = $this->input->post('typeaspek');
            $username = $this->input->post('username');
            $harapan = $this->input->post('harapan');
            $nyata = $this->input->post('nyata');
            $tharapan = $this->input->post('textharapan');
            $tmasukan = $this->input->post('textmasukan');
            $dataarray = [];
            foreach ($aspek as $asp) {
                $asked = $this->db->query("SELECT * FROM kuesioner where id_aspek = '" . $asp['id_aspek'] . "' AND id_level = '" . $this->session->userdata('id_level') . "'");
                foreach ($asked->result_array() as $ask) {
                    if ($harapan[$ask['id_kuesioner']] == 1) {
                        $k = 1;
                        $c = 0;
                        $b = 0;
                        $sb = 0;
                    } elseif ($harapan[$ask['id_kuesioner']] == 2) {
                        $k = 0;
                        $c = 1;
                        $b = 0;
                        $sb = 0;
                    } elseif ($harapan[$ask['id_kuesioner']] == 3) {
                        $k = 0;
                        $c = 0;
                        $b = 1;
                        $sb = 0;
                    } else {
                        $k = 0;
                        $c = 0;
                        $b = 0;
                        $sb = 1;
                    }
                    if ($nyata[$ask['id_kuesioner']] == 1) {
                        $nk = 1;
                        $nc = 0;
                        $nb = 0;
                        $nsb = 0;
                    } elseif ($nyata[$ask['id_kuesioner']] == 2) {
                        $nk = 0;
                        $nc = 1;
                        $nb = 0;
                        $nsb = 0;
                    } elseif ($nyata[$ask['id_kuesioner']] == 3) {
                        $nk = 0;
                        $nc = 0;
                        $nb = 1;
                        $nsb = 0;
                    } else {
                        $nk = 0;
                        $nc = 0;
                        $nb = 0;
                        $nsb = 1;
                    }
                    array_push($dataarray, [
                        'id_periode' => isset($id_periode[$ask['id_kuesioner']]) ? $id_periode[$ask['id_kuesioner']] : null,
                        'id_kuesioner' => isset($id_kuesioner[$ask['id_kuesioner']]) ? $id_kuesioner[$ask['id_kuesioner']] : null,
                        'id_aspek' => isset($id_aspek[$ask['id_kuesioner']]) ? $id_aspek[$ask['id_kuesioner']] : null,
                        'typeaspek' => isset($typeaspek[$ask['id_kuesioner']]) ? $typeaspek[$ask['id_kuesioner']] : null,
                        'username' => isset($username[$ask['id_kuesioner']]) ? $username[$ask['id_kuesioner']] : null,
                        'jawabanHarapan' => isset($harapan[$ask['id_kuesioner']]) ? $harapan[$ask['id_kuesioner']] : null,
                        'harapanK' => $k,
                        'harapanC' => $c,
                        'harapanB' => $b,
                        'harapanSB' => $sb,
                        'jawabanKenyataan' => isset($nyata[$ask['id_kuesioner']]) ? $nyata[$ask['id_kuesioner']] : null,
                        'kenyataanK' => $nk,
                        'kenyataanC' => $nc,
                        'kenyataanB' => $nb,
                        'kenyataanSB' => $nsb
                    ]);
                }
            }
            $data = [
                'id_periode' => $periode['id_periode'],
                'typeaspek' => "kelola",
                'masukan' => $tmasukan,
                'harapan' => $tharapan
                // 'id_level' => $this->session->userdata('id_level'),

            ];
            $this->pengisian_model->inputAnswer('respon', $dataarray);
            $this->pengisian_model->tambahSaran('komentar', $data);
            $this->session->set_flashdata('message', ' Di Kirim');
            redirect('pengisian/dosen');
        }
    }
    function staff()
    {
        $data['title'] = "Pengisian Kuesioner";
        $data['a'] = "Tata Pamong dan Tata Kelola";
        $data['periode'] = $this->pengisian_model->showIsActive('periode', ['isaktif' => true])->row_array();
        $periode = $data['periode'];
        $data['aspek'] = $this->pengisian_model->getAspekByType('aspek', ['typeaspek' => 'kelola'])->result_array();
        $data['answer'] = $this->pengisian_model->getAnserById('respon', ['username' => $this->session->userdata('username'), 'id_periode' => $periode['id_periode']])->row_array();
        $this->form_validation->set_rules('harapan', 'harapan', 'required|trim', [
            'required' => 'pilihan tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('nyata', 'nyata', 'required|trim', [
            'required' => 'pilihan tidak boleh kosong'
        ]);
        $data['total'] = $this->db->query('SELECT jawabanHarapan as harapan, jawabanKenyataan as nyata from respon where username = "' . $this->session->userdata('username') . '" AND id_periode = "' . $periode['id_periode'] . '"');
        $this->pagging('kuesioner/kuesioner', $data);
        if (!empty($this->input->post('submitted'))) {

            $aspek = $this->pengisian_model->getAspekByTypee('aspek', ['typeaspek' => 'kelola'])->result_array();

            $id_periode = $this->input->post('id_periode');
            $id_kuesioner = $this->input->post('id_kuesioner');
            $id_aspek = $this->input->post('id_aspek');
            $typeaspek = $this->input->post('typeaspek');
            $username = $this->input->post('username');
            $harapan = $this->input->post('harapan');
            $nyata = $this->input->post('nyata');
            $tharapan = $this->input->post('textharapan');
            $tmasukan = $this->input->post('textmasukan');
            $dataarray = [];
            foreach ($aspek as $asp) {
                $asked = $this->db->query("SELECT * FROM kuesioner where id_aspek = '" . $asp['id_aspek'] . "' AND id_level = '" . $this->session->userdata('id_level') . "'");
                foreach ($asked->result_array() as $ask) {
                    if ($harapan[$ask['id_kuesioner']] == 1) {
                        $k = 1;
                        $c = 0;
                        $b = 0;
                        $sb = 0;
                    } elseif ($harapan[$ask['id_kuesioner']] == 2) {
                        $k = 0;
                        $c = 1;
                        $b = 0;
                        $sb = 0;
                    } elseif ($harapan[$ask['id_kuesioner']] == 3) {
                        $k = 0;
                        $c = 0;
                        $b = 1;
                        $sb = 0;
                    } else {
                        $k = 0;
                        $c = 0;
                        $b = 0;
                        $sb = 1;
                    }
                    if ($nyata[$ask['id_kuesioner']] == 1) {
                        $nk = 1;
                        $nc = 0;
                        $nb = 0;
                        $nsb = 0;
                    } elseif ($nyata[$ask['id_kuesioner']] == 2) {
                        $nk = 0;
                        $nc = 1;
                        $nb = 0;
                        $nsb = 0;
                    } elseif ($nyata[$ask['id_kuesioner']] == 3) {
                        $nk = 0;
                        $nc = 0;
                        $nb = 1;
                        $nsb = 0;
                    } else {
                        $nk = 0;
                        $nc = 0;
                        $nb = 0;
                        $nsb = 1;
                    }
                    array_push($dataarray, [
                        'id_periode' => $id_periode[$ask['id_kuesioner']],
                        'id_kuesioner' => $id_kuesioner[$ask['id_kuesioner']],
                        'id_aspek' => $id_aspek[$ask['id_kuesioner']],
                        'typeaspek' => $typeaspek[$ask['id_kuesioner']],
                        'username' => $username[$ask['id_kuesioner']],
                        'jawabanHarapan' => $harapan[$ask['id_kuesioner']],
                        'harapanK' => $k,
                        'harapanC' => $c,
                        'harapanB' => $b,
                        'harapanSB' => $sb,
                        'jawabanKenyataan' => $nyata[$ask['id_kuesioner']],
                        'kenyataanK' => $nk,
                        'kenyataanC' => $nc,
                        'kenyataanB' => $nb,
                        'kenyataanSB' => $nsb,
                    ]);
                }
            }
            $data = [
                'id_periode' => $periode['id_periode'],
                'typeaspek' => "kelola",
                'masukan' => $tmasukan,
                'harapan' => $tharapan
            ];
            $this->pengisian_model->inputAnswer('respon', $dataarray);
            $this->pengisian_model->tambahSaran('komentar', $data);
            $this->session->set_flashdata('message', ' Di Kirim');
            redirect('pengisian/staff');
        }
    }
    function umum()
    {
        $data['title'] = "Pengisian Kuesioner";
        $data['a'] = "Layanan Akademik";
        $data['periode'] = $this->pengisian_model->showIsActive('periode', ['isaktif' => true])->row_array();
        $periode = $data['periode'];
        $data['aspek'] = $this->pengisian_model->getAspekByType('aspek', ['typeaspek' => 'akademik'])->result_array();
        $data['answer'] = $this->pengisian_model->getAnserById('respon', ['username' => $this->session->userdata('username'), 'id_periode' => $periode['id_periode']])->row_array();
        $data['total'] = $this->db->query('SELECT jawabanHarapan as harapan, jawabanKenyataan as nyata from respon where username = "' . $this->session->userdata('username') . '" AND id_periode = "' . $periode['id_periode'] . '"');
        $this->pagging('kuesioner/kuesioner', $data);
        //jika form validasi benar
        if (!empty($this->input->post('submitted'))) {

            $aspek = $this->pengisian_model->getAspekByTypee('aspek', ['typeaspek' => 'akademik'])->result_array();

            $id_periode = $this->input->post('id_periode');
            $id_kuesioner = $this->input->post('id_kuesioner');
            $id_aspek = $this->input->post('id_aspek');
            $typeaspek = $this->input->post('typeaspek');
            $username = $this->input->post('username');
            $harapan = $this->input->post('harapan');
            $nyata = $this->input->post('nyata');
            $tharapan = $this->input->post('textharapan');
            $tmasukan = $this->input->post('textmasukan');
            $dataarray = [];
            foreach ($aspek as $asp) {
                $asked = $this->db->query("SELECT * FROM kuesioner where id_aspek = '" . $asp['id_aspek'] . "' AND id_level = '" . $this->session->userdata('id_level') . "'");
                foreach ($asked->result_array() as $ask) {
                    if ($harapan[$ask['id_kuesioner']] == 1) {
                        $k = 1;
                        $c = 0;
                        $b = 0;
                        $sb = 0;
                    } elseif ($harapan[$ask['id_kuesioner']] == 2) {
                        $k = 0;
                        $c = 1;
                        $b = 0;
                        $sb = 0;
                    } elseif ($harapan[$ask['id_kuesioner']] == 3) {
                        $k = 0;
                        $c = 0;
                        $b = 1;
                        $sb = 0;
                    } else {
                        $k = 0;
                        $c = 0;
                        $b = 0;
                        $sb = 1;
                    }
                    if ($nyata[$ask['id_kuesioner']] == 1) {
                        $nk = 1;
                        $nc = 0;
                        $nb = 0;
                        $nsb = 0;
                    } elseif ($nyata[$ask['id_kuesioner']] == 2) {
                        $nk = 0;
                        $nc = 1;
                        $nb = 0;
                        $nsb = 0;
                    } elseif ($nyata[$ask['id_kuesioner']] == 3) {
                        $nk = 0;
                        $nc = 0;
                        $nb = 1;
                        $nsb = 0;
                    } else {
                        $nk = 0;
                        $nc = 0;
                        $nb = 0;
                        $nsb = 1;
                    }
                    array_push($dataarray, [
                        'id_periode' => $id_periode[$ask['id_kuesioner']],
                        'id_kuesioner' => $id_kuesioner[$ask['id_kuesioner']],
                        'id_aspek' => $id_aspek[$ask['id_kuesioner']],
                        'typeaspek' => $typeaspek[$ask['id_kuesioner']],
                        'username' => $username[$ask['id_kuesioner']],
                        'jawabanHarapan' => $harapan[$ask['id_kuesioner']],
                        'harapanK' => $k,
                        'harapanC' => $c,
                        'harapanB' => $b,
                        'harapanSB' => $sb,
                        'jawabanKenyataan' => $nyata[$ask['id_kuesioner']],
                        'kenyataanK' => $nk,
                        'kenyataanC' => $nc,
                        'kenyataanB' => $nb,
                        'kenyataanSB' => $nsb,
                    ]);
                }
            }
            $data = [
                'id_periode' => $periode['id_periode'],
                'typeaspek' => "akademik",
                'masukan' => $tmasukan,
                'harapan' => $tharapan
            ];
            $this->pengisian_model->inputAnswer('respon', $dataarray);
            $this->pengisian_model->tambahSaran('komentar', $data);
            $this->session->set_flashdata('message', ' Di Kirim');
            redirect('pengisian/umum');
        }
    }

    public function get_percent($total, $number)
    {
        if ($total > 0) {
            return round($number / ($total / 100), 2);
        } else {
            return 0;
        }
    }
}
