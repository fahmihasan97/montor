<?php
class M_dashboard extends CI_Model
{
    public function get_data($type)
    {
        $selector = "";
        $group_by = $type;
        if ($type == "klali") {
            $selector =
                " case
                    when klali = 1 then 'AMAN'
                    when klali = 2 then 'WASPADA'
                    when klali = 3 then 'KRISIS'
                    else 'BELUM DIASESMENT'
                end as label ";
        } elseif ($type == "klapo") {
            $selector =
                " case
                    when klapo = 1 then 'AMAN'
                    when klapo = 2 then 'WASPADA'
                    when klapo = 3 then 'KRISIS'
                    else 'BELUM DIASESMENT'
                end as label ";
        }

        $sql =
            "SELECT
                count(*) as value,
                $selector
            from
                krisis k
            group by
                $group_by
            ";

        $res = $this->db->query($sql)->result();
        return $res;
    }


    public function get_total_user()
    {
        $sql =
            "SELECT
                count(*) value,
                mg.group_name label
            from
                ms_user mu
            inner join ms_group mg on
                mg.group_id = mu.group_id
            group by
                mg.group_id
            order by
                group_name
            ";

        $res = $this->db->query($sql)->result();
        return $res;
    }
}
