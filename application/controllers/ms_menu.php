<?php
if (!defined('BASEPATH')) exit(header('Location:../'));
class Ms_menu extends CI_controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url(''));
            exit;
        };
        $this->load->model('m_ms_menu');
    }

    public function index()
    {
        $data = array('judul' => 'Master Menu');
        tpl('v_ms_menu', $data);
    }


    public function get_data()
    {
        $columns = [
            "mm.menu_id",
            "mm.menu_kode",
            "mm.menu_name",
            "mm.menu_link",
            "parent.menu_name as menu_parent_name",
            "mm.menu_aktif",
            "mm.menu_level",
            "mm.menu_parent_id",
            "mm.menu_parent_kode",
            "mm.menu_icon",
            "coalesce(child.total, 0) as total",
        ];
        $columns_order = [
            "mm.menu_id",
            "mm.menu_kode",
            "mm.menu_name",
            "mm.menu_link",
            "parent.menu_name",
            "mm.menu_aktif",
        ];
        $columns_search = [
            "mm.menu_kode",
            "mm.menu_name",
            "parent.menu_name",
            "mm.menu_parent_kode",
            "mm.menu_link",
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
        $totalRecords = $this->m_ms_menu->get_total($where);
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

        if (!isset($columns_order[$col])) {
            $order = null;
        } else {
            $order = "ORDER BY " . $columns_order[$col] . " " . $dir;
        }

        $data = $this->m_ms_menu->get_data($columns, $where, $order, $limit);
        $no   = 1 + $start;
        foreach ($data as $row) {
            $status = ($row->menu_aktif == "0") ? "<span class='badge bg-red'>Non-aktif</span>" : "<span class='badge bg-green'>Aktif</span>";
            $action = "";
            $id = $row->menu_id;
            $isi = "$id|$row->menu_kode|$row->menu_name|$row->menu_link|$row->menu_aktif|$row->menu_level|$row->menu_parent_id|$row->menu_parent_kode|$row->menu_icon|$row->menu_parent_name";

            if ($row->menu_id != 1 && $row->menu_id != 2 && $row->menu_id != 3 && $row->menu_id != 4) {
                $action .= '<a id="edit" onclick="edit(' . "'$isi'" . ')"><i class="fa fa-pencil text-primary"></i></a>&nbsp;';
            }
            if ($row->total <= 0 && $row->menu_id != 1 && $row->menu_id != 2 && $row->menu_id != 3 && $row->menu_id != 4) {
                $action .= '<a id="delete" onclick="del(' . $id . ')"><i class="fa fa-trash text-danger"></i></a>';
            }
            $records["data"][] = array(
                $no++,
                $row->menu_kode,
                $row->menu_name,
                $row->menu_link,
                $row->menu_parent_name,
                $status,
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
            "menu_kode" => $this->input->post("menu_kode"),
            "menu_name" => $this->input->post("menu_name"),
            "menu_level" => $this->input->post("menu_level"),
            "menu_link" => $this->input->post("menu_link"),
            "menu_icon" => $this->input->post("menu_icon"),
            "menu_aktif" => $this->input->post("menu_aktif"),
            "menu_parent_id" => $this->input->post("menu_parent_id"),
            "menu_parent_kode" => $this->input->post("menu_parent_kode"),
            "updated_at" => date("Y-m-d"),
        ];

        if ($act == "add") {
            $data["created_at"] = date("Y-m-d");
            $res = $this->m_ms_menu->add($data);
        } else {
            $id = $this->input->post('menu_id');
            $parent_id_lama = $this->input->post('menu_parent_id_lama');
            $res = $this->m_ms_menu->update($data, $id);
            if ($parent_id_lama != $data["menu_parent_id"]) {
                $data["menu_level_lama"] = $this->input->post('menu_level_lama');
                $res = $this->m_ms_menu->update_child($data, $id);
            }
        }

        echo json_encode($res);
    }


    // delete
    public function delete($id = 0)
    {
        $res = "";
        if ($id != 0) {
            $res = $this->m_ms_menu->delete($id);
        } else {
            $res = "false";
        }

        echo json_encode($res);
    }


    // cek kode
    public function cek_menu_kode()
    {
        $res = "";
        $where = "";

        $where .= " AND menu_kode = '" .
            $this->input->post('menu_kode') . "'";

        if ($this->input->post("act") == "edit") {
            $where .= " AND menu_kode != '" .
                $this->input->post('menu_kode_lama') . "'";
        }

        if ($this->m_ms_menu->cek_menu_kode($where) > 0) {
            $res = "Kode sudah dipakai. Buat kode yang lain";
        } else {
            $res = "true";
        }

        echo json_encode($res);
    }


    // cek parent kode
    public function cek_parent()
    {
        $res = "";

        $parent_id = $this->input->post('menu_parent_id');

        $menu_id = $this->input->post('menu_id');

        if ($parent_id == $menu_id) {
            $res = "Parent Tidak Boleh Sama Dengan Menu";
        } else {
            $res = "true";
        }

        echo json_encode($res);
    }


    // get_menu
    public function get_menu()
    {
        $res = null;
        $res = $this->m_ms_menu->get_menu();
        echo json_encode($res);
    }
}
