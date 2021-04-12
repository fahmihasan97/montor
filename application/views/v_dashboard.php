<div class="row">
  <?php if ($this->session->userdata('group_id') == 1) : ?>
    <div class="col-12">
      <div class="small-box bg-aqua">
        <div class="inner">
          <div class="box">
            <div class="box-header">
              <h3>Jumlah Pegawai</h3>
            </div>
            <div class="box-body">
              <canvas id="dataJumlahUser" style="max-height:250px"></canvas>
            </div>
          </div>
        </div>
        <a href="<?php echo base_url('krisis') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  <?php endif; ?>
</div>
<div class="row">
  <div class="col-lg-6 col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <i class="fa fa-briefcase"></i>
        <h3 class="box-title">Klasifikasi Lingkungan</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <canvas id="dataKlaLi" style="height:250px"></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-6 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <i class="fa fa-briefcase"></i>
        <h3 class="box-title">Klasifikasi Pondasi</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <canvas id="dataKlaPo" style="height:250px"></canvas>
      </div>
    </div>
  </div>
</div>
<script>
  var pieKlaLi = document.getElementById('dataKlaLi').getContext('2d');
  var pieChartKL = new Chart(pieKlaLi, {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [],
        hoverOffset: 4
      }],
      labels: []
    }
  })
  var pieKlaPo = document.getElementById('dataKlaPo').getContext('2d');
  var pieChartKP = new Chart(pieKlaPo, {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [],
        hoverOffset: 4
      }],
      labels: []
    }
  })


  var barUserCanvas = document.getElementById('dataJumlahUser').getContext('2d');
  var barUser = new Chart(barUserCanvas, {
    type: 'bar',
    data: {
      datasets: [{
        data: [],
        borderWidth: 1,
        label: 'Jumlah User',
      }],
      labels: []
    },
    scales: {
      y: {
        beginAtZero: true
      }
    }
  })
  // pieChart.Doughnut(PieData, pieOptions)
  const getDataChart = (pie, url = "") => {
    $.ajax({
      url: url,
      dataType: "json",
      cache: false,
      success: function(res) {
        if (res.length > 0) {
          let new_data = new Object();
          new_data.data = []
          new_data.backgroundColor = []
          new_data.labels = []
          $.each(res, function(index, item) {
            new_data.data.push(parseInt(item.value))
            new_data.backgroundColor.push('rgb(' + Math.floor(Math.random() * 255) + ',' + Math.floor(Math.random() * 255) + ',' + Math.floor(Math.random() * 255) + ')')
            new_data.labels.push(item.label)
            if (res.length - 1 == index) {
              pie.data.datasets[0].data = new_data.data;
              pie.data.datasets[0].backgroundColor = new_data.backgroundColor;
              pie.data.labels = new_data.labels;
              pie.update();
            }
          })
        }
      }
    })
  }


  function getJumlahUser() {
    $.ajax({
      url: "<?= base_url() ?>dashboard/get_total_user",
      cache: false,
      dataType: "json",
      success: function(res) {
        if (res.length > 0) {
          let new_data = new Object();
          new_data.data = []
          new_data.backgroundColor = []
          new_data.labels = []
          $.each(res, function(index, item) {
            new_data.data.push(parseInt(item.value))
            new_data.backgroundColor.push('rgb(' + Math.floor(Math.random() * 255) + ',' + Math.floor(Math.random() * 255) + ',' + Math.floor(Math.random() * 255) + ')')
            new_data.labels.push(item.label)
            if (res.length - 1 == index) {
              barUser.data.datasets[0].data = new_data.data;
              barUser.data.datasets[0].backgroundColor = new_data.backgroundColor;
              barUser.data.labels = new_data.labels;
              barUser.update();
            }
          })
        }
      }
    })
  }
  $(document).ready(function() {
    getDataChart(pieChartKL, "<?= base_url() ?>dashboard/get_data/klali")
    getDataChart(pieChartKP, "<?= base_url() ?>dashboard/get_data/klapo")
    getJumlahUser()
  })
</script>