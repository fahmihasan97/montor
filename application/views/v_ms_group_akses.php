<section class="content">
  <div class="row" id="formContainer">
    <div class="col-md">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <div class="row">
            <div class="col-md-3">
              <h3 class="box-title">Form Master Group</h3>
            </div>
          </div>
        </div>
        <!--begin: Datatable -->
        <form>
          <div class="box-body">
            <div class="form-group row">
              <label class="col-md-2" for="menu_id">Nama Menu</label>
              <div class="col-md-5">
                <select class="form-control" id="menu_id" name="menu_id">
                </select>
              </div>
              <div class="col-md-2"><button type="button" id="addMenu" class="btn btn-primary btn-sm">Tambah</button></div>
            </div>
            <div class="container">
              <div id="treeMenu"></div>
            </div>
          </div>
          <div class="box-footer">
            <div class="row">
              <div class="col-md-12 text-center">
                <button type="button" class="btn btn-danger" id="deleteMenu">Delete</button>
                <button type="button" class="btn btn-secondary" onclick="location.href = '<?= base_url() ?>ms_group';">Cancel</button>
              </div>
            </div>
          </div>
        </form>

        <!--end: Datatable -->
      </div>
    </div>
  </div>

  <!-- end:: Content -->
</section>

<script>
  const group_id = <?= $id ?>;
  $('#treeMenu').jstree({
    'plugins': ["checkbox", "types"],
    'core': {
      "themes": {
        "responsive": false,
        "icons": false,
      },
      "check_callback": true,
      'data': {
        'url': function(node) {
          return '<?= base_url() ?>ms_group/get_tree'
        },
        'data': function(node) {
          return {
            'group_id': group_id,
            'id': node.id,
          }
        },
        'dataType': 'json',
      },
      checkbox: {
        tie_selection: false
      },
    },
  }).bind('loaded.jstree', function(e, data) {})

  var sendData = (child, callback) => {
    let xhr = new XMLHttpRequest();
    const url = "<?= base_url() ?>ms_group/save_akses"
    let data = `group_id=${group_id}`
    child.forEach(element => {
      data += `&menu_id[]=${element}`;
    });
    xhr.open("POST", url);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.setRequestHeader("Accept", "application/json, text/javascript, */*; q=0.01");
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

    xhr.onreadystatechange = () => {
      if (xhr.readyState == 4 && xhr.status == 200) {
        callback(JSON.parse(xhr.responseText));
      }
    };

    xhr.send(data);
    return false;
  }


  function getMenuGroup() {
    $.get('<?= base_url() ?>ms_group/get_menu?group_id=' + group_id, function(res) {
      let opt = '';
      res.forEach((item, index) => {
        opt += `<option value="${item.menu_id}">${item.menu_kode} - ${item.menu_name}</option>`
      })
      document.getElementById("menu_id").innerHTML = opt
    }, 'json')
  }

  $('#menu_id').select2()

  $('#deleteMenu').click(function(e) {
    if ($('#treeMenu').find('a.jstree-clicked').length > 0) {
      const arrayCheckedMenu = [];
      $.each($('#treeMenu').find('a.jstree-clicked'), function(index, item) {
        arrayCheckedMenu.push($(item).attr('menu_id'));
      });

      $.post('<?= base_url() ?>ms_group/delete_akses', {
        group_id: group_id,
        menu_id: arrayCheckedMenu
      }, function(res) {
        if (res.stt == '1') {
          $('#treeMenu').jstree('refresh');
          getMenuGroup()
        } else {
          res.data
        }
      }, 'json');
    } else {
      alert("Pilih menu yang mau dihapus!")
    }
  })


  $(document).ready(function() {
    getMenuGroup();

    $('#addMenu').click(() => {
      $.post('<?= base_url() ?>ms_group/add_group_menu', {
        menu_id: $('#menu_id').val(),
        group_id: group_id,
      }, function(res) {
        if (res.stt == 1) {
          $('#treeMenu').jstree("refresh");
          getMenuGroup();
        }
      }, 'json')
    })

  })
</script>