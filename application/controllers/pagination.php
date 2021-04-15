<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pagination extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url(''));
            exit;
        };
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->model('m_data');
    }

    public function index()
    {
        $d = array(
            'judul' => 'Data krisis',
        );
        $d['data'] = $this->m_data->show_data();
        tpl('menu/v_daftarabsen', $d);
        
     
    }
}
