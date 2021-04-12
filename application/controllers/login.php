<?php
/*halaman login utama 

author by Ismarianto Putra TEch Programer */

class Login extends CI_controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('login_m');
    }

    public function index()
    {
        if (isset($_POST['login'])) {

            $username = barasiah($this->input->post('username'));
            $password = barasiah($this->input->post('password'));

            //cek data login
            $login  = $this->login_m->admin($username, md5($password));


            if ($login->num_rows() > 0) {
                $data_user = $login->row_array();
                if ($data_user["user_aktif"] == 1) {
                    $data_user["is_login"] = 1;
                    $this->session->set_userdata($data_user);
                    $this->session->set_flashdata('pesan', '<div class="btn btn-primary">Anda Berhasil Login .....</div>');
                    redirect(base_url('dashboard'));
                } else {
                    $this->session->set_flashdata('pesan', '<div class="btn btn-primary">Maaf Akun Anda Sudah Tidak Aktif <br />
                    Minta Admin Untuk Mengaktifkan kembali</div>');
                    redirect(base_url(''));
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="btn btn-primary">Maaf Informasi Login Tidak Di Kenali <br />
                Username Dan Password Salah</div>');
                redirect(base_url(''));
            }
        } else {
            $x = array(
                'judul' => '.:: Login Aplikasi ::.'
            );
            $this->load->view('login', $x);
        }
    }


    // get sidemenu
    public function get_sidemenu($group_id)
    {
        echo json_encode($this->login_m->get_sidemenu($group_id));
    }
}
