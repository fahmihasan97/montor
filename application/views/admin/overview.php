<?= $this->session->flashdata('pesan') ?>
 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Penghantar</th>
                  <th>Tower</th>
                  <th>Jenis</th>
                  <th>Tgl. Justifikasi</th>
                  <th>Update</th>
                  <th>Penanganan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                 <tbody>
                 <?php $no=1; foreach($data as $admin): ?>
                 <tr>
                 <td><?= $no ?></td>
                 <td><?= $admin['penghantar'] ?></td> 
                 <td><?= $admin['tower'] ?></td>
                 <td><?= $admin['jenis'] ?></td>
                 <td><?= $admin['tgl'] ?></td>
                 <td><?= $admin['update'] ?></td>
                 <td><?= $admin['penanganan'] ?></td>
                  <td><a href="<?= base_url('admin/details/'.$admin['id_krisis']) ?>" class="btn btn-success btn-md">Rincian</a></td>  
                 </tr>

                 <?php $no++; endforeach; ?>
                 
                 </tbody>
              </table>


 
 
 