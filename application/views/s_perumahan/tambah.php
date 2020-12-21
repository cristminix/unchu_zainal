<!-- Content Header (Page header) -->
<link href="<?=base_url('assets/dropify/dist/css/dropify.min.css');?>" rel="stylesheet">
<!-- Load Roboto font -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href="<?=base_url('assets/leaflet/leaflet.css');?>" rel="stylesheet">
<script src="<?=base_url('assets/leaflet/leaflet.js');?>"></script>
<script src="<?=base_url('assets/plugins/jQuery/2.1.4.jquery.min.js');?>"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
<link href="<?=base_url('assets/editor/editor.css');?>" rel="stylesheet" type="text/css">
<script src="<?=base_url('assets/editor/editor.js');?>"></script>
<!-- Load css styles -->
<section class="content-header">
  <h1>
    Tambah Group Proyek
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('s_perumahan'); ?>"><i class="fa fa-cubes"></i> Group Proyek</a></li>
    <li class="noselect">Tambah Group Proyek</li>
  </ol>
</section>

<!-- Main content -->
<div class="container">
    <div class="row">
      <section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="1 - Proyek">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-th"></i> <a style="font-size: 15px; "><center>Proyek</center></a>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="2 - Perizinan dan Siteplan">
                            <span class="round-tab">  
                                <i class="glyphicon glyphicon-file"></i> <a style="font-size: 15px; "><center>Perizinan dan Siteplan</center></a>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="3 - Klausul SPPR">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-tasks"></i> <a style="font-size: 15px; "><center>Klausul SPPR</center></a>
                            </span>
                        </a>
                    </li>

                    <!-- <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li> -->
                </ul>
            </div>

            <form role="form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <div class="step1">
                            <div class="row">
                        <div class="col-sm-12">
                          <div class="panel-body">
                            <form id="content-form" method="post" action="" enctype="multipart/form-data" class="form-inline">
                              <div class="table-responsive">
                              <table class="table">
                              
                              <tr>
                                <td width="20%">&nbsp;&nbsp;Nama Proyek</td>
                                <td>
                                <input onkeydown="if(event.keyCode == '13'){$('#alamat_proyek').focus();}"   type="text" id="nama_proyek" name="nama_proyek" class="form-control"   value="">
                                </td>
                              </tr>
                              
                              <tr>
                                <td>&nbsp;&nbsp;Alamat Proyek</td>
                                <td>
                                <input  onkeydown="if(event.keyCode == '13'){$('#alamat_proyek').focus();}"   type="text" id="alamat_proyek" name="alamat_proyek" class="form-control"  value="">
                                </td>
                              </tr>

                               <tr>
                                <td>&nbsp;&nbsp;Provinsi</td>
                                <td>
                               <select class="form-control" id="propinsi" name="propinsi" style="display: block;">
                                <option value="" selected="selected">&nbsp;Pilih Provinsi</option>
                                <option value='11'>&nbsp;Aceh</option>
                                <option value='51'>&nbsp;Bali</option>
                                <option value='36'>&nbsp;Banten</option>
                                <option value='17'>&nbsp;Bengkulu</option>
                                <option value='34'>&nbsp;DI Yogyakarta</option>
                                <option value='31'>&nbsp;DKI Jakarta</option>
                                <option value='75'>&nbsp;Gorontalo</option>
                                <option value='15'>&nbsp;Jambi</option>
                                <option value='32'>&nbsp;Jawa Barat</option>
                                <option value='33'>&nbsp;Jawa Tengah</option>
                                <option value='35'>&nbsp;Jawa Timur</option>
                                <option value='61'>&nbsp;Kalimantan Barat</option>
                                <option value='63'>&nbsp;Kalimantan Selatan</option>
                                <option value='62'>&nbsp;Kalimantan Tengah</option>
                                <option value='64'>&nbsp;Kalimantan Timur</option>
                                <option value='65'>&nbsp;Kalimantan Utara</option>
                                <option value='19'>&nbsp;Kepulauan Bangka Belitung</option>
                                <option value='21'>&nbsp;Kepulauan Riau</option>
                                <option value='18'>&nbsp;Lampung</option>
                                <option value='81'>&nbsp;Maluku</option>
                                <option value='82'>&nbsp;Maluku Utara</option>
                                <option value='52'>&nbsp;Nusa Tenggara Barat</option>
                                <option value='53'>&nbsp;Nusa Tenggara Timur</option>
                                <option value='94'>&nbsp;Papua</option>
                                <option value='91'>&nbsp;Papua Barat</option>
                                <option value='14'>&nbsp;Riau</option>
                                <option value='76'>&nbsp;Sulawesi Barat</option>
                                <option value='73'>&nbsp;Sulawesi Selatan</option>
                                <option value='72'>&nbsp;Sulawesi Tengah</option>
                                <option value='74'>&nbsp;Sulawesi Tenggara</option>
                                <option value='71'>&nbsp;Sulawesi Utara</option>
                                <option value='13'>&nbsp;Sumatera Barat</option>
                                <option value='16'>&nbsp;Sumatera Selatan</option>
                                <option value='12'>&nbsp;Sumatera Utara</option>
                              </select>
                                </td>
                              </tr>

                              <tr>
                                <td>&nbsp;&nbsp;Kota/Kab</td>
                                <td>
                               <select class="form-control" id="kota" name="kota" style="display: block;">
                                <option value="" selected="selected">&nbsp;Pilih Kota/Kabupaten</option>
                              </select>
                                </td>
                              </tr>

                              <tr>
                                <td>&nbsp;&nbsp;Kecamatan</td>
                                <td>
                               <select class="form-control" id="kecamatan" name="kecamatan" style="display: block;">
                                  <option value="" selected="selected">&nbsp;Pilih Kecamatan</option>
                                </select>
                                </td>
                              </tr>

                              <tr>
                                <td>&nbsp;&nbsp;Kelurahan</td>
                                <td>
                                <select class="form-control" id="kelurahan" name="kelurahan" style="display: block;">
                                  <option value="" selected="selected">&nbsp;Pilih Kelurahan</option>
                                </select>
                                </td>
                              </tr>

                               <tr>
                                <td>&nbsp;&nbsp;Luas Tanah (m2)</td>
                                <td>
                                <input  onkeydown="if(event.keyCode == '13'){$('#jml_unit').focus();}"   type="text" id="luas_tanah" name="luas_tanah" class="form-control"  value="">
                                </td>
                              </tr>

                               <tr>
                                <td>&nbsp;&nbsp;Jumlah Unit</td>
                                <td>
                                <input  onkeydown="if(event.keyCode == '13'){$('#klasifikasi').focus();}"   type="text" id="jml_unit" name="jml_unit" class="form-control"  value="">
                                </td>
                              </tr>

                              <tr>
                                <td>&nbsp;&nbsp;Klasifikasi</td>
                                <td>
                                <input  onkeydown="if(event.keyCode == '13'){$('#konsep').focus();}"   type="text" id="klasifikasi" name="klasifikasi" class="form-control"  value="">
                                </td>
                              </tr>

                              <tr>
                                <td>&nbsp;&nbsp;Konsep</td>
                                <td>
                                <input  onkeydown="if(event.keyCode == '13'){$('#segmentasi').focus();}"   type="text" id="konsep" name="konsep" class="form-control"  value="">
                                </td>
                              </tr>

                              <tr>
                                <td>&nbsp;&nbsp;Segmentasi</td>
                                <td>
                                <input  onkeydown="if(event.keyCode == '13'){$('#segmentasi').focus();}"   type="text" id="segmentasi" name="segmentasi" class="form-control"  value="">
                                </td>
                              </tr>
                              
                                </table>
                              </div>
                            </form>
                            </div>
                        </div>
                      </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step">Selanjutnya  <i class='glyphicon glyphicon-forward'></i> </button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <div class="step2">
                            <div class="step_21">
                                <div class="row">
                                   
                                  <div class="col-sm-6">
                                  <div class="panel-body">
                                    <form id="content-form" method="post" action="" enctype="multipart/form-data" class="form-inline">
                                      <div class="table-responsive">
                                      <table class="table">
                                      
                                      <tr>
                                        <td width="30%">&nbsp;&nbsp;No. IMB</td>
                                        <td>
                                        <input onkeydown="if(event.keyCode == '13'){$('#no_izin_lokasi').focus();}"   type="text" id="no_imb" name="no_imb" class="form-control"   value="">
                                        </td>
                                      </tr>
                                      
                                      <tr>
                                        <td>&nbsp;&nbsp;No. Izin Lokasi</td>
                                        <td>
                                        <input  onkeydown="if(event.keyCode == '13'){$('#no_pengesahan').focus();}"   type="text" id="no_izin_lokasi" name="no_izin_lokasi" class="form-control"  value="">
                                        </td>
                                      </tr>

                                       <tr>
                                        <td>&nbsp;&nbsp;No. Pengesahan</td>
                                        <td>
                                        <input  onkeydown="if(event.keyCode == '13'){$('#no_shgb_induk').focus();}"   type="text" id="no_pengesahan" name="no_pengesahan" class="form-control"  value="">
                                        </td>
                                      </tr>

                                       <tr>
                                        <td>&nbsp;&nbsp;No. SHGB Induk</td>
                                        <td>
                                        <input  onkeydown="if(event.keyCode == '13'){$('#klasifikasi').focus();}"   type="text" id="no_shgb_induk" name="no_shgb_induk" class="form-control"  value="">
                                        </td>
                                      </tr>  
                                      <tr>
                                        <td>&nbsp;&nbsp;Gambar Siteplan</td>
                                        <td>
                                        <label for="upload">Silahkan upload dengan Max. File 2MB</label>
                                        <input type="file" id="image_siteplan" name="image_siteplan" class="dropify" data-max-file-size="2M" data-default-file="" />      
                                        </td>
                                      </tr>

                                        </table>
                                      </div>
                                    </form>
                                    </div>
                                </div>


                                  <div class="col-sm-6">
                                  <div class="panel-body">
                                    <form id="content-form" method="post" action="" enctype="multipart/form-data" class="form-inline">
                                      <div class="table-responsive">
                                      <table class="table">
                                      
                                      <tr>
                                        <td width="90%" style="text-align: right;">&nbsp;&nbsp;File IMB</td>
                                        <td>
                                       <input type="file" name="image_imb" id="image_imb" class="form-control">
                                        </td>
                                      </tr>
                                      
                                      <tr>
                                        <td style="text-align: right;">&nbsp;&nbsp;File Izin Lokasi</td>
                                        <td>
                                       <input type="file" name="image_file_lokasi" id="image_file_lokasi" class="form-control">
                                        </td>
                                      </tr>

                                       <tr>
                                        <td style="text-align: right;">&nbsp;&nbsp;File Pengesahan</td>
                                        <td>
                                       <input type="file" name="image_file_pengesahan" id="image_file_pengesahan" class="form-control">
                                        </td>
                                      </tr>

                                       <tr>
                                        <td style="text-align: right;">&nbsp;&nbsp;File SHGB Induk</td>
                                        <td>
                                         <input type="file" name="image_file_shgb_induk" id="image_file_shgb_induk" class="form-control">
                                        </td>
                                      </tr>  
                                      <tr>
                                        <td style="text-align: right;">&nbsp;&nbsp;Street Map</td>
                                        <td>
                                         <div class="map-wrapper">
                                            <div class="container">
                                                <div class="row-fluid">
                                                  <input type="text" name="text" id='longitude' name='longitude' class="form-control" onkeydown="if(event.keyCode == '13'){jQuery('#latitude').focus();}"> 
                                                  <input type="text" name="text" id='latitude' name='latitude' class="form-control" >
                                                    <div class="span5 centered">
                                                       <div id="mapDiv" style="width: 300px; height: 200px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        </td>
                                      </tr>

                                        </table>
                                      </div>
                                    </form>
                                    </div>
                                </div>


                                </div>
                            </div>
                            <div class="step-22">
                            
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step"><i class='glyphicon glyphicon-backward'></i>   Kembali</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Selanjutnya  <i class='glyphicon glyphicon-forward'></i> 
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <div class="step33">
                        <h5><strong>Klausul SPPR</strong></h5>
                        <hr>
                            
                       <div class="row">
                           <div class="col-sm-12">
                          <div class="panel-body">
                            <form id="content-form" method="post" action="" enctype="multipart/form-data" class="form-inline">
                              <div class="table-responsive">
                              <table class="table">
                              
                              <tr>
                                <td width="20%">&nbsp;&nbsp;No. Rekening</td>
                                <td>
                                <input onkeydown="if(event.keyCode == '13'){$('#kop_surat').focus();}"   type="text" id="no_rekening" name="no_rekening" class="form-control" style="width:100%;"  value="">
                                </td>
                              </tr>
                              
                              <tr>
                                <td>&nbsp;&nbsp;Nama Kop Surat</td>
                                <td>
                                <input  onkeydown="if(event.keyCode == '13'){$('#alamat_kantor').focus();}"   type="text" id="kop_surat" name="kop_surat" class="form-control" style="width:100%;" value="">
                                </td>
                              </tr>

                               <tr>
                                <td>&nbsp;&nbsp;Alamat Kantor</td>
                                <td>
                                <input  onkeydown="if(event.keyCode == '13'){$('#propinsi2').focus();}"   type="text" id="alamat_kantor" name="alamat_kantor" class="form-control" style="width:100%;" value="">
                                </td>
                              </tr>

                               <tr>
                                <td>&nbsp;&nbsp;Provinsi</td>
                                <td>
                               <select class="form-control" id="propinsi2" name="propinsi2" style="width:100%;">
                                <option value="" selected="selected">&nbsp;Pilih Provinsi</option>
                                <option value='11'>&nbsp;Aceh</option>
                                <option value='51'>&nbsp;Bali</option>
                                <option value='36'>&nbsp;Banten</option>
                                <option value='17'>&nbsp;Bengkulu</option>
                                <option value='34'>&nbsp;DI Yogyakarta</option>
                                <option value='31'>&nbsp;DKI Jakarta</option>
                                <option value='75'>&nbsp;Gorontalo</option>
                                <option value='15'>&nbsp;Jambi</option>
                                <option value='32'>&nbsp;Jawa Barat</option>
                                <option value='33'>&nbsp;Jawa Tengah</option>
                                <option value='35'>&nbsp;Jawa Timur</option>
                                <option value='61'>&nbsp;Kalimantan Barat</option>
                                <option value='63'>&nbsp;Kalimantan Selatan</option>
                                <option value='62'>&nbsp;Kalimantan Tengah</option>
                                <option value='64'>&nbsp;Kalimantan Timur</option>
                                <option value='65'>&nbsp;Kalimantan Utara</option>
                                <option value='19'>&nbsp;Kepulauan Bangka Belitung</option>
                                <option value='21'>&nbsp;Kepulauan Riau</option>
                                <option value='18'>&nbsp;Lampung</option>
                                <option value='81'>&nbsp;Maluku</option>
                                <option value='82'>&nbsp;Maluku Utara</option>
                                <option value='52'>&nbsp;Nusa Tenggara Barat</option>
                                <option value='53'>&nbsp;Nusa Tenggara Timur</option>
                                <option value='94'>&nbsp;Papua</option>
                                <option value='91'>&nbsp;Papua Barat</option>
                                <option value='14'>&nbsp;Riau</option>
                                <option value='76'>&nbsp;Sulawesi Barat</option>
                                <option value='73'>&nbsp;Sulawesi Selatan</option>
                                <option value='72'>&nbsp;Sulawesi Tengah</option>
                                <option value='74'>&nbsp;Sulawesi Tenggara</option>
                                <option value='71'>&nbsp;Sulawesi Utara</option>
                                <option value='13'>&nbsp;Sumatera Barat</option>
                                <option value='16'>&nbsp;Sumatera Selatan</option>
                                <option value='12'>&nbsp;Sumatera Utara</option>
                              </select>
                                </td>
                              </tr>

                              <tr>
                                <td>&nbsp;&nbsp;Kota/Kab</td>
                                <td>
                               <select class="form-control" id="kota2" name="kota2" style="width:100%;">
                                <option value="" selected="selected">&nbsp;Pilih Kota/Kabupaten</option>
                              </select>
                                </td>
                              </tr>

                              <tr>
                                <td>&nbsp;&nbsp;Kecamatan</td>
                                <td>
                               <select class="form-control" id="kecamatan2" name="kecamatan2" style="width:100%;">
                                  <option value="" selected="selected">&nbsp;Pilih Kecamatan</option>
                                </select>
                                </td>
                              </tr>

                              <tr>
                                <td>&nbsp;&nbsp;Kelurahan</td>
                                <td>
                                <select class="form-control" id="kelurahan2" name="kelurahan2" style="width:100%;">
                                <option value="" selected="selected">&nbsp;Pilih Kelurahan</option>
                              </select>
                                </td>
                              </tr>

                               <tr>
                                  <td>&nbsp;&nbsp;Logo</td>
                                  <td>
                                  <input type="file" id="image_logo" name="image_logo" class="dropify" data-max-file-size="2M" data-default-file="" />      
                                  </td>
                                </tr>

                                <tr>
                                  <td>&nbsp;&nbsp;Foto Kavling</td>
                                  <td>
                                  <input type="file" id="image_kav1" name="image_kav1" class="dropify" data-max-file-size="2M" data-default-file="" />      
                                  <input type="file" id="image_kav2" name="image_kav2" class="dropify" data-max-file-size="2M" data-default-file="" />      
                                  <input type="file" id="image_kav3" name="image_kav3" class="dropify" data-max-file-size="2M" data-default-file="" />      
                                  </td>
                                </tr>

                               <tr>
                                <td>&nbsp;&nbsp;Klausul SPPR</td>
                                <td>
                                <div id="klausul_sppr"></div>
                                </td>
                              </tr>
                                </table>
                              </div>
                            </form>
                            </div>
                        </div>
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                          <li><button type="button" class="btn btn-default prev-step"><i class='glyphicon glyphicon-backward'></i>   Kembali</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full" id='simpan' name='simpan' onclick="simpanGrupProyek();" ><i class='glyphicon glyphicon-floppy-disk'></i>  SIMPAN</button></li>
                        </ul>
                    </div>
                  
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
   </div>
</div>
 <!-- wysuhtml5 Plugin JavaScript -->
<script type="text/javascript">

  $(document).ready( function() {

  $("#klausul_sppr").Editor();                   

  });

  </script>
<script type="text/javascript" src="<?=base_url('assets/dropify/dist/js/dropify.min.js');?>"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

       
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
<script type="text/javascript">
  $(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}


//according menu

$(document).ready(function()
{
    //Add Inactive Class To All Accordion Headers
    $('.accordion-header').toggleClass('inactive-header');
  
  //Set The Accordion Content Width
  var contentwidth = $('.accordion-header').width();
  $('.accordion-content').css({});
  
  //Open The First Accordion Section When Page Loads
  $('.accordion-header').first().toggleClass('active-header').toggleClass('inactive-header');
  $('.accordion-content').first().slideDown().toggleClass('open-content');
  
  // The Accordion Effect
  $('.accordion-header').click(function () {
    if($(this).is('.inactive-header')) {
      $('.active-header').toggleClass('active-header').toggleClass('inactive-header').next().slideToggle().toggleClass('open-content');
      $(this).toggleClass('active-header').toggleClass('inactive-header');
      $(this).next().slideToggle().toggleClass('open-content');
    }
    
    else {
      $(this).toggleClass('active-header').toggleClass('inactive-header');
      $(this).next().slideToggle().toggleClass('open-content');
    }
  });
  
  return false;
});
</script>

<script>
$("#propinsi").change(function(){
    var propinsi = $("#propinsi").val();
  // alert(propinsi);
    $.ajax({
    url: "<?=site_url();?>s_perumahan/getWilKota/",
    type:"POST",  
        data: {'propinsi':propinsi,<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function(data){
            $("#kota").html(data);
      $("#kecamatan").html("<option value=''>&nbsp;Pilih Kecamatan</option>");
      $("#kelurahan").html("<option value=''>&nbsp;Pilih Kelurahan</option>");
    }
    });
});

$("#kota").change(function(){
  var propinsi = $("#propinsi").val();
    var kota = $("#kota").val();
    $.ajax({
        url: "<?=site_url();?>s_perumahan/getWilKec/",
    type:"POST",  
        data: {"propinsi" : propinsi, "kota" : kota,<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function(data){
            $("#kecamatan").html(data);
      $("#kelurahan").html("<option value=''>&nbsp;Pilih Kelurahan</option>");
    }
    });
});

$("#kecamatan").change(function(){
    var kota = $("#kota").val();
  var kec = $("#kecamatan").val();
    $.ajax({
        url: "<?=site_url();?>s_perumahan/getWilKel/",
    type:"POST",  
        data:  {"kota" : kota, "kec" : kec,<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function(data){
            $("#kelurahan").html(data);
    }
    });
});


$("#propinsi2").change(function(){
    var propinsi2 = $("#propinsi2").val();
  // alert(propinsi);
    $.ajax({
    url: "<?=site_url();?>s_perumahan/getWilKota/",
    type:"POST",  
        data: {'propinsi':propinsi2,<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function(data){
            $("#kota2").html(data);
          $("#kecamatan2").html("<option value=''>&nbsp;Pilih Kecamatan</option>");
          $("#kelurahan2").html("<option value=''>&nbsp;Pilih Kelurahan</option>");
    }
    });
});

$("#kota2").change(function(){
  var propinsi2 = $("#propinsi2").val();
    var kota2 = $("#kota2").val();
    $.ajax({
        url: "<?=site_url();?>s_perumahan/getWilKec/",
    type:"POST",  
        data: {"propinsi" : propinsi2, "kota" : kota2,<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function(data){
            $("#kecamatan2").html(data);
            $("#kelurahan2").html("<option value=''>&nbsp;Pilih Kelurahan</option>");
    }
    });
});

$("#kecamatan2").change(function(){
    var kota2 = $("#kota2").val();
  var kec2 = $("#kecamatan2").val();
    $.ajax({
        url: "<?=site_url();?>s_perumahan/getWilKel/",
    type:"POST",  
        data:  {"kota" : kota2, "kec" : kec2,<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function(data){
            $("#kelurahan2").html(data);
    }
    });
});

function simpanGrupProyek(){
  var nama_proyek = $('#nama_proyek').val();
  var alamat_proyek = $('#alamat_proyek').val();
  var propinsi = $('#propinsi').val();
  var kota = $('#kota').val();
  var kecamatan = $('#kecamatan').val();
  var kelurahan = $('#kelurahan').val();
  var luas_tanah = $('#luas_tanah').val();
  var jml_unit = $('#jml_unit').val();
  var klasifikasi = $('#klasifikasi').val();
  var konsep = $('#konsep').val();
  var segmentasi = $('#segmentasi').val();
  var no_imb = $('#no_imb').val();
  var no_izin_lokasi = $('#no_izin_lokasi').val();
  var no_pengesahan = $('#no_pengesahan').val();
  var no_shgb_induk = $('#no_shgb_induk').val();
  var image_file_pengesahan = $('#image_file_pengesahan').val();
  var image_file_shgb_induk = $('#image_file_shgb_induk').val();
  var image_siteplan  = $('#image_siteplan').val();
  var image_file_lokasi = $('#image_file_lokasi').val();
  var image_imb = $('#image_imb').val();
  var longitude = $('#longitude').val();
  var latitude = $('#latitude').val();

  var no_rekening = $('#no_rekening').val();
  var kop_surat = $('#kop_surat').val();
  var alamat_kantor = $('#alamat_kantor').val();
  var propinsi2 = $('#propinsi2').val();
  var kota2 = $('#kota2').val();
  var kecamatan2 = $('#kecamatan2').val();
  var kelurahan2 = $('#kelurahan2').val();
  var image_logo = $('#image_logo').val();
  var image_kav1 = $('#image_kav1').val();
  var image_kav2 = $('#image_kav2').val();
  var image_kav3 = $('#image_kav3').val();
  // var klausul_sppr = $('#klausul_sppr').text();
  var klausul_sppr = $('.Editor-editor').text();
  // alert(klausul_sppr);
  $.ajax({
    type:"POST",
    async : false,
    url:"<?=base_url();?>s_perumahan/simpan_grup_proyek",
    data:{"nama_proyek":nama_proyek,"alamat_proyek":alamat_proyek,"propinsi":propinsi,"kota":kota,"kecamatan":kecamatan,"kelurahan":kelurahan,"luas_tanah":luas_tanah,"jml_unit":jml_unit,"klasifikasi":klasifikasi,"konsep":konsep,"segmentasi":segmentasi,"no_imb":no_imb,"no_izin_lokasi":no_izin_lokasi,"no_pengesahan":no_pengesahan,"no_shgb_induk":no_shgb_induk,"image_siteplan":image_siteplan,"image_file_lokasi":image_file_lokasi,"image_file_pengesahan":image_file_pengesahan,"image_file_shgb_induk":image_file_shgb_induk, "longitude":longitude, "latitude":latitude,"no_rekening":no_rekening,"kop_surat":kop_surat,"alamat_kantor":alamat_kantor,"propinsi2":propinsi2,"kota2":kota2,"kecamatan2":kecamatan2,"kelurahan2":kelurahan2,"image_logo":image_logo,"image_kav1":image_kav1,"image_kav2":image_kav2,"image_kav3":image_kav3,"klausul_sppr":klausul_sppr,"image_imb":image_imb},
    success:function(data){
      if(data=="sukses"){ 
        alert('Input Data Sukses');
          // $('#myModal').modal('toggle'); 
          // gridpagingA("1");         
      }else{
        alert('Input Data Gagal!!');
      }
    },//tutup::success
    dataType:"html"
  });//tutup ajax
}




</script>


<!-- 
<script type="text/javascript">

var tileLayer = new L.TileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png',{
 attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
});


var lon = 106.640914;
var lat =-6.171515;

$('#latitude').val(lat);
$('#longitude').val(lon);

var map = new L.Map('mapDiv', {
  'center': [lat, lon],
  'zoom': 16,
  'layers': [tileLayer]
});

var marker = L.marker([lat, lon],{
  draggable: false
}).addTo(map);

marker.on('dragend', function (e) {
  $('#latitude').val(marker.getLatLng().lat);
  $('#longitude').val(marker.getLatLng().lng);

});
    
</script> -->


<style type="text/css">
  .wizard {
    margin: 20px auto;
    background: #fff;
}

    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 70%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #5bc0de;
    
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}

span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}

.wizard .nav-tabs > li {
    width: 25%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #5bc0de;
    transition: 0.1s ease-in-out;
}

.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #5bc0de;
}

.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 50px;
}

.wizard h3 {
    margin-top: 0;
}
.step1 .row {
    margin-bottom:10px;
}
.step_21 {
    border :1px solid #eee;
    border-radius:5px;
    padding:10px;
}
.step33 {
    border:1px solid #ccc;
    border-radius:5px;
    padding-left:10px;
    margin-bottom:10px;
}
.dropselectsec {
    width: 68%;
    padding: 6px 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    color: #333;
    margin-left: 10px;
    outline: none;
    font-weight: normal;
}
.dropselectsec1 {
    width: 74%;
    padding: 6px 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    color: #333;
    margin-left: 10px;
    outline: none;
    font-weight: normal;
}
.mar_ned {
    margin-bottom:10px;
}
.wdth {
    width:25%;
}
.birthdrop {
    padding: 6px 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    color: #333;
    margin-left: 10px;
    width: 16%;
    outline: 0;
    font-weight: normal;
}


/* according menu */
#accordion-container {
    font-size:13px
}
.accordion-header {
    font-size:13px;
  background:#ebebeb;
  margin:5px 0 0;
  padding:7px 20px;
  cursor:pointer;
  color:#fff;
  font-weight:400;
  -moz-border-radius:5px;
  -webkit-border-radius:5px;
  border-radius:5px
}
.unselect_img{
  width:18px;
  -webkit-user-select: none;  
  -moz-user-select: none;     
  -ms-user-select: none;      
  user-select: none; 
}
.active-header {
  -moz-border-radius:5px 5px 0 0;
  -webkit-border-radius:5px 5px 0 0;
  border-radius:5px 5px 0 0;
  background:#F53B27;
}
.active-header:after {
  content:"\f068";
  font-family:'FontAwesome';
  float:right;
  margin:5px;
  font-weight:400
}
.inactive-header {
  background:#333;
}
.inactive-header:after {
  content:"\f067";
  font-family:'FontAwesome';
  float:right;
  margin:4px 5px;
  font-weight:400
}
.accordion-content {
  display:none;
  padding:20px;
  background:#fff;
  border:1px solid #ccc;
  border-top:0;
  -moz-border-radius:0 0 5px 5px;
  -webkit-border-radius:0 0 5px 5px;
  border-radius:0 0 5px 5px
}
.accordion-content a{
  text-decoration:none;
  color:#333;
}
.accordion-content td{
  border-bottom:1px solid #dcdcdc;
}



@media( max-width : 585px ) {

    .wizard {
        width: 90%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
}
</style><!-- /.content -->
<script type="text/javascript">
var tileLayer = new L.TileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png',{
 attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
});

var lon = 106.54918668558823;
var lat =-6.185042567920796;

$('#latitude').val(lat);
$('#longitude').val(lon);

var map = new L.Map('mapDiv', {
  'center': [lat, lon],
  'zoom': 12,
  'layers': [tileLayer]
});

var marker = L.marker([lat, lon],{
  draggable: true
}).addTo(map);

marker.on('dragend', function (e) {
  $('#latitude').val(marker.getLatLng().lat);
  $('#longitude').val(marker.getLatLng().lng);

});

</script>