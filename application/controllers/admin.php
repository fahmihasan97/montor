<?php
 if ( ! defined('BASEPATH')) exit(header('Location:../'));
class Admin extends CI_controller
{
  function __construct()
  {
   parent:: __construct();
   // error_reporting(0);
    if($this->session->userdata('admin') != TRUE){
      redirect(base_url(''));
      exit;
    };
   $this->load->model('m_admin');
  }

  public function index()
  {
      $x = array('judul' =>'Halaman Administrator');
      /*$table_to_count = ['krisis','']
      for ($i=0; $i <=count($table_to_count) ; $i++) { 
        $count_data[i]=$this->m_admin->count_data($table);
      }*/
      tpl('admin/home',$x);
  }

  public function overview()
  {
   $x = array('judul' =>'Data overview', 
              'data'=>$this->db->get('overview')->result_array()); 
   tpl('admin/overview',$x);
  }

   public function details($id)
  {
    $data = array('id_krisis' => $id);
    $data = $this->m_admin->data_details($data)->result();
    $x = array(
      'judul' => 'Details Data',
      'data' => $data
    );
    tpl('admin/details', $x);
  }

  public function overview_tambah()
  {
  $x = array('judul'        => 'Tambah Data' ,
              'aksi'        => 'tambah',
              'tl'=> "",
              'tower'    => "",
              'jenis'=> "",
              'status'    => "",
              'tgl'=> "",
              'update'    => "",
              'penanganan'   => ""); 
    if(isset($_POST['kirim'])){
      $inputData=array(
        'tl'=>$this->input->post('tl'),
        'tower'    =>$this->input->post('tower'),
        'jenis'=>$this->input->post('jenis'),
        'status'    =>$this->input->post('status'),
        'tgl'=>$this->input->post('tgl'),
        'update'    =>$this->input->post('update'),
        'penanganan'         =>$this->input->post('penanganan'));
      $cek=$this->db->insert('overview',$inputData);
      if($cek){
        $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Ditambahkan.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/overview'));
      }else{
       echo "ERROR input Data";
      }
    }else{
     tpl('admin/overview_form',$x);
    }
  }
    
  public function overview_edit($id='')
  {
  $sql=$this->db->get_where('overview',array('id_overview'=>$id))->row_array(); 
  $x = array('judul'        =>'Tambah Data' ,
              'aksi'        =>'tambah',
        'tl'=>$sql['tl'],
        'tower'    =>$sql['tower'],
        'jenis'=>$sql['jenis'],
        'status'    =>$sql['status'],
        'tgl'    =>$sql['tgl'],
        'update'=>$sql['update'],
        'penanganan'         =>$sql['penanganan']); 
    if(isset($_POST['kirim'])){
      $inputData=array(
        'tl'=>$this->input->post('tl'),
        'tower'    =>$this->input->post('tower'),
        'jenis'=>$this->input->post('jenis'),
        'status'    =>$this->input->post('status'),
        'tgl'=>$this->input->post('tgl'),
        'update'    =>$this->input->post('update'),
        'penanganan'         =>$this->input->post('penanganan'));
      $cek=$this->db->update('overview',$inputData,array('id_overview'=>$id));
      if($cek){
        $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Diedit.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/overview'));
      }else{
       echo "ERROR input Data";
      }
    }else{
     tpl('admin/overview_form',$x);
    }
  }

  
  public function overview_hapus($id='')
  {
   $cek=$this->db->delete('overview',array('id_overview'=>$id));
   if ($cek) {
    $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/overview'));
   }
  }

  public function krisis()
  {
   $x = array('judul' =>'Data krisis', 
              'data'=>$this->db->get('krisis')->result_array()); 
   tpl('admin/krisis',$x);
  }

  public function krisis_tambah()
  {
  $x = array('judul'        => 'Tambah Data' ,
              'aksi'        => 'tambah',
              'kode'=> "",
              'tl'    => "",
              'wilayah'=> "",
              'skor'    => "",
              'status'=> "",
              'tgl'    => "",
              'jenis'=> "",
              'rincian'    => "",
              'penyebab'=> "",
              'kontrol'    => "",
              'rencana'=> "",
              'penanganan'   => "",
              'keterangan'   => ""); 
    if(isset($_POST['kirim'])){
      $inputData=array(
        'kode'=>$this->input->post('kode'),
        'tl'    =>$this->input->post('tl'),
        'wilayah'=>$this->input->post('wilayah'),
        'skor'    =>$this->input->post('skor'),
        'status'=>$this->input->post('status'),
        'tgl'    =>$this->input->post('tgl'),
        'jenis'=>$this->input->post('jenis'),
        'rincian'    =>$this->input->post('rincian'),
        'penyebab'=>$this->input->post('penyebab'),
        'kontrol'    =>$this->input->post('kontrol'),
        'rencana'=>$this->input->post('rencana'),
        'penanganan'         =>$this->input->post('penanganan'),
        'keterangan'    =>$this->input->post('keterangan'));
      $cek=$this->db->insert('krisis',$inputData);
      if($cek){
        $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Ditambahkan.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/krisis'));
      }else{
       echo "ERROR input Data";
      }
    }else{
     tpl('admin/krisis_form',$x);
    }
  }
    
  public function krisis_edit($id='')
  {
  $sql=$this->db->get_where('krisis',array('id_krisis'=>$id))->row_array(); 
  $x = array('judul'        =>'Tambah Data' ,
              'aksi'        =>'tambah',
        'kode'=>$sql['kode'],
        'tl'    =>$sql['tl'],
        'wilayah'=>$sql['wilayah'],
        'skor'    =>$sql['skor'],
        'status'    =>$sql['status'],
        'tgl'=>$sql['tgl'],
        'jenis'=>$sql['jenis'],
        'rincian'    =>$sql['rincian'],
        'penyebab'=>$sql['penyebab'],
        'kontrol'    =>$sql['kontrol'],
        'rencana'    =>$sql['rencana'],
        'penanganan'=>$sql['penanganan'],
        'keterangan'=>$sql['keterangan']); 
    if(isset($_POST['kirim'])){
      $inputData=array(
        'kode'=>$this->input->post('kode'),
        'tl'    =>$this->input->post('tl'),
        'wilayah'=>$this->input->post('wilayah'),
        'skor'    =>$this->input->post('skor'),
        'status'=>$this->input->post('status'),
        'tgl'    =>$this->input->post('tgl'),
        'jenis'=>$this->input->post('jenis'),
        'rincian'    =>$this->input->post('rincian'),
        'penyebab'=>$this->input->post('penyebab'),
        'kontrol'    =>$this->input->post('kontrol'),
        'rencana'=>$this->input->post('rencana'),
        'penanganan'         =>$this->input->post('penanganan'),
        'keterangan'=>$this->input->post('keterangan'),);
      $cek=$this->db->update('krisis',$inputData,array('id_krisis'=>$id));
      if($cek){
        $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Diedit.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/krisis'));
      }else{
       echo "ERROR input Data";
      }
    }else{
     tpl('admin/krisis_form',$x);
    }
  }

  
  public function krisis_hapus($id='')
  {
   $cek=$this->db->delete('krisis',array('id_krisis'=>$id));
   if ($cek) {
    $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/krisis'));
   }
  }
 

  


//bagian absensi  

  public function cari_krisis()
  {
  if($this->session->userdata('level') == "krisis"){  

     $id = $this->session->userdata('id_krisis');  
     $x['krisis']=$this->db->get_where('krisis',array('id_krisis'=>$id));
     $this->load->view('admin/data_krisis',$x);

  }elseif($this->session->userdata('level') == "admin"){

     $id=$this->input->post('cari_p');  
     $x['krisis']=$this->db->get_where('krisis',array('id_krisis'=>$id));
     $this->load->view('admin/data_krisis',$x);

  }elseif($this->session->userdata('level') == "user"){
     $id=$this->input->post('cari_p');  
     $x['krisis']=$this->db->get_where('krisis',array('id_krisis'=>$id));
     $this->load->view('admin/data_krisis',$x);
  }
}

  public function cari_tpp()
  {
  $id=$this->input->post('cari_p');  
  $x['data']=$this->m_admin->tpp_id($id);
  $this->load->view('admin/tpp',$x);
  }

  public function absensi()
  {
    $id   = ($this->session->userdata('level') == "krisis") ? $this->session->userdata('id_krisis') : $this->session->userdata('id_admin');
    $data = ($this->session->userdata('level') == "krisis") ? $this->m_admin->cari_krisis($id) : $this->m_admin->krisis();
    $x = array('judul' =>'Absensi krisis',
              'data'  =>$data); 
    tpl('admin/absensi',$x);
  }


public function aksi_abs()
{
 
  $id_krisis= $this->input->post('id_krisis');
  $bulan     = $this->input->post('bulan');
  
  $tanggal= date('Y-m-d');
  $hadir  = $this->input->post('hadir');
  $izin   = $this->input->post('izin');
  $tidak_hadir=$this->input->post('tidak_hadir'); 
  
  $hitung=$hadir+$izin+$tidak_hadir;
if ($hitung > 31) {
   buat_alert('Data Hadir Izin Dan Tidak Hadir Yang Anda Entrikan Lebih Dari 30');
}else{
  $cek=$this->db->query("SELECT * from absen where id_krisis='$id_krisis'
                          AND bulan='$bulan'");
  if ($cek->num_rows() > 0) {
    buat_alert('Data Absensi Sudah Ada .. Silahkan Pilih Abasensi Dengan Bulan Yang Lain');
  }else{
    
    if($hadir >= 10 ){
      $kehadiran='30%';
    }else if($hadir >= 20){
      $kehadiran='10%';
      if($hadir > 25){
        $kehadiran='5%';
      }
    }else if($hadir < 10) {
      $kehadiran='50%';
    }else{
      $kehadiran='0%';
    }
  
    $hasil=$this->m_admin->cari_overview($id_krisis)->row_array();
    $tunjangan=$hasil['tunjangan']-$kehadiran;
    $sql = array(
        'id_krisis'=>$id_krisis,
        'jumlah_tpp'=>$tunjangan,
        'jumlah_potongan'=>$kehadiran,
        'bulan_t'=>$bulan,
        'tahun'=>date("Y"),
        'tgl'=>date("Y-m-d"));
    $this->db->insert('tpp',$sql);
    $data = array(
                   'id_krisis' =>$id_krisis, 
                   'hadir'      =>$hadir,
                   'izin'       =>$izin,
                   'tidak_hadir'=>$tidak_hadir,
                   'bulan'=>$this->input->post('bulan'),
                   'tanggal'    =>date('Y-m-d'));
     $this->db->insert('absen',$data);
    buat_alert('Data Absensi Berhasil Di Tambahkan ..');
 }
}


}

//bagian gaji

public function cari_gaji_p()
{

$id=$this->input->post('cari_p');  
$x['krisis']=$this->m_admin->cari_krisis($id);
$this->load->view('admin/gaji_form',$x);

}

public function gaji_krisis()
{
 $x['judul'] ="Data Gaji krisis";
 $x['data']  =$this->m_admin->gaji_krisis(); 
 tpl('admin/gaji',$x);
}


public function gaji_tambah()
{
 if (isset($_POST['kirim'])) {
    $id_krisis=$this->input->post('id_krisis');
    $cek=$this->db->get_where('gaji',array('id_krisis'=>$id_krisis));
    if($cek->num_rows() > 0){
     buat_alert('Maaf Data Gaji Pada krisis Ini Telah Ada');
    }else{
    $Sql=array(
    'id_krisis'=>$this->input->post('id_krisis'),
    'jumlah'    =>$this->input->post('jumlah'));
    $this->db->insert('gaji',$Sql);
        $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Penggajian Berhasil Di Tambahkan.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/gaji_krisis'));
  }
}else{
   $x['judul'] ="Data Gaji krisis";
   $x['data']  =$this->m_admin->gaji_set(); 
   tpl('admin/set_gaji',$x);
  } 
 
}


public function gaji_hapus($id='')
{
   $cek=$this->db->delete('gaji',array('id_gaji'=>$id));
   if ($cek) {
    $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/gaji_krisis'));
   }
}

public function tpp()
{
 $x = array('judul' =>'Tunjangan Pendapatan krisis',
            'data'=>$this->m_admin->krisis_data()); 
  tpl('admin/tpp_set',$x);
}

public function tpp_hapus($id)
{
   $cek=$this->db->delete('tpp',array('id_krisis'=>$id));
   $cek=$this->db->delete('absen',array('id_krisis'=>$id));
   if ($cek) {
    $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/tpp'));

}
}

public function tpp_print($id='')
{
 $x = array('judul' =>'Print TPP Data',
             'data'=>$this->m_admin->tpp_print($id)->result_array()); 
 $this->load->view('laporan/print_tpp',$x);
}



//bagian Login Administrais User..


public function user_admin($value='')
{
$x = array('judul' =>'Data Hak Akses',
            'data' =>$this->db->get('admin')); 
 tpl('admin/user_admin',$x);
}

public function user_admin_tambah()
{
if(isset($_POST['kirim'])){
 $data = array(
                'username' =>$this->input->post('username'),
                'password' =>md5($this->input->post('password')),
                'nama' =>$this->input->post('nama'),
                'level' =>$this->input->post('level'), );
 $cek =$this->db->insert('admin',$data);
 if($cek){
      $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Edit.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/user_admin'));
 }else{
  buat_alert('SYSTEM ERROR');
 }
 
}else{
$x = array('judul' =>'Data Hak Akses',
           'username' =>'',
           'nama'     =>'',
           'data' =>$this->db->get('admin')); 
 tpl('admin/user_admin_form',$x);
}
}

public function user_admin_edit($id='')
{
$sql=$this->db->get_where('admin',array('id_admin'=>$id))->row_array();  
if(isset($_POST['kirim'])){
 $data = array(
                'username' =>$this->input->post('username'),
                'password' =>md5($this->input->post('password')),
                'nama' =>$this->input->post('nama'),
                'level' =>$this->input->post('level'),);
 $cek =$this->db->update('admin',$data,array('id_admin' =>$id));
 if($cek){
      $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Edit.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/user_admin'));
 }else{
  buat_alert('SYSTEM ERROR');
 }
}else{
$x = array('judul' =>'Edit Data Hak Akses',
            'username' =>$sql['username'],
            'nama'     =>$sql['nama'],
            'data' =>$this->db->get('admin')); 
 tpl('admin/user_admin_form',$x);
}
}
public function user_admin_hapus($id='')
{
 if($this->session->userdata('id_admin') == $id){
  $pesan='<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
              Anda Tidak Bisa Menghapus Anda Sendiri.
              </div>';
 $this->session->set_flashdata('pesan',$pesan);
 redirect(base_url('admin/user_admin'));

 }else{ 
 $this->db->delete('admin',array('id_admin' =>$id));
  $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
 $this->session->set_flashdata('pesan',$pesan);
 redirect(base_url('admin/user_admin'));
}
}

public function profil()
{
 if (isset($_POST['kirim'])) {
     $data = array('password' => md5($this->input->post('password')),
                    'nama'    => $this->input->post('nama'), );
      $this->db->update('admin',$data,array('id_admin'=>$this->session->userdata('id_admin')));
      $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Edit Password Anda Adalah '.$this->input->post('password').' .
              </div>';
   $this->session->set_flashdata('pesan',$pesan);
   redirect(base_url('admin/profil'));   
  }else{
   $x = array('judul' =>'Ubah Password Administrator', 
               'data' =>$this->db->get_where('admin',array('id_admin'=>$this->session->userdata('id_admin')))->row_array(),
             );
   tpl('admin/ubah_password',$x);            
  } 

}


public function profil_krisis($value='')
{
  if(isset($_POST['kirim'])){
    $vaPassword = array('password'=>$this->input->post('password'));
    $vaWhere    = array('id_krisis'=>$this->session->userdata('id_krisis'));
    if(isset($_FILES['gambar']['name'])){
      $config['upload_path'] = './template/data/'; 
      $config['allowed_types'] = 'bmp|jpg|png';  
      $config['file_name'] = 'foto_'.time();  
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if($this->upload->do_upload('gambar')){
        $vaFoto     = array('foto'=>$this->upload->file_name);
        $this->db->update('krisis',$vaFoto,$vaWhere);  
      }else{
        echo $this->upload->display_errors();
      }
    }
    
    if($this->input->post('password') !== ""){
      $this->db->update('krisis',$vaPassword,$vaWhere);  
    }
    
    $sql=array(
      'nip'=>$this->input->post('nip'),
      'nama'=>$this->input->post('nama'),
      'jk'=>$this->input->post('jk'),
      'agama'=>$this->input->post('agama'),
      'pendidikan'=>$this->input->post('pendidikan'),
      'alamat'=>$this->input->post('alamat'),
      'username'=>$this->input->post('username'),
    );
    
    
    $cek=$this->db->update('krisis',$sql,$vaWhere);
    if($cek){
       $pesan='<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                 Data Berhasil Di Edit.
                </div>';
      $this->session->set_flashdata('pesan',$pesan);
      redirect(base_url('admin/profil_krisis'));
    }else{
      buat_alert('ERROR');
    }
  }else{
    $data=$this->db->get_where('krisis',array('id_krisis' =>$this->session->userdata('id_krisis')))->row_array();
    $x = array(
       'judul' =>'.:: Edit Profil Anda ::.',
       'aksi'=>'edit',
       'foto'=>$data['foto'],
       'nama'=>$data['nama'],
       'jk'=>$data['jk'],
       'alamat'=>$data['alamat'],
       'nip'=>$data['nip'],
       'agama'=>$data['agama'],
       'pendidikan'=>$data['pendidikan'],
       'username'=>$data['username']);
      tpl('admin/profil_krisis',$x);
  }
}




public function keluar($value='')
{

$this->session->sess_destroy();
echo "<scrip>alert('Anda Telah Keluar Dari Halaman Administrator')</script>";;
redirect(base_url(''));
}
  
}