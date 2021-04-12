<?php
/*model design by Ismarianto Putra Tech Programing
 * http://minangopensource.blogspot.com 
 *
 *
*/
class login_m extends CI_model
{

    public function admin($username = '', $password = '')
    {
        return $this->db->query("SELECT * from ms_user where username='$username' AND password='$password' limit 1");
        // return $this->db->query("SELECT * from admin where username='$username' AND password='$password' limit 1");
    }

    public function get_sidemenu($group_id)
    {
        return $this->db->query(
            "SELECT
                mm.menu_id ,
                mm.menu_icon ,
                mm.menu_name ,
                mm.menu_kode ,
                mm.menu_link ,
                mm.menu_parent_id ,
                mm2.total
            from
                ms_group_menu mgm
            inner join ms_menu mm on
                mm.menu_id = mgm.menu_id
            left join (
                select
                count(*) total, menu_parent_id
                from
                ms_menu
                group by
                menu_parent_id) mm2 on
                mm2.menu_parent_id = mm.menu_id
            where
                mgm.group_id = $group_id
            order by
                mm.menu_level,mm.menu_kode"
        )->result();
    }
}
