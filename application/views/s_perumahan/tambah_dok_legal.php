<!-- Content Header (Page header) -->
<link href="<?=base_url('assets/dropify/dist/css/dropify.min.css');?>" rel="stylesheet">
<section class="content-header">
  <h1>
    Perusahaan
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('s_perumahan'); ?>"><i class="fa fa-cubes"></i> Dokumen Legal</a></li>
    <li class="noselect">Tambah Dokumen Legal</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
        <div class="col-xs-12 col-md-7">
            <div class="box box-primary">
                <div class="box-header">
                    <?= $this->session->flashdata('message'); ?>
                    <h2>Form Tambah Dokumen Legal Unit</h2>
                </div>
                <div class="box-body">
                    <!-- <form action="" id='submit' method="POST" enctype="multipart/form-data" > -->
                    <form action="<?= base_url('s_perumahan/tambah_dok_legal'); ?>" method="post">
                        <div class="row">
                             <?= form_open_multipart('s_perumahan') ?>
                            <div class="col-xs-12 col-md-3">
                                <label for="nama_dokumen">Nama Dokumen</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <input type="text" id="nama_dokumen" name="nama_dokumen" class="form-control mb-2" value="" autocomplete="off">
                                <?= form_error('nama_dokumen', '<small style="color:red"">', '</small>') ?>
                            </div>

                            <div class="col-xs-12 col-md-3">
                                <label for="keterangan_dokumen">Keterangan Dokumen</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <input type="text" id="keterangan_dokumen" name="keterangan_dokumen" class="form-control mb-2" value="" autocomplete="off">
                                <?= form_error('keterangan_dokumen', '<small style="color:red"">', '</small>') ?>
                            </div>

                            <div class="col-xs-12 col-md-3">
                                <label for="status_dokumen">Status Dokumen</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                            <select class="form-control" id="status_dokumen" name="status_dokumen" style="display: block;">
                                <option value="" selected="selected">&nbsp;Pilih Status</option>
                                <option value='AKTIF'>&nbsp;Aktif</option>
                                <option value='TIDAK AKTIF'>&nbsp;Tidak Aktif</option>
                              </select>
                              <?= form_error('status_dokumen', '<small style="color:red"">', '</small>') ?>
                            </div>
                            
                            <div class="col-xs-12 col-md-3">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                <!-- <button class="btn btn-default" id='btnBatal'>Batal</button> -->
                                <a href="<?= base_url('s_perumahan'); ?>" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> Kembali</a>
                            </div>
                            <!-- <div class="col-xs-12 col-md-12">
                            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-send"></i> Simpan</button>
                            </div>
 -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
<!-- /.content -->

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

