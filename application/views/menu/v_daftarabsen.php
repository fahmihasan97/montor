<?= $this->session->flashdata('pesan') ?>
<div class="box">
  <div class="box-header">
    
    </div>
  </div>

  <table id="table-reference" class="table table-bordered table-striped">
    <thead>
      <tr>
        <tr>
                <th>No.</th>
                <th>User ID</th>
                <th>Absen Masuk</th>
                <th>Absen Keluar</th>
                <th class="text-left">Lat</th>
                <th class="text-left">long</th>
                <th class="text-center">Action</th>          
      </tr>
    </thead>
    <tbody>
        <?php
                                    $no = 1;
                                    foreach ($data->result_array() as $u) :
                                        $userid = $u['user_id'];
                                        $startdate = $u['start_date'];
                                        $enddate = $u['end_date'];
                                        $latitude = $u['lat'];
                                        $longitude = $u['lang'];
                                    ?>
                                        <tr>
                                            <td data-field="user"><?php echo $no++ ?></td>
                                            <td data-field="user"><?php echo $userid ?></td>
                                            <td data-field="start-date"><?php echo $startdate ?></td>
                                            <td data-field="end-date"><?php echo $enddate ?></td>
                                            <td data-field="lat"><?php echo $latitude ?></td>
                                            <td data-field="lang"><?php echo $longitude ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('maps/view/');
                                                            echo $u['id'] ?>" style="color: #fd7e15; margin-right: 5px" data-toggle="tooltip" data-placement="top" title="Lihat Detail Lokasi">
                                                    <span><img src="<?php echo base_url('assets/img/icons/map-marked.svg') ?>" width="25" height="25"></span>
                                                </a>
                                                <a href="<?= base_url('maps/delete/');
                                                            echo $u['id'] ?>" id="delete" style="color: #fd7e15" data-toggle="tooltip" data-placement="top" title="Hapus Data" onclick="return confirm('Yakin Hapus?')">
                                                    <span><img src="<?php echo base_url('assets/img/icons/trash.svg') ?>" width="25" height="25"></span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
    </tbody>
  </table>
  <script>
    var tableAdvancedInit = function() {

      var initTable1 = function() {
        var target = '#table-reference';
        var oTable = $(target).dataTable({
          "displayStart": 0,
          "pageLength": 10,
          "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
          ]

        jQuery(target + '_wrapper .dataTables_filter input').addClass("form-control input-small input-inline"); // modify table search input
        jQuery(target + '_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery(target + '_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
        jQuery(target + '_wrapper .dataTables_filter input').unbind();
        jQuery(target + '_wrapper .dataTables_filter input').bind('keyup', function(e) {
          if (e.keyCode == 13) {
            oTable.fnFilter(this.value);
          }
        });
        jQuery(target + '_wrapper .dataTables_filter a').bind('click', function(e) {
          var key = jQuery(target + '_wrapper .dataTables_filter input').val();
          oTable.fnFilter(key);
        });
      }

      return {
        // public functions
        init: function() {
          if (!jQuery().dataTable) {
            return;
          }
          initTable1();
        }
      };
    }();
    $(document).ready(function() {
      tableAdvancedInit.init()
      // $('#example1').DataTable({
      //   "scrollX": true
      // });
    });
  </script>
