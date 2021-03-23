<a href="<?= base_url('admin/detal_k_tambah/') ?>" class="btn btn-primary">Tambah</a>
<br /><br /><br />
<?= $this->session->flashdata('pesan') ?>
 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>T/L</th>
                  <th>Wilayah</th>
                  <th>Skor</th>
                  <th>Status</th>
                  <th>Tgl Justifi</th>
                  <th>Tower</th>
                  <th>Rincian</th>
                  <th>Penyebab</th>
                  <th>Kontrol</th>
                  <th>Rencana</th>
                  <th>Penanganan</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                 <tbody>
                 <?php $no=1; foreach($data as $admin): ?>
                 <tr>
                 <td><?= $no ?></td>
                 <td><?= $admin['tl1'] ?></td> 
                 <td><?= $admin['tower1'] ?></td>
                 <td><?= $admin['jenis1'] ?></td>
                 <td><font color="red"><b><?= $admin['status1'] ?></b></font></td> 
                 <td><?= $admin['tgl1'] ?></td>
                 <td><?= $admin['update1'] ?></td>
                 <td><?= $admin['penanganan1'] ?></td>
                 <td><a href="<?= base_url('admin/krisis_edit/'.$admin['id_krisis']) ?>" class="btn btn-info">Edit</a> <a href="<?= base_url('admin/krisis_hapus/'.$admin['id_krisis']) ?>" class="btn btn-danger">Hapus</a></td> 
                 </tr>

                 <?php $no++; endforeach; ?>
                 
                 </tbody>
              </table>


 
 
 