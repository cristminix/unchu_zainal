<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php 
        // $sql="SELECT nama_proyek FROM tb_grup_proyek WHERE id_grup_proyek='$id_grup_proyek' ";
        // $dt=$this->db->query($sql)->row();
        // $nama_proyek=$dt->nama_proyek; 
        // $url='s_perumahan/load_hpp/'.$id_grup_proyek;
        $url='';
       
        $url2='konsumen/tambah_pinjaman/'.$temp_kode;
                    
    ?>

    <!-- Tambah HPP RAB |  <?=$nama_proyek; ?> -->
    Tambah Pinjaman 
    <!-- <small>HPP</small> -->
    
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('konsumen'); ?>"><i class="fa fa-cubes"></i> Data Pinjaman</a></li>
    <li class="noselect">Tambah Data Pinjaman</li>
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
                       

                        <div class="form-group">
                            <label for="nama_peminjam">Nama Peminjam<sup></sup></label>
                            <input type="type" id="nama_peminjam" name="nama_peminjam" class="form-control" value="" >
                            <?= form_error('nama_peminjam', '<small style="color:red"">', '</small>') ?>
                        </div>

                         <div class="form-group">
                            <label for="jenis_pinjaman">Jenis Pinjaman<sup></sup></label>
                            <input type="type" id="jenis_pinjaman" name="jenis_pinjaman" class="form-control" value="" >
                            <?= form_error('jenis_pinjaman', '<small style="color:red"">', '</small>') ?>
                        </div>

                         <div class="form-group row">
                            <div class="col-xs-12 col-md-4">
                                <label for="jumlah_pinjaman">Jumlah Pinjaman<sup></sup></label>
                                <input type="text" id="jumlah_pinjaman" name="jumlah_pinjaman" class="form-control" value="0" min="0">
                                <?= form_error('jumlah_pinjaman', '<small style="color:red"">', '</small>') ?>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <label for="jumlah_angsuran">Jumlah Angsuran Per Bulan<sup></sup></label>
                                <input type="text" id="jumlah_angsuran" name="jumlah_angsuran" class="form-control" value="0" min="0">
                                <?= form_error('jumlah_angsuran', '<small style="color:red"">', '</small>') ?>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <label for="sisa_pinjaman">Sisa Pinjaman<sup></sup></label>
                                <input type="text" id="sisa_pinjaman" name="sisa_pinjaman" class="form-control" value="0" min="0">
                                <?= form_error('sisa_pinjaman', '<small style="color:red"">', '</small>') ?>
                            </div>
                        </div>
                       
                        <!-- <input type="hidden" id="id_grup_proyek2" name="id_grup_proyek2" class="form-control" value="<?=$id_grup_proyek; ?>"> -->

                        <input type="hidden" id="jumlah_pinjaman2" name="jumlah_pinjaman2" class="form-control" value="">
                        <input type="hidden" id="jumlah_angsuran2" name="jumlah_angsuran2" class="form-control" value="">
                        <input type="hidden" id="sisa_pinjaman2" name="sisa_pinjaman2" class="form-control" value="">

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
           $('#jumlah_angsuran').val(this.value);
            jumlah_angsuran.value = formatRupiah(this.value, 'Rp. ');
        });

        sisa_pinjaman.addEventListener('keyup', function(e){
           $('#sisa_pinjaman').val(this.value);
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

</script>
