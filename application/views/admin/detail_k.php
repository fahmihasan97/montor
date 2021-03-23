<?= $this->session->flashdata('pesan') ?>
 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>T/L</th>
                  <th>Tower</th>
                  <th>Jenis</th>
                  <th>Status</th>
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
                 <td><?= $admin['tl'] ?></td> 
                 <td><?= $admin['tower'] ?></td>
                 <td><?= $admin['jenis'] ?></td>
                 <td><font color="red"><b><?= $admin['status'] ?></b></font></td> 
                 <td><?= $admin['tgl'] ?></td>
                 <td><?= $admin['update'] ?></td>
                 <td><?= $admin['penanganan'] ?></td>
                 <td><a href="" class="btn btn-info">Rincian</a></td> 
                 </tr>

                 <?php $no++; endforeach; ?>
                 
                 </tbody>
              </table>


 
 
 