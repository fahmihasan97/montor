<?php
if (!defined('BASEPATH')) exit(header('Location:../'));
class Dashboard extends CI_controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url(''));
            exit;
        };
        $this->load->model('m_dashboard');
    }

    public function index()
    {
        $x = array(
            'judul' => 'Data dashboard',
        );
        tpl('v_dashboard', $x);
    }


    // get data
    public function get_data($type)
    {
        $res = $this->m_dashboard->get_data($type);
        echo json_encode($res);
    }


    // get total user
    public function get_total_user()
    {
        $res = $this->m_dashboard->get_total_user();
        echo json_encode($res);
    }
}
