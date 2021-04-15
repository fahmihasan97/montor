<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemetaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url(''));
            exit;
        };
    }
    public function index()
    {
        $x = array(
            'judul' => 'Data',
        );
        tpl('menu/v_map', $x);
    }
    public function absen_json()
    {
        $data = $this->db->get('tb_geoatt_brt')->result();
        echo json_encode($data);
    }
    public function shelter()
    {
        $x = array(
            'judul' => 'Data',
        );
        tpl('menu/v_shelter', $x);
    }
}
