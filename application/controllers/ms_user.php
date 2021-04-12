<?php
if (!defined('BASEPATH')) exit(header('Location:../'));
class Ms_user extends CI_controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url(''));
            exit;
        };
        $this->load->model('m_ms_user');
    }

    public function index()
    {
        $data = array('judul' => 'Master User');
        $data['group'] = $this->m_ms_user->get_group();
        tpl('v_ms_user', $data);
    }


    public function get_data()
    {
        $columns = [
            "user_id",
            "username",
            "user_fullname",
            "group_id",
            "user_aktif",
            "is_superuser",
        ];
        $columns_search = [
            "username",
            "user_fullname",
        ];
        $draw = intval($this->input->post("draw"));
        $where     = "";
        // $f_mmsi = $this->input->post("f_mmsi");
        // $where .= " AND fd.mmsi = '$f_mmsi' ";

        $search = $this->input->post("search");
        $search = $search['value'];
        if (isset($search) && $search != "") {
            $where .= "AND (";
            for ($i = 0; $i < count($columns_search); $i++) {
                $where .= " LOWER(" . $columns_search[$i] . ") LIKE LOWER('%" . ($search) . "%') OR ";
            }
            $where = substr_replace($where, "", -3);
            $where .= ')';
        }
        $totalRecords = $this->m_ms_user->get_total($where);
        $length = intval($this->input->post("length"));
        $length = $length < 0 ? $totalRecords : $length;
        $start = intval($this->input->post("start"));
        if (isset($start) && $length != '-1') {
            $limit = "limit " . intval($length) . " offset " . intval($start);
        }
        $records = array();
        $records["data"] = array();
        $order = $this->input->post("order");
        $col = 0;
        $dir = "";
        if (!empty($order)) {
            foreach ($order as $o) {
                $col = $o['column'];
                $dir = $o['dir'];
            }
        }

        if ($dir != "asc" && $dir != "desc") {
            $dir = "desc";
        }

        if (!isset($columns[$col])) {
            $order = null;
        } else {
            $order = "ORDER BY " . $columns[$col] . " " . $dir;
        }

        $data = $this->m_ms_user->get_data($columns, $where, $order, $limit);
        $no   = 1 + $start;
        foreach ($data as $row) {
            $status = ($row->user_aktif == "0") ? "<span class='badge bg-red'>Non-aktif</span>" : "<span class='badge bg-green'>Aktif</span>";
            $action = "";
            $id = $row->user_id;
            $isi = "$id|$row->username|$row->user_fullname|$row->group_id|$row->user_aktif";

            $action .= '<a id="edit" onclick="edit(' . "'$isi'" . ')"><i class="fa fa-pencil text-primary"></i></a>&nbsp;';
            if ($row->is_superuser != 1 && $this->session->userdata('user_id') != $row->user_id) {
                $action .= '<a id="delete" onclick="del(' . $id . ')"><i class="fa fa-trash text-danger"></i></a>&nbsp;';
            }
            $records["data"][] = array(
                $no++,
                $row->username,
                $row->user_fullname,
                $status,
                $action
            );
        }

        $records["draw"] = $draw;
        $records["recordsTotal"] = $totalRecords;
        $records["recordsFiltered"] = $totalRecords;

        echo json_encode($records);
    }


    // delete
    public function save()
    {
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // die;
        $res = "";
        $act = $this->input->post('act', true);

        $data = [
            "username" => $this->input->post("username"),
            "user_fullname" => $this->input->post("user_fullname"),
            "user_aktif" => $this->input->post("user_aktif"),
            "group_id" => $this->input->post("group_id"),
            "is_superuser" => 0,
            "password" => md5($this->input->post("password")),
            "updated_at" => date("Y-m-d"),
        ];

        if ($act == "add") {
            $data["created_at"] = date("Y-m-d");
            $res = $this->m_ms_user->add($data);
        } else {
            if ($this->input->post("gantiPassword") != "on") {
                unset($data["password"]);
            }
            $id = $this->input->post('user_id');
            $res = $this->m_ms_user->update($data, $id);
        }

        echo json_encode($res);
    }


    // delete
    public function delete($id = 0)
    {
        $res = "";
        if ($id != 0) {
            $res = $this->m_ms_user->delete($id);
        } else {
            $res = "false";
        }

        echo json_encode($res);
    }


    // cek username
    public function cek_username()
    {
        $res = "";
        $where = "";

        $where .= " AND username = '" .
            $this->input->post('username') . "'";

        if ($this->input->post("act") == "edit") {
            $where .= " AND username != '" .
                $this->input->post('username_lama') . "'";
        }

        if ($this->m_ms_user->cek_username($where) > 0) {
            $res = "Username sudah ada";
        } else {
            $res = "true";
        }

        echo json_encode($res);
    }
}
