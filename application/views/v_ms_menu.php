<section class="content">
  <div class="row" id="formContainer" style="display: none;">
    <div class="col-md">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <div class="row">
            <div class="col-md-3">
              <h3 class="box-title">Form Master Menu</h3>
            </div>
            <div class="col-md-9 text-right">
              <button class="btn btn-primary" id="btnListData">List Data</button>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form id="form_vendor">
          <div class="box-body">
            <input type="hidden" name="menu_id" id="menu_id">
            <input type="hidden" name="act" id="act" value="add">
            <input type="hidden" name="menu_level" id="menu_level" value="1">
            <input type="hidden" name="menu_level_lama" id="menu_level_lama" value="1">
            <div class="form-group row">
              <label class="control-label col-md-3">Parent</label>
              <div class="col-md-6">
                <select class="form-control" id="menu_parent_id" name="menu_parent_id" placeholder="Parent">
                  <option value="0" level="0">0 - ROOT</option>
                </select>
                <input type="hidden" id="menu_parent_kode" name="menu_parent_kode" value="">
                <input type="hidden" id="menu_parent_id_lama" name="menu_parent_id_lama" value="">
                <input type="hidden" id="menu_parent_kode_lama" name="menu_parent_kode_lama" value="">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Kode</label>
              <div class="col-md-6">
                <input type="text" class="form-control" id="menu_kode" name="menu_kode" placeholder="Kode Menu">
                <input type="hidden" id="menu_kode_lama" name="menu_kode_lama" value="">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Nama</label>
              <div class="col-md-6">
                <input type="text" class="form-control" id="menu_name" name="menu_name" placeholder="Nama Menu">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Link / Url</label>
              <div class="col-md-6">
                <input type="text" class="form-control" id="menu_link" name="menu_link" placeholder="URL Menu">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Icon</label>
              <div class="col-md-6">
                <input type="text" class="form-control" id="menu_icon" name="menu_icon" placeholder="Ikon Menu">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Status</label>
              <div class="col-md-6">
                <select class="form-control" id="menu_aktif" name="menu_aktif" placeholder="Status Menu">
                  <option value="1">Aktif</option>
                  <option value="0">Non Aktif</option>
                </select>
              </div>
            </div>
          </div>
          <!-- /.box-body -->

        </form>
        <div class="box-footer">
          <div class="row">
            <div class="col-md-12 text-center">
              <button type="button" class="btn btn-primary" id="saveData">Save</button>
              <button type="button" class="btn btn-default" id="cancelData">Cancel</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="row" id="tableContainer">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <div class="row">
            <div class="col-md-3">
              <h3 class="box-title">List User</h3>
            </div>
            <div class="col-md-9 text-right">
              <button class="btn btn-primary" id="btnFormData">Tambah Data</button>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered" id="table-reference">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Kode</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Link</th>
                <th class="text-center">Parent</th>
                <th class="text-center">Status</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

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
          "url": "<?php echo base_url('ms_menu/get_data') ?>",
          "dataType": "json",
          "type": "POST",
          // "data": function(d) {
          //   d.f_mmsi = $('#f_mmsi').val();
          // },
        },
        //Set column definition initialisation properties.
        columnDefs: [{
            "targets": [0, -2, -1], //last column
            "orderable": false, //set not orderable
          },
          {
            "targets": [0],
            "width": "5%",
            "className": "text-center"
          },
          {
            "targets": [1],
            "width": "15%",
            "className": "text-left"
          },
          {
            "targets": [2],
            "width": "15%",
            "className": "text-left"
          },
          {
            "targets": [3],
            "width": "10%",
            "className": "text-center"
          },
          {
            "targets": [4],
            "width": "10%",
            "className": "text-center"
          },
          {
            "targets": [5],
            "width": "5%",
            "className": "text-center"
          },
          {
            "targets": [6],
            "width": "10%",
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

  function loadTbl() {
    $("#table-reference").dataTable().fnDraw();
  }

  $(document).ready(function() {
    tableAdvancedInit.init();
  })



  // FUNGSI save
  $('#saveData').click(function(e) {
    $('#form_vendor').submit()
  })


  $("#form_vendor").validate({
    // define validation rules
    rules: {
      menu_parent_id: {
        remote: {
          url: "<?= base_url() ?>ms_menu/cek_parent",
          type: "post",
          data: {
            menu_parent_id: function() {
              return $("#menu_parent_id").val();
            },
            menu_id: function() {
              return $("#menu_id").val();
            },
          }
        }
      },
      menu_kode: {
        required: true,
        remote: {
          url: "<?= base_url() ?>ms_menu/cek_menu_kode",
          type: "post",
          data: {
            menu_kode: function() {
              return $("#menu_kode").val();
            },
            act: function() {
              return $("#act").val();
            },
            menu_kode_lama: function() {
              return $("#menu_kode_lama").val();
            },
          }
        }
      },
      menu_name: {
        required: true,
      },
    },
    messages: {
      menu_kode: {
        required: "Isi Kode Menu!",
      },
      menu_name: {
        required: "Isi Nama Menu!",
      },
    },
    submitHandler: function(form) {
      // $('#save').addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
      $.ajax({
        url: '<?php echo base_url('ms_menu/save') ?>',
        type: "POST",
        data: $('#form_vendor').serialize(),
        dataType: "json",
        cache: false,
        success: function(response, status, xhr, $form) {
          console.log(response);
          var d = response;
          if (d == 'true') {
            // $('#save').removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
            $("#cancelData").click();
            loadTbl();
          }
        }
      }, 'json');
    }
  });


  $('#btnListData,#cancelData').click(function() {
    resetForm()
    $('#tableContainer').slideDown(500)
    $('#formContainer').slideUp(500)
  })


  $('#btnFormData').click(function() {
    resetForm()
    getMenu()
    $('#tableContainer').slideUp(500)
    $('#formContainer').slideDown(500)
  })


  // FUNGSI reset form menggunakan ARROW FUNCTION JS
  const resetForm = () => {
    $('#act').val("add");
    $('#menu_id').val("");
    $('#menu_level').val(1);
    $('#menu_level_lama').val(1);
    $('#menu_parent_id').val("0").trigger("change.select2");
    $('#menu_parent_kode,#menu_parent_id_lama,#menu_parent_kode_lama,#menu_kode_lama').val("");
    $('#form_vendor')[0].reset();
    $('#form_vendor').validate().resetForm();
  }


  // FUNGSI hapus
  function del(id) {
    if (confirm("Apakah Anda yakin menghapus data ini?")) {
      $.ajax({
        url: "<?php echo base_url() ?>ms_menu/delete/" + id,
        cache: false,
        dataType: "json",
        success: function(res) {
          if (res == "true") {
            loadTbl()
          }
        }
      })
    }
  }


  // FUNGSI edit
  function edit(params) {
    const isi = params.split('|')
    $('#act').val("edit")
    $('#menu_id').val(isi[0])
    $('#menu_kode').val(isi[1])
    $('#menu_kode_lama').val(isi[1])
    $('#menu_name').val(isi[2])
    $('#menu_link').val(isi[3])
    $('#menu_aktif').val(isi[4])
    $('#menu_level').val(isi[5])
    $('#menu_level_lama').val(isi[5])
    getMenu(isi[6])
    $('#menu_parent_id_lama').val(isi[6])
    $('#menu_parent_kode').val(isi[7])
    $('#menu_parent_kode_lama').val(isi[7])
    $('#menu_icon').val(isi[8])
    $('#tableContainer').slideUp(500)
    $('#formContainer').slideDown(500)
  }


  // FUNGSI get menu parent
  function getMenu(selectedItem = 0) {
    $('#menu_parent_id option[value!="0"]').remove()
    $.ajax({
      url: "<?= base_url() ?>ms_menu/get_menu",
      cache: false,
      dataType: "json",
      success: function(res) {
        let opt = selected = "";
        if (res.length > 0) {
          $.each(res, function(index, item) {
            if (item.menu_id == selectedItem) {
              selected = "selected"
            } else {
              selected = ""
            }
            opt += `<option level="${item.menu_level}" value="${item.menu_id}" kode="${item.menu_kode}" ${selected}>${item.menu_kode} - ${item.menu_name}</option>`
            if (res.length - 1 == index) {
              $("#menu_parent_id").append(opt)
            }
          })
        }
      }
    })
  }


  // fungsi select2
  $("#menu_parent_id").select2().on("select2:select", function(event) {
    $('#menu_parent_kode').val($(event.currentTarget).find("option:selected").attr("kode"));
    $('#menu_level').val(parseInt($(event.currentTarget).find("option:selected").attr("level")) + 1);
  });
</script>