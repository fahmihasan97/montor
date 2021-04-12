<?php
class M_krisis extends CI_Model
{
    // get total
    public function get_total($where)
    {
        $sql =
            "SELECT
                count(*) total
            from
                krisis k
            where
                0 = 0 $where";

        $res = $this->db->query($sql)->row()->total;
        return $res;
    }


    // get data
    public function get_data($columns, $where, $order, $limit)
    {
        $selector = implode(",", $columns);
        $sql =
            "SELECT
                $selector
            from
                krisis k
            where
                0 = 0 $where
            $order $limit";

        $res = $this->db->query($sql)->result();
        return $res;
    }
}
