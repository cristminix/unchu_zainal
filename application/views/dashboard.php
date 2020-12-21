<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
    <small>Dasbor</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <?= $this->session->flashdata('message'); ?>

      <?php if($this->session->userdata('level') == 1): ?>
   <!-- Info boxes -->
      
      <!-- /.row -->
      <?php endif; ?>

      
      

</section>
<!-- /.content -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> -->
<script src="<?= base_url('assets'); ?>/bower_components/chart.js/Chart.min.js"></script>

<script>
  var ctx = document.getElementById('myChart').getContext('2d');  
  var chart = new Chart(ctx, {    
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [
          {
            label: 'Penjualan Bulanan (Jumlah) Tahun <?=date('Y')?>',
            backgroundColor: 'rgb(0,192,239)',
            data: [<?= $bulan1 ?>, <?= $bulan2 ?>, <?= $bulan3 ?>, <?= $bulan4 ?>, <?= $bulan5 ?>, <?= $bulan6 ?>, <?= $bulan7 ?>, <?= $bulan8 ?>, <?= $bulan9 ?>, <?= $bulan10 ?>, <?= $bulan11 ?>, <?= $bulan12 ?>]
          }
        
        ]
    },
    // Configuration options go here
    options: {
      tooltips: {
        callbacks: {
            label: function(tooltipItem, data) {
                return tooltipItem.yLabel + " Transaksi";
            }
        }
      },
      scales: {
        yAxes: [{
            display: true,
            ticks: {
              suggestedMin: 0,
              stepSize: 3,
            }
          }]
        }
      }
  });

  var ctx = document.getElementById('myChart2').getContext('2d');  
  var chart = new Chart(ctx, {    
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: [<?php foreach($produkBulananTerlaris as $row){$nama[] = "'".$row['name']."'";}echo implode(', ', $nama);?>],
        datasets: [{
            label: '10 Produk Terlaris Bulan Ini',
            backgroundColor: 'rgb(0,166,90)',
            data: [<?php foreach($produkBulananTerlaris as $row){$jumlah[] = $row['jumlah'];}echo implode(', ', $jumlah);?>]
        }]
    },
    // Configuration options go here
    options: {
      tooltips: {
        callbacks: {
            label: function(tooltipItem, data) {
                return tooltipItem.yLabel + " Terjual";
            }
        }
     },
     scales: {
        yAxes: [{
            display: true,
            ticks: {
                suggestedMin: 0,
                stepSize: 15
            }
          }]
        }
      }
  });

  var ctx = document.getElementById('myChart4').getContext('2d');  
  var chart = new Chart(ctx, {    
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: [<?php foreach($jumlahStokMin as $row){$nama_brg[] = "'".$row['name']."'";}echo implode(', ', $nama_brg);?>],
        datasets: [{
            label: 'Produk dengan sisa stok kurang atau sama dengan 10',
            backgroundColor: 'rgb(221,75,57)',
            data: [<?php foreach($jumlahStokMin as $row){$jumlah_stock[] = $row['stock'];}echo implode(', ', $jumlah_stock);?>]
        }]
    },
    // Configuration options go here
    options: {
      tooltips: {
        callbacks: {
            label: function(tooltipItem, data) {
                return tooltipItem.yLabel;
            }
        }
     },
     scales: {
        yAxes: [{
            display: true,
            ticks: {
                suggestedMin: 0,
                stepSize: 15
            }
          }]
        }
      }
  });

  var ctx = document.getElementById('myChart3').getContext('2d');  
  var chart = new Chart(ctx, {    
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        datasets: [
          {
            label: 'Penjualan Bulanan (Pendapatan) Tahun <?=date('Y')?>',
            backgroundColor: 'rgb(60,141,188)',
            data: [<?= $pendapatan1 ?>, <?= $pendapatan2 ?>, <?= $pendapatan3 ?>, <?= $pendapatan4 ?>, <?= $pendapatan5 ?>, <?= $pendapatan6 ?>, <?= $pendapatan7 ?>, <?= $pendapatan8 ?>, <?= $pendapatan9 ?>, <?= $pendapatan10 ?>, <?= $pendapatan11 ?>, <?= $pendapatan12 ?>]
          }
        
        ]
    },
    // Configuration options go here
    options: {
        tooltips: {
          callbacks: {
              label: function(tooltipItem, data) {
                return "Rp. " + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                    return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
                });
            }
          }
        },
       scales: {
        yAxes: [
            {
                ticks: {
                    suggestedMin: 0,
                    stepSize: 1000000,
                    callback: function(label, index, labels) {
                        // return label/1000+'k'; 
                        return "Rp. " + Intl.NumberFormat().format(label);
                    }
                    
                }
            }
          ]
        }
      }
  });
</script>