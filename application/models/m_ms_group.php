<?php
class M_ms_group extends CI_model
{

    // get total data
    public function get_total($where)
    {

        $sql = "SELECT
                    count(*) total
                from
                    ms_group mg
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
                    ms_group mg
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
        $this->db->insert("ms_group", $data);
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
        $this->db->where("group_id", $id);
        $result = $this->db->update("ms_group", $data);
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
        $this->db->where("group_id", $id);
        $this->db->delete("ms_group");
        if ($this->db->affected_rows() > 0) {
            $res = "true";
        } else {
            $res = "false";
        }
        return $res;
    }


    // cek group_name
    public function cek_group_name($where)
    {
        $sql = "SELECT * from ms_group where 0=0 $where";
        $res = $this->db->query($sql)->num_rows();

        return $res;
    }


    // cek get_tree
    public function get_tree($group_id)
    {
        $sql = "SELECT
                    mm.menu_id,
                    mm.menu_parent_id,
                    mm.menu_kode,
                    mm.menu_name,
                    mgm.menu_id as mg_menu_id
                from
                    ms_menu mm
                inner join ms_group_menu mgm on
                    mm.menu_id = mgm.menu_id
                    and mgm.group_id = $group_id
                order by
                    mm.menu_kode
        ";

        $res = $this->db->query($sql)->result();

        return $res;
    }


    // cek get_menu
    public function get_menu($group_id)
    {
        $sql = "SELECT
                    mm.menu_id ,
                    mm.menu_kode ,
                    mm.menu_name
                from
                    ms_menu mm
                where
                    mm.menu_id not in (
                    select
                        mgm.menu_id
                    from
                        ms_group_menu mgm
                    where
                        mgm.group_id = $group_id)
                order by mm.menu_kode
        ";
        $res = $this->db->query($sql)->result();

        return $res;
    }


    // save akses
    public function save_akses($data)
    {
        $res = "";
        $this->db->insert("ms_group_menu", $data);
        if ($this->db->affected_rows() > 0) {
            $res = true;
        } else {
            $res = false;
        }
        return $res;
    }


    // delete akses
    public function delete_akses($group_id, $menu_id)
    {
        $res = "";
        $this->db->where('group_id', $group_id);
        $this->db->where_in('menu_id', $menu_id);
        $this->db->delete('ms_group_menu');
        if ($this->db->affected_rows() > 0) {
            $res = true;
        } else {
            $res = false;
        }
        return $res;
    }
}
