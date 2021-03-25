<a href="<?= base_url('admin/krisis_tambah/') ?>" class="btn btn-primary">Tambah</a>
<br /><br /><br />
<?= $this->session->flashdata('pesan') ?>
 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Penghantar</th>
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
                 <td><?= $admin['kode'] ?></td> 
                 <td><?= $admin['tl'] ?></td>
                 <td><?= $admin['wilayah'] ?></td>
                 <td><?= $admin['skor'] ?></td>
                 <td><font color="red"><b><?= $admin['status'] ?></b></font></td> 
                 <td><?= $admin['tgl'] ?></td>
                 <td><?= $admin['jenis'] ?></td>
                  <td><?= $admin['rincian'] ?></td>
                 <td><?= $admin['penyebab'] ?></td>
                 <td><?= $admin['kontrol'] ?></td>
                 <td><?= $admin['rencana'] ?></td>
                 <td><?= $admin['penanganan'] ?></td>
                  <td><?= $admin['keterangan'] ?></td>
                 <td><a href="<?= base_url('admin/krisis_edit/'.$admin['id_krisis']) ?>" class="btn btn-info">Edit</a> <a href="<?= base_url('admin/krisis_hapus/'.$admin['id_krisis']) ?>" class="btn btn-danger">Hapus</a><a href="<?= base_url('admin/details/'.$admin['id_krisis']) ?>" class="btn btn-success btn-md">Rincian</a></td> 
                 </tr>

                 <?php $no++; endforeach; ?>
                 
                 </tbody>
              </table>
<script>
 $(document).ready(function() {
    $('#example1').DataTable( {
        "scrollX": true
    } );
} );
</script>

 
 
 