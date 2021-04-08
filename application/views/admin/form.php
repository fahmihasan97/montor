<?= $this->session->flashdata('pesan') ?>
 <h3>Form Import</h3>
  <hr>

 <a href="<?php echo base_url("excel/format.xlsx"); ?>">Download Format</a><br><br>


 <!-- <table class="table table-reposive"> -->
  <form action="<?php echo base_url("admin/form"); ?>" method="POST" enctype="multipart/form-data">
  <input type="file" name="file">
  <input type="submit" name="preview" value="Preview">
  </form>
<!-- </table> -->

<?php
  if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
    if(isset($upload_error)){ // Jika proses upload gagal
      echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
      die; // stop skrip
    }
    // Buat sebuah tag form untuk proses import data ke database
    echo "<form method='post' action='".base_url("admin/import")."'>";

    // Buat sebuah div untuk alert validasi kosong
    echo "<div style='color: red;' id='kosong'>
    Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
    </div>";

    echo "<table id='example1' class='table table-bordered table-striped'>
    <thead>
    <tr>
      <th colspan='5'>Preview Data</th>
    </tr>
    <tr>
      <th>Tanggal</th>
      <th>Update</th>
      <th>UPT</th>
      <th>ULTG</th>
      <th>Penghantar</th>
      <th>KV</th>
      <th>Tower</th>
      <th>Jenis</th>
      <th>KKP</th>
      <th>Kelengkapan Lingkungan</th>
      <th>Kelengkapan Pondasi</th>
      <th>Kelengkapan Foto</th>
      <th>Skor Lingkungan</th>
      <th>Skor Pondasi</th>
      <th>Skor Hujan</th>
      <th>Klasifikasi Lingkungan</th>
      <th>Klasifikasi Pondasi</th>
      <th>Klasifikasi Hujan</th>
      <th>Anomali</th>
      <th>Tautan</th>
      <th>Risiko</th>
      <th>Mitigas</th>
      <th>Penanganan</th>
      <th>Keterangan</th>
      <th>Foto1</th>
      <th>Foto2</th>
      <th>Foto3</th>
      <th>Foto4</th>
    </tr>";
    echo "</thead><tbody>";

    $numrow = 1;
    $kosong = 0;

    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach($sheet as $row){
      // Ambil data pada excel sesuai Kolom
          $tgl = $row['A'];
          $update = $row['B'];
          $upt = $row['C']; 
          $ultg = $row['D'];
          $penghantar = $row['E'];
          $kv = $row['F'];
          $tower = $row['G'];
          $jenis= $row['H'];
          $kkp = $row['I'];
          $kelling = $row['J'];
          $kelpo = $row['K'];
          $kelfo = $row['L'];
          $skoli = $row['M'];
          $skopo = $row['N'];
          $skohu = $row['O']; 
          $klali = $row['P'];
          $klapo = $row['Q'];
          $klahu = $row['R']; 
          $anomali = $row['S'];
          $tautan = $row['T'];
          $penanganan = $row['U']; 
          $keterangan = $row['V'];
          $risiko = $row['W'];
          $mitigasi = $row['X']; 
          $foto = $row['Y'];
          $foto1 = $row['Z'];
          $foto2 = $row['AA']; 
          $foto3 = $row['AB'];

      // Cek jika semua data tidak diisi
      if($tgl == "" && $update == "" && $upt == "" && $ultg == "")
        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Validasi apakah semua data telah diisi
        $tgl_td = ( ! empty($tgl))? "" : " style='background: #E07171;'"; 
        $update_td = ( ! empty($update))? "" : " style='background: #E07171;'"; 
        $upt_td = ( ! empty($upt))? "" : " style='background: #E07171;'";  
        $ultg_td = ( ! empty($ultg))? "" : " style='background: #E07171;'";
        $penghantar_td = ( ! empty($penghantar))? "" : " style='background: #E07171;'"; 
        $penghantar_td = ( ! empty($penghantar))? "" : " style='background: #E07171;'"; 
        $kv_td = ( ! empty($kv))? "" : " style='background: #E07171;'";  
        $tower_td = ( ! empty($tower))? "" : " style='background: #E07171;'"; 
        $jenis_td = ( ! empty($jenis))? "" : " style='background: #E07171;'"; 
        $kkp_td = ( ! empty($kkp))? "" : " style='background: #E07171;'"; 
        $kelling_td = ( ! empty($kelling))? "" : " style='background: #E07171;'";  
        $kelpo_td = ( ! empty($kelpo))? "" : " style='background: #E07171;'";
        $kelfo_td = ( ! empty($kelfo))? "" : " style='background: #E07171;'"; 
        $skoli_td = ( ! empty($skoli))? "" : " style='background: #E07171;'"; 
        $skopo_td = ( ! empty($skopo))? "" : " style='background: #E07171;'";  
        $skohu_td = ( ! empty($skohu))? "" : " style='background: #E07171;'";
        $klali_td = ( ! empty($klali))? "" : " style='background: #E07171;'"; 
        $klapo_td = ( ! empty($klapo))? "" : " style='background: #E07171;'"; 
        $klahu_td = ( ! empty($klahu))? "" : " style='background: #E07171;'";  
        $anomali_td = ( ! empty($anomali))? "" : " style='background: #E07171;'";
        $tautan_td = ( ! empty($tautan))? "" : " style='background: #E07171;'"; 
        $risiko_td = ( ! empty($risiko))? "" : " style='background: #E07171;'";
        $mitigasi_td = ( ! empty($mitigasi))? "" : " style='background: #E07171;'";  
        $penanganan_td = ( ! empty($penanganan))? "" : " style='background: #E07171;'";  
        $keterangan_td = ( ! empty($keterangan))? "" : " style='background: #E07171;'";
        $foto_td = ( ! empty($foto))? "" : " style='background: #E07171;'"; 
        $foto1_td = ( ! empty($foto1))? "" : " style='background: #E07171;'"; 
        $foto2_td = ( ! empty($foto2))? "" : " style='background: #E07171;'";  
        $foto3_td = ( ! empty($foto3))? "" : " style='background: #E07171;'";

        // Jika salah satu data ada yang kosong
        if($tgl == "" && $update == "" && $upt == "" && $ultg == ""){
          $kosong++; // Tambah 1 variabel $kosong
        }

        echo "<tr>";
        echo "<td".$tgl_td.">".$tgl."</td>";
        echo "<td".$update_td.">".$update."</td>";
        echo "<td".$upt_td.">".$upt."</td>";
        echo "<td".$ultg_td.">".$ultg."</td>";
        echo "<td".$penghantar_td.">".$penghantar."</td>";
        echo "<td".$kv_td.">".$kv."</td>";
        echo "<td".$tower_td.">".$tower."</td>";
        echo "<td".$jenis_td.">".$jenis."</td>";
        echo "<td".$kkp_td.">".$kkp."</td>";
        echo "<td".$kelling_td.">".$kelling."</td>";
        echo "<td".$kelpo_td.">".$kelpo."</td>";
        echo "<td".$kelfo_td.">".$kelfo."</td>";
        echo "<td".$skoli_td.">".$skoli."</td>";
        echo "<td".$skopo_td.">".$skopo."</td>";
        echo "<td".$skohu_td.">".$skohu."</td>";
        echo "<td".$klali_td.">".$klali."</td>";
        echo "<td".$klapo_td.">".$klapo."</td>";
        echo "<td".$klahu_td.">".$klahu."</td>";
        echo "<td".$anomali_td.">".$anomali."</td>";
        echo "<td".$tautan_td.">".$tautan."</td>";
        echo "<td".$risiko_td.">".$risiko."</td>";
        echo "<td".$mitigasi_td.">".$mitigasi."</td>";
        echo "<td".$penanganan_td.">".$penanganan."</td>";
        echo "<td".$keterangan_td.">".$keterangan."</td>";
        echo "</tr>";
      }

      $numrow++; // Tambah 1 setiap kali looping
    }

    echo "</tbody></table>";

    // Cek apakah variabel kosong lebih dari 0
    // Jika lebih dari 0, berarti ada data yang masih kosong
    if($kosong > 0){
    ?>
      <script>
      $(document).ready(function(){
        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
        $("#jumlah_kosong").html('<?php echo $kosong; ?>');

        $("#kosong").show(); // Munculkan alert validasi kosong
      });
      </script>
    <?php
    }else{ // Jika semua data sudah diisi
      echo "<hr>";

      // Buat sebuah tombol untuk mengimport data ke database
      echo "<button type='submit' name='import'>Import</button>";
      echo "<a href='".base_url("admin")."'>Cancel</a>";
    }

    echo "</form>";
  }
  ?>



 
 