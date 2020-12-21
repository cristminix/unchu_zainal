<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Perumahan
    <br>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-
    "></i> Group Proyek</a></li>
  </ol>


<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#perumahan">PERUMAHAN</a></li>
  <li><a data-toggle="tab" href="#dok_perumahan">DOKUMEN PERUMAHAN</a></li>
 <!--  <li><a data-toggle="tab" href="#kontraktor">KONTRAKTOR</a></li>
  <li><a data-toggle="tab" href="#progress">PROGRESS BANGUN</a></li> -->
</ul>
</section>
<div class="tab-content">
  <div id="perumahan" class="tab-pane fade in active">
  <h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="ion-pencil-b"></i>    Daftar Group Proyek</h4>
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="box box-primary">
                <div class="box-header">
                    <?= $this->session->flashdata('message'); ?>
                    <a href="<?= base_url('s_perumahan/tambah'); ?>" class="btn btn-primary pull-left"><i class="fa fa-plus"></i> Tambah Group Proyek</a>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="table12">
                        <thead>
                            <tr>
                                <th style="width:5px;text-align:center; vertical-align:middle">No.</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Group Proyek</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Alamat Proyek</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Izin Proyek</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Klausul SPPR</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <!-- <tbody> -->
                        <!-- </tbody> -->
                    </table>
                </div>
            </div>
        </div>
    </div>
    </section>
    </div>

<div id="dok_perumahan" class="tab-pane fade">
    <h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="ion-pencil-b"></i>    Daftar Dokumen Legal Perumahan</h4>
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="box box-primary">
                <div class="box-header">
                    <?= $this->session->flashdata('message'); ?>
                    <a href="<?= base_url('s_perumahan/tambah_dok_legal'); ?>" class="btn btn-primary pull-left"><i class="fa fa-plus"></i> Tambah Dokumen Legal</a>
                </div>
                <div class="box-body table-responsive">
                    <!-- <table class="table table-bordered table-hover table-striped" id="table_dok_legal" style="width: 100px;"> -->
                    <table class="table table-bordered table-hover table-striped" id="table_dok_legal" style="width: 100%;">
                    <!-- <table class="table table-bordered table-hover table-striped" id="table12"> -->
                        <thead>
                            <tr>
                                <th style="width:5px;text-align:center; vertical-align:middle">No</th>
                                <th style="width:100px;text-align:center; vertical-align:middle">Nama Dokumen Legal</th>
                                <th style="width:100px;text-align:center; vertical-align:middle">Keterangan</th>
                                <th style="width:10px;text-align:center; vertical-align:middle">Tanggal Buat</th>
                                <th style="width:15px;text-align:center; vertical-align:middle">Dibuat</th>
                                <th style="width:15px;text-align:center; vertical-align:middle">Status</th>
                                <th style="width:5px;text-align:center; vertical-align:middle">Aksi</th>
                            </tr>
                        </thead>
                        <!-- <tbody> -->
                        <!-- </tbody> -->
                    </table>
                </div>
            </div>
        </div>
    </div>
    </section>
    </div>

 <div id="kontraktor" class="tab-pane fade">
    <h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="ion-pencil-b"></i>    Daftar Kontraktor</h4>
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="box box-primary">
                <div class="box-header">
                    <?= $this->session->flashdata('message'); ?>
                    <a href="<?= base_url('s_perumahan/tambah_kontraktor'); ?>" class="btn btn-primary pull-left"><i class="fa fa-plus"></i> Tambah Kontraktor</a>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="table_kontraktor">
                    <!-- <table class="table table-bordered table-hover table-striped" id="table12"> -->
                        <thead>
                            <tr>
                                <th style="width:5px;text-align:center; vertical-align:middle">No</th>
                                <th style="width:25px;text-align:center; vertical-align:middle">Nama Kontraktor</th>
                                <th style="width:25px;text-align:center; vertical-align:middle">Alamat</th>
                                <th style="width:25px;text-align:center; vertical-align:middle">No. Kontrak</th>
                                <th style="width:25px;text-align:center; vertical-align:middle">NPWP</th>
                                <th style="width:25px;text-align:center; vertical-align:middle">Status</th>
                                <th style="width:25px;text-align:center; vertical-align:middle">Legal</th>
                                <th style="width:15px;text-align:center; vertical-align:middle">SK SPK</th>
                                <th style="width:5px;text-align:center; vertical-align:middle">Aksi</th>
                            </tr>
                        </thead>
                        <!-- <tbody> -->
                        <!-- </tbody> -->
                    </table>
                </div>
            </div>
        </div>
    </div>
    </section>
    </div>


    <div id="progress" class="tab-pane fade">
    <h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="ion-pencil-b"></i>    Progress Pembangunan</h4>
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="box box-primary">
                <div class="box-header">
                    <?= $this->session->flashdata('message'); ?>
                    <a href="<?= base_url('s_perumahan/tambah_progress'); ?>" class="btn btn-primary pull-left"><i class="fa fa-plus"></i> Tambah Progress</a>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="table_progress">
                    <!-- <table class="table table-bordered table-hover table-striped" id="table12"> -->
                        <thead>
                            <tr>
                                <th style="width:5;text-align:center; vertical-align:middle">No</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Nama Progress</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Keterangan</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Tanggal Buat</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Tanggal Ubah</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Dibuat</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Status</th>
                                <th style="width:5px;text-align:center; vertical-align:middle">Aksi</th>
                            </tr>
                        </thead>
                        <!-- <tbody> -->
                        <!-- </tbody> -->
                    </table>
                </div>
            </div>
        </div>
    </div>
    </section>
    </div>



</div>

<!-- Main content -->

<!-- /.content -->


<script>
  $(document).ready(function () {
    $('#table12').dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
           "url": "<?= site_url('s_perumahan/get_ajax')?>",
            "type": "POST",
        },
        "iDisplayLength": 5,
        "aLengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "Semua"]],
        "columnDefs": [
            {
                "targets": [1],
                "className": 'text-center'
            },
            {
                "targets": [0, 2,3,4],
                "className": 'text-center'
            },
            {
                "targets": [0, 1, 2,3,4,5],
                "orderable": false
            }
        ],
        "order": [],
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

<!-- <script>
  $(document).ready(function () {
    $('#table_kontraktor').dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
           "url": "<?= site_url('s_perumahan/get_ajax')?>",
            "type": "POST",
        },
        "iDisplayLength": 5,
        "aLengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "Semua"]],
        "columnDefs": [
            {
                "targets": [1, 2],
                "className": 'text-right'
            },
            {
                "targets": [1, 2],
                "className": 'text-center'
            },
            {
                "targets": [0, 1, 2],
                "orderable": false
            }
        ],
        "order": [],
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
</script> -->

<!-- <script>
  $(document).ready(function () {
    $('#table_progress').dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
           "url": "<?= site_url('s_perumahan/get_ajax_progress')?>",
            "type": "POST",
        },
        "iDisplayLength": 5,
        "aLengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "Semua"]],
        "columnDefs": [
            {
                "targets": [1, 2],
                "className": 'text-right'
            },
            {
                "targets": [1, 2],
                "className": 'text-center'
            },
            {
                "targets": [0, 1, 2],
                "orderable": false
            }
        ],
        "order": [],
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
</script> -->

<script>
  $(document).ready(function () {
    $('#table_dok_legal').dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
           "url": "<?= site_url('s_perumahan/get_ajax_dok_legal')?>",
            "type": "POST",
        },
        "iDisplayLength": 5,
        "aLengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "Semua"]],
        "columnDefs": [
            {
                "targets": [0],
                "className": 'text-right'
            },
            {
                "targets": [0,3,5,6],
                "className": 'text-center'
            },
            {
                "targets": [0],
                "orderable": false
            }
        ],
        "order": [],
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


<div class="modal fade" tabindex="-1" role="dialog" id="modal-hapus">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title">Yakin ingin menghapus data <span id="modal-name"></span>?</h5>
      </div>
      <div class="modal-footer">
        <form id="form-hapus" action="<?= base_url('item/hapus'); ?>" method="post">
            
            <input type="hidden" name="id_item" id="modal_id_item" value="">
            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(document).on("click", "#hapus-item", function () {
     var id_item = $(this).data('id');
     var name = $(this).data('name');
     $("#modal_id_item").val( id_item );
     $("#modal-name").text( name );
});
</script>
<style type="text/css">
     table th { color:#fff; background-color:#00ACD7; line-height:35px; padding:0px;    }
/* table {
  width: 100%;
}*/
 .pagingframe { float:right;    }
 .pagingframe div { padding-left:7px;padding-right:7px; }

</style>
<script>    
$(function() {
     TriggerAlertClose();
});


function TriggerAlertClose() {
    window.setTimeout(function () {
        $(".alert").fadeTo(50, 0).slideUp(50, function () {
            $(this).remove();
        });
    }, 2000);
}

</script>
