<?php
if (!defined('BASEPATH')) exit(header('Location:../'));
class Ms_group extends CI_controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url(''));
            exit;
        };
        $this->load->model('m_ms_group');
    }

    public function index()
    {
        $data = array('judul' => 'Master Group');
        tpl('v_ms_group', $data);
    }


    public function get_data()
    {
        $columns = [
            "group_id",
            "group_name",
            "group_aktif",
        ];
        $columns_search = [
            "group_name",
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
        $totalRecords = $this->m_ms_group->get_total($where);
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

        $data = $this->m_ms_group->get_data($columns, $where, $order, $limit);
        $no   = 1 + $start;
        foreach ($data as $row) {
            $status = ($row->group_aktif == "0") ? "<span class='badge bg-red'>Non-aktif</span>" : "<span class='badge bg-green'>Aktif</span>";
            $action = "";
            $id = $row->group_id;
            $isi = "$id|$row->group_name|$row->group_aktif";

            $akses = '<a class="btn btn-warning" href="' . base_url() . 'ms_group/akses/' . $id . '" id="edit"><i class="fa fa-gears"></i></a>';
            $action .= '<a id="edit" onclick="edit(' . "'$isi'" . ')"><i class="fa fa-pencil text-primary"></i></a>&nbsp;
            <a id="delete" onclick="del(' . $id . ')"><i class="fa fa-trash text-danger"></i></a>';
            $records["data"][] = array(
                $no++,
                $row->group_name,
                $status,
                $akses,
                $action
            );
        }

        $records["draw"] = $draw;
        $records["recordsTotal"] = $totalRecords;
        $records["recordsFiltered"] = $totalRecords;

        echo json_encode($records);
    }


    // save
    public function save()
    {
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // die;
        $res = "";
        $act = $this->input->post('act', true);

        $data = [
            "group_name" => $this->input->post("group_name"),
            "group_aktif" => $this->input->post("group_aktif"),
            "updated_at" => date("Y-m-d"),
        ];

        if ($act == "add") {
            $data["created_at"] = date("Y-m-d");
            $res = $this->m_ms_group->add($data);
        } else {
            $id = $this->input->post('group_id');
            $res = $this->m_ms_group->update($data, $id);
        }

        echo json_encode($res);
    }


    // delete
    public function delete($id = 0)
    {
        $res = "";
        if ($id != 0) {
            $res = $this->m_ms_group->delete($id);
        } else {
            $res = "false";
        }

        echo json_encode($res);
    }


    // cek group_name
    public function cek_group_name()
    {
        $res = "";
        $where = "";

        $where .= " AND group_name = '" .
            $this->input->post('group_name') . "'";

        if ($this->input->post("act") == "edit") {
            $where .= " AND group_name != '" .
                $this->input->post('group_name_lama') . "'";
        }

        if ($this->m_ms_group->cek_group_name($where) > 0) {
            $res = "Nama Group sudah ada";
        } else {
            $res = "true";
        }

        echo json_encode($res);
    }


    // menu hak akses
    public function akses($id)
    {
        $data = array(
            'judul' => 'Master Group Akses',
            'id' => $id
        );
        tpl('v_ms_group_akses', $data);
    }


    // get jstree data
    public function get_tree()
    {
        $res = [];
        $group_id = $this->input->get('group_id');

        $result = $this->m_ms_group->get_tree($group_id);

        foreach ($result as $key => $value) {
            $res[] = [
                'id' => $value->menu_id,
                'parent' => (empty($value->menu_parent_id)) ? '#' : $value->menu_parent_id,
                'text' => "$value->menu_kode - $value->menu_name",
                'state' => [
                    'opened' => true,
                ],
                "a_attr" => $value,
            ];
        }

        echo json_encode($res);
    }

    // public function save_akses()
    // {
    //     // print_r($_POST);
    //     $res = 0;
    //     $this->db->table('ms_group_menu')->delete(['group_id' => $_POST['group_id']]);
    //     $data = [];
    //     foreach ($_POST['menu_id'] as $value) {
    //         $data[] = [
    //             'menu_id' => $value,
    //             'group_id' => $_POST['group_id'],
    //             'created_at' => date('Y-m-d H:i:s'),
    //         ];
    //     }
    //     $res = $this->db->table('ms_group_menu')->insertBatch($data);

    //     echo json_encode($res);
    // }

    public function get_menu()
    {
        $group_id = $this->input->get('group_id');
        $res = $this->m_ms_group->get_menu($group_id);
        echo json_encode($res);
    }


    public function add_group_menu()
    {
        $group_id = $this->input->post('group_id');
        $data = [
            'menu_id' => $this->input->post('menu_id'),
            'group_id' => $group_id,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $result = $this->m_ms_group->save_akses($data);
        $res = [];
        if ($result) {
            $res = [
                'stt' => 1,
                'data' => $result,
            ];
        } else {
            $res = [
                'stt' => 0,
                'data' => $result,
            ];
        }

        echo json_encode($res);
    }

    public function delete_akses()
    {
        $act = null;
        $res = [];
        $group_id = $this->input->post('group_id');
        $menu_id = $this->input->post('menu_id');

        $result = $this->m_ms_group->delete_akses($group_id, $menu_id);

        if ($result) {
            $res = [
                'stt' => 1,
                'data' => $act,
            ];
        } else {
            $res = [
                'stt' => 0,
                'data' => $act,
            ];
        }

        echo json_encode($res);
    }
}
