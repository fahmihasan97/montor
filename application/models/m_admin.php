<?php 

/**
* 
*/
class M_admin extends CI_model
{
	
public function krisis($value='')
{
 return $this->db->query("SELECT * from krisis a, overview b where a.id_overview=b.id_overview group by a.id_krisis");
}

public function count_data($table){
  return $this->db->query("SELECT COUNT(*) AS jml_data FROM $table");
}

public function cek_absen($id_krisis='',$tanggal='')
{
 return $this->db->query("SELECT * from absen where id_krisis='$id_krisis' AND tanggal='$tanggal'");
}

public function gaji_krisis()
{
 return $this->db->query("SELECT * from krisis a, overview b ,gaji d where a.id_overview=b.id_overview AND d.id_krisis=a.id_krisis group by d.id_krisis");
}

public function cari_krisis($cari)
{
 return $this->db->query("SELECT * from krisis a ,overview b where a.id_overview=b.id_overview AND a.id_krisis='$cari'");
}

public function krisis_data()
{
 return $this->db->query("SELECT * from krisis a ,overview b  where a.id_overview=b.id_overview group by a.id_krisis");
}



public function tpp_id($id='')
{
  return $this->db->query("SELECT * from krisis a,overview b ,tpp c , absen d where c.id_krisis='$id' AND a.id_overview=b.id_overview 
    AND d.id_krisis=a.id_krisis
    AND c.id_krisis=a.id_krisis
    group by c.id_tpp");
}

public function tpp()
{
  return $this->db->query("SELECT * from krisis a,overview b ,tpp c , absen d where a.id_overview=b.id_overview 
    AND d.id_krisis=a.id_krisis
  	AND c.id_krisis=a.id_krisis
  	group by c.id_tpp");
}


public function tpp_print($id)
{
  return $this->db->query("SELECT * from krisis a,overview b ,tpp c , absen d where a.id_overview=b.id_overview 
    AND d.id_krisis=a.id_krisis
  	AND c.id_krisis=a.id_krisis
  	AND c.id_tpp='$id'
  	group by c.id_krisis");
}


public function cari_gaji($id='')
{
return $this->db->query("SELECT * from krisis a, overview b  where a.id_overview=b.id_overview AND a.id_krisis='$id' group by a.id_krisis");
}

public function cari_overview($id='')
{
 return $this->db->query("SELECT * from krisis a, overview b where a.id_krisis='$id' AND a.id_overview=b.id_overview group by a.id_krisis");
}

}