<section class="content">
  <div class="row" id="formContainer" style="display: none;">
    <div class="col-md">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <div class="row">
            <div class="col-md-3">
              <h3 class="box-title">Form Master User</h3>
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
            <input type="hidden" name="user_id" id="user_id">
            <input type="hidden" name="act" id="act" value="add">
            <div class="form-group row">
              <label class="control-label col-md-3">Username</label>
              <div class="col-md-6">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                <input type="hidden" id="username_lama" name="username_lama" value="">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">User Fullname</label>
              <div class="col-md-6">
                <input type="text" class="form-control" id="user_fullname" name="user_fullname" placeholder="User Fullname">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Nama Group</label>
              <div class="col-md-6">
                <select class="form-control" id="group_id" name="group_id">
                  <?php foreach ($group as $key => $value) { ?>
                    <option value="<?= $value->group_id ?>"><?= $value->group_name ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Password</label>
              <div class="col-md-6">
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="col-md-2" id="inputGantiPassword">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="gantiPassword" name="gantiPassword"> Check me out
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Ulangi Password</label>
              <div class="col-md-6">
                <input type="password" class="form-control" id="password2" name="password2">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Status</label>
              <div class="col-md-6">
                <select class="form-control" id="user_aktif" name="user_aktif">
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
                <th class="text-center">Username</th>
                <th class="text-center">User Fullname</th>
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
          "url": "<?php echo base_url('ms_user/get_data') ?>",
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
            "width": "10%",
            "className": "text-center"
          },
          {
            "targets": [1],
            "width": "35%",
            "className": "text-left"
          },
          {
            "targets": [2],
            "width": "20%",
            "className": "text-left"
          },
          {
            "targets": [3],
            "width": "20%",
            "className": "text-center"
          },
          {
            "targets": [4],
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

  function loadTbl() {
    $("#table-reference").dataTable().fnDraw();
  }

  $(document).ready(function() {
    tableAdvancedInit.init();

  })



  // FUNGSI save
  $('#saveData').click(function(e) {
    console.log("ok");
    $('#form_vendor').submit()
  })


  $("#form_vendor").validate({
    // define validation rules
    rules: {
      username: {
        required: true,
        remote: {
          url: "<?= base_url() ?>ms_user/cek_username",
          type: "post",
          data: {
            username: function() {
              return $("#username").val();
            },
            act: function() {
              return $("#act").val();
            },
            username_lama: function() {
              return $("#username_lama").val();
            },
          }
        }
      },
      password: {
        required: true,
      },
      password2: {
        required: true,
        equalTo: "#password"
      },
    },
    messages: {
      username: {
        remote: "Username sudah ada!",
        required: "Isi Username!",
      },
      password: {
        required: "Isi Password!",
      },
      password2: {
        required: "Isi Password!",
        equalTo: "Password tidak sama dengan atasnya!",
      },
    },
    submitHandler: function(form) {
      // $('#save').addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
      $.ajax({
        url: '<?php echo base_url('ms_user/save') ?>',
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
    $('#tableContainer').slideUp(500)
    $('#formContainer').slideDown(500)
  })


  // FUNGSI reset form menggunakan ARROW FUNCTION JS
  const resetForm = () => {
    $('#act').val("add");
    $('#user_id').val("");
    $('#username_lama').val("");
    $('#password').removeAttr("disabled", "disabled");
    $('#password2').removeAttr("disabled", "disabled");
    $('#inputGantiPassword').hide();
    $('#form_vendor')[0].reset();
    $('#form_vendor').validate().resetForm();
  }


  // FUNGSI hapus
  function del(id) {
    if (confirm("Apakah Anda yakin menghapus data ini?")) {
      $.ajax({
        url: "<?php echo base_url() ?>ms_user/delete/" + id,
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
    $('#user_id').val(isi[0])
    $('#username').val(isi[1])
    $('#username_lama').val(isi[1])
    $('#user_fullname').val(isi[2])
    $('#group_id').val(isi[3])
    $('#user_aktif').val(isi[4])
    $("#password").attr("disabled", "disabled")
    $("#password2").attr("disabled", "disabled")
    $('#inputGantiPassword').show();
    $('#tableContainer').slideUp(500)
    $('#formContainer').slideDown(500)
  }


  // input checkbox on change
  $("#gantiPassword").change(function() {
    if ($(this).prop("checked")) {
      $("#password").removeAttr("disabled", "disabled")
      $("#password2").removeAttr("disabled", "disabled")
    } else {
      $("#password").attr("disabled", "disabled")
      $("#password2").attr("disabled", "disabled")
    }
  })
</script>