<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class S_perumahan extends CI_Controller {



    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_s_perumahan', 'M_s_perumahan_hpp','m_s_perumahan_dok_legal', 'unit_model']);
        is_logged_in();
    }
    
    function get_ajax() {
        $list = $this->m_s_perumahan->get_datatables();
        $data = array();
        // var_dump($lis);
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $onclick = "'Apakah anda yakin, ingin menghapus ".$item->nama_proyek."'";
            $no++;
            $row = array();
            $row[] = $no."."; 
            // $row[] = $item->barcode.'<br><a href="'.site_url('item/barcode_qrcode/'.$item->id_item).'" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i> <i class="fa fa-qrcode"></i></a>'; text-align: right;
            $row[] = '<b>'.$item->nama_proyek.'</b><br><table width="300" border="0">
                                              <tr>
                                                <td width="87" align="left">Luas Tanah</td>
                                                <td width="10" align="left">:</td>
                                                <td width="150" align="left">'.number_format($item->luas_tanah,0,',','.').' m<sup>2</sup></td>
                                              </tr>
                                              <tr>
                                                <td align="left">Jumlah Unit</td>
                                                <td align="left">:</td>
                                                <td align="left">'.number_format($item->jml_unit,0,',','.').' unit</td>
                                              </tr>
                                              <tr>
                                                <td align="left">Klasifikasi</td>
                                                <td align="left">:</td>
                                                <td align="left">'.$item->klasifikasi.'</td>
                                              </tr>
                                              <tr>
                                                <td align="left">Konsep</td>
                                                <td align="left">:</td>
                                                <td align="left">'.$item->konsep.'</td>
                                              </tr>
                                              <tr>
                                                <td align="left">Segmentasi</td>
                                                <td align="left">:</td>
                                                <td align="left">'.$item->segmentasi.'</td>
                                              </tr>
                                            </table>';
           $row[] = '<b>'.$item->alamat_proyek.'</b><br><table width="300" border="0">
                                              <tr>
                                                <td width="87" align="left">Propinsi</td>
                                                <td width="10" align="left">:</td>
                                                <td width="150" align="left">'.$item->propinsi_proyek.'</td>
                                              </tr>
                                              <tr>
                                                <td align="left">Kota/Kab.</td>
                                                <td align="left">:</td>
                                                <td align="left">'.$item->kota_proyek.'</td>
                                              </tr>
                                              <tr>
                                                <td align="left">Kecamatan</td>
                                                <td align="left">:</td>
                                                <td align="left">'.$item->kecamatan_proyek.'</td>
                                              </tr>
                                              <tr>
                                                <td align="left">Desa/Kelurahan</td>
                                                <td align="left">:</td>
                                                <td align="left">'.$item->kelurahan_proyek.'</td>
                                              </tr>
                                            </table>';
             $row[] = '<table width="300" border="0">
                                              <tr>
                                                <td width="150" align="left">No. IMB</td>
                                                <td width="10" align="left">:</td>
                                                <td width="150" align="left">'.$item->no_imb.'</td>
                                                <td width="150" align="left"><a  href="'.site_url($item->file_imb).'" target="_blank">Lihat</a></td>
                                              </tr>
                                              <tr>
                                                <td align="left">No. Izin Lokasi</td>
                                                <td align="left">:</td>
                                                <td align="left">'.$item->no_izin_lokasi.'</td>
                                                <td width="150" align="left"><a  href="'.site_url($item->file_izin_lokasi).'" target="_blank">Lihat</a></td>
                                              </tr>
                                              <tr>
                                                <td align="left">No. Pengesahan</td>
                                                <td align="left">:</td>
                                                <td align="left">'.$item->no_pengesahan.'</td>
                                                <td width="150" align="left"><a  href="'.site_url($item->file_pengesahan).'" target="_blank">Lihat</a></td>
                                              </tr>
                                              <tr>
                                                <td align="left">No. SHGB Induk</td>
                                                <td align="left">:</td>
                                                <td align="left">'.$item->no_shgb_induk.'</td>
                                                <td width="150" align="left"><a  href="'.site_url($item->file_shgb_induk).'" target="_blank">Lihat</a></td>
                                              </tr>
                                              <tr>
                                                <td align="left">Siteplan</td>
                                                <td align="left">:</td>
                                                <td align="left"><a  href="'.site_url($item->siteplan).'" target="_blank">Lihat Siteplan</a>
</td>
                                              </tr>
                                            </table>';
            $html = '<div id="myModal" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Daftar Foto Kavling</h4>
                              </div>
                              <div class="modal-body">
                                <img src="'.site_url($item->foto_kavling1).'" alt="Trulli" width="500" height="333">
                                <img src="'.site_url($item->foto_kavling2).'" alt="Trulli" width="500" height="333">
                                <img src="'.site_url($item->foto_kavling3).'" alt="Trulli" width="500" height="333">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>

                          </div>
                        </div>';
           
            $row[] = '<table width="300" border="0">
                                              <tr>
                                                <td width="150" align="left">Kop Surat</td>
                                                <td width="10" align="left">:</td>
                                                <td width="150" align="left">'.$item->nama_kop_surat.'</td>
                                                </tr>
                                              <tr>
                                                <td align="left">Alamat Kantor</td>
                                                <td align="left">:</td>
                                                <td align="left">'.$item->alamat_kantor.'</td>
                                                
                                              </tr>
                                              <tr>
                                                <td align="left">Logo</td>
                                                <td align="left">:</td>
                                                <td width="150" align="left"><a  href="'.site_url($item->logo).'" target="_blank">Lihat Logo</a></td>
                                              </tr>
                                              <tr>
                                                <td align="left">Klausul SPPR</td>
                                                <td align="left">:</td>
                                                <td align="left">'.$item->klausul_sppr.'</td>
                                              </tr>
                                              <tr>
                                                <td align="left">Foto Kavling</td>
                                                <td align="left">:</td>
                                                <td align="left"><button type="button" class="btn" data-toggle="modal" data-target="#myModal">Lihat Foto Kavling</button>
</td>
                                              </tr>
                                            </table>'.$html;
            // // Create & Update
            // $row[] = '<i class="fa fa-calendar"></i> '.date('d-m-Y', strtotime($item->tgl_entry)). '<br><i class="fa fa-clock-o"></i> '.date('H:i:s', strtotime($item->tgl_entry));
            // if($item->tgl_entry != $item->tgl_update){
            //     $row[] = '<i class="fa fa-calendar"></i> '.date('d-m-Y', strtotime($item->tgl_update)). '<br><i class="fa fa-clock-o"></i> '.date('H:i:s', strtotime($item->tgl_update));
            // }else{
            //     $row[] = '<i class="fa fa-calendar"><i class="fa fa-clock-o">';
            // }

            // add html for base_url('s_perumahan/tambah'); 
            $row[] = 'HPP<br><br><a href="'.base_url('s_perumahan/load_hpp/'.$item->id_grup_proyek.'""').'" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></a>';
           
            $data[] = $row;
        }

        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->m_s_perumahan->count_all(),
                    "recordsFiltered" => $this->m_s_perumahan->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

    function get_ajax_rab() {
        $id_grup_proyek=$this->input->post('id_grup_proyek');
        // $id_grup_proyek=1;
        $list = $this->M_s_perumahan_hpp->get_datatables($id_grup_proyek);
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $onclick = "'Apakah anda yakin, ingin menghapus ".$item->kelompok."'";
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->tanggal;
            $row[] = $item->kelompok;
            $row[] = $item->volume;
            $row[] = $item->satuan;
            $row[] = rupiah($item->harga_satuan);
            $row[] = rupiah($item->jumlah_rab);
            $row[] = rupiah($item->jumlah_realisasi);
            $row[] = rupiah($item->sisa_anggaran);
            $data[] = $row;
        }

        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->M_s_perumahan_hpp->count_all($id_grup_proyek),
                    "recordsFiltered" => $this->M_s_perumahan_hpp->count_filtered($id_grup_proyek),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

    function get_ajax_dok_legal() {
        // $id_grup_proyek=$this->input->post('id_grup_proyek');
        // $id_grup_proyek=1;
        $list = $this->m_s_perumahan_dok_legal->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $onclick = "'Apakah anda yakin, ingin menghapus ".$item->nama_dokumen."'";
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->nama_dokumen;
            $row[] = $item->keterangan;
            $row[] = $item->tgl_entry;
            $row[] = $item->name;
            $row[] = $item->status;
            $row[] = '<a href="" class="btn btn-primary btn-sm" title="Edit Data"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;<a href="" class="btn btn-danger btn-sm" title="Hapus Data"><i class="fa fa-trash"></i></a>';

            // $row[] = '<i class="fa fa-calendar"></i> '.date('d-m-Y', strtotime($item->tgl_entry)). '<br><i class="fa fa-clock-o"></i> '.date('H:i:s', strtotime($item->tgl_entry));
            // if($item->tgl_entry != $item->tgl_update){
            //     $row[] = '<i class="fa fa-calendar"></i> '.date('d-m-Y', strtotime($item->tgl_update)). '<br><i class="fa fa-clock-o"></i> '.date('H:i:s', strtotime($item->tgl_update));
            // }else{
            //     $row[] = '<i class="fa fa-calendar"><i class="fa fa-clock-o">';
            // }

            $data[] = $row;
        }

        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->m_s_perumahan_dok_legal->count_all(),
                    "recordsFiltered" => $this->m_s_perumahan_dok_legal->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

	public function index()
	{
            $data['title'] = 'Perumahan';
            $data['content'] = 's_perumahan/index';
            $data['menu'] = 's_perumahan';
    
            $data['s_perumahan'] = $this->m_s_perumahan->getAll();
    
            $this->load->view('template', $data);
    }

    public function tambah()
    {
        
        $data['title'] = 'Tambah Group Proyek';
        $data['content'] = 's_perumahan/tambah';
        $data['menu'] = 's_perumahan';
        $data['category'] = $this->m_s_perumahan->getAll();
        $this->load->view('template', $data);
    }

    public function load_hpp($id_grup_proyek)
    {
        
        $data['title'] = 'HPP RAB';
        $data['content'] = 's_perumahan/load_hpp';
        $data['menu'] = 's_perumahan';
        $data['category'] = $this->m_s_perumahan->getAll();
        $data['id_grup_proyek'] = $id_grup_proyek;

        $this->load->view('template', $data);
    }

    public function tambah_dok_legal()
    {
        
        $data['title'] = 'Tambah Dokumen Legal';
        $data['content'] = 's_perumahan/tambah_dok_legal';
        $data['menu'] = 's_perumahan';
    
        $this->form_validation->set_rules('nama_dokumen', 'Nama Dokumen', 'required|trim');
        $this->form_validation->set_rules('keterangan_dokumen', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('status_dokumen', 'Status', 'required|trim');
        $this->form_validation->set_message('required', '{field} belum diinput');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template', $data);
        }else{
            $this->m_s_perumahan_dok_legal->tambah_dok_legal();    
        }
    }

    public function tambah_kontraktor()
    {
        
        $data['title'] = 'Tambah Kontraktor';
        $data['content'] = 's_perumahan/tambah_kontraktor';
        $data['menu'] = 's_perumahan';
        // $data['category'] = $this->m_s_perumahan->getAll();
    
        $this->form_validation->set_rules('barcode', 'Barcode', 'required|trim|is_unique[tb_item.barcode]');
        $this->form_validation->set_rules('fullname', 'Nama', 'required|trim');
        $this->form_validation->set_rules('category', 'Kategory', 'required|trim');
        $this->form_validation->set_rules('unit', 'Satuan', 'required|trim');
        $this->form_validation->set_rules('price', 'Harga', 'required|trim');
        
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai, silahkan ganti');
        $this->form_validation->set_message('required', '{field} belum diinput');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template', $data);
        }else{
            $this->m_s_perumahan->tambah_kontraktor();    
        }
    }

    public function tambah_progress()
    {
        
        $data['title'] = 'Tambah Progress Bangun';
        $data['content'] = 's_perumahan/tambah_progress';
        $data['menu'] = 's_perumahan';
        // $data['category'] = $this->m_s_perumahan->getAll();
    
        $this->form_validation->set_rules('barcode', 'Barcode', 'required|trim|is_unique[tb_item.barcode]');
        $this->form_validation->set_rules('fullname', 'Nama', 'required|trim');
        $this->form_validation->set_rules('category', 'Kategory', 'required|trim');
        $this->form_validation->set_rules('unit', 'Satuan', 'required|trim');
        $this->form_validation->set_rules('price', 'Harga', 'required|trim');
        
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai, silahkan ganti');
        $this->form_validation->set_message('required', '{field} belum diinput');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template', $data);
        }else{
            $this->m_s_perumahan->tambah_progress();    
        }
    }
    

     public function tambah_rab($id_grup_proyek)
    {
        $data['id_grup_proyek']=$id_grup_proyek;
        // $data['id_grup_proyek']='ates';
        $data['title'] = 'Tambah HPP RAB';
        $data['content'] = 's_perumahan/tambah_rab';
        $data['menu'] = 's_perumahan';


        $this->form_validation->set_rules('kelompok', 'Kelompok', 'required|trim');
        $this->form_validation->set_rules('volume', 'Volume', 'required|trim');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required|trim');
        $this->form_validation->set_rules('harga_satuan', 'Harga Satuan', 'required|trim');
        $this->form_validation->set_message('required', '{field} belum diinput');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template', $data);
        }else{
            $this->M_s_perumahan_hpp->tambah_rab($id_grup_proyek);    
        }
    }

    public function edit_dok_legal($id_item)
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
        $data=$this->m_s_perumahan->get_kota($id_propinsi)->result_object();        
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
        $data=$this->m_s_perumahan->get_kec($id_propinsi,$id_kota)->result_object();        
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
        $data=$this->m_s_perumahan->get_kel($id_kota,$id_kec)->result_object();     
        $awal='<option value="" selected="selected">&nbsp;Pilih Kelurahan</option>';
        foreach($data as $val){
            $namaKel=ucwords($val->nama_kelurahan);
            $get="<option value='".$val->id_kelurahan."'>&nbsp;".$namaKel."</option>";
            $getAll=$getAll.$get;
        }
        echo ($awal.$getAll);
    }

    function simpan_grup_proyek(){ 
        $nama_proyek=$this->input->post('nama_proyek');
        $alamat_proyek=$this->input->post('alamat_proyek');
        $propinsi=$this->input->post('propinsi');
        $kota=$this->input->post('kota');
        $kecamatan=$this->input->post('kecamatan');
        $kelurahan=$this->input->post('kelurahan');
        $luas_tanah=$this->input->post('luas_tanah');
        $jml_unit=$this->input->post('jml_unit');
        $klasifikasi=$this->input->post('klasifikasi');
        $konsep=$this->input->post('konsep');
        $segmentasi=$this->input->post('segmentasi');
        $no_imb=$this->input->post('no_imb');
        $no_izin_lokasi=$this->input->post('no_izin_lokasi');
        $no_pengesahan=$this->input->post('no_pengesahan');
        $no_shgb_induk=$this->input->post('no_shgb_induk');
        $image_siteplan=$this->input->post('image_siteplan');
        $image_file_lokasi=$this->input->post('image_file_lokasi');
        $image_file_pengesahan=$this->input->post('image_file_pengesahan');
        $image_file_shgb_induk=$this->input->post('image_file_shgb_induk');
        $longitude=$this->input->post('longitude');
        $latitude=$this->input->post('latitude');
        $no_rekening=$this->input->post('no_rekening');
        $kop_surat=$this->input->post('kop_surat');
        $alamat_kantor=$this->input->post('alamat_kantor');
        $propinsi2=$this->input->post('propinsi2');
        $kota2=$this->input->post('kota2');
        $kecamatan2=$this->input->post('kecamatan2');
        $kelurahan2=$this->input->post('kelurahan2');
        $image_logo=$this->input->post('image_logo');
        $image_kav1=$this->input->post('image_kav1');
        $image_kav2=$this->input->post('image_kav2');
        $image_kav3=$this->input->post('image_kav3');
        $klausul_sppr=$this->input->post('klausul_sppr');
        $image_imb=$this->input->post('image_imb');
        $id_user=$this->session->userdata('id_user'); 

        $proses= $this->m_s_perumahan->simpan_grup_proyek($nama_proyek,$alamat_proyek, $propinsi, $kota,$kecamatan,$kelurahan,$luas_tanah,$jml_unit,$klasifikasi,$konsep,$segmentasi,$no_imb,$no_izin_lokasi,$no_pengesahan,$no_shgb_induk,$image_siteplan,$image_file_lokasi,$image_file_pengesahan,$image_file_shgb_induk,$longitude,$latitude,$no_rekening,$kop_surat,$alamat_kantor,$propinsi2,$kota2,$kecamatan2,$kelurahan2,$image_logo,$image_kav1,$image_kav2,$image_kav3,$klausul_sppr,$image_imb,$id_user);
        echo $proses;
    }
 
}