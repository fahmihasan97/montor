<?php
if (!defined('BASEPATH')) exit(header('Location:../'));
class Krisis extends CI_controller
{
    private $filename = "import_data"; // Kita tentukan nama filenya
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url(''));
            exit;
        };
        $this->load->model('m_krisis');
    }

    public function index()
    {
        $x = array(
            'judul' => 'Data krisis',
        );
        tpl('v_krisis', $x);
    }


    public function get_data()
    {
        $columns = [
            "id_krisis",
            "penghantar",
            "tower",
            "jenis",
            "klali",
            "klapo",
            "klahu",
        ];
        $columns_search = [
            "penghantar",
            "tower",
            "jenis",
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
        $totalRecords = $this->m_krisis->get_total($where);
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

        $data = $this->m_krisis->get_data($columns, $where, $order, $limit);
        $no   = 1 + $start;
        foreach ($data as $row) {
            $action = "";
            $id = $row->id_krisis;
            // $isi = "$id|$row->group_name|$row->group_aktif";

            $klali = $klapo = $klahu = "";

            if ($row->klali == 1) {
                $klali = "AMAN";
            } elseif ($row->klali == 2) {
                $klali = "WASPADA";
            } elseif ($row->klali == 3) {
                $klali = "KRITIS";
            } else {
                $klali = "BELUM DIASESMENT";
            }

            if ($row->klapo == 1) {
                $klapo = "AMAN";
            } elseif ($row->klapo == 2) {
                $klapo = "WASPADA";
            } elseif ($row->klapo == 3) {
                $klapo = "KRITIS";
            } else {
                $klapo = "BELUM DIASESMENT";
            }

            if ($row->klahu == 1) {
                $klahu = "ATAS NORMAL";
            } else {
                $klahu = "BELUM DIASESMENT";
            }

            $action = '<a href="' . base_url('admin/krisis_edit/' . $id) . '" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;<a href="' . base_url('admin/krisis_hapus/' . $id) . '" class="btn btn-danger" title="Hapus"><i class="fa fa-trash-o"></i></a>&nbsp;<a href="' . base_url('admin/details/' . $id) . '" class="btn btn-success btn-md" title="Rincian"><i class="fa fa-eye"></a>';
            $records["data"][] = array(
                $no++,
                $row->penghantar,
                $row->tower,
                $row->jenis,
                $klali,
                $klapo,
                $klahu,
                $action,
            );
        }

        $records["draw"] = $draw;
        $records["recordsTotal"] = $totalRecords;
        $records["recordsFiltered"] = $totalRecords;

        echo json_encode($records);
    }
}
