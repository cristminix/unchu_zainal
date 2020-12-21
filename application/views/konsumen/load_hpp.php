



<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php 
        $sql="SELECT nama_proyek FROM tb_grup_proyek WHERE id_grup_proyek='$id_grup_proyek' ";
        $dt=$this->db->query($sql)->row();
        $nama_proyek=$dt->nama_proyek;
    ?>

    HPP RAB |  <?=$nama_proyek; ?>
    <!-- <small>HPP</small> -->
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-
    "></i> Atur Budgeting HPP Proyek </a></li>
  </ol>
</section>

<!-- Main content -->
<input type="hidden" name="id_grup_proyek" id="id_grup_proyek" value="<?=$id_grup_proyek;?>">
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="box box-primary">
                <div class="box-header">
                    <?php 
                    $url='s_perumahan/tambah_rab/'.$id_grup_proyek;
                    ?>
                    <?= $this->session->flashdata('message'); ?>
                      <a href="<?= base_url($url); ?>" class="btn btn-primary pull-left"><i class="fa fa-plus"></i> Tambah Data</a>
                    <a href="<?= base_url('s_perumahan'); ?>" class="btn btn-primary pull-right"><i class="fa fa-angle-left"></i> Kembali</a>

                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="table_rab" name="table_rab">
                        <thead>
                            <tr>
                                <th style="width:5px;text-align:center; vertical-align:middle">No.</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Tanggal</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Kelompok</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Volume</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Satuan</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Harga Satuan</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Jumlah RAB</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Jumlah Realisasi</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Sisa Anggaran</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->


<script>
  $(document).ready(function () {
    var id_grup_proyek = $('#id_grup_proyek').val();
    $('#table_rab').dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
           "url": "<?= site_url('s_perumahan/get_ajax_rab')?>",
           data:{"id_grup_proyek": id_grup_proyek},
            "type": "POST",
        },
        "iDisplayLength": 5,
        "aLengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "Semua"]],
        "columnDefs": [
            {
                "targets": [5, 6,7,8],
                "className": 'text-right'
            },
            {
                "targets": [0, 1,2,3,4],
                "className": 'text-center'
            },
            {
                // "targets": [0, 7, 8, 9, 10],
                "targets": [0, 2],
                "orderable": false
            }
        ],
        "order": [],
        "columns": [
            {
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false
            },
        ],
        "select": {
            style:    'os',
            selector: 'td:first-child'
        },
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Tampilkan _MENU_ data per halaman",
            "zeroRecords": "Data tidak ada",
            "info": "Tampilkan halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Tidak ada data ditemukan",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Cari",
            "paginate": {
                "first":      "Awal",
                "last":       "Akhir",
                "next":       "&raquo;",
                "previous":   "&laquo;"
            },
        }
    });
  });
</script>

<style type="text/css">
     table th { color:#fff; background-color:#00ACD7; line-height:35px; padding:0px;    }
 .pagingframe { float:right;    }
 .pagingframe div { padding-left:7px;padding-right:7px; }

</style>