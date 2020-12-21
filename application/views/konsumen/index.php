<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Konsumen
    <br>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-
    "></i> Daftar Konsumen</a></li>
  </ol>


</section>
<div>
  <div>
  <h4>&nbsp;&nbsp;&nbsp;&nbsp;<i class="ion-pencil-b"></i> Daftar Konsumen</h4>
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="box box-primary">
                <div class="box-header">
                    <?= $this->session->flashdata('message'); ?>
                    <a href="<?= base_url('konsumen/tambah'); ?>" class="btn btn-primary pull-left"><i class="fa fa-plus"></i> Tambah Data Konsumen</a>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="table12">
                        <thead>
                            <tr>
                                <th style="width:5px;text-align:center; vertical-align:middle">No.</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Data Pemohon</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Data Pasangan</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Data Keluarga Dekat</th>
                                <th style="width:50px;text-align:center; vertical-align:middle">Progress</th>
                                <th style="width:20px;text-align:center; vertical-align:middle">Aksi</th>
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
           "url": "<?= site_url('konsumen/get_ajax')?>",
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
                "targets": [0, 2],
                "className": 'text-center'
            },
            {
                "targets": [0, 1],
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
