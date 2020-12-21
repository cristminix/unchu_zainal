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

<link href="<?php echo base_url('assets/datatables/css/jquery.dataTables.min.css')?>" rel="stylesheet">
<script src="<?php echo base_url('assets/datatables/js/jquery-2.2.3.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>

<!-- Load css styles -->
<section class="content-header">
  <h1>
    Tambah Data Konsumen
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('konsumen'); ?>"><i class="fa fa-cubes"></i> Konsumen</a></li>
    <li class="noselect">Tambah Data Konsumen</li>
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
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="1 - Data Pemohon">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-th"></i> <a style="font-size: 15px; "><center>Data Pemohon</center></a>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="2 - Data Pekerjaan dan Penghasilan">
                            <span class="round-tab">  
                                <i class="glyphicon glyphicon-file"></i> <a style="font-size: 15px; "><center>Data Pekerjaan dan Penghasilan</center></a>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="3 - Data Pinjaman & Aset/Kekayaaan">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-tasks"></i> <a style="font-size: 15px; "><center>Data Pinjaman & Aset/Kekayaaan</center></a>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form role="form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <div class="step1">
                        <div class="row">
                        <div class="col-sm-6">
                          <div class="panel-body">
                            <form id="content-form" method="post" action="" enctype="multipart/form-data" class="form-inline">
                              <div class="table-responsive">
                                <h3>DATA PRIBADI PEMOHON</h3>
                              <table class="table">
                              <input type="hidden" name="temp_kode" id="temp_kode" value="<?=$temp_kode?>">
                              <tr>
                                <td width="30%">&nbsp;&nbsp;Nama Lengkap</td>
                                <td>
                                <input onkeydown="if(event.keyCode == '13'){$('#tempat_lahir').focus();}"   type="text" id="nama_lengkap" name="nama_lengkap" class="form-control"   value="">
                                </td>
                              </tr>
                              
                              <tr>
                                <td>&nbsp;&nbsp;Tempat Lahir</td>
                                <td>
                                <input onkeydown="if(event.keyCode == '13'){$('#tgl_lahir').focus();}"   type="text" id="tempat_lahir" name="tempat_lahir" class="form-control"  value="">
                                </td>
                              </tr>

                              <tr>
                                <td>&nbsp;&nbsp;Tanggal Lahir</td>
                                <td for='xx'>
                                 <select Name='tgl_lahir' id="tgl_lahir" class="form-control inline" style="width: 100px" >
                                    <option value="">Tanggal</option>

                                    <?php
                                    for ($x1=1; $x1<=31; $x1++)
                                      {
                                        echo'<option value="'.$x1.'">'.$x1.'</option>'; 
                                      } 
                                    ?> 
                                </select>
                                <select class="form-control inline" id="bln_lahir" name="bln_lahir" style="width: 100px"> 
                                <option value="" selected="selected">&nbsp;Bulan</option>
                                <option value='01'>&nbsp;Januari</option>
                                <option value='02'>&nbsp;Februari</option>
                                <option value='03'>&nbsp;Maret</option>
                                <option value='04'>&nbsp;April</option>
                                <option value='05'>&nbsp;Mei</option>
                                <option value='06'>&nbsp;Juni</option>
                                <option value='07'>&nbsp;Juli</option>
                                <option value='08'>&nbsp;Agustus</option>
                                <option value='09'>&nbsp;September</option>
                                <option value='10'>&nbsp;Oktober</option>
                                <option value='11'>&nbsp;November</option>
                                <option value='12'>&nbsp;Desember</option>
                              </select>
                                <select id="thn_lahir" Name='thn_lahir'  class="form-control inline"  style="width: 100px">
                                    <option value="">Tahun</option>

                                    <?php
                                    for ($x=date("Y"); $x>1930; $x--)
                                      {
                                        echo'<option value="'.$x.'">'.$x.'</option>'; 
                                      } 
                                    ?> 
                                </select>
                                </td>
                              </tr>

                              <tr>
                                <td>&nbsp;&nbsp;Identitas</td>
                                <td>
                                <select class="form-control inline" id="jns_identitas" name="jns_identitas" style="width: 150px" onchange="$('#identitas').focus();"> 
                                  <option value="" selected="selected">&nbsp;Jenis Identitas</option>
                                  <option value='KTP'>&nbsp;KTP</option>
                                  <option value='SIM'>&nbsp;SIM</option>
                                  <option value='PASSPORT'>&nbsp;PASSPORT</option>
                                </select>
                                <input onkeydown="if(event.keyCode == '13'){$('#alamat_rumah').focus();}"   type="text" id="identitas" name="identitas" class="form-control inline"  value="" style="width: 250px">
                                </td>
                              </tr>

                              <tr>
                                <td>&nbsp;&nbsp;Alamat Rumah</td>
                                <td>
                                <input onkeydown="if(event.keyCode == '13'){$('#alamat_proyek').focus();}"   type="text" id="alamat_rumah" name="alamat_rumah" class="form-control"  value="">
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
                                <td>&nbsp;&nbsp;Kota/Kab.</td>
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
                                <td>&nbsp;&nbsp;Status Pernikahan</td>
                                <td>
                                <select class="form-control inline" id="status_pernikahan" name="status_pernikahan" style="width: 150px" onchange=""> 
                                  <option value="" selected="selected">&nbsp;Pilih Status</option>
                                  <option value='MENIKAH'>&nbsp;MENIKAH</option>
                                  <option value='BELUM MENIKAH'>&nbsp;BELUM MENIKAH</option>
                                  <option value='JANDA'>&nbsp;JANDA</option>
                                  <option value='DUDA'>&nbsp;DUDA</option>
                                </select>
                                </td>
                              </tr>
                              
                               <tr>
                                  <td>&nbsp;&nbsp;Upload Pass Foto</td>
                                  <td>
                                  <label for="upload">Silahkan upload dengan Max. File 2MB</label>
                                  <input type="file" id="image_pass_foto" name="image_pass_foto" class="dropify" data-max-file-size="2M" data-default-file="" />      
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
                              <h3 style="color:white">_</h3>
                              <table class="table">
                              
                              <tr>
                                <td width="30%">&nbsp;&nbsp;No. HP</td>
                                <td>
                                <input onkeydown="if(event.keyCode == '13'){$('#email').focus();}"   type="text" id="no_hp" name="no_hp" class="form-control"   value="">
                                </td>
                              </tr>
                              
                              <tr>
                                <td>&nbsp;&nbsp;Email</td>
                                <td>
                                <input onkeydown="if(event.keyCode == '13'){$('#npwp').focus();}"   type="text" id="email" name="email" class="form-control"  value="">
                                </td>
                              </tr>

                              <tr>
                                <td>&nbsp;&nbsp;NPWP</td>
                                <td>
                                <input onkeydown=""   type="text" id="npwp" name="npwp" class="form-control"  value="">
                                </td>
                              </tr>

                             <tr>
                                <td>&nbsp;&nbsp;Jumlah Anak</td>
                                <td>
                                <select name='jml_anak' id='jml_anak' class="form-control inline" style="width: 100px" >
                                    <option value="">Jml Anak</option>
                                    <?php
                                    for ($x2=0; $x2<=20; $x2++)
                                      {
                                        echo'<option value="'.$x2.'">'.$x2.'</option>'; 
                                      } 
                                    ?> 
                                </select>
                                </td>
                              </tr>
                              

                              <tr>
                                <td>&nbsp;&nbsp;Alamat Penagihan</td>
                                <td>
                                <label><input type="checkbox" name="cb1" class="chb" onclick="check(1)"/> Sama dengan alamat rumah</label>
                                <label><input type="checkbox" name="cb2" class="chb" onclick="check(2)"/> Tidak Sama dengan alamat rumah</label>
                                </td>
                              </tr>
                              <tr>
                                <td>&nbsp;&nbsp;Alamat</td>
                                <td>
                                <input onkeydown="if(event.keyCode == '13'){$('#propinsi_penagihan').focus();}"   type="text" id="alamat_penagihan" name="alamat_penagihan" class="form-control"  value="" style="width: 100%">
                                </td>
                              </tr>

                               <tr>
                                <td>&nbsp;&nbsp;Provinsi</td>
                                <td>
                               <select class="form-control" id="propinsi_penagihan" name="propinsi_penagihan" style="display: block;">
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
                               <input type="text" id="propinsi_penagihan2" name="propinsi_penagihan2" class="form-control"  value="" style="width: 100%;display: none" disabled="">
                                </td>
                              </tr>

                              <tr>
                                <td>&nbsp;&nbsp;Kota/Kab.</td>
                                <td>
                               <select class="form-control" id="kota_penagihan" name="kota_penagihan" style="display: block;">
                                <option value="" selected="selected">&nbsp;Pilih Kota/Kabupaten</option>
                              </select>
                               <input type="text" id="kota_penagihan2" name="kota_penagihan2" class="form-control"  value="" style="width: 100%;display: none" disabled="">
                                </td>
                              </tr>

                              <tr>
                                <td>&nbsp;&nbsp;Kecamatan</td>
                                <td>
                               <select class="form-control" id="kecamatan_penagihan" name="kecamatan_penagihan" style="display: block;">
                                  <option value="" selected="selected">&nbsp;Pilih Kecamatan</option>
                                </select>
                                <input type="text" id="kecamatan_penagihan2" name="kecamatan_penagihan2" class="form-control"  value="" style="width: 100%;display: none" disabled="">
                                </td>
                              </tr>

                              <tr>
                                <td>&nbsp;&nbsp;Kelurahan</td>
                                <td>
                                <select class="form-control" id="kelurahan_penagihan" name="kelurahan_penagihan" style="display: block;">
                                  <option value="" selected="selected">&nbsp;Pilih Kelurahan</option>
                                </select>
                                <input type="text" id="kelurahan_penagihan2" name="kelurahan_penagihan2" class="form-control"  value="" style="width: 100%;display: none" disabled="">

                                </td>
                              </tr>
                              
                               <tr>
                                  <td>&nbsp;&nbsp;Upload Identitas</td>
                                  <td>
                                  <label for="upload">Silahkan upload dengan Max. File 2MB</label>
                                  <input type="file" id="image_identitas" name="image_identitas" class="dropify" data-max-file-size="2M" data-default-file="" />      
                                  </td>
                                </tr>                              
                                </table>
                              </div>
                            </form>
                            </div>
                        </div>

                      </div>

                      <div class="row">
                        <div class="col-sm-6">
                          <div class="panel-body">
                            <form id="content-form" method="post" action="" enctype="multipart/form-data" class="form-inline">
                              <div class="table-responsive">
                                <h3>DATA PRIBADI PASANGAN</h3>
                              <table class="table">
                              
                              <tr>
                                <td width="30%">&nbsp;&nbsp;Nama Lengkap</td>
                                <td>
                                <input onkeydown="if(event.keyCode == '13'){$('#tempat_lahir_pasangan').focus();}"   type="text" id="nama_lengkap_pasangan" name="nama_lengkap_pasangan" class="form-control"   value="" style="width: 100%">
                                </td>
                              </tr>
                              
                              <tr>
                                <td>&nbsp;&nbsp;Tempat Lahir</td>
                                <td>
                                <input onkeydown="if(event.keyCode == '13'){$('#tgl_lahir_pasangan').focus();}"   type="text" id="tempat_lahir_pasangan" name="tempat_lahir_pasangan" class="form-control"  value="" style="width: 100%">
                                </td>
                              </tr>

                              <tr>
                                <td>&nbsp;&nbsp;Tanggal Lahir</td>
                                <td for='xx'>
                                 <select name='tgl_lahir_pasangan' id='tgl_lahir_pasangan' class="form-control inline" style="width: 100px" >
                                    <option value="">Tanggal</option>

                                    <?php
                                    for ($x1=1; $x1<=31; $x1++)
                                      {
                                        echo'<option value="'.$x1.'">'.$x1.'</option>'; 
                                      } 
                                    ?> 
                                </select>
                                <select class="form-control inline" id="bln_lahir_pasangan" name="bln_lahir_pasangan" style="width: 100px"> 
                                <option value="" selected="selected">&nbsp;Bulan</option>
                                <option value='01'>&nbsp;Januari</option>
                                <option value='02'>&nbsp;Februari</option>
                                <option value='03'>&nbsp;Maret</option>
                                <option value='04'>&nbsp;April</option>
                                <option value='05'>&nbsp;Mei</option>
                                <option value='06'>&nbsp;Juni</option>
                                <option value='07'>&nbsp;Juli</option>
                                <option value='08'>&nbsp;Agustus</option>
                                <option value='09'>&nbsp;September</option>
                                <option value='10'>&nbsp;Oktober</option>
                                <option value='11'>&nbsp;November</option>
                                <option value='12'>&nbsp;Desember</option>
                              </select>
                                <select id="thn_lahir_pasangan" Name='thn_lahir_pasangan'  class="form-control inline"  style="width: 100px">
                                    <option value="">Tahun</option>

                                    <?php
                                    for ($x=date("Y"); $x>1930; $x--)
                                      {
                                        echo'<option value="'.$x.'">'.$x.'</option>'; 
                                      } 
                                    ?> 
                                </select>
                                </td>
                              </tr>

                              <tr>
                                <td>&nbsp;&nbsp;Identitas</td>
                                <td>
                                <select class="form-control inline" id="jns_identitas_pasangan" name="jns_identitas_pasangan" style="width: 150px" onchange="$('#identitas_pasangan').focus();"> 
                                  <option value="" selected="selected">&nbsp;Jenis Identitas</option>
                                  <option value='KTP'>&nbsp;KTP</option>
                                  <option value='SIM'>&nbsp;SIM</option>
                                  <option value='PASSPORT'>&nbsp;PASSPORT</option>
                                </select>
                                <input onkeydown="if(event.keyCode == '13'){$('#no_hp_pasangan').focus();}"   type="text" id="identitas_pasangan" name="identitas_pasangan" class="form-control inline"  value="" style="width: 250px">
                                </td>
                              </tr>
                              <tr>
                                <td>&nbsp;&nbsp;No. HP</td>
                                <td>
                                <input onkeydown="" type="text" id="no_hp_pasangan" name="no_hp_pasangan" class="form-control"  value="">
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
                              <h3 style="color:white">_</h3>
                              <table class="table">
                              
                              <tr>
                                  <td>&nbsp;&nbsp;Upload Pass Foto</td>
                                  <td>
                                  <label for="upload">Silahkan upload dengan Max. File 2MB</label>
                                  <input type="file" id="image_pass_foto_pasangan" name="image_pass_foto_pasangan" class="dropify" data-max-file-size="2M" data-default-file="" />      
                                  </td>
                                </tr>  
                              
                               <tr>
                                  <td>&nbsp;&nbsp;Upload Identitas</td>
                                  <td>
                                  <label for="upload">Silahkan upload dengan Max. File 2MB</label>
                                  <input type="file" id="image_identitas_pasangan" name="image_identitas_pasangan" class="dropify" data-max-file-size="2M" data-default-file="" />      
                                  </td>
                                </tr>                              
                                </table>
                              </div>
                            </form>
                            </div>
                        </div>

                      </div>


                      <div class="row">
                        <div class="col-sm-6">
                          <div class="panel-body">
                            <form id="content-form" method="post" action="" enctype="multipart/form-data" class="form-inline">
                              <div class="table-responsive">
                                <h3>DATA KELUARGA TERDEKAT</h3>
                              <table class="table">
                              
                              <tr>
                                <td width="40%">&nbsp;&nbsp;Nama Lengkap</td>
                                <td>
                                <input onkeydown="if(event.keyCode == '13'){$('#no_hp_terdekat').focus();}"   type="text" id="nama_lengkap_terdekat" name="nama_lengkap_terdekat" class="form-control"   value="" style="width: 100%">
                                </td>
                              </tr>
                              
                              <tr>
                                <td>&nbsp;&nbsp;No. HP</td>
                                <td>
                                <input onkeydown="if(event.keyCode == '13'){$('#hubungan').focus();}"   type="text" id="no_hp_terdekat" name="no_hp_terdekat" class="form-control"  value="" style="width: 100%">
                                </td>
                              </tr>

                              <tr>
                                <td>&nbsp;&nbsp;Hubungan dengan Pemohon</td>
                                <td>
                                <select class="form-control inline" id="hubungan" name="hubungan" style="width: 100%" onchange="$('#alamat_terdekat').focus();"> 
                                  <option value="" selected="selected">&nbsp;Hubungan</option>
                                  <option value='ORANG TUA'>&nbsp;ORANG TUA</option>
                                  <option value='ANAK'>&nbsp;ANAK</option>
                                  <option value='PAMAN'>&nbsp;PAMAN</option>
                                  <option value='BIBI'>&nbsp;BIBI</option>
                                  <option value='SAUDARA KANDUNG'>&nbsp;SAUDARA KANDUNG</option>
                                  <option value='LAINNYA'>&nbsp;LAINNYA</option>
                                </select>
                                </td>
                              </tr>
                              
                               <tr>
                                <td width="30%">&nbsp;&nbsp;Alamat</td>
                                <td>
                                 <textarea style="width: 100%" id="alamat_terdekat" name="alamat_terdekat" rows="4" cols="30"></textarea>
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
                                      <h3>DATA PEKERJAAN PEMOHON</h3>
                                      <table class="table">
                                      
                                     <tr>
                                      <td >&nbsp;&nbsp;Pekerjaan</td>
                                      <td>
                                       <select class="form-control" id="pekerjaan" name="pekerjaan" style="width: 100%" onchange="$('#nama_perusahaan').focus(); ">
                                        <option value="" selected="selected">&nbsp;Pilih Pekerjaan</option>
                                        <option value='PNS'>&nbsp;PNS</option>
                                        <option value='KARYAWAN SWASTA'>&nbsp;KARYAWAN SWASTA</option>
                                        <option value='KARYAWAN BUMN'>&nbsp;KARYAWAN BUMN</option>
                                        <option value='KARYAWAN BUMD'>&nbsp;KARYAWAN BUMD</option>
                                        <option value='WIRASWASTA'>&nbsp;WIRASWASTA</option>
                                        <option value='PENSIUNAN PNS'>&nbsp;PENSIUNAN PNS</option>
                                        <option value='PENSIUNAN SWASTA'>&nbsp;PENSIUNAN SWASTA</option>
                                        <option value='PENSIUNAN BUMN'>&nbsp;PENSIUNAN BUMN</option>
                                        <option value='PENSIUNAN BUMD'>&nbsp;PENSIUNAN BUMD</option>
                                        <option value='PENSIUNAN TNI'>&nbsp;PENSIUNAN TNI</option>
                                        <option value='PENSIUNAN POLRI'>&nbsp;PENSIUNAN POLRI</option>
                                        <option value='PNI'>&nbsp;PNI</option>
                                        <option value='POLRI'>&nbsp;POLRI</option>
                                        <option value='PROFESIONAL'>&nbsp;PROFESIONAL</option>
                                        <option value='IBU RUMAH TANGGA'>&nbsp;IBU RUMAH TANGGA</option>
                                        <option value='PELAJAR'>&nbsp;PELAJAR</option>
                                        <option value='LAINNYA'>&nbsp;LAINNYA</option>
                                      </select>
                                      </td>
                                    </tr>
                                      
                                      <tr>
                                        <td width="30%" style="text-align: left;">&nbsp;&nbsp;Nama Perusahaan</td>
                                        <td>
                                        <input style="width: 100%"  onkeydown="if(event.keyCode == '13'){$('#alamat_perusahaan').focus();}"   type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control"  value="">
                                        </td>
                                      </tr>

                                       <tr>
                                        <td>&nbsp;&nbsp;Alamat Perusahaam</td>
                                        <td>
                                        <textarea style="width: 100%" id="alamat_perusahaan" name="alamat_perusahaan" rows="4" cols="30"></textarea>
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
                                         <h3 style="color:white">_</h3>
                                      <table class="table">
                                      
                                      <tr>
                                        <td width="30%" style="text-align: left;">&nbsp;&nbsp;No. Telepon</td>
                                        <td>
                                        <input style="width: 100%" onkeydown="if(event.keyCode == '13'){$('#bentuk_usaha').focus();}"   type="text" id="no_telp_perusahaan" name="no_telp_perusahaan" class="form-control"  value="">
                                        </td>
                                      </tr>
                                      
                                      <tr>
                                        <td style="text-align: left;">&nbsp;&nbsp;Bentuk Usaha</td>
                                        <td>
                                       <input style="width: 100%"  onkeydown="if(event.keyCode == '13'){$('#bidang_usaha').focus();}"   type="text" id="bentuk_usaha" name="bentuk_usaha" class="form-control"  value="">
                                        </td>
                                      </tr>

                                       <tr>
                                        <td style="text-align: left;">&nbsp;&nbsp;Bidang Usaha</td>
                                        <td>
                                       <input style="width: 100%"  onkeydown="if(event.keyCode == '13'){$('#jabatan_perusahaan').focus();}"   type="text" id="bidang_usaha" name="bidang_usaha" class="form-control"  value="">
                                        </td>
                                      </tr>

                                       <tr>
                                        <td style="text-align: left;">&nbsp;&nbsp;Jabatan</td>
                                        <td>
                                       <input style="width: 100%" onkeydown="if(event.keyCode == '13'){$('#masa_kerja_perusahaan').focus();}"   type="text" id="jabatan_perusahaan" name="jabatan_perusahaan" class="form-control"  value="">
                                        </td>
                                      </tr>

                                      <tr>
                                        <td style="text-align: left;">&nbsp;&nbsp;Masa Kerja</td>
                                        <td>
                                       <input style="width: 100%" onkeydown="if(event.keyCode == '13'){$('#pekerjaan_pasangan').focus();}"   type="text" id="masa_kerja_perusahaan" name="masa_kerja_perusahaan" class="form-control"  value="">
                                        </td>
                                      </tr>
                                        </table>
                                      </div>
                                    </form>
                                    </div>
                                </div>

                                <!-- data perkerjaan pasangan -->
                                 <div class="col-sm-6">
                                  <div class="panel-body">
                                    <form id="content-form" method="post" action="" enctype="multipart/form-data" class="form-inline">
                                      <div class="table-responsive">
                                      <h3>DATA PEKERJAAN PASANGAN</h3>
                                      <table class="table">
                                      
                                     <tr>
                                      <td >&nbsp;&nbsp;Pekerjaan</td>
                                      <td>
                                       <select class="form-control" id="pekerjaan_pasangan" name="pekerjaan_pasangan" style="width: 100%" onchange="$('#nama_perusahaan_pasangan').focus(); ">
                                        <option value="" selected="selected">&nbsp;Pilih Pekerjaan</option>
                                        <option value='PNS'>&nbsp;PNS</option>
                                        <option value='KARYAWAN SWASTA'>&nbsp;KARYAWAN SWASTA</option>
                                        <option value='KARYAWAN BUMN'>&nbsp;KARYAWAN BUMN</option>
                                        <option value='KARYAWAN BUMD'>&nbsp;KARYAWAN BUMD</option>
                                        <option value='WIRASWASTA'>&nbsp;WIRASWASTA</option>
                                        <option value='PENSIUNAN PNS'>&nbsp;PENSIUNAN PNS</option>
                                        <option value='PENSIUNAN SWASTA'>&nbsp;PENSIUNAN SWASTA</option>
                                        <option value='PENSIUNAN BUMN'>&nbsp;PENSIUNAN BUMN</option>
                                        <option value='PENSIUNAN BUMD'>&nbsp;PENSIUNAN BUMD</option>
                                        <option value='PENSIUNAN TNI'>&nbsp;PENSIUNAN TNI</option>
                                        <option value='PENSIUNAN POLRI'>&nbsp;PENSIUNAN POLRI</option>
                                        <option value='PNI'>&nbsp;PNI</option>
                                        <option value='POLRI'>&nbsp;POLRI</option>
                                        <option value='PROFESIONAL'>&nbsp;PROFESIONAL</option>
                                        <option value='IBU RUMAH TANGGA'>&nbsp;IBU RUMAH TANGGA</option>
                                        <option value='PELAJAR'>&nbsp;PELAJAR</option>
                                        <option value='LAINNYA'>&nbsp;LAINNYA</option>
                                      </select>
                                      </td>
                                    </tr>
                                      
                                      <tr>
                                        <td width="30%" style="text-align: left;">&nbsp;&nbsp;Nama Perusahaan</td>
                                        <td>
                                        <input style="width: 100%"  onkeydown="if(event.keyCode == '13'){$('#alamat_perusahaan_pasangan').focus();}"   type="text" id="nama_perusahaan_pasangan" name="nama_perusahaan_pasangan" class="form-control"  value="">
                                        </td>
                                      </tr>

                                       <tr>
                                        <td>&nbsp;&nbsp;Alamat Perusahaam</td>
                                        <td>
                                        <textarea style="width: 100%" id="alamat_perusahaan_pasangan" name="alamat_perusahaan_pasangan" rows="4" cols="30"></textarea>
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
                                        <h3 style="color:white">_</h3>
                                      <table class="table">
                                      
                                      <tr>
                                        <td width="30%" style="text-align: left;">&nbsp;&nbsp;No. Telepon</td>
                                        <td>
                                        <input style="width: 100%" onkeydown="if(event.keyCode == '13'){$('#bentuk_usaha_pasangan').focus();}"   type="text" id="no_telp_perusahaan_pasangan" name="no_telp_perusahaan_pasangan" class="form-control"  value="">
                                        </td>
                                      </tr>
                                      
                                      <tr>
                                        <td style="text-align: left;">&nbsp;&nbsp;Bentuk Usaha</td>
                                        <td>
                                       <input style="width: 100%"  onkeydown="if(event.keyCode == '13'){$('#bidang_usaha_pasangan').focus();}"   type="text" id="bentuk_usaha_pasangan" name="bentuk_usaha_pasangan" class="form-control"  value="">
                                        </td>
                                      </tr>

                                       <tr>
                                        <td style="text-align: left;">&nbsp;&nbsp;Bidang Usaha</td>
                                        <td>
                                       <input style="width: 100%"  onkeydown="if(event.keyCode == '13'){$('#jabatan_perusahaan_pasangan').focus();}"   type="text" id="bidang_usaha_pasangan" name="bidang_usaha_pasangan" class="form-control"  value="">
                                        </td>
                                      </tr>

                                       <tr>
                                        <td style="text-align: left;">&nbsp;&nbsp;Jabatan</td>
                                        <td>
                                       <input style="width: 100%" onkeydown="if(event.keyCode == '13'){$('#masa_kerja_perusahaan_pasangan').focus();}"   type="text" id="jabatan_perusahaan_pasangan" name="jabatan_perusahaan_pasangan" class="form-control"  value="">
                                        </td>
                                      </tr>

                                      <tr>
                                        <td style="text-align: left;">&nbsp;&nbsp;Masa Kerja</td>
                                        <td>
                                       <input style="width: 100%"   type="text" id="masa_kerja_perusahaan_pasangan" name="masa_kerja_perusahaan_pasangan" class="form-control"  value="">
                                        </td>
                                      </tr>
                                        </table>
                                      </div>
                                    </form>
                                    </div>
                                </div>


                                <!-- data penghasilan dan pengeluaran -->
                                <input type="hidden" id="penghasilan_utama2" name="penghasilan_utama2" class="form-control" value="">
                                <input type="hidden" id="penghasilan_tambahan2" name="penghasilan_tambahan2" class="form-control" value="">
                                <input type="hidden" id="penghasilan_pasangan2" name="penghasilan_pasangan2" class="form-control" value="">
                                <input type="hidden" id="penghasilan_tambahan_pasangan2" name="penghasilan_tambahan_pasangan2" class="form-control" value="">
                                <input type="hidden" id="total_penghasilan2" name="total_penghasilan2" class="form-control" value="">
                                 <div class="col-sm-6">
                                  <div class="panel-body">
                                    <form id="content-form" method="post" action="" enctype="multipart/form-data" class="form-inline">
                                      <div class="table-responsive">
                                      <h3>DATA PENGHASILAN DAN PENGELUARAN</h3>
                                      <table class="table">                                      
                                      <tr>
                                        <td width="30%" style="text-align: left;">&nbsp;&nbsp;Penghasilan Utama</td>
                                        <td>
                                        <input style="width: 100%;text-align: right;"  onkeydown="if(event.keyCode == '13'){$('#penghasilan_tambahan').focus();}"   type="text" id="penghasilan_utama" name="penghasilan_utama" class="form-control"  value="0" min="0">
                                        </td>
                                      </tr>

                                       <tr>
                                        <td>&nbsp;&nbsp;Penghasilan Tambahan</td>
                                        <td>
                                       <input style="width: 100%;text-align: right;"  onkeydown="if(event.keyCode == '13'){$('#penghasilan_pasangan').focus();}"   type="text" id="penghasilan_tambahan" name="penghasilan_tambahan" class="form-control"  value="0" min="0">
                                      </tr>


                                       <tr>
                                        <td>&nbsp;&nbsp;Penghasilan Pasangan</td>
                                        <td>
                                       <input style="width: 100%;text-align: right;"  onkeydown="if(event.keyCode == '13'){$('#penghasilan_tambahan_pasangan').focus();}"   type="text" id="penghasilan_pasangan" name="penghasilan_pasangan" class="form-control"  value="0" min="0">
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
                                        <h3 style="color:white">_</h3>
                                      <table class="table">
                                      
                                      <tr>
                                        <td width="50%" style="text-align: left;">&nbsp;&nbsp;Penghasilan Tambahan Pasangan</td>
                                        <td>
                                        <input style="width: 100%;text-align: right;" onkeydown="if(event.keyCode == '13'){$('#total_penghasilan').focus();}"   type="text" id="penghasilan_tambahan_pasangan" name="penghasilan_tambahan_pasangan" class="form-control"  value="0" min="0">
                                        </td>
                                      </tr>
                                      
                                      <tr>
                                        <td style="text-align: left;">&nbsp;&nbsp;Total Penghasilan</td>
                                        <td>
                                       <input style="width: 100%;text-align: right;"  onkeydown="if(event.keyCode == '13'){$('#bidang_usaha_pasangan').focus();}"   type="text" id="total_penghasilan" name="total_penghasilan" class="form-control"  value="0" min="0" disabled="">
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
                        <h5><strong>Data Pinjaman dengan Pihak Lain</strong></h5>
                        <hr>
                            
                       <div class="row">
                           <div class="col-sm-12">
                          <div class="panel-body">
                          <div class="box-header">
                              <?= $this->session->flashdata('message'); ?>
                              <?php
                                $urlpinjaman='konsumen/tambah_pinjaman/'.$temp_kode;
                              ?>
                              <!-- <a href="<?= base_url($urlpinjaman); ?>" class="btn btn-primary pull-left"><i class="fa fa-plus"></i> Tambah Data Pinjaman</a> -->
                              <button type="button"  style=" float:left; padding-top:3px;padding-left:5px; margin: 2px;" class="btn btn-primary pull-left" data-toggle="modal" data-target="#myModal_addpinjaman" onclick="clearTambah(); $('#btnSimpanPinjaman').show();$('#btnHapusPinjaman').hide();"><i class="fa fa-plus fa-fw"></i> Tambah Data Pinjaman</button> 

                          </div>
                            <div class="box-body table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="table12" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th style="width:5px;text-align:center; vertical-align:middle">No.</th>
                                        <th style="width:50px;text-align:center; vertical-align:middle">Nama Bank/Peminjam</th>
                                        <th style="width:50px;text-align:center; vertical-align:middle">Jenis Pinjaman</th>
                                        <th style="width:50px;text-align:center; vertical-align:middle">Jumlah Pinjaman</th>
                                        <th style="width:50px;text-align:center; vertical-align:middle">Jumlah Angsuran per Bulan</th>
                                        <th style="width:50px;text-align:center; vertical-align:middle">Nilai Sisa Pinjaman</th>
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

                            <!-- data penghasilan dan pengeluaran -->
                                <input type="hidden" id="tabungan_nilai2" name="tabungan_nilai2" class="form-control" value="">
                                <input type="hidden" id="deposito_nilai2" name="deposito_nilai2" class="form-control" value="">
                                <input type="hidden" id="rumah_nilai2" name="rumah_nilai2" class="form-control" value="">
                                <input type="hidden" id="kendaraan_nilai2" name="kendaraan_nilai2" class="form-control" value="">
                                 <div class="col-sm-12">
                                  <div class="panel-body">
                                    <form id="content-form" method="post" action="" enctype="multipart/form-data" class="form-inline">
                                      <div class="table-responsive">
                                      <h3>DATA ASSET / KEKAYAAN</h3>
                                      <table class="table">                                      
                                        <tr>
                                          <td width="20%">Tabungan</td>
                                          <td>Bank</td>
                                          <td>:</td>
                                          <td><input style="width: 100%;" onkeydown="if(event.keyCode == '13'){$('#tabungan_nilai').focus();}"   type="text" id="tabungan_bank" name="tabungan_bank" class="form-control"  value="" ></td>
                                          <td style="text-align: right;">Nilai</td>
                                          <td>:</td>
                                          <td><input style="width: 100%;text-align: right;" onkeydown="if(event.keyCode == '13'){$('#deposito_bank').focus();}"   type="text" id="tabungan_nilai" name="tabungan_nilai" class="form-control"  value="0" min="0"></td>
                                        </tr>
                                        <tr>
                                          <td>Deposito</td>
                                          <td>Bank</td>
                                          <td>:</td>
                                          <td><input style="width: 100%;" onkeydown="if(event.keyCode == '13'){$('#deposito_nilai').focus();}"   type="text" id="deposito_bank" name="deposito_bank" class="form-control" value=""></td>
                                          <td style="text-align: right;">Nilai</td>
                                          <td>:</td>
                                          <td><input style="width: 100%;text-align: right;" onkeydown="if(event.keyCode == '13'){$('#rumah_an').focus();}"   type="text" id="deposito_nilai" name="deposito_nilai" class="form-control"  value="0" min="0"></td>
                                        </tr>
                                        <tr>
                                          <td>Rumah</td>
                                          <td>Atas Nama</td>
                                          <td>:</td>
                                          <td><input style="width: 100%;" onkeydown="if(event.keyCode == '13'){$('#rumah_nilai').focus();}"   type="text" id="rumah_an" name="rumah_an" class="form-control" value=""></td>
                                          <td style="text-align: right;">Nilai</td>
                                          <td>:</td>
                                          <td><input style="width: 100%;text-align: right;" onkeydown="if(event.keyCode == '13'){$('#kendaraan_an').focus();}"   type="text" id="rumah_nilai" name="rumah_nilai" class="form-control"  value="0" min="0"></td>
                                        </tr>
                                        <tr>
                                          <td>Kendaraan</td>
                                          <td>Atas Nama</td>
                                          <td>:</td>
                                          <td><input style="width: 100%;" onkeydown="if(event.keyCode == '13'){$('#kendaraan_nilai').focus();}"   type="text" id="kendaraan_an" name="kendaraan_an" class="form-control" value=""></td>
                                          <td style="text-align: right;">Nilai</td>
                                          <td>:</td>
                                          <td><input style="width: 100%;text-align: right;" onkeydown="if(event.keyCode == '13'){$('#rumah_an').focus();}"   type="text" id="kendaraan_nilai" name="kendaraan_nilai" class="form-control"  value="0" min="0"></td>
                                        </tr>
                                        </table>
                                      </div>
                                    </form>
                                    </div>
                                </div>

                        </div>
                        <ul class="list-inline pull-right">
                          <li><button type="button" class="btn btn-default prev-step"><i class='glyphicon glyphicon-backward'></i>   Kembali</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full" id='simpan' name='simpan' onclick="simpanKonsumen();" ><i class='glyphicon glyphicon-floppy-disk'></i>  SIMPAN</button> </li>
                        </ul>
                    </div>
                  
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
   </div>
</div>

<div id="myModal_addpinjaman" class="modal fade"  role="dialog" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog">
<div class="modal-content">
<!-- <input type='hidden' id='id_data_akhir' value=''> -->
<div class="modal-body">
<div class="row">
<section class="content">
 <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Pinjaman</h3>
                  <div class="box-tools pull-right">
                    <!-- <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                 <form id="content-form" method="post" action="" enctype="multipart/form-data" class="form-inline"> 
              <div class="table-responsive">
        <table class="table">
          <input type="hidden" id="jumlah_pinjaman2" name="jumlah_pinjaman2" class="form-control" value="0">
          <input type="hidden" id="jumlah_angsuran2" name="jumlah_angsuran2" class="form-control" value="0">
          <input type="hidden" id="sisa_pinjaman2" name="sisa_pinjaman2" class="form-control" value="0">
          <input type="hidden" id="sts_pinjaman" name="sts_pinjaman" class="form-control" value="">
          <input type="hidden" id="id_pinjaman" name="id_pinjaman" class="form-control" value="0">
            <tr>
              <td width="20%">&nbsp;&nbsp;Nama Peminjam</td>
              <td colspan="3">:&nbsp;&nbsp;
              <div class="form-group">
                <input type="text" onkeydown="if(event.keyCode == '13'){$('#jenis_pinjaman').focus();}" id="nama_peminjam" name="nama_peminjam" class="form-control" value="" >
              </div>
              </td>
            </tr>
            
            <tr>
              <td >&nbsp;&nbsp;Jenis Pinjaman</td>
              <td colspan="3">:&nbsp;&nbsp;
              <input onkeydown="if(event.keyCode == '13'){$('#jumlah_pinjaman').focus();}" type="text" id="jenis_pinjaman" name="jenis_pinjaman" class="form-control" style="width:550px;" value="" onblur="if(this.value=='') this.value='';" onfocus="if(this.value=='') this.value='';">
              </td>
            </tr>

             <tr>
              <td >&nbsp;&nbsp;Jumlah Pinjaman</td>
              <td colspan="3">:&nbsp;&nbsp;
              <input onkeydown="if(event.keyCode == '13'){$('#jumlah_angsuran').focus();}" type="text" id="jumlah_pinjaman" name="jumlah_pinjaman" class="form-control" style="width:550px;" value="0" min="0">
              </td>
            </tr>

             <tr>
              <td >&nbsp;&nbsp;Jumlah Angsuran Per Bulan</td>
              <td colspan="3">:&nbsp;&nbsp;
              <input onkeydown="if(event.keyCode == '13'){$('#sisa_pinjaman').focus();}" type="text" id="jumlah_angsuran" name="jumlah_angsuran" class="form-control" style="width:550px;" value="0" min="0">
              </td>
            </tr>

             <tr>
              <td >&nbsp;&nbsp;Sisa Pinjaman</td>
              <td colspan="3">:&nbsp;&nbsp;
              <input onkeydown="if(event.keyCode == '13'){}" type="text" id="sisa_pinjaman" name="sisa_pinjaman" class="form-control" style="width:550px;" value="0" min="0">
              </td>
            </tr>        
        </table>
            </div>
          </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
        </div>
    </div>
</section>
<!-- /.content -->
 <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                  <tr >
          <td>&nbsp;</td>
          <td colspan="1">    
            <div id='btnSimpanPinjaman' name='btnSimpanPinjaman'  onclick="simpan_pinjaman();" class='btn btn-primary'><i class="fa fa-save fa-fw"></i> SIMPAN</div> 
            <div id='btnHapusPinjaman' name='btnHapusPinjaman' style="display: none" onclick="hapus_pinjaman();" class='btn btn-danger'><i class="fa fa-trash-o"></i> HAPUS</div> &nbsp;&nbsp;&nbsp;&nbsp;            
            <button class="btn btn-default" data-dismiss="modal">Kembali</button>
          </td>
        </tr>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
    </div> <!-- row -->
    </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
    <!-- Modal -->


<script type="text/javascript">
        
    var jumlah_pinjaman = document.getElementById('jumlah_pinjaman');
    var jumlah_angsuran = document.getElementById('jumlah_angsuran');
    var sisa_pinjaman = document.getElementById('sisa_pinjaman');
    
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        jumlah_pinjaman.addEventListener('keyup', function(e){
            $('#jumlah_pinjaman2').val(this.value);
            jumlah_pinjaman.value = formatRupiah(this.value, 'Rp. ');
        });
        jumlah_angsuran.addEventListener('keyup', function(e){
           $('#jumlah_angsuran2').val(this.value);
            jumlah_angsuran.value = formatRupiah(this.value, 'Rp. ');
        });

        sisa_pinjaman.addEventListener('keyup', function(e){
           $('#sisa_pinjaman2').val(this.value);
            sisa_pinjaman.value = formatRupiah(this.value, 'Rp. ');
        });
        
        /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, '').toString();
      // Hapus 0 jika 0 pertama
      if(number_string.length > 1){
        while(number_string.charAt(0) === '0')
        {
        number_string = number_string.substr(1);
        }
      }
            var split           = number_string.split(','),
            sisa            = split[0].length % 3,
            rupiah          = split[0].substr(0, sisa),
            ribuan          = split[0].substr(sisa).match(/\d{3}/gi);
 
            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
 
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    
    function rupiahToInt(rupiah) {
      var hasil = rupiah.replace(/[^,\d]/g, '').toString();
      return parseInt(hasil);
    }

    function angka(angka) {
      var hasil = angka.replace(/[^,\d]/g, '').toString();
      return parseInt(hasil);
    }


  function clearTambah(){
        $('#nama_peminjam').focus();
        $('#nama_peminjam').val('');
        jQuery('#jenis_pinjaman').val('');
        jQuery('#jumlah_pinjaman').val('');
        jQuery('#jumlah_pinjaman2').val('');
        jQuery('#jumlah_angsuran').val('');
        jQuery('#jumlah_angsuran2').val('');
        jQuery('#sisa_pinjaman').val('');
        jQuery('#sisa_pinjaman2').val('');
  }

  function editDataPinjaman(id){
    $('#btnSimpanPinjaman').show();
    $('#btnHapusPinjaman').hide();
    $("#sts_pinjaman").val('edit');
    $("#id_pinjaman").val(id);
     clearTambah();
     $.ajax({
            // dataType : 'json',
            async : false,
            url:"<?=base_url();?>konsumen/get_pinjaman/"+id,
            success:function(data){
              var j = data;
          if(j=='[]'){
              alert('error','error');
              clearTambah();
          }
          var json = $.parseJSON(j);                  
          $(json).each(function(i,val){
              $.each(val,function(k,v){
                      if(k=="nama_peminjam"){
                         $('#nama_peminjam').val(v);
                      }else if(k=='jenis_pinjaman'){
                          $('#jenis_pinjaman').val(v);
                      }else if(k=='jumlah_pinjaman'){
                        val = formatRupiah(v, 'Rp. ');
                          $('#jumlah_pinjaman').val(val);
                      }else if(k=='jumlah_angsuran_perbulan'){
                        val = formatRupiah(v, 'Rp. ');
                          $('#jumlah_angsuran').val(val);
                      }else if(k=='sisa_pinjaman'){
                        val = formatRupiah(v, 'Rp. ');
                          $('#sisa_pinjaman').val(val);
                      }
                      
                      });
                  });
            },//tutup::success
            dataType:"html"
          });//tutup ajax
  }

  function hapusDataPinjaman(id){
    $("#sts_pinjaman").val('hapus');
    $("#id_pinjaman").val(id);
     clearTambah();
    $('#btnSimpanPinjaman').hide();
    $('#btnHapusPinjaman').show();
    
     $.ajax({
            // dataType : 'json',
            async : false,
            url:"<?=base_url();?>konsumen/get_pinjaman/"+id,
            success:function(data){
              var j = data;
          if(j=='[]'){
              alert('error','error');
              clearTambah();
          }
          var json = $.parseJSON(j);                  
          $(json).each(function(i,val){
              $.each(val,function(k,v){
                      if(k=="nama_peminjam"){
                         $("#nama_peminjam").prop('disabled', true);
                         $('#nama_peminjam').val(v);
                      }else if(k=='jenis_pinjaman'){
                          $("#jenis_pinjaman").prop('disabled', true);
                          $('#jenis_pinjaman').val(v);
                      }else if(k=='jumlah_pinjaman'){
                        $("#jumlah_pinjaman").prop('disabled', true);
                        val = formatRupiah(v, 'Rp. ');
                          $('#jumlah_pinjaman').val(val);
                      }else if(k=='jumlah_angsuran_perbulan'){
                        $("#jumlah_angsuran").prop('disabled', true);
                        val = formatRupiah(v, 'Rp. ');
                          $('#jumlah_angsuran').val(val);
                      }else if(k=='sisa_pinjaman'){
                        $("#sisa_pinjaman").prop('disabled', true);
                        val = formatRupiah(v, 'Rp. ');
                          $('#sisa_pinjaman').val(val);
                      }
                      
                      });
                  });
            },//tutup::success
            dataType:"html"
          });//tutup ajax
  }

  

  function validasi_tambah_pinjaman(){
      var data="";
      var dati="";
      var nama_peminjam = $('#nama_peminjam').val();
      var jenis_pinjaman = $('#jenis_pinjaman').val();
      var jumlah_pinjaman2 = $('#jumlah_pinjaman').val();
      var jumlah_angsuran2 = $('#jumlah_angsuran').val();
      var jumlah_pinjaman = rupiahToInt($('#jumlah_pinjaman').val());
      var jumlah_angsuran = rupiahToInt($('#jumlah_angsuran').val());
      var sisa_pinjaman = rupiahToInt($('#sisa_pinjaman').val());
      
      data=data;
      if( nama_peminjam ==""){dati=dati+"Nama Peminjam harus diisi\n";  }
      if( jenis_pinjaman ==""){dati=dati+"Jenis Pinjaman harus diisi\n";  }
      if( jumlah_pinjaman2==""){dati=dati+"Jumlah Pinjaman harus diisi\n"; }
      if( jumlah_angsuran2==""){dati=dati+"Jumlah Angsuran harus diisi\n"; }
      // if( jumlah_pinjaman=="0"){dati=dati+"Jumlah Pinjaman harus diisi\n"; }
      // if( jumlah_angsuran=="0"){dati=dati+"Jumlah Angsuran harus diisi\n"; }
      // if( sisa_pinjaman=="0" || sisa_pinjaman=""){dati=dati+"Sisa Pinjaman harus diisi\n"; }      
      if( dati !=""){
        alert(dati);
        return false;
      } else {return true;}
    }

    function simpan_pinjaman(){
      var sts_pinjaman = $('#sts_pinjaman').val();
      var id_pinjaman = $('#id_pinjaman').val();
      var temp_kode = $('#temp_kode').val();
      var nama_peminjam = $('#nama_peminjam').val();
      var jenis_pinjaman = $('#jenis_pinjaman').val();
      var jumlah_pinjaman = rupiahToInt($('#jumlah_pinjaman').val());
      var jumlah_angsuran = rupiahToInt($('#jumlah_angsuran').val());
      var sisa_pinjaman = rupiahToInt($('#sisa_pinjaman').val());

      var hasil=validasi_tambah_pinjaman();
      if (hasil!=false) {
          $.ajax({
            type:"POST",
            async : false,
            url:"<?=base_url();?>konsumen/simpan_pinjaman",
            data:{  "id_pinjaman":id_pinjaman,"temp_kode":temp_kode,"nama_peminjam":nama_peminjam,"jenis_pinjaman":jenis_pinjaman, "jumlah_pinjaman":jumlah_pinjaman, "jumlah_angsuran":jumlah_angsuran, "sisa_pinjaman":sisa_pinjaman,"sts_pinjaman":sts_pinjaman},
            success:function(data){
              if(data=="sukses"){ 
                  $('#myModal_addpinjaman').modal('toggle'); 
                  loadDataPinjaman();
              }else{
                alert('Gagal!!');
              }
            },//tutup::success
            dataType:"html"
          });//tutup ajax
        }
    }

    function hapus_pinjaman(){
      var id_pinjaman = $('#id_pinjaman').val();
      $.ajax({
        type:"POST",
        async : false,
        url:"<?=base_url();?>konsumen/hapus_pinjaman",
        data:{  "id_pinjaman":id_pinjaman},
        success:function(data){
          if(data=="sukses"){ 
              $('#myModal_addpinjaman').modal('toggle'); 
              loadDataPinjaman();
          }else{
            alert('Hapus Data Gagal!!');
          }
        },//tutup::success
        dataType:"html"
      });//tutup ajax
    
    }

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

$("#propinsi_penagihan").change(function(){
    var propinsi = $("#propinsi_penagihan").val();
  // alert(propinsi);
    $.ajax({
    url: "<?=site_url();?>s_perumahan/getWilKota/",
    type:"POST",  
        data: {'propinsi':propinsi,<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function(data){
            $("#kota_penagihan").html(data);
      $("#kecamatan_penagihan").html("<option value=''>&nbsp;Pilih Kecamatan</option>");
      $("#kelurahan_penagihan").html("<option value=''>&nbsp;Pilih Kelurahan</option>");
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

$("#kota_penagihan").change(function(){
  var propinsi = $("#propinsi_penagihan").val();
    var kota = $("#kota_penagihan").val();
    $.ajax({
        url: "<?=site_url();?>s_perumahan/getWilKec/",
    type:"POST",  
        data: {"propinsi" : propinsi, "kota" : kota,<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function(data){
            $("#kecamatan_penagihan").html(data);
            $("#kelurahan_penagihan").html("<option value=''>&nbsp;Pilih Kelurahan</option>");
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

$("#kecamatan_penagihan").change(function(){
    var kota = $("#kota_penagihan").val();
  var kec = $("#kecamatan_penagihan").val();
    $.ajax({
        url: "<?=site_url();?>s_perumahan/getWilKel/",
    type:"POST",  
        data:  {"kota" : kota, "kec" : kec,<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function(data){
            $("#kelurahan_penagihan").html(data);
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

function simpanKonsumen(){
  var nama_lengkap = $('#nama_lengkap').val();
  var tempat_lahir = $('#tempat_lahir').val();
  var tgl_lahir = $('#tgl_lahir').val();
  var bln_lahir = $('#bln_lahir').val();
  var thn_lahir = $('#thn_lahir').val();
  var tgl_lahir = thn_lahir+'-'+bln_lahir+'-'+tgl_lahir;
  var jns_identitas = $('#jns_identitas').val();
  var identitas = $('#identitas').val();
  var alamat_rumah = $('#alamat_rumah').val();
  var propinsi = $('#propinsi').val();
  var kota = $('#kota').val();
  var kecamatan = $('#kecamatan').val();
  var kelurahan = $('#kelurahan').val();
  var status_pernikahan = $('#status_pernikahan').val();
  var image_pass_foto = $('#image_pass_foto').val();
  var no_hp = $('#no_hp').val();
  var email = $('#email').val();
  var npwp = $('#npwp').val();
  var jml_anak  = $('#jml_anak').val();
  var cb1 = $('#cb1').val();
  var cb2 = $('#cb2').val();
  var alamat_penagihan = $('#alamat_penagihan').val();
  var propinsi_penagihan = $('#propinsi_penagihan').val();
  var kota_penagihan = $('#kota_penagihan').val();
  var kecamatan_penagihan = $('#kecamatan_penagihan').val();
  var kelurahan_penagihan = $('#kelurahan_penagihan').val();
  var image_identitas = $('#image_identitas').val();
  var nama_lengkap_pasangan = $('#nama_lengkap_pasangan').val();
  var tempat_lahir_pasangan = $('#tempat_lahir_pasangan').val();
  var tgl_lahir_pasangan = $('#tgl_lahir_pasangan').val();
  var bln_lahir_pasangan = $('#bln_lahir_pasangan').val();
  var thn_lahir_pasangan = $('#thn_lahir_pasangan').val();
  var tgl_lahir_pasangan = thn_lahir_pasangan+'-'+bln_lahir_pasangan+'-'+tgl_lahir_pasangan;
  var jns_identitas_pasangan = $('#jns_identitas_pasangan').val();
  var identitas_pasangan = $('#identitas_pasangan').val();
  var no_hp_pasangan = $('#no_hp_pasangan').val();
  var image_pass_foto_pasangan = $('#image_pass_foto_pasangan').val();
  var image_identitas_pasangan = $('#image_identitas_pasangan').val();
  var nama_lengkap_terdekat = $('#nama_lengkap_terdekat').val();
  var no_hp_terdekat = $('#no_hp_terdekat').val();
  var hubungan = $('#hubungan').val();
  var alamat_terdekat = $('#alamat_terdekat').val();
  var pekerjaan = $('#pekerjaan').val();
  var nama_perusahaan = $('#nama_perusahaan').val();
  var alamat_perusahaan = $('#alamat_perusahaan').val();
  var no_telp_perusahaan = $('#no_telp_perusahaan').val();
  var bentuk_usaha = $('#bentuk_usaha').val();
  var jabatan_perusahaan = $('#jabatan_perusahaan').val();
  var masa_kerja_perusahaan = $('#masa_kerja_perusahaan').val();
  var pekerjaan_pasangan = $('#pekerjaan_pasangan').val();
  var nama_perusahaan_pasangan = $('#nama_perusahaan_pasangan').val();
  var alamat_perusahaan_pasangan = $('#alamat_perusahaan_pasangan').val();
  var no_telp_perusahaan_pasangan = $('#no_telp_perusahaan_pasangan').val();
  var bentuk_usaha_pasangan = $('#bentuk_usaha_pasangan').val();
  var bidang_usaha_pasangan = $('#bidang_usaha_pasangan').val();
  var jabatan_perusahaan_pasangan = $('#jabatan_perusahaan_pasangan').val();
  var masa_kerja_perusahaan_pasangan = $('#masa_kerja_perusahaan_pasangan').val();
  var penghasilan_utama2 = $('#penghasilan_utama2').val();
  var penghasilan_tambahan2 = $('#penghasilan_tambahan2').val();
  var penghasilan_pasangan2 = $('#penghasilan_pasangan2').val();
  var penghasilan_tambahan_pasangan2 = $('#penghasilan_tambahan_pasangan2').val();
  var total_penghasilan2 = $('#total_penghasilan2').val();
  var tabungan_bank = $('#tabungan_bank').val();
  var tabungan_nilai2 = $('#tabungan_nilai2').val();
  var deposito_bank = $('#deposito_bank').val();
  var deposito_nilai2 = $('#deposito_nilai2').val();
  var rumah_an = $('#rumah_an').val();
  var rumah_nilai2 = $('#rumah_nilai2').val();
  var kendaraan_an = $('#kendaraan_an').val();
  var kendaraan_nilai2 = $('#kendaraan_nilai2').val();
  var temp_kode = $('#temp_kode').val();
  
  $.ajax({
    type:"POST",
    async : false,
    url:"<?=base_url();?>konsumen/simpan_konsumen",
    data:{"nama_lengkap":nama_lengkap,"tempat_lahir":tempat_lahir,"tgl_lahir":tgl_lahir,"jns_identitas":jns_identitas,"identitas":identitas,"alamat_rumah":alamat_rumah,"propinsi":propinsi,"kota":kota,"kecamatan":kecamatan,"kelurahan":kelurahan,"status_pernikahan":status_pernikahan,"image_pass_foto":image_pass_foto,"no_hp":no_hp,"email":email,"npwp":npwp,"jml_anak":jml_anak,"cb1":cb1,"cb2":cb2,"alamat_penagihan":alamat_penagihan, "propinsi_penagihan":propinsi_penagihan, "kota_penagihan":kota_penagihan,"kecamatan_penagihan":kecamatan_penagihan,"kelurahan_penagihan":kelurahan_penagihan,"image_identitas":image_identitas,"nama_lengkap_pasangan":nama_lengkap_pasangan,"tempat_lahir_pasangan":tempat_lahir_pasangan,"tgl_lahir_pasangan":tgl_lahir_pasangan,"jns_identitas_pasangan":jns_identitas_pasangan,"identitas_pasangan":identitas_pasangan,"no_hp_pasangan":no_hp_pasangan,"image_pass_foto_pasangan":image_pass_foto_pasangan,"image_identitas_pasangan":image_identitas_pasangan,"nama_lengkap_terdekat":nama_lengkap_terdekat,"no_hp_terdekat":no_hp_terdekat,"hubungan":hubungan,"alamat_terdekat":alamat_terdekat,"temp_kode":temp_kode,"pekerjaan":pekerjaan,"nama_perusahaan":nama_perusahaan,"alamat_perusahaan":alamat_perusahaan,"no_telp_perusahaan":no_telp_perusahaan,"bentuk_usaha":bentuk_usaha,"bidang_usaha":bidang_usaha,"jabatan_perusahaan":jabatan_perusahaan,"masa_kerja_perusahaan":masa_kerja_perusahaan,"pekerjaan_pasangan":pekerjaan_pasangan,"nama_perusahaan_pasangan":nama_perusahaan_pasangan,"alamat_perusahaan_pasangan":alamat_perusahaan_pasangan,"no_telp_perusahaan_pasangan":no_telp_perusahaan_pasangan,"bentuk_usaha_pasangan":bentuk_usaha_pasangan,"bidang_usaha_pasangan":bidang_usaha_pasangan,"jabatan_perusahaan_pasangan":jabatan_perusahaan_pasangan,"masa_kerja_perusahaan_pasangan":masa_kerja_perusahaan_pasangan,"penghasilan_utama2":penghasilan_utama2,"penghasilan_tambahan2":penghasilan_tambahan2,"penghasilan_pasangan2":penghasilan_pasangan2,"penghasilan_tambahan_pasangan2":penghasilan_tambahan_pasangan2,"total_penghasilan2":total_penghasilan2,"tabungan_bank":tabungan_bank,"tabungan_nilai2":tabungan_nilai2,"deposito_bank":deposito_bank,"deposito_nilai2":deposito_nilai2,"rumah_an":rumah_an,"rumah_nilai2":rumah_nilai2,"kendaraan_an":kendaraan_an,"kendaraan_nilai2":kendaraan_nilai2},
   }).done(function( e ) {
    /*alert( "word was saved" + e );*/
  });//tutup ajax
}




</script>



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



$(".chb").change(function()
{
  $(".chb").prop('checked',false);
  $(this).prop('checked',true);
});

function check(val){
  if(val===1){
    alamat_rumah=$('#alamat_rumah').val();
    propinsi=$('#propinsi').val();
    kota=$('#kota').val();
    kecamatan=$('#kecamatan').val();
    kelurahan=$('#kelurahan').val();
    
   $('#alamat_penagihan').val(alamat_rumah);
   $("#alamat_penagihan" ).prop( "disabled", true );

    $.get("<?=site_url();?>konsumen/getprop/"+propinsi, function(data, status){
      $('#propinsi_penagihan').hide();
      $('#propinsi_penagihan2').show();
      $('#propinsi_penagihan2').val(data);
    });   

    $.get("<?=site_url();?>konsumen/getkota/"+kota, function(data, status){
      $('#kota_penagihan').hide();
      $('#kota_penagihan2').show();
      $('#kota_penagihan2').val(data);
    }); 

     $.get("<?=site_url();?>konsumen/getkec/"+kecamatan, function(data, status){
      $('#kecamatan_penagihan').hide();
      $('#kecamatan_penagihan2').show();
      $('#kecamatan_penagihan2').val(data);
    }); 

    $.get("<?=site_url();?>konsumen/getkel/"+kelurahan, function(data, status){
      $('#kelurahan_penagihan').hide();
      $('#kelurahan_penagihan2').show();
      $('#kelurahan_penagihan2').val(data);
    }); 

  }else{
    $('#alamat_penagihan').val('');
    $("#alamat_penagihan" ).prop( "disabled", false );

    $('#propinsi_penagihan').show();
    $('#propinsi_penagihan2').hide();
    $('#propinsi_penagihan2').val('');
  
    $('#kota_penagihan').show();
    $('#kota_penagihan2').hide();
    $('#kota_penagihan2').val('');
  
    $('#kecamatan_penagihan').show();
    $('#kecamatan_penagihan2').hide();
    $('#kecamatan_penagihan2').val('');
  
    $('#kelurahan_penagihan').show();
    $('#kelurahan_penagihan2').hide();
    $('#kelurahan_penagihan2').val('');
    
  }
}
</script>



<script type="text/javascript">
        
    var penghasilan_utama = document.getElementById('penghasilan_utama');
    var penghasilan_tambahan = document.getElementById('penghasilan_tambahan');
    var penghasilan_pasangan = document.getElementById('penghasilan_pasangan');
    var penghasilan_tambahan_pasangan = document.getElementById('penghasilan_tambahan_pasangan');
    var total_penghasilan = document.getElementById('total_penghasilan');
    

    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        penghasilan_utama.addEventListener('keyup', function(e){
            penghasilan_utama.value = formatRupiah(this.value, 'Rp. ');
        });

        penghasilan_tambahan.addEventListener('keyup', function(e){
            penghasilan_tambahan.value = formatRupiah(this.value, 'Rp. ');
        });

        penghasilan_pasangan.addEventListener('keyup', function(e){
            penghasilan_pasangan.value = formatRupiah(this.value, 'Rp. ');
        });
        penghasilan_tambahan_pasangan.addEventListener('keyup', function(e){
            penghasilan_tambahan_pasangan.value = formatRupiah(this.value, 'Rp. ');
        });

        total_penghasilan.addEventListener('keyup', function(e){
            total_penghasilan.value = formatRupiah(this.value, 'Rp. ');
        });





    var tabungan_nilai = document.getElementById('tabungan_nilai');
    var deposito_nilai = document.getElementById('deposito_nilai');
    var rumah_nilai = document.getElementById('rumah_nilai');
    var kendaraan_nilai = document.getElementById('kendaraan_nilai');

        tabungan_nilai.addEventListener('keyup', function(e){
            tabungan_nilai.value = formatRupiah(this.value, 'Rp. ');
        });

        deposito_nilai.addEventListener('keyup', function(e){
            deposito_nilai.value = formatRupiah(this.value, 'Rp. ');
        });

        rumah_nilai.addEventListener('keyup', function(e){
            rumah_nilai.value = formatRupiah(this.value, 'Rp. ');
        });
        kendaraan_nilai.addEventListener('keyup', function(e){
            kendaraan_nilai.value = formatRupiah(this.value, 'Rp. ');
        });

      
 
        /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, '').toString();
      // Hapus 0 jika 0 pertama
      if(number_string.length > 1){
        while(number_string.charAt(0) === '0')
        {
        number_string = number_string.substr(1);
        }
      }
            var split           = number_string.split(','),
            sisa            = split[0].length % 3,
            rupiah          = split[0].substr(0, sisa),
            ribuan          = split[0].substr(sisa).match(/\d{3}/gi);
 
            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
 
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    
    function rupiahToInt(rupiah) {
      var hasil = rupiah.replace(/[^,\d]/g, '').toString();
      return parseInt(hasil);
    }

    function angka(angka) {
      var hasil = angka.replace(/[^,\d]/g, '').toString();
      return parseInt(hasil);
    }

</script>


<script type="text/javascript">
function calculate() {
  var penghasilan_utama = rupiahToInt($('#penghasilan_utama').val())
  var penghasilan_tambahan = rupiahToInt($('#penghasilan_tambahan').val())
  var penghasilan_pasangan = rupiahToInt($('#penghasilan_pasangan').val())
  var penghasilan_tambahan_pasangan = rupiahToInt($('#penghasilan_tambahan_pasangan').val())
  var total_penghasilan = rupiahToInt($('#total_penghasilan').val())

  if ((penghasilan_utama != 0)   ) {
    ttl = penghasilan_utama+penghasilan_tambahan+penghasilan_pasangan+penghasilan_tambahan_pasangan;
    ttl2 = formatRupiah(ttl.toString(), 'Rp. ')
    $('#total_penghasilan').val(ttl2);
  }
  
  var penghasilan_utama2 = rupiahToInt($('#penghasilan_utama2').val())
  var penghasilan_tambahan2 = rupiahToInt($('#penghasilan_tambahan2').val())
  var penghasilan_pasangan2 = rupiahToInt($('#penghasilan_pasangan2').val())
  var penghasilan_tambahan_pasangan2 = rupiahToInt($('#penghasilan_tambahan_pasangan2').val())
  var total_penghasilan2 = rupiahToInt($('#total_penghasilan2').val())

  $('#penghasilan_utama2').val(penghasilan_utama2);
  $('#penghasilan_tambahan2').val(penghasilan_tambahan2);
  $('#penghasilan_pasangan2').val(penghasilan_pasangan2);
  $('#penghasilan_tambahan_pasangan2').val(penghasilan_tambahan_pasangan2);
  $('#total_penghasilan2').val(total_penghasilan2);
}

$(document).on('keyup mouseup', '#penghasilan_utama, #penghasilan_tambahan, #penghasilan_pasangan, #penghasilan_tambahan_pasangan', function() {
  calculate()
})


</script>

<script type="text/javascript">
function calculate_asset() {
  var tabungan_nilai = rupiahToInt($('#tabungan_nilai').val())
  var deposito_nilai = rupiahToInt($('#deposito_nilai').val())
  var rumah_nilai = rupiahToInt($('#rumah_nilai').val())
  var kendaraan_nilai = rupiahToInt($('#kendaraan_nilai').val())
  

  $('#penghasilan_utama2').val(penghasilan_utama2);
  $('#penghasilan_tambahan2').val(penghasilan_tambahan2);
  $('#penghasilan_pasangan2').val(penghasilan_pasangan2);
  $('#penghasilan_tambahan_pasangan2').val(penghasilan_tambahan_pasangan2);
  $('#total_penghasilan2').val(total_penghasilan2);
}

$(document).on('keyup mouseup', '#tabungan_nilai, #deposito_nilai, #rumah_nilai, #kendaraan_nilai', function() {
  calculate_asset()
})


</script>

<style type="text/css">
     table th { color:#fff; background-color:#00ACD7; line-height:35px; padding:0px;    }
/* table {
  width: 100%;
}*/
 .pagingframe { float:right;    }
 .pagingframe div { padding-left:7px;padding-right:7px; }
@media screen and (min-width: 768px) {
  #myModal_addpinjaman .modal-dialog  {width:1300px;}
}



.modal-header {
    padding:9px 15px;
    border-bottom:1px solid #F0F2FF;
    background-color: #F0F2FF;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
 }
 
 .modal-footer {
    padding:9px 15px;
    border-bottom:1px solid #F0F2FF;
    background-color: #F0F2FF;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
 }
</style>
<script type="text/javascript">
  
loadDataPinjamancc('');
  function loadDataPinjamancc(){
  $('#table12').dataTable().fnDestroy();
  var table;

$(document).ready(function() {
   var temp_kode = $('#temp_kode').val();
    table = $('#table12').dataTable({ 
        "processing": true, 
        "serverSide": true, 
        "order": [], 
        "ajax": {
            "url": "<?php echo site_url('konsumen/get_ajax_pinjaman')?>",
            "type": "POST",
            "data":{"temp_kode":temp_kode},
        },
        "iDisplayLength": 5,
        "aLengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "Semua"]],
        "columnDefs": [
            {
                "targets": [3,4,5],
                "className": 'text-right'
            },
            {
                "targets": [0, 2,6],
                "className": 'text-center'
            },
            {
                "targets": [0,6],
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

}

</script>
<script>
// loadDataPinjaman('');
function loadDataPinjaman(){
  // alert(1);
$('#table12').dataTable().fnDestroy();
var table;
var temp_kode = $('#temp_kode').val();

  $(document).ready(function () {
    table = $('#table12').dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
           "url": "<?= site_url('konsumen/get_ajax_pinjaman')?>",
            "type": "POST",
            "data":{"temp_kode":temp_kode},
        },
        "iDisplayLength": 5,
        "aLengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "Semua"]],
        "columnDefs": [
            {
                "targets": [3,4,5],
                "className": 'text-right'
            },
            {
                "targets": [0, 2,6],
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
}
</script>