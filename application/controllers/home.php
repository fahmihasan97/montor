<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		// error_reporting(0);
        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url(''));
            exit;
		};
		$this->load->model('m_data');
		$this->load->helper('url');
	}

	public function index()
	{
		
       $x = array(
            'judul' => 'Data dashboard',
        );
        tpl('menu/v_beranda', $x);
	}
}
