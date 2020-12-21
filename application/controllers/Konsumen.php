<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen extends CI_Controller {



    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_konsumen','m_konsumen_pinjaman']);
        is_logged_in();
    }
    
    function get_ajax() {
        $kode_temp=$this->input->post('kode_temp');
        $list = $this->m_konsumen->get_datatables();
        $data = array();
        // var_dump($lis);
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $onclick = "'Apakah anda yakin, ingin menghapus ".$item->nama_lengkap."'";
            $no++;
            $row = array();
            $row[] = $no."."; 
            // $row[] = $item->barcode.'<br><a href="'.site_url('item/barcode_qrcode/'.$item->id_item).'" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i> <i class="fa fa-qrcode"></i></a>'; text-align: right;
            $row[] = '<table width="300" border="0">
                                              <tr>
                                                <td width="87" align="left">Nama</td>
                                                <td width="10" align="left">:</td>
                                                <td width="150" align="left">'.$item->nama_lengkap.'</sup></td>
                                              </tr>
                                              <tr>
                                                <td align="left">Alamat</td>
                                                <td align="left">:</td>
                                                <td align="left">'.$item->alamat_rumah.'</td>
                                              </tr>
                                              <tr>
                                                <td align="left">No. Hp</td>
                                                <td align="left">:</td>
                                                <td align="left">'.$item->no_hp.'</td>
                                              </tr>
                                              <tr>
                                                <td align="left">Email</td>
                                                <td align="left">:</td>
                                                <td align="left">'.$item->email.'</td>
                                              </tr>
                                            </table>';
            $row[] = '<table width="300" border="0">
                                              <tr>
                                                <td width="87" align="left">Nama</td>
                                                <td width="10" align="left">:</td>
                                                <td width="150" align="left">'.$item->nama_pasangan.'</td>
                                              </tr>
                                              <tr>
                                                <td align="left">Alamat</td>
                                                <td align="left">:</td>
                                                <td align="left">'.$item->alamat_rumah_pasangan.'</td>
                                              </tr>
                                              <tr>
                                                <td align="left">No. Hp</td>
                                                <td align="left">:</td>
                                                <td align="left">'.$item->no_hp_pasangan.'</td>
                                              </tr>
                                              <tr>
                                                <td align="left">Email</td>
                                                <td align="left">:</td>
                                                <td align="left">'.$item->email_pasangan.'</td>
                                              </tr>
                                            </table>';
            $row[] = '<table width="300" border="0">
                                              <tr>
                                                <td width="87" align="left">Nama</td>
                                                <td width="10" align="left">:</td>
                                                <td width="150" align="left">'.$item->nama_keluarga_terdekat.'</sup></td>
                                              </tr>
                                              <tr>
                                                <td align="left">Alamat</td>
                                                <td align="left">:</td>
                                                <td align="left">'.$item->alamat_keluarga_terdekat.'</td>
                                              </tr>
                                              <tr>
                                                <td align="left">No. Hp</td>
                                                <td align="left">:</td>
                                                <td align="left">'.$item->no_hp_keluarga_terdekat.'</td>
                                              </tr>
                                              <tr>
                                                <td align="left">Hubungan</td>
                                                <td align="left">:</td>
                                                <td align="left">'.$item->hubungan.'</td>
                                              </tr>
                                            </table>';

            $row[] = '<table width="300" border="0">
                                              <tr>
                                                <td width="87" align="left">SPPR</td>
                                                <td width="10" align="left">:</td>
                                                <td width="150" align="left">   </td>
                                              </tr>
                                              <tr>
                                                <td align="left">Pindah / Ubah</td>
                                                <td align="left">:</td>
                                                <td align="left"></td>
                                              </tr>
                                              <tr>
                                                <td align="left">Batal</td>
                                                <td align="left">:</td>
                                                <td align="left"></td>
                                              </tr>
                                            </table>';
            $row[] = '<a href="" class="btn btn-primary btn-sm" title="Edit Data"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;<a href="" class="btn btn-danger btn-sm" title="Hapus Data"><i class="fa fa-trash"></i></a>&nbsp;&nbsp;<a href="" class="btn btn-warning btn-sm" title="SPPR"><i class="fa fa-file"></i></a>';
          
            // $row[] = 'HPP<br><br><a href="'.base_url('konsumen/load_sppr/'.$item->id_konsumen.'""').'" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></a>';
           
            $data[] = $row;
        }

        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->m_konsumen->count_all(),
                    "recordsFiltered" => $this->m_konsumen->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

    function get_ajax_pinjaman() {
        // $temp_kode=$this->input->post('temp_kode');
        $list = $this->m_konsumen_pinjaman->get_datatables();
        $data = array();
        // var_dump($lis);
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $id=$item->id_data_pinjaman;
            // $id=$item->id_data_pinjaman;
            $nama_peminjam=$item->nama_peminjam;
            $jenis_pinjaman=$item->jenis_pinjaman;
            $jumlah_pinjaman=$item->jumlah_pinjaman;
            $sisa_pinjaman=$item->sisa_pinjaman;
            $all=$id.'+'.$nama_peminjam.'+'.$jenis_pinjaman.'+'.$jumlah_pinjaman.'+'.$sisa_pinjaman;

            $onclick = "'Apakah anda yakin, ingin menghapus ".$item->nama_peminjam."'";
            $no++;
            $row = array();
            $row[] = $no."."; 
            // $row[] = $item->barcode.'<br><a href="'.site_url('item/barcode_qrcode/'.$item->id_item).'" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i> <i class="fa fa-qrcode"></i></a>'; text-align: right;
            $row[] = $item->nama_peminjam;
            $row[] = $item->jenis_pinjaman;
            $row[] = rupiah($item->jumlah_pinjaman);
            $row[] = rupiah($item->jumlah_angsuran_perbulan);
            $row[] = rupiah($item->sisa_pinjaman);
            // $row[] = $row[] = rupiah($item->jumlah_pinjaman);
            // $row[] = $row[] = rupiah($item->jumlah_angsuran_perbulan);
            // $row[] = $row[] = rupiah($item->sisa_pinjaman);
            $row[] = '<a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_addpinjaman" onclick="editDataPinjaman('.$id.');" title="Edit Data"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;<a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal_addpinjaman" onclick="hapusDataPinjaman('.$id.');" title="Hapus Data"><i class="fa fa-trash"></i></a>';
          
            // $row[] = 'HPP<br><br><a href="'.base_url('konsumen/load_sppr/'.$item->id_konsumen.'""').'" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></a>';
           
            $data[] = $row;
        }

        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->m_konsumen_pinjaman->count_all(),
                    "recordsFiltered" => $this->m_konsumen_pinjaman->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

    function get_pinjaman($id) {
        
        $this->db->select('*');
        $this->db->from('tb_data_pinjaman_temp');
        $this->db->where("id_data_pinjaman = '$id'");
        $query2 = $this->db->get();
        $result = $query2->row();
        echo json_encode($result);
    }

	public function index()
	{
            $data['title'] = 'Konsumen';
            $data['content'] = 'konsumen/index';
            $data['menu'] = 'konsumen';
    
            $data['konsumen'] = $this->m_konsumen->getAll();
    
            $this->load->view('template', $data);
    }

    public function tambah()
    {
        $temp_kode= $this->input->post('temp_kode');
        $now=date("YmdHis");
        $id_user=$this->session->userdata('id_user'); 
        if($temp_kode==''){
            $temp_kode=$id_user.$now;    
        }
        
        $data['title'] = 'Tambah Konsumen';
        $data['content'] = 'konsumen/tambah';
        $data['menu'] = 'konsumen';
        $data['temp_kode'] = $temp_kode;
        $this->load->view('template', $data);
    }

    public function tambah_pinjaman($temp_kode)
    {
        // $id_data_konsumen=$this->input->post('id_data_konsumen');
        $data['temp_kode']=$temp_kode;
        $data['title'] = 'Tambah Pinjaman Dengan Pihak Lain';
        $data['content'] = 'konsumen/tambah_pinjaman';
        $data['menu'] = 'konsumen';
    
        $this->form_validation->set_rules('nama_peminjam', 'Nama Peminjam', 'required|trim');
        $this->form_validation->set_rules('jenis_pinjaman', 'Jenis Pinjaman', 'required|trim');
        $this->form_validation->set_rules('jumlah_pinjaman', 'Jumalh Pinjaman', 'required|trim');
        $this->form_validation->set_rules('jumlah_angsuran', 'Jumlah Angsuran', 'required|trim');
        $this->form_validation->set_rules('sisa_pinjaman', 'Sisa Pinjaman', 'required|trim');
        $this->form_validation->set_message('required', '{field} belum diinput');
        $id_user=$this->session->userdata('id_user'); 

        $jumlah_pinjaman=$this->input->post('jumlah_pinjaman2');
        $jumlah_angsuran=$this->input->post('jumlah_angsuran2');
        $sisa_pinjaman=$this->input->post('sisa_pinjaman2');

        if ($this->form_validation->run() == false) {
            $this->load->view('template', $data);
        }else{
            $this->m_konsumen_pinjaman->tambah_pinjaman($temp_kode,$id_user,$jumlah_pinjaman,$jumlah_angsuran,$sisa_pinjaman);    
        }
    }

    function getprop($id){
        $get=$this->m_konsumen->getprop($id)->row();
        $nama_propinsi=$get->nama_propinsi;
        echo ($nama_propinsi);
    }

     function getkota($id){
        $getKota=$this->m_konsumen->getkota($id)->row();
        $nama_kota=$getKota->nama_kota;
        echo ($nama_kota);
    }

     function getkec($id){
        $get=$this->m_konsumen->getkec($id)->row();
        $nama_kecamatan=$get->nama_kecamatan;
        echo ($nama_kecamatan);
    }

     function getkel($id){
        $get=$this->m_konsumen->getkel($id)->row();
        $nama_kelurahan=$get->nama_kelurahan;
        echo ($nama_kelurahan);
    }
    

    public function load_hpp($id_grup_proyek)
    {
        
        $data['title'] = 'HPP RAB';
        $data['content'] = 's_perumahan/load_hpp';
        $data['menu'] = 's_perumahan';
        $data['category'] = $this->m_konsumen->getAll();
        $data['id_grup_proyek'] = $id_grup_proyek;

        $this->load->view('template', $data);
    }

    

    public function edit($id_item)
    {
        $data['title'] = 'Edit item e-POS';
        $data['content'] = 'item/edit';
        $data['menu'] = 'item';
        
        // relasi kategory dan unit
        $data['category'] = $this->category_model->getAll();    
        $data['unit'] = $this->unit_model->getAll();  
        
        $this->form_validation->set_rules('barcode', 'Barcode', 'required|trim');
        $this->form_validation->set_rules('fullname', 'Nama', 'required|trim');
        $this->form_validation->set_rules('category', 'Kategory', 'required|trim');
        $this->form_validation->set_rules('unit', 'Satuan', 'required|trim');
        $this->form_validation->set_rules('price', 'Harga', 'required|trim');
        
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai, silahkan ganti');
        $this->form_validation->set_message('required', '{field} belum diinput');
        
        if ($this->form_validation->run() == false) {
            $data['item']  =  $this->item_model->get($id_item);    
            $this->load->view('template', $data);
        }else{
            $this->item_model->edit_item();    
        }
    }

    public function hapus()
    {
        if(!$this->input->post('id_item')){
            redirect('item');
        }
        $this->item_model->hapus_item();   
    }

    public function barcode_qrcode($id)
    {
        $data['item'] = $this->item_model->get($id);

        $data['title'] = 'BarCode QRCode e-POS';
        $data['content'] = 'item/barcode_qrcode';
        $data['menu'] = 'item';

        $this->load->view('template', $data);
    }

    public function barcode_print($id)
    {
        $data['item'] = $this->item_model->get($id);

         $html = $this->load->view('pdf/barcode', $data, true);

        $this->fungsi->PdfGenerator($html, 'BarCode'.$data['item']['barcode'], 'A4', 'Landscape');
    }

    public function qrcode_print($id)
    {
        $data['item'] = $this->item_model->get($id);

        $html = $this->load->view('pdf/qrcode', $data, true);

        $this->fungsi->PdfGenerator($html, 'QrCode'.$data['item']['barcode'], 'A4', 'Portrait');
    }


    function getWilKota(){
        $getAll="";
        $id_propinsi= $this->input->post('propinsi');
        $data=$this->m_konsumen->get_kota($id_propinsi)->result_object();        
        $awal='<option value="" selected="selected">&nbsp;Pilih Kota/Kabupaten</option>';
        foreach($data as $val){
            $namaKota=ucwords($val->nama_kota);
            $get="<option value='".$val->id_kota."'>&nbsp;".$namaKota."</option>";
            $getAll=$getAll.$get;
        }
        echo ($awal.$getAll);
    }
    
    function getWilKec(){
        $getAll="";
        $id_propinsi= $this->input->post('propinsi');
        $id_kota= $this->input->post('kota');
        $data=$this->m_konsumen->get_kec($id_propinsi,$id_kota)->result_object();        
        $awal='<option value="" selected="selected">&nbsp;Pilih Kecamatan</option>';
        foreach($data as $val){
            $namaKec=ucwords($val->nama_kecamatan);
            $get="<option value='".$val->id_kecamatan."'>&nbsp;".$namaKec."</option>";
            $getAll=$getAll.$get;
        }
        echo ($awal.$getAll);
    }
    
    function getWilKel(){
        $getAll="";
        $id_kota= $this->input->post('kota');
        $id_kec= $this->input->post('kec');
        $data=$this->m_konsumen->get_kel($id_kota,$id_kec)->result_object();     
        $awal='<option value="" selected="selected">&nbsp;Pilih Kelurahan</option>';
        foreach($data as $val){
            $namaKel=ucwords($val->nama_kelurahan);
            $get="<option value='".$val->id_kelurahan."'>&nbsp;".$namaKel."</option>";
            $getAll=$getAll.$get;
        }
        echo ($awal.$getAll);
    }

    function simpan_konsumen(){ 
        $nama_lengkap=$this->input->post('nama_lengkap');
        $tempat_lahir=$this->input->post('tempat_lahir');
        $tgl_lahir=$this->input->post('tgl_lahir');
        $jns_identitas=$this->input->post('jns_identitas');
        $identitas=$this->input->post('identitas');
        $alamat_rumah=$this->input->post('alamat_rumah');
        $propinsi=$this->input->post('propinsi');
        $kota=$this->input->post('kota');
        $kecamatan=$this->input->post('kecamatan');
        $kelurahan=$this->input->post('kelurahan');
        $status_pernikahan=$this->input->post('status_pernikahan');
        $image_pass_foto=$this->input->post('image_pass_foto');
        $no_hp=$this->input->post('no_hp');
        $email=$this->input->post('email');
        $npwp=$this->input->post('npwp');
        $jml_anak=$this->input->post('jml_anak');
        $cb1=$this->input->post('cb1');
        $cb2=$this->input->post('cb2');
        $alamat_penagihan=$this->input->post('alamat_penagihan');
        $propinsi_penagihan=$this->input->post('propinsi_penagihan');
        $kota_penagihan=$this->input->post('kota_penagihan');
        $kecamatan_penagihan=$this->input->post('kecamatan_penagihan');
        $kelurahan_penagihan=$this->input->post('kelurahan_penagihan');
        $nama_lengkap_pasangan=$this->input->post('nama_lengkap_pasangan');
        $tempat_lahir_pasangan=$this->input->post('tempat_lahir_pasangan');
        $tgl_lahir_pasangan=$this->input->post('tgl_lahir_pasangan');
        $jns_identitas_pasangan=$this->input->post('jns_identitas_pasangan');
        $identitas_pasangan=$this->input->post('identitas_pasangan');
        $no_hp_pasangan=$this->input->post('no_hp_pasangan');
        $image_pass_foto_pasangan=$this->input->post('image_pass_foto_pasangan');
        $image_identitas_pasangan=$this->input->post('image_identitas_pasangan');       
        $nama_lengkap_terdekat=$this->input->post('nama_lengkap_terdekat');       
        $no_hp_terdekat=$this->input->post('no_hp_terdekat');       
        $hubungan=$this->input->post('hubungan');       
        $alamat_terdekat=$this->input->post('alamat_terdekat');       
        $pekerjaan=$this->input->post('pekerjaan');       
        $nama_perusahaan=$this->input->post('nama_perusahaan');       
        $alamat_perusahaan=$this->input->post('alamat_perusahaan');       
        $no_telp_perusahaan=$this->input->post('no_telp_perusahaan');       
        $bentuk_usaha=$this->input->post('bentuk_usaha');       
        $bidang_usaha=$this->input->post('bidang_usaha');       
        $jabatan_perusahaan=$this->input->post('jabatan_perusahaan');       
        $masa_kerja_perusahaan=$this->input->post('masa_kerja_perusahaan');       
        $pekerjaan_pasangan=$this->input->post('pekerjaan_pasangan');       
        $nama_perusahaan_pasangan=$this->input->post('nama_perusahaan_pasangan');       
        $alamat_perusahaan_pasangan=$this->input->post('alamat_perusahaan_pasangan');       
        $no_telp_perusahaan_pasangan=$this->input->post('no_telp_perusahaan_pasangan');       
        $bentuk_usaha_pasangan=$this->input->post('bentuk_usaha_pasangan');       
        $bidang_usaha_pasangan=$this->input->post('bidang_usaha_pasangan');       
        $jabatan_perusahaan_pasangan=$this->input->post('jabatan_perusahaan_pasangan');       
        $masa_kerja_perusahaan_pasangan=$this->input->post('masa_kerja_perusahaan_pasangan');       
        $penghasilan_utama2=$this->input->post('penghasilan_utama2');       
        $penghasilan_tambahan2=$this->input->post('penghasilan_tambahan2');       
        $penghasilan_pasangan2=$this->input->post('penghasilan_pasangan2');       
        $penghasilan_tambahan_pasangan2=$this->input->post('penghasilan_tambahan_pasangan2');       
        $total_penghasilan2=$this->input->post('total_penghasilan2');       
        $tabungan_bank=$this->input->post('tabungan_bank');       
        $tabungan_nilai2=$this->input->post('tabungan_nilai2');       
        $deposito_bank=$this->input->post('deposito_bank');       
        $deposito_nilai2=$this->input->post('deposito_nilai2');       
        $rumah_an=$this->input->post('rumah_an');       
        $rumah_nilai2=$this->input->post('rumah_nilai2');       
        $kendaraan_an=$this->input->post('kendaraan_an');       
        $kendaraan_nilai2=$this->input->post('kendaraan_nilai2');           
        $temp_kode=$this->input->post('temp_kode');       
        $id_user=$this->session->userdata('id_user'); 

        $proses= $this->m_konsumen->simpan_konsumen($nama_lengkap,$tempat_lahir, $tgl_lahir,$jns_identitas,$identitas,$alamat_rumah,$propinsi,$kota,$kecamatan,$kelurahan,$status_pernikahan,$image_pass_foto,$no_hp,$email,$npwp,$jml_anak,$cb1,$cb2,$alamat_penagihan,$propinsi_penagihan,$kota_penagihan,$kecamatan_penagihan,$kelurahan_penagihan,$image_identitas,$nama_lengkap_pasangan,$tempat_lahir_pasangan,$tgl_lahir_pasangan,$jns_identitas_pasangan,$identitas_pasangan,$no_hp_pasangan,$image_pass_foto_pasangan,$image_identitas_pasangan,$nama_lengkap_terdekat,$no_hp_terdekat,$hubungan,$alamat_terdekat,$temp_kode,$pekerjaan,$nama_perusahaan,$alamat_perusahaan,$no_telp_perusahaan,$bentuk_usaha,$bidang_usaha,$jabatan_perusahaan,$masa_kerja_perusahaan,$pekerjaan_pasangan,$nama_perusahaan_pasangan,$alamat_perusahaan_pasangan,$no_telp_perusahaan_pasangan,$bentuk_usaha_pasangan,$bidang_usaha_pasangan,$jabatan_perusahaan_pasangan,$masa_kerja_perusahaan_pasangan,$penghasilan_utama2,$penghasilan_tambahan2,$penghasilan_pasangan2,$penghasilan_tambahan_pasangan2,$total_penghasilan2,$tabungan_bank,$tabungan_nilai2,$deposito_bank,$deposito_nilai2,$rumah_an,$rumah_nilai2,$kendaraan_an,$kendaraan_nilai2,$id_user);
        echo $proses;
    }

     function simpan_pinjaman(){ 
        $id_pinjaman=$this->input->post('id_pinjaman');
        $temp_kode=$this->input->post('temp_kode');
        $nama_peminjam=$this->input->post('nama_peminjam');
        $jenis_pinjaman=$this->input->post('jenis_pinjaman');
        $jumlah_pinjaman=$this->input->post('jumlah_pinjaman');
        $jumlah_angsuran=$this->input->post('jumlah_angsuran');
        $sisa_pinjaman=$this->input->post('sisa_pinjaman');
        $sts_pinjaman=$this->input->post('sts_pinjaman');
        $id_user=$this->session->userdata('id_user'); 
        if($sts_pinjaman=='edit'){
            $proses= $this->m_konsumen->edit_pinjaman($id_pinjaman,$temp_kode,$nama_peminjam, $jenis_pinjaman,$jumlah_pinjaman,$jumlah_angsuran,$sisa_pinjaman, $id_user);
        }else{
            $proses= $this->m_konsumen->simpan_pinjaman($temp_kode,$nama_peminjam, $jenis_pinjaman,$jumlah_pinjaman,$jumlah_angsuran,$sisa_pinjaman, $id_user);
        }
        echo $proses;
    }

     function hapus_pinjaman(){ 
        $id_pinjaman=$this->input->post('id_pinjaman');
       
        $proses= $this->m_konsumen->hapus_pinjaman($id_pinjaman);
       
        echo $proses;
    }
 
}