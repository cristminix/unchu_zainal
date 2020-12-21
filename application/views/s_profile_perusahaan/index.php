<!-- Content Header (Page header) -->
<link href="<?=base_url('assets/dropify/dist/css/dropify.min.css');?>" rel="stylesheet">
<section class="content-header">
  <h1>
    Pengaturan
    <small>Profile Perusahaan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-wrench"></i> Profile Perusahaan</a></li>
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
                    <h2>Profile Perusahaan</h2>
                </div>
                <div class="box-body">
                    <form action="" id='submit' method="POST" enctype="multipart/form-data" >
                        <div class="row">
                             <?= form_open_multipart('s_profile_perusahaan') ?>
                            <div class="col-xs-12 col-md-3">
                                <label for="nama_perusahaan">Nama Perusahaan</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                            <input type="hidden" name="id_profile_perusahaan" value="<?= $profile['id_profile_perusahaan'] ?>">
                                <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control mb-2" value="<?= $profile['nama_perusahaan'] ?>" autocomplete="off">
                                <?= form_error('nama_perusahaan', '<small style="color:red"">', '</small>') ?>
                            </div>
                            <div class="col-xs-12 col-md-3">
                                <label for="alamat">Alamat</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <input type="text" id="alamat" name="alamat" class="form-control mb-2" value="<?= $profile['alamat'] ?>" autocomplete="off">
                                <?= form_error('alamat', '<small style="color:red"">', '</small>') ?>
                            </div>
                            <div class="col-xs-12 col-md-3">
                                <label for="no_telp">No Telp.</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <input type="text" id="no_telp" name="no_telp" class="form-control mb-2" value="<?= $profile['no_telp'] ?>" autocomplete="off"> 
                                <?= form_error('no_telp', '<small style="color:red"">', '</small>') ?>
                            </div>
                            <div class="col-xs-12 col-md-3">
                                <label for="email">Email</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <input type="text" id="email" name="email" class="form-control mb-2" value="<?= $profile['email'] ?>" autocomplete="off">
                                <?= form_error('email', '<small style="color:red"">', '</small>') ?>
                            </div>

                            <div class="col-xs-12 col-md-3">
                                <label for="website">Website</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <input type="text" id="website" name="website" class="form-control mb-2" value="<?= $profile['website'] ?>" autocomplete="off">
                                <?= form_error('website', '<small style="color:red"">', '</small>') ?>
                            </div>
                            <div class="col-xs-12 col-md-3">
                                <label for="nama_pimpinan">Nama Pimpinan</label>
                            </div>
                            <div class="col-xs-12 col-md-9">
                                <input type="text" id="nama_pimpinan" name="nama_pimpinan" class="form-control mb-2" value="<?= $profile['nama_pimpinan'] ?>" autocomplete="off">
                                <?= form_error('nama_pimpinan', '<small style="color:red"">', '</small>') ?>
                            </div>

                            <div class="col-xs-12 col-md-3">
                                <label for="log_perusahaan">Logo Perusahaan</label>
                            </div>
                             <div class="col-xs-12 col-md-9">
                                <label for="upload">Silahkan upload Logo Perusahaan dengan Max. File 2MB</label>
                                <input type="file" id="image" name="image" class="dropify" data-max-file-size="2M" data-default-file="<?php echo base_url($profile['logo_perusahaan']);?>" />
                            </div>
                            <div class="col-xs-12 col-md-3">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                <!-- <button type="reset" class="btn btn-default">Reset</button> -->
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
<script type="text/javascript" src="<?=base_url('assets/dropify/dist/js/dropify.min.js');?>"></script>
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


 <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
    <script>
     $(document).ready(function(){
        
        $('#submitx').submit(function(e){
            // var id_pegawai = $.trim($("#idpegawai").val());
            // var periode_awal = $.trim($("#periode_awal").val());
            // var periode_akhir = $.trim($("#periode_akhir").val());
            e.preventDefault(); 
                 $.ajax({
                    
                     url:"<?=site_url();?>s_profile_perusahaan/do_upload",
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                    
                     success: function(data){
                    
                   }
                 });
            });
         
 
    });
    </script>