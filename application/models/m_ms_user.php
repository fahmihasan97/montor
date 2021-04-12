<?php
class M_ms_user extends CI_model
{
    public function get_group()
    {
        $this->db->select("group_id,group_name");
        $this->db->from("ms_group");
        $this->db->where("group_aktif", 1);
        $this->db->order_by("group_name", "asc");
        $res = $this->db->get()->result();
        return $res;
    }


    // get total data
    public function get_total($where)
    {

        $sql = "SELECT
                    count(*) total
                from
                    ms_user mu
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
                    ms_user mu
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
        $this->db->insert("ms_user", $data);
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
        $this->db->where("user_id", $id);
        $result = $this->db->update("ms_user", $data);
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
        $this->db->where("user_id", $id);
        $this->db->delete("ms_user");
        if ($this->db->affected_rows() > 0) {
            $res = "true";
        } else {
            $res = "false";
        }
        return $res;
    }


    // cek username
    public function cek_username($where)
    {
        $sql = "SELECT * from ms_user where 0=0 $where";
        $res = $this->db->query($sql)->num_rows();

        return $res;
    }
}
