<?php
class M_ms_menu extends CI_model
{
    // get total data
    public function get_total($where)
    {

        $sql = "SELECT
                    count(*) total
                from
                    ms_menu mm
                left join ms_menu parent on
                    parent.menu_id = mm.menu_parent_id
                left join (
                    select
                        count(*) total, mm2.menu_parent_id
                    from
                        ms_menu mm2
                    group by
                        mm2.menu_parent_id) child on
                    child.menu_parent_id = mm.menu_id
                where
                    0 = 0 $where
        ";

        $res = $this->db->query($sql);
        $result = $res->row()->total;
        return $result;
    }


    // get data
    public function get_data($columns, $where, $order, $limit)
    {

        $selector = implode(",", $columns);
        $sql = "SELECT
                    $selector
                from
                    ms_menu mm
                left join ms_menu parent on
                    parent.menu_id = mm.menu_parent_id
                left join (
                    select
                        count(*) total, mm2.menu_parent_id
                    from
                        ms_menu mm2
                    group by
                        mm2.menu_parent_id) child on
                    child.menu_parent_id = mm.menu_id 
                where
                    0 = 0 $where
                $order $limit
        ";

        $res = $this->db->query($sql);
        $result = $res->result();
        return $result;
    }


    // add
    public function add($data)
    {
        $res = "";
        $this->db->insert("ms_menu", $data);
        if ($this->db->affected_rows() > 0) {
            $res = "true";
        } else {
            $res = "false";
        }
        return $res;
    }


    // update
    public function update($data, $id)
    {
        $res = "";
        $this->db->where("menu_id", $id);
        $result = $this->db->update("ms_menu", $data);
        if ($result) {
            $res = "true";
        } else {
            $res = "false";
        }
        return $res;
    }


    // delete
    public function delete($id)
    {
        $res = "";
        $this->db->where("menu_id", $id);
        $this->db->delete("ms_menu");
        if ($this->db->affected_rows() > 0) {
            $res = "true";
        } else {
            $res = "false";
        }
        return $res;
    }


    // cek menu_kode
    public function cek_menu_kode($where)
    {
        $sql = "SELECT * from ms_menu where 0=0 $where";
        $res = $this->db->query($sql)->num_rows();

        return $res;
    }


    // get_menu
    public function get_menu()
    {
        $sql = "SELECT * from ms_menu order by menu_kode";
        $res = $this->db->query($sql)->result();

        return $res;
    }


    // update child
    public function update_child($data)
    {
        $res = null;
        $sql = "SELECT * from ms_menu where menu_parent_kode like '" . $data['menu_kode'] . "%' order by menu_kode";
        $child = $this->db->query($sql);
        // echo "<pre>";
        // print_r($child->result());
        // echo "</pre>";
        // die;

        if ($child->num_rows() > 0) {
            $data_child = [];
            foreach ($child->result() as $key => $value) {
                $data_child[] = [
                    "menu_id" => $value->menu_id,
                    "menu_level" => intval($value->menu_level) - intval($data["menu_level_lama"]) + intval($data["menu_level"]),
                ];

                $this->db->update_batch("ms_menu", $data_child, "menu_id");
                $res = "true";
            }
        } else {
            $res = "true";
        }

        return $res;
    }
}
