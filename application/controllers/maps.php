<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maps extends CI_Controller
{

    public function __construct()
    {
         parent::__construct();
        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url(''));
            exit;
        };
        $this->load->model('m_data');
    }

    public function view($id = '')
    {
        if ($id == null) {
            redirect('');
        }
        $data['view_lokasi'] = $this->m_data->get_a_location(['id' => $id]);
        tpl('menu/v_maps', $data);
    }

    public function delete($id = '')
    {
        if ($id == null) {
            redirect('');
        }

        $result = $this->m_data->delete(['id' => $id]);
        if ($result) {
            $this->session->set_flashdata('result', '<div class="alert alert-success mt-3" role="alert">Successful.</div>');
            redirect('pagination');
        } else {
            $this->session->set_flashdata('result', '<div class="alert alert-success mt-3" role="alert">Failed.</div>');
            redirect('pagination');
        }
    }
}
