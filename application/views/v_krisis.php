<?= $this->session->flashdata('pesan') ?>
<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
      <a href="<?= base_url('admin/krisis_tambah/') ?>" class="form-control btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i>Tambah</a>
    </div>
    <div class="col-md-3">
      <a href="<?php echo base_url("admin/form"); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Import Data Excel</a>
    </div>
    <div class="col-md-3">
      <a href="<?php echo base_url("admin/export"); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Export Data Excel</a><br><br>
    </div>
  </div>

  <table id="table-reference" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th class="text-center">No</th>
        <th class="text-center">T/L</th>
        <th class="text-center">Tower</th>
        <th class="text-center">Jenis</th>
        <th class="text-center">Klasifikasi Lingkungan</th>
        <th class="text-center">Klasifikasi Pondasi</th>
        <th class="text-center">Klasifikasi Hujan</th>
        <th class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
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
          ],
          "processing": true, //Feature control the processing indicator.
          "serverSide": true, //Feature control DataTables' server-side processing mode.
          // Load data for the table's content from an Ajax source
          "ajax": {
            "url": "<?php echo base_url('krisis/get_data') ?>",
            "dataType": "json",
            "type": "POST",
            // "data": function(d) {
            //   d.f_mmsi = $('#f_mmsi').val();
            // },
          },
          //Set column definition initialisation properties.
          columnDefs: [{
              "targets": [0, -1, -2, -3, -4], //last column
              "orderable": false, //set not orderable
            },
            {
              "targets": [0],
              "width": "5%",
              "className": "text-center"
            },
            {
              "targets": [1],
              "width": "20%"
            },
            {
              "targets": [2],
              "width": "5%"
            },
            {
              "targets": [3],
              "width": "10%"
            },
            {
              "targets": [4],
              "width": "15%",
              "className": "text-center"
            },
            {
              "targets": [5],
              "width": "15%",
              "className": "text-center"
            },
            {
              "targets": [6],
              "width": "15%",
              "className": "text-center"
            },
            {
              "targets": [7],
              "width": "15%",
              "className": "text-center"
            },
          ],
          "order": [
            [1, "asc"]
          ],

          "language": {
            // language settings
            "lengthMenu": "Display _MENU_ records",
            "search": "Search _INPUT_ <a class='btn default bts' href='javascript:void(0);'><i class='fa fa-search'></i></a>",
            "processing": '<img src="assets/plugins/global/images/owl.carousel/ajax-loader.gif"/><span>&nbsp;&nbsp;Loading...</span>',
            "infoEmpty": "No records found to show",
            "ajaxRequestGeneralError": "Could not complete request. Please check your internet connection",
            "emptyTable": "No data available in table",
            "zeroRecords": "No matching records found",
            "paginate": {
              "previous": "Prev",
              "next": "Next",
              "page": "Page",
              "pageOf": "of"
            }
          },
          "autoWidth": true, // disable fixed width and enable fluid table
          "orderCellsTop": true, // make sortable only the first row in thead
          "pagingType": "full_numbers", // pagination type(bootstrap, bootstrap_full_number or bootstrap_extended)
        });

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