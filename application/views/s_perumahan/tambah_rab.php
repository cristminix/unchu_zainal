<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php 
        $sql="SELECT nama_proyek FROM tb_grup_proyek WHERE id_grup_proyek='$id_grup_proyek' ";
        $dt=$this->db->query($sql)->row();
        $nama_proyek=$dt->nama_proyek; 
        $url='s_perumahan/load_hpp/'.$id_grup_proyek;
        $url2='s_perumahan/tambah_rab/'.$id_grup_proyek;
                    
    ?>

    Tambah HPP RAB |  <?=$nama_proyek; ?>
    <!-- <small>HPP</small> -->
    
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('s_perumahan'); ?>"><i class="fa fa-cubes"></i> Data HPP RAB</a></li>
    <li class="noselect">Tambah HPP RAB</li>
  </ol>
</section>

<!-- Main content -->

<section class="content">
 <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12 col-md-8">
            <div class="box box-primary">
                <div class="box-header">
                    <a href="<?= base_url($url); ?>" class="btn btn-primary pull-right"><i class="fa fa-angle-left"></i> Kembali</a>
                </div>
                <div class="box-body">
                  <div class="shadow-sm">
                    <form action="<?= base_url($url2); ?>" method="post">
                        <div class="form-group row">
                            <div class="col xs-12 col-md-5">
                                <label for="tanggal">Tanggal<sup></sup></label>
                                <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?php if(set_value('tanggal')){echo set_value('tanggal');}else{echo date('Y-m-d');}  ?>">
                                <?= form_error('tanggal', '<small style="color:red"">', '</small>') ?>
                            </div>
                           
                        </div>

                        <div class="form-group">
                            <label for="kelompok">Kelompok<sup></sup></label>
                            <input type="type" id="kelompok" name="kelompok" class="form-control" value="" >
                            <?= form_error('kelompok', '<small style="color:red"">', '</small>') ?>
                        </div>

                         <div class="form-group row">
                            <div class="col-xs-12 col-md-4">
                                <label for="volume">Volume<sup></sup></label>
                                <input type="number" id="volume" name="volume" class="form-control" value="0" min="0">
                                <?= form_error('volume', '<small style="color:red"">', '</small>') ?>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <label for="satuan">Satuan<sup></sup></label>
                                <input type="text" id="satuan" name="satuan" class="form-control text-center" value="-" min="0">
                                <?= form_error('satuan', '<small style="color:red"">', '</small>') ?>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <label for="harga_satuan">Harga Satuan<sup></sup></label>
                                <input type="text" id="harga_satuan" name="harga_satuan" class="form-control" value="0" min="0">
                                <?= form_error('harga_satuan', '<small style="color:red"">', '</small>') ?>
                            </div>
                        </div>
                       

                        <div class="form-group row">
                            <div class="col-xs-12 col-md-4">
                                <label for="jumlah_rab">Jumlah RAB<sup></sup></label>
                                <input type="text" id="jumlah_rab" name="jumlah_rab" class="form-control" value="0" min="0" readonly="">
                                <?= form_error('jumlah_rab', '<small style="color:red"">', '</small>') ?>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <label for="jumlah_realisasi">Jumlah Realisasi<sup></sup></label>
                                <input type="text" id="jumlah_realisasi" name="jumlah_realisasi" class="form-control" value="0" min="0">
                                <?= form_error('jumlah_realisasi', '<small style="color:red"">', '</small>') ?>
                            </div>
                            
                            <div class="col-xs-12 col-md-4">
                                <label for="sisa_anggaran">Sisa Anggaran<sup></sup></label>
                                <input type="text" id="sisa_anggaran" name="sisa_anggaran" class="form-control" value="0" min="0" readonly="">
                                <?= form_error('sisa_anggaran', '<small style="color:red"">', '</small>') ?>
                            </div>
                        </div>
                        <input type="hidden" id="id_grup_proyek2" name="id_grup_proyek2" class="form-control" value="<?=$id_grup_proyek; ?>">

                        <input type="hidden" id="harga_satuan2" name="harga_satuan2" class="form-control" value="">
                        <input type="hidden" id="jumlah_rab2" name="jumlah_rab2" class="form-control" value="">
                        <input type="hidden" id="jumlah_realisasi2" name="jumlah_realisasi2" class="form-control" value="">
                        <input type="hidden" id="sisa_anggaran2" name="sisa_anggaran2" class="form-control" value="">


                        <div class="form-group row">
                            <div class="col-xs-12 col-md-3 pull-right">
                                <button type="submit" class="btn btn-success btn-block form-control">Tambah</button>
                            </div>
                            <div class="col-xs-12 col-md-3 pull-right">
                                <button type="reset" class="btn btn-default btn-block form-control">Reset</button>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</section>
<!-- /.content -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal-item">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Pilih Produk Barang</h4>
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-bordered table-striped table-hover" id="table1">
            <thead>
                <tr>
                    <th>Barcode</th>
                    <th>Nama</th>
                    <th>Satuan</th>
                    <th class="text-right">Harga</th>
                    <th class="text-right">Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($item as $row) : ?>
                <tr>
                    <td><?= $row['barcode'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['name_unit'] ?></td>
                    <td class="text-right"><?= rupiah($row['price']) ?></td>
                    <td class="text-right"><?= $row['stock'] ?></td>
                    <td>
                        <button class="btn btn-xs btn-info" id="pilih-barang" 
                        data-id_item="<?= $row['id_item'] ?>" 
                        data-barcode="<?= $row['barcode'] ?>" 
                        data-name="<?= $row['name'] ?>" 
                        data-name_unit="<?= $row['name_unit'] ?>" 
                        data-stock="<?= $row['stock'] ?>" 
                        >
                            <i class="fa fa-check"></i> Pilih
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>    
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
        <button type="button" class="btn btn-primary">Pilih</button>
      </div> -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
$(document).ready(function () {
    $(document).on('click', '#pilih-barang', function () {
        var id_item = $(this).data('id_item');
        var barcode = $(this).data('barcode');
        var name = $(this).data('name');
        var name_unit = $(this).data('name_unit');
        var stock = $(this).data('stock');

        $('#id_item').val(id_item);
        $('#barcode').val(barcode);
        $('#name_item').val(name);
        $('#name_unit').val(name_unit);
        $('#stok_awal').val(stock);

        $('#modal-item').modal('hide');
    })
})

$(document).on('keyup mouseup', '#qty, #purchase_price', function() {
  count_total()
})


function count_total() {
  var purchase_price = $('#purchase_price').val()
  var qty = $('#qty').val()

  var total_bayar = purchase_price*qty;
  $('#total_price').val(total_bayar);

}
</script>

<script type="text/javascript">
        
    var volume = document.getElementById('volume');
    var harga_satuan = document.getElementById('harga_satuan');
    var jumlah_rab = document.getElementById('jumlah_rab');
    var jumlah_realisasi = document.getElementById('jumlah_realisasi');
    var sisa_anggaran = document.getElementById('sisa_anggaran');
    

    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        harga_satuan.addEventListener('keyup', function(e){
            harga_satuan.value = formatRupiah(this.value, 'Rp. ');
        });
        jumlah_rab.addEventListener('keyup', function(e){
            jumlah_rab.value = formatRupiah(this.value, 'Rp. ');
        });

        jumlah_realisasi.addEventListener('keyup', function(e){
            jumlah_realisasi.value = formatRupiah(this.value, 'Rp. ');
        });
        sisa_anggaran.addEventListener('keyup', function(e){
            sisa_anggaran.value = formatRupiah(this.value, 'Rp. ');
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
  // var sub_total = 0;
  // $('#cart_table tr').each(function () {
  //   sub_total += parseInt( rupiahToInt(($(this).find('#total').text())) )
  // })
  // isNaN(sub_total) ? $('#sub_total').val('Rp. 0') : $('#sub_total').val(formatRupiah((sub_total.toString()), 'Rp. '))

  // var discount = $('#discount').val()
  // var grand_total = sub_total-(rupiahToInt(discount))

  // if(isNaN(grand_total)){
  //   $('#total-bayar').text('Rp. 0')
  //   $('#grand_total').val('Rp. 0')
  // }else{
  //   grand_total2 = formatRupiah(grand_total.toString(), 'Rp. ')
  //   $('#total-bayar').text(grand_total2+',-')
  //   $('#grand_total').val(grand_total2)
  // }

  var vol = parseInt($('#volume').val())
  var harga_satuan = rupiahToInt($('#harga_satuan').val())
  var jumlah_rab = rupiahToInt($('#jumlah_rab').val())
  var jumlah_realisasi = rupiahToInt($('#jumlah_realisasi').val())
  var sisa_anggaran = rupiahToInt($('#sisa_anggaran').val())

  if ((harga_satuan != 0)   ) {
    jml_rab = vol * harga_satuan;
    jml_rab2 = formatRupiah(jml_rab.toString(), 'Rp. ')
    $('#jumlah_rab').val(jml_rab2);

    sisa_anggaran = jml_rab - jumlah_realisasi;
    jml_sisa = formatRupiah(sisa_anggaran.toString(), 'Rp. ')
    $('#sisa_anggaran').val(jml_sisa);
  }
  
  var harga_satuan2 = rupiahToInt($('#harga_satuan').val());
  var jumlah_rab2 = rupiahToInt($('#jumlah_rab').val());
  var jumlah_realisasi2 = rupiahToInt($('#jumlah_realisasi').val());
  var sisa_anggaran2 = rupiahToInt($('#sisa_anggaran').val());

  $('#harga_satuan2').val(harga_satuan2);
  $('#jumlah_rab2').val(jumlah_rab2);
  $('#jumlah_realisasi2').val(jumlah_realisasi2);
  $('#sisa_anggaran2').val(sisa_anggaran2);
}

$(document).on('keyup mouseup', '#harga_satuan, #volume, #jumlah_realisasi', function() {
  calculate()
})

// disc
$(document).on('change', '#discount', function () {
  var sub_total = rupiahToInt($('#sub_total').val())
  var discount = rupiahToInt($('#discount').val())
  var persen = (discount/sub_total) * 100

  $('#persen').val(persen + ' %')
})
</script>